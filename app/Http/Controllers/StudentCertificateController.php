<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentCertificateController extends Controller
{
    public function index()
    {
        $certificates = Auth::user()->certificates()->latest()->get();
        return view('students.certificates.index', compact('certificates'));
    }
}
