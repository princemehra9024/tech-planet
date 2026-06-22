@extends('layouts.admin')
@section('title', 'Users')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-extrabold text-charcoal font-display">User Management</h1>
    <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">View registered student accounts and update access levels.</p>
</div>

<div class="glass-card rounded-2xl overflow-hidden border border-charcoal/10 dark:border-white/10 shadow-2xl">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-charcoal/10 dark:divide-white/10">
            <thead class="bg-cream-darker/80 dark:bg-charcoal-light/60">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Email Address</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Course</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Semester</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Role</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Joined Date</th>
                    <th class="px-6 py-4 text-right text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-charcoal/8 dark:divide-white/8 bg-cream-dark/40 dark:bg-transparent">
                @foreach($users as $user)
                <tr class="hover:bg-charcoal/5 dark:hover:bg-white/5 transition duration-150">
                    {{-- Name: bold, full charcoal --}}
                    <td class="px-6 py-4 text-sm font-bold text-charcoal dark:text-white">{{ $user->name }}</td>
                    {{-- Email: readable secondary --}}
                    <td class="px-6 py-4 text-sm font-medium text-slate-500 dark:text-slate-400">{{ $user->email }}</td>
                    {{-- Course / Semester: readable --}}
                    <td class="px-6 py-4 text-sm font-medium text-slate-600 dark:text-slate-300">{{ $user->course ?? 'N/A' }}</td>
                    <td class="px-6 py-4 text-sm font-medium text-slate-600 dark:text-slate-300">
                        @if(is_numeric($user->semester))
                            Sem {{ $user->semester }}
                        @else
                            {{ $user->semester ?? 'N/A' }}
                        @endif
                    </td>
                    {{-- Role badges: boosted bg opacity + dual-mode text --}}
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($user->role === 'admin')
                            <span class="inline-flex items-center rounded-lg bg-amber-500/20 border border-amber-500/40 text-amber-700 dark:text-amber-400 px-2.5 py-1 text-xs font-semibold">
                                {{ ucfirst($user->role) }}
                            </span>
                        @elseif($user->role === 'president')
                            <span class="inline-flex items-center rounded-lg bg-purple-500/20 border border-purple-500/40 text-purple-700 dark:text-purple-400 px-2.5 py-1 text-xs font-semibold">
                                {{ ucfirst($user->role) }}
                            </span>
                        @elseif($user->role === 'secretary')
                            <span class="inline-flex items-center rounded-lg bg-cyan-500/20 border border-cyan-500/40 text-cyan-700 dark:text-cyan-400 px-2.5 py-1 text-xs font-semibold">
                                {{ ucfirst($user->role) }}
                            </span>
                        @elseif($user->role === 'treasurer')
                            <span class="inline-flex items-center rounded-lg bg-emerald-500/20 border border-emerald-500/40 text-emerald-700 dark:text-emerald-400 px-2.5 py-1 text-xs font-semibold">
                                {{ ucfirst($user->role) }}
                            </span>
                        @elseif($user->role === 'media_manager')
                            <span class="inline-flex items-center rounded-lg bg-rose-500/20 border border-rose-500/40 text-rose-700 dark:text-rose-400 px-2.5 py-1 text-xs font-semibold">
                                Media Manager
                            </span>
                        @else
                            <span class="inline-flex items-center rounded-lg bg-slate-200 dark:bg-white/10 border border-slate-300 dark:border-white/20 px-2.5 py-1 text-xs font-semibold text-slate-600 dark:text-slate-300">
                                Student
                            </span>
                        @endif
                    </td>
                    {{-- Joined date --}}
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-500 dark:text-slate-400">{{ $user->created_at->format('M d, Y') }}</td>
                    {{-- Actions --}}
                    <td class="px-6 py-4 whitespace-nowrap text-right text-xs">
                        @if(auth()->user()->role === 'admin')
                            <form method="POST" action="{{ route('admin.users.update', $user) }}" class="inline-flex items-center gap-2">
                                @csrf
                                @method('PATCH')
                                {{-- Select: solid background so text is always visible --}}
                                <select name="role" class="bg-white dark:bg-charcoal-light border border-slate-300 dark:border-white/20 rounded-xl px-2.5 py-1.5 text-xs text-slate-700 dark:text-slate-200 focus:outline-none focus:ring-1 focus:ring-purple-500 cursor-pointer">
                                    <option value="student" {{ $user->role === 'student' ? 'selected' : '' }}>Student</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="president" {{ $user->role === 'president' ? 'selected' : '' }}>President</option>
                                    <option value="secretary" {{ $user->role === 'secretary' ? 'selected' : '' }}>Secretary</option>
                                    <option value="treasurer" {{ $user->role === 'treasurer' ? 'selected' : '' }}>Treasurer</option>
                                    <option value="media_manager" {{ $user->role === 'media_manager' ? 'selected' : '' }}>Media Manager</option>
                                </select>
                                {{-- Update: blue-500/20 is valid, 955 is not --}}
                                <button type="submit" class="bg-blue-500/15 dark:bg-blue-500/20 border border-blue-500/40 text-blue-700 dark:text-blue-400 hover:bg-blue-500/25 px-3 py-1.5 rounded-xl font-bold transition">Update</button>
                            </form>
                            @if($user->id !== auth()->id())
                                <form method="POST" action="{{ route('admin.users.impersonate', $user) }}" class="inline-block ml-1">
                                    @csrf
                                    <button type="submit" class="bg-purple-500/15 dark:bg-purple-500/20 border border-purple-500/40 text-purple-700 dark:text-purple-400 hover:bg-purple-500/25 px-3 py-1.5 rounded-xl font-bold transition flex items-center gap-1">
                                        <i class="fas fa-user-secret text-[10px]"></i> Login As
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline-block ml-1" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-rose-500/15 dark:bg-rose-500/20 border border-rose-500/40 text-rose-700 dark:text-rose-400 hover:bg-rose-500/25 px-3 py-1.5 rounded-xl font-bold transition">Delete</button>
                                </form>
                            @endif
                        @else
                            <span class="text-slate-500 dark:text-slate-400 italic font-semibold">No Actions Allowed</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection