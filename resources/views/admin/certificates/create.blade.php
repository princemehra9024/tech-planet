@extends('layouts.admin')
@section('title', 'Issue Certificate')
@section('content')
<div class="mb-8">
    <a href="{{ route('admin.certificates.index') }}" class="text-sm font-semibold text-purple-600 dark:text-purple-400 hover:underline mb-2 inline-block"><i class="fas fa-arrow-left mr-1"></i> Back to Certificates</a>
    <h1 class="text-3xl font-extrabold text-charcoal font-display">Issue Certificate</h1>
    <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Upload and assign a certificate to a student.</p>
</div>

<div class="glass-card rounded-2xl p-6 border border-charcoal/10 dark:border-white/10 max-w-3xl">
    <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div>
            <label class="block text-slate-500 font-semibold text-xs mb-1.5 uppercase tracking-widest">Select Student</label>
            <select name="user_id" required class="w-full bg-cream-dark/50 dark:bg-charcoal-light/50 border border-charcoal/10 dark:border-white/10 rounded-xl px-4 py-3 text-charcoal dark:text-white focus:outline-none focus:ring-2 focus:ring-purple-500 transition">
                <option value="">-- Select Student --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
            @error('user_id') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-slate-500 font-semibold text-xs mb-1.5 uppercase tracking-widest">Certificate Title</label>
            <input type="text" name="title" required class="w-full bg-cream-dark/50 dark:bg-charcoal-light/50 border border-charcoal/10 dark:border-white/10 rounded-xl px-4 py-3 text-charcoal dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-purple-500 transition" placeholder="e.g., CodeSprint 2024 Winner">
            @error('title') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-slate-500 font-semibold text-xs mb-1.5 uppercase tracking-widest">Description (Optional)</label>
            <textarea name="description" rows="3" class="w-full bg-cream-dark/50 dark:bg-charcoal-light/50 border border-charcoal/10 dark:border-white/10 rounded-xl px-4 py-3 text-charcoal dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-purple-500 transition resize-none" placeholder="Add any details about why this certificate was awarded..."></textarea>
            @error('description') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-slate-500 font-semibold text-xs mb-1.5 uppercase tracking-widest">Upload Certificate File (PDF/Image)</label>
            <input type="file" name="certificate_file" accept=".pdf,.jpg,.jpeg,.png" required class="w-full bg-cream-dark/50 dark:bg-charcoal-light/50 border border-charcoal/10 dark:border-white/10 rounded-xl px-4 py-2.5 text-charcoal dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-purple-500/20 file:text-purple-700 dark:file:text-purple-400 hover:file:bg-purple-500/30 transition">
            <p class="text-xs text-slate-500 mt-1.5">Supported formats: PDF, JPG, PNG. Max size: 10MB.</p>
            @error('certificate_file') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="pt-4 border-t border-charcoal/5 dark:border-white/5 flex justify-end">
            <button type="submit" class="bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 text-white font-bold px-8 py-3 rounded-xl shadow-lg shadow-purple-500/20 transition flex items-center gap-2">
                <i class="fas fa-paper-plane"></i> Issue Certificate
            </button>
        </div>
    </form>
</div>
@endsection
