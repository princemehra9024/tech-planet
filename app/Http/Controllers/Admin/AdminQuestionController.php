<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminQuestionController extends Controller
{
    public function create(Quiz $quiz)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Access denied. Only full administrators can add questions.');
        }

        return view('admin.questions.create', compact('quiz'));
    }

    public function store(Request $request, Quiz $quiz)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Access denied. Only full administrators can add questions.');
        }

        $data = $request->validate([
            'question_text' => 'required|string|max:1000',
            'option_a' => 'required|string|max:255',
            'option_b' => 'required|string|max:255',
            'option_c' => 'required|string|max:255',
            'option_d' => 'required|string|max:255',
            'correct_option' => 'required|in:a,b,c,d',
            'points' => 'required|integer|min:1|max:100',
        ]);

        $quiz->questions()->create($data);

        return redirect()->route('admin.quizzes.questions.index', $quiz)->with('success', 'Question added successfully.');
    }

    public function index(Quiz $quiz)
    {
        if (Auth::user()->role === 'media_manager') {
            abort(403, 'Access denied. Media managers cannot access questions.');
        }

        $quiz->load('questions');
        return view('admin.questions.index', compact('quiz'));
    }

    public function edit(Question $question)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Access denied. Only full administrators can edit questions.');
        }

        return view('admin.questions.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Access denied. Only full administrators can update questions.');
        }

        $data = $request->validate([
            'question_text' => 'required|string|max:1000',
            'option_a' => 'required|string|max:255',
            'option_b' => 'required|string|max:255',
            'option_c' => 'required|string|max:255',
            'option_d' => 'required|string|max:255',
            'correct_option' => 'required|in:a,b,c,d',
            'points' => 'required|integer|min:1|max:100',
        ]);

        $question->update($data);

        return redirect()->route('admin.quizzes.questions.index', $question->quiz)->with('success', 'Question updated successfully.');
    }

    public function destroy(Question $question)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Access denied. Only full administrators can delete questions.');
        }

        $question->delete();
        return back()->with('success', 'Question deleted successfully.');
    }
}
