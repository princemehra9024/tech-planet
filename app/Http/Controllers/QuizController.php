<?php
namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index() {
        $quizzes = Quiz::with('questions')->get();
        $attempts = QuizAttempt::where('user_id', Auth::id())->get()->keyBy('quiz_id');
        return view('students.coding-arena', compact('quizzes', 'attempts'));
    }

    public function show($quizId) {
        $quiz = Quiz::with('questions')->findOrFail($quizId);
        $existingAttempt = QuizAttempt::where('user_id', Auth::id())->where('quiz_id', $quizId)->first();
        if ($existingAttempt) {
            return redirect()->route('coding-arena')->with('error', 'You already attempted this quiz.');
        }
        return view('students.quiz-attempt', compact('quiz'));
    }

    public function submit(Request $request, $quizId) {
        $quiz = Quiz::with('questions')->findOrFail($quizId);
        $answers = $request->input('answers', []);
        $score = 0;
        $total = 0;
        foreach ($quiz->questions as $question) {
            $total += $question->points;
            $userAnswer = $answers[$question->id] ?? null;
            if ($userAnswer === $question->correct_option) {
                $score += $question->points;
            }
        }
        QuizAttempt::create([
            'user_id' => Auth::id(),
            'quiz_id' => $quizId,
            'score' => $score,
            'total_possible' => $total,
            'completed_at' => now(),
        ]);
        Auth::user()->addXp(20, 'completed quiz: ' . $quiz->title);
        \App\Models\Notification::create([
            'user_id' => Auth::id(),
            'type' => 'quiz',
            'message' => "You completed {$quiz->title} and scored $score/$total! +20 XP",
        ]);
        return redirect()->route('coding-arena')->with('success', "Quiz completed! Score: $score/$total. +20 XP");
    }
}