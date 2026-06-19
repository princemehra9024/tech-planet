<?php
namespace App\Http\Controllers;

use App\Models\User;

class LeaderboardController extends Controller
{
    public function index() {
        $topStudents = User::orderBy('xp', 'desc')->paginate(20);
        return view('students.leaderboard', compact('topStudents'));
    }
}