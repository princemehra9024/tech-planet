<?php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index() {
        $upcomingEvents = Event::where('date', '>', now())->orderBy('date')->get();
        $pastEvents = Event::where('date', '<=', now())->orderBy('date', 'desc')->get();
        $myRegistrations = EventRegistration::where('user_id', Auth::id())->with('event')->get();
        return view('students.events', compact('upcomingEvents', 'pastEvents', 'myRegistrations'));
    }

    public function register($eventId) {
        $event = Event::findOrFail($eventId);
        $already = EventRegistration::where('user_id', Auth::id())->where('event_id', $eventId)->exists();
        if ($already) {
            return back()->with('error', 'Already registered.');
        }
        EventRegistration::create([
            'user_id' => Auth::id(),
            'event_id' => $eventId,
            'registered_at' => now(),
        ]);
        Auth::user()->addXp(10, 'registered for event');
        // create notification
        \App\Models\Notification::create([
            'user_id' => Auth::id(),
            'type' => 'event',
            'message' => "You registered for {$event->title}.",
        ]);
        return back()->with('success', 'Registered successfully! +10 XP');
    }

    public function storeSuggestion(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'suggested_date' => 'nullable|date',
        ];

        if (!Auth::check()) {
            $rules['name'] = 'required|string|max:255';
            $rules['email'] = 'required|email|max:255';
        }

        $validated = $request->validate($rules);

        $email = Auth::check() ? Auth::user()->email : $validated['email'];

        $recentSuggestions = \App\Models\EventSuggestion::where('email', $email)
            ->where('created_at', '>=', now()->subDays(7))
            ->count();

        if ($recentSuggestions >= 3) {
            return back()->with('error', 'You can only submit up to 3 event suggestions per week.');
        }

        \App\Models\EventSuggestion::create([
            'user_id' => Auth::id(),
            'name' => Auth::check() ? Auth::user()->name : $validated['name'],
            'email' => $email,
            'title' => $validated['title'],
            'description' => $validated['description'],
            'suggested_date' => $validated['suggested_date'] ?? null,
        ]);

        return back()->with('success', 'Thank you for your suggestion! The board will review it.');
    }
}