<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'media_manager') {
            abort(403, 'Access denied. Media managers cannot access user listings.');
        }

        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.users.index', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Access denied. Only full administrators can change user roles.');
        }

        $request->validate([
            'role' => 'required|in:student,admin,president,secretary,treasurer,media_manager',
        ]);

        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot change your own role.');
        }

        $user->update(['role' => $request->input('role')]);

        return back()->with('success', 'User role updated successfully.');
    }

    public function destroy(User $user)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Access denied. Only full administrators can delete users.');
        }

        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot delete your own account while logged in.');
        }

        $user->delete();

        return back()->with('success', 'User deleted successfully.');
    }

    public function impersonate(User $user)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Access denied. Only administrators can impersonate users.');
        }

        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot impersonate yourself.');
        }

        session(['impersonator_id' => Auth::id()]);
        Auth::login($user);

        return redirect()->route('student.dashboard')->with('success', "You are now logged in as {$user->name}.");
    }

    public function stopImpersonating()
    {
        if (!session()->has('impersonator_id')) {
            return redirect()->route('student.dashboard');
        }

        $originalAdminId = session()->pull('impersonator_id');
        $admin = User::findOrFail($originalAdminId);
        Auth::login($admin);

        return redirect()->route('admin.users.index')->with('success', 'Returned to administrator account.');
    }
}
