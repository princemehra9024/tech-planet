<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date', 'desc')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Access denied. Only full admins can create events.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'max_participants' => 'required|integer|min:1|max:1000',
        ]);

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'max_participants' => $request->max_participants,
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event successfully created and published!');
    }

    public function destroy(Event $event)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Access denied. Only full admins can delete events.');
        }

        $event->delete();
        return back()->with('success', 'Event deleted successfully.');
    }
}
