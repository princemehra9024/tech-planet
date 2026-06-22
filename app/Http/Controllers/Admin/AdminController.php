<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $postCount = Post::count();
        $quizCount = Quiz::count();
        $questionCount = Question::count();
        $userCount = User::count();
        $suggestions = \App\Models\EventSuggestion::latest()->get();

        return view('admin.dashboard', compact('postCount', 'quizCount', 'questionCount', 'userCount', 'suggestions'));
    }

    public function bulkStartSemester()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Access denied. Only administrators can perform bulk semester updates.');
        }

        $students = User::where('role', 'student')->get();
        $updatedCount = 0;

        foreach ($students as $student) {
            $currentSem = $student->semester;
            $course = $student->course; // e.g. MCA or IMCA

            // Skip if semester is null or already graduated/non-numeric
            if (empty($currentSem) || !is_numeric($currentSem)) {
                continue;
            }

            $currentSemNum = (int)$currentSem;
            $newSem = $currentSemNum + 1;

            if ($course === 'MCA') {
                if ($currentSemNum >= 4) {
                    $student->semester = 'Graduated';
                } else {
                    $student->semester = (string)$newSem;
                }
                $student->save();
                $updatedCount++;
            } elseif ($course === 'IMCA') {
                if ($currentSemNum >= 10) {
                    $student->semester = 'Graduated';
                } else {
                    $student->semester = (string)$newSem;
                }
                $student->save();
                $updatedCount++;
            } else {
                // Generic fallback if course is not set but semester is numeric
                $student->semester = (string)$newSem;
                $student->save();
                $updatedCount++;
            }
        }

        return back()->with('success', "New semester started successfully! Bulk updated {$updatedCount} students' semesters.");
    }

    public function suggestionsIndex()
    {
        $suggestions = \App\Models\EventSuggestion::with('votes')->latest()->get();
        return view('admin.suggestions.index', compact('suggestions'));
    }

    public function updateSuggestionStatus(\Illuminate\Http\Request $request, \App\Models\EventSuggestion $suggestion)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Access denied.');
        }

        $request->validate([
            'status' => 'required|in:approved,dismissed'
        ]);

        $suggestion->update([
            'status' => $request->status
        ]);

        if ($request->status === 'approved') {
            $users = User::all();
            foreach ($users as $user) {
                \App\Models\Notification::create([
                    'user_id' => $user->id,
                    'type' => 'new_vote',
                    'message' => "A new event suggestion '{$suggestion->title}' is up for voting!",
                    'is_read' => false,
                ]);
            }
        }

        return back()->with('success', 'Suggestion status updated.');
    }

    public function publishSuggestionForm(\App\Models\EventSuggestion $suggestion)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Access denied.');
        }

        return view('admin.suggestions.publish', compact('suggestion'));
    }

    public function publishSuggestion(\Illuminate\Http\Request $request, \App\Models\EventSuggestion $suggestion)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Access denied.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'max_participants' => 'required|integer|min:1|max:1000',
        ]);

        \App\Models\Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'max_participants' => $request->max_participants,
        ]);

        // Mark as published so it doesn't appear in the standard pending/approved queues or indicates it's done.
        $suggestion->update([
            'status' => 'published'
        ]);

        $users = User::all();
        foreach ($users as $user) {
            \App\Models\Notification::create([
                'user_id' => $user->id,
                'type' => 'new_event',
                'message' => "New Event Published: {$request->title}! Check it out and register now.",
                'is_read' => false,
            ]);
        }

        return redirect()->route('admin.suggestions.index')->with('success', 'Event published successfully!');
    }

    public function destroySuggestion(\App\Models\EventSuggestion $suggestion)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Access denied.');
        }

        $suggestion->delete();

        return back()->with('success', 'Suggestion dismissed.');
    }
}
