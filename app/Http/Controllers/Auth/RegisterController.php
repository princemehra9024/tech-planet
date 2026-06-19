<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegisterForm() { return view('auth.register'); }

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
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
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'student',
            'course' => $validated['course'],
            'semester' => (string) $validated['semester'],
            'branch' => 'Computer Science & Informatics',
            'xp' => 0,
        ]);

        Auth::login($user);
        return redirect('/student/dashboard');
    }
}