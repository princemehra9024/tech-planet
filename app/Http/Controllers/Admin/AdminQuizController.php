<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminQuizController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'media_manager') {
            abort(403, 'Access denied. Media managers cannot access quizzes.');
        }

        $quizzes = Quiz::withCount('questions')->latest()->get();
        return view('admin.quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Access denied. Only full administrators can create quizzes.');
        }

        return view('admin.quizzes.form', ['quiz' => new Quiz()]);
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Access denied. Only full administrators can create quizzes.');
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        Quiz::create($data);

        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz created successfully.');
    }

    public function edit(Quiz $quiz)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Access denied. Only full administrators can edit quizzes.');
        }

        return view('admin.quizzes.form', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Access denied. Only full administrators can update quizzes.');
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $quiz->update($data);

        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz updated successfully.');
    }

    public function destroy(Quiz $quiz)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Access denied. Only full administrators can delete quizzes.');
        }

        $quiz->delete();
        return back()->with('success', 'Quiz deleted successfully.');
    }
}
