<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::with('user')->latest()->paginate(20);
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        $users = User::orderBy('name')->get();
        return view('admin.certificates.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'certificate_file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);

        $path = $request->file('certificate_file')->store('certificates', 'public');

        Certificate::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $path,
        ]);

        \App\Models\Notification::create([
            'user_id' => $request->user_id,
            'type' => 'certificate_awarded',
            'message' => "Congratulations! You have been awarded the '{$request->title}' certificate.",
            'is_read' => false,
        ]);

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate issued successfully.');
    }

    public function destroy(Certificate $certificate)
    {
        if (Storage::disk('public')->exists($certificate->file_path)) {
            Storage::disk('public')->delete($certificate->file_path);
        }
        
        $certificate->delete();

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate deleted successfully.');
    }
}
