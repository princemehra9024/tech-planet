<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function show() {
        $user = Auth::user();
        $badges = $this->calculateBadges($user);
        return view('students.profile', compact('user', 'badges'));
    }

    public function publicPortfolio($slug) {
        $parts = explode('-', $slug);
        $id = end($parts);
        
        $user = User::findOrFail($id);
        
        $canonicalSlug = $user->portfolioSlug();
        if ($slug !== $canonicalSlug) {
            return redirect()->route('portfolio.show', $canonicalSlug);
        }

        $user->load(['posts.likes', 'posts.comments', 'eventRegistrations.event']);
        $badges = $this->calculateBadges($user);
        return view('portfolio.show', compact('user', 'badges'));
    }

    public function edit() {
        return view('students.profile-edit', ['user' => Auth::user()]);
    }

    public function update(Request $request) {
        $user = Auth::user();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'course' => 'required|string|in:MCA,IMCA',
            'semester' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) use ($request) {
                    $course = $request->input('course');
                    if ($course === 'MCA' && ($value < 1 || $value > 4)) {
                        $fail('The semester for MCA must be between 1 and 4.');
                    } elseif ($course === 'IMCA' && ($value < 1 || $value > 10)) {
                        $fail('The semester for IMCA must be between 1 and 10.');
                    }
                }
            ],
            'bio' => 'nullable|string|max:500',
            'password' => 'nullable|min:6|confirmed',
        ]);
        $user->name = $validated['name'];
        $user->course = $validated['course'];
        $user->semester = (string) $validated['semester'];
        $user->branch = 'Computer Science & Informatics';
        $user->bio = $validated['bio'];
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }
        $user->save();
        return redirect()->route('student.profile')->with('success', 'Profile updated.');
    }

    private function calculateBadges($user) {
        $badges = [];
        if ($user->xp >= 100) $badges[] = '🌟 Rising Star';
        if ($user->xp >= 500) $badges[] = '⚡ Code Master';
        if ($user->quizAttempts()->count() >= 3) $badges[] = '📚 Quiz Enthusiast';
        if ($user->eventRegistrations()->count() >= 2) $badges[] = '🎉 Event Explorer';
        return $badges;
    }
}