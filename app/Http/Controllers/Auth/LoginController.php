<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm() { return view('auth.login'); }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // XP for login (once per day)
            $today = now()->toDateString();
            if (!$user->last_login_at || $user->last_login_at->toDateString() != $today) {
                $user->addXp(5);
                $user->last_login_at = now();
                $user->save();
            }

            return redirect()->intended($user->isAdmin() ? '/admin/dashboard' : '/student/dashboard');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}