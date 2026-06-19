@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-extrabold text-white font-display">Command Center Dashboard</h1>
    <p class="text-sm text-slate-400 mt-1">Overview of Tech Planet's community activity and assessments.</p>
</div>

<div class="grid gap-6 md:grid-cols-2 {{ auth()->user()->role === 'media_manager' ? 'xl:grid-cols-1' : 'xl:grid-cols-4' }}">
    <!-- Total Announcements -->
    <div class="glass-card rounded-2xl p-6 border border-white/5 shadow-xl flex items-center justify-between bg-[#0e1122]">
        <div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Announcements</p>
            <p class="mt-2 text-3xl font-extrabold text-white font-display">{{ $postCount }}</p>
        </div>
        <div class="w-10 h-10 rounded-xl bg-purple-950/40 border border-purple-800/30 flex items-center justify-center text-purple-400 text-lg shadow">
            <i class="fas fa-bullhorn"></i>
        </div>
    </div>

    @if(auth()->user()->role !== 'media_manager')
    <!-- Active Quizzes -->
    <div class="glass-card rounded-2xl p-6 border border-white/5 shadow-xl flex items-center justify-between bg-[#0e1122]">
        <div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Active Quizzes</p>
            <p class="mt-2 text-3xl font-extrabold text-white font-display">{{ $quizCount }}</p>
        </div>
        <div class="w-10 h-10 rounded-xl bg-cyan-950/40 border border-cyan-800/30 flex items-center justify-center text-cyan-400 text-lg shadow">
            <i class="fas fa-laptop-code"></i>
        </div>
    </div>

    <!-- Assessment Questions -->
    <div class="glass-card rounded-2xl p-6 border border-white/5 shadow-xl flex items-center justify-between bg-[#0e1122]">
        <div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Assessments Questions</p>
            <p class="mt-2 text-3xl font-extrabold text-white font-display">{{ $questionCount }}</p>
        </div>
        <div class="w-10 h-10 rounded-xl bg-yellow-950/40 border border-yellow-800/30 flex items-center justify-center text-yellow-400 text-lg shadow">
            <i class="far fa-question-circle"></i>
        </div>
    </div>

    <!-- Registered Users -->
    <div class="glass-card rounded-2xl p-6 border border-white/5 shadow-xl flex items-center justify-between bg-[#0e1122]">
        <div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Registered Users</p>
            <p class="mt-2 text-3xl font-extrabold text-white font-display">{{ $userCount }}</p>
        </div>
        <div class="w-10 h-10 rounded-xl bg-blue-950/40 border border-blue-800/30 flex items-center justify-center text-blue-400 text-lg shadow">
            <i class="fas fa-users"></i>
        </div>
    </div>
    @endif
</div>

<div class="mt-10 glass-card rounded-2xl p-6 border border-white/5 shadow-xl">
    <h2 class="text-xl font-bold text-white font-display mb-4">Quick Command Actions</h2>
    <div class="grid gap-4 md:grid-cols-3">
        <a href="{{ route('admin.posts.create') }}" class="block rounded-xl border border-white/5 bg-[#07080f]/40 hover:bg-white/5 hover:border-purple-500/20 px-4 py-4 text-center text-slate-300 font-semibold text-sm transition-all">
            <i class="fas fa-plus mr-1.5 text-purple-400"></i> Create a post
        </a>
        @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.events.create') }}" class="block rounded-xl border border-white/5 bg-[#07080f]/40 hover:bg-white/5 hover:border-green-500/20 px-4 py-4 text-center text-slate-300 font-semibold text-sm transition-all">
            <i class="fas fa-calendar-plus mr-1.5 text-green-400"></i> Create an event
        </a>
        <a href="{{ route('admin.quizzes.create') }}" class="block rounded-xl border border-white/5 bg-[#07080f]/40 hover:bg-white/5 hover:border-cyan-500/20 px-4 py-4 text-center text-slate-300 font-semibold text-sm transition-all">
            <i class="fas fa-plus mr-1.5 text-cyan-400"></i> Create a quiz
        </a>
        @endif
        @if(auth()->user()->role !== 'media_manager')
        <a href="{{ route('admin.quizzes.index') }}" class="block rounded-xl border border-white/5 bg-[#07080f]/40 hover:bg-white/5 hover:border-yellow-500/20 px-4 py-4 text-center text-slate-300 font-semibold text-sm transition-all">
            <i class="fas fa-tasks mr-1.5 text-yellow-400"></i> Manage quizzes
        </a>
        @endif
    </div>
