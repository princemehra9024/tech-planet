@extends('layouts.admin')
@section('title', 'Manage Certificates')
@section('content')
<div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
    <div>
        <h1 class="text-3xl font-extrabold text-charcoal font-display">Manage Certificates</h1>
        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Issue and track certificates for students.</p>
    </div>
    <a href="{{ route('admin.certificates.create') }}" class="bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 text-white font-bold px-6 py-2.5 rounded-xl shadow-lg shadow-purple-500/20 transition flex items-center gap-2">
        <i class="fas fa-plus"></i> Issue New Certificate
    </a>
</div>

<div class="glass-card rounded-2xl overflow-hidden border border-charcoal/10 dark:border-white/10 shadow-2xl">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-charcoal/10 dark:divide-white/10">
            <thead class="bg-cream-darker/80 dark:bg-charcoal-light/60">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Student</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Issued On</th>
                    <th class="px-6 py-4 text-right text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-charcoal/8 dark:divide-white/8 bg-cream-dark/40 dark:bg-transparent">
                @forelse($certificates as $certificate)
                <tr class="hover:bg-charcoal/5 dark:hover:bg-white/5 transition duration-150">
                    <td class="px-6 py-4 text-sm font-bold text-charcoal dark:text-white">{{ $certificate->user->name }}</td>
                    <td class="px-6 py-4 text-sm font-medium text-slate-600 dark:text-slate-300">{{ $certificate->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-500 dark:text-slate-400">{{ $certificate->created_at->format('M d, Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-xs">
                        <a href="{{ Storage::url($certificate->file_path) }}" target="_blank" class="inline-flex items-center gap-2 bg-cyan-500/15 dark:bg-cyan-500/20 border border-cyan-500/40 text-cyan-700 dark:text-cyan-400 hover:bg-cyan-500/25 px-3 py-1.5 rounded-xl font-bold transition mr-2">
                            <i class="fas fa-external-link-alt"></i> View
                        </a>
                        <form method="POST" action="{{ route('admin.certificates.destroy', $certificate) }}" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this certificate?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-rose-500/15 dark:bg-rose-500/20 border border-rose-500/40 text-rose-700 dark:text-rose-400 hover:bg-rose-500/25 px-3 py-1.5 rounded-xl font-bold transition flex items-center gap-2">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-slate-500 dark:text-slate-400">
                        <div class="flex flex-col items-center justify-center">
                            <i class="fas fa-certificate text-4xl mb-3 opacity-50"></i>
                            <p>No certificates issued yet.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($certificates->hasPages())
        <div class="px-6 py-4 border-t border-charcoal/10 dark:border-white/10">
            {{ $certificates->links() }}
        </div>
    @endif
</div>
@endsection