</div>

@if(auth()->user()->role === 'admin')
<div class="mt-8 glass-card rounded-2xl p-6 border border-white/5 shadow-xl bg-[#0e1122]">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div>
            <h2 class="text-lg font-bold text-white font-display flex items-center gap-2">
                <i class="fas fa-forward text-cyan-400"></i> Semester Control Center
            </h2>
            <p class="text-xs text-slate-400 mt-1">Advance all students' semesters by one. Graduates MCA (sem 4+) and IMCA (sem 10+) automatically.</p>
        </div>
        <form method="POST" action="{{ route('admin.users.bulk-semester-update') }}" onsubmit="return confirm('Are you sure a new semester has started? This will increment all student semesters by 1!')">
            @csrf
            <button type="submit" class="bg-gradient-to-r from-cyan-500 to-purple-650 hover:from-cyan-600 hover:to-purple-700 text-white font-extrabold px-6 py-3 rounded-xl text-xs shadow-lg shadow-cyan-500/10 hover:shadow-cyan-500/20 transition duration-300 flex items-center gap-2">
                <i class="fas fa-university"></i> Start New Semester
            </button>
        </form>
    </div>
</div>
@endif

<div class="mt-8 glass-card rounded-2xl p-6 border border-white/5 shadow-xl bg-[#0e1122]">
    <h2 class="text-lg font-bold text-white font-display mb-4 flex items-center gap-2">
        <i class="fas fa-lightbulb text-yellow-400"></i> Event Suggestions from Community
    </h2>
    <div class="space-y-4">
        @forelse($suggestions as $suggestion)
            <div class="bg-[#07080f]/40 border border-white/5 rounded-xl p-4 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="space-y-2">
                    <h3 class="font-bold text-white text-sm font-display">{{ $suggestion->title }}</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">{{ $suggestion->description }}</p>
                    <div class="flex flex-wrap gap-4 text-[10px] font-semibold text-slate-500">
                        <span class="flex items-center gap-1.5"><i class="fas fa-user text-cyan-400"></i> Suggested by: <span class="text-slate-300">{{ $suggestion->name }} ({{ $suggestion->email }})</span></span>
                        @if($suggestion->suggested_date)
                            <span class="flex items-center gap-1.5"><i class="far fa-calendar-alt text-purple-400"></i> Timeline: <span class="text-purple-300">{{ \Carbon\Carbon::parse($suggestion->suggested_date)->format('M d, Y') }}</span></span>
                        @endif
                        <span class="flex items-center gap-1.5"><i class="far fa-clock text-slate-500"></i> Submitted: <span class="text-slate-400">{{ $suggestion->created_at->diffForHumans() }}</span></span>
                    </div>
                </div>
                @if(auth()->user()->role === 'admin')
                <form method="POST" action="{{ route('admin.suggestions.destroy', $suggestion) }}" onsubmit="return confirm('Are you sure you want to dismiss this suggestion?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-rose-955/20 border border-rose-500/30 text-rose-400 hover:bg-rose-900/20 px-4 py-2 rounded-xl text-xs font-bold transition shrink-0">Dismiss</button>
                </form>
                @endif
            </div>
        @empty
            <p class="text-slate-500 text-xs py-4 text-center font-bold uppercase tracking-wider">No event suggestions submitted yet.</p>
        @endforelse
    </div>
</div>
@endsection
