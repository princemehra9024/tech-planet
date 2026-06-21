@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-4xl font-black text-charcoal font-display tracking-tight">Command Center Dashboard</h1>
    <p class="text-sm text-muted mt-2">Overview of Tech Planet's community activity and assessments.</p>
</div>

<div class="grid gap-6 md:grid-cols-2 {{ auth()->user()->role === 'media_manager' ? 'xl:grid-cols-1' : 'xl:grid-cols-4' }}">
    <!-- Total Announcements -->
    <div class="glass-card rounded-[2rem] p-6 border border-charcoal/5 shadow-xl flex items-center justify-between card-lift">
        <div>
            <p class="text-[11px] font-bold text-muted uppercase tracking-widest mb-1">Total Announcements</p>
            <p class="text-4xl font-extrabold text-charcoal font-display tracking-tight">{{ $postCount }}</p>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-purple-100 dark:bg-purple-900/40 border border-purple-200 dark:border-purple-800/30 flex items-center justify-center text-purple-600 dark:text-purple-400 text-xl shadow-inner">
            <i class="fas fa-bullhorn"></i>
        </div>
    </div>

    @if(auth()->user()->role !== 'media_manager')
    <!-- Active Quizzes -->
    <div class="glass-card rounded-[2rem] p-6 border border-charcoal/5 shadow-xl flex items-center justify-between card-lift">
        <div>
            <p class="text-[11px] font-bold text-muted uppercase tracking-widest mb-1">Active Quizzes</p>
            <p class="text-4xl font-extrabold text-charcoal font-display tracking-tight">{{ $quizCount }}</p>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-cyan-100 dark:bg-cyan-900/40 border border-cyan-200 dark:border-cyan-800/30 flex items-center justify-center text-cyan-600 dark:text-cyan-400 text-xl shadow-inner">
            <i class="fas fa-laptop-code"></i>
        </div>
    </div>

    <!-- Assessment Questions -->
    <div class="glass-card rounded-[2rem] p-6 border border-charcoal/5 shadow-xl flex items-center justify-between card-lift">
        <div>
            <p class="text-[11px] font-bold text-muted uppercase tracking-widest mb-1">Assessments Questions</p>
            <p class="text-4xl font-extrabold text-charcoal font-display tracking-tight">{{ $questionCount }}</p>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-yellow-100 dark:bg-yellow-900/40 border border-yellow-200 dark:border-yellow-800/30 flex items-center justify-center text-yellow-600 dark:text-yellow-400 text-xl shadow-inner">
            <i class="far fa-question-circle"></i>
        </div>
    </div>

    <!-- Registered Users -->
    <div class="glass-card rounded-[2rem] p-6 border border-charcoal/5 shadow-xl flex items-center justify-between card-lift">
        <div>
            <p class="text-[11px] font-bold text-muted uppercase tracking-widest mb-1">Registered Users</p>
            <p class="text-4xl font-extrabold text-charcoal font-display tracking-tight">{{ $userCount }}</p>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-blue-100 dark:bg-blue-900/40 border border-blue-200 dark:border-blue-800/30 flex items-center justify-center text-blue-600 dark:text-blue-400 text-xl shadow-inner">
            <i class="fas fa-users"></i>
        </div>
    </div>
    @endif
</div>

<div class="mt-8 glass-card rounded-[2.5rem] p-8 border border-charcoal/5 shadow-xl">
    <h2 class="text-2xl font-bold text-charcoal font-display mb-6 tracking-tight">Quick Command Actions</h2>
    <div class="grid gap-4 md:grid-cols-3">
        <a href="{{ route('admin.posts.create') }}" class="group flex items-center justify-center gap-2 rounded-2xl border border-charcoal/5 bg-cream-dark/50 hover:bg-cream-dark hover:border-purple-500/30 px-6 py-5 text-charcoal font-bold text-sm transition-all shadow-sm hover:shadow-md">
            <i class="fas fa-plus text-purple-500 group-hover:scale-110 transition-transform"></i> Create a post
        </a>
        @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.events.create') }}" class="group flex items-center justify-center gap-2 rounded-2xl border border-charcoal/5 bg-cream-dark/50 hover:bg-cream-dark hover:border-green-500/30 px-6 py-5 text-charcoal font-bold text-sm transition-all shadow-sm hover:shadow-md">
            <i class="fas fa-calendar-plus text-green-500 group-hover:scale-110 transition-transform"></i> Create an event
        </a>
        <a href="{{ route('admin.quizzes.create') }}" class="group flex items-center justify-center gap-2 rounded-2xl border border-charcoal/5 bg-cream-dark/50 hover:bg-cream-dark hover:border-cyan-500/30 px-6 py-5 text-charcoal font-bold text-sm transition-all shadow-sm hover:shadow-md">
            <i class="fas fa-plus text-cyan-500 group-hover:scale-110 transition-transform"></i> Create a quiz
        </a>
        @endif
        @if(auth()->user()->role !== 'media_manager')
        <a href="{{ route('admin.quizzes.index') }}" class="group flex items-center justify-center gap-2 rounded-2xl border border-charcoal/5 bg-cream-dark/50 hover:bg-cream-dark hover:border-yellow-500/30 px-6 py-5 text-charcoal font-bold text-sm transition-all shadow-sm hover:shadow-md">
            <i class="fas fa-tasks text-yellow-500 group-hover:scale-110 transition-transform"></i> Manage quizzes
        </a>
        @endif
    </div>
</div>

@if(auth()->user()->role === 'admin')
<div class="mt-8 glass-card rounded-[2.5rem] p-8 border border-charcoal/5 shadow-xl">
    <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
        <div>
            <h2 class="text-2xl font-bold text-charcoal font-display flex items-center gap-3 tracking-tight">
                <div class="w-10 h-10 rounded-xl bg-cyan-100 dark:bg-cyan-900/40 text-cyan-600 dark:text-cyan-400 flex items-center justify-center">
                    <i class="fas fa-forward"></i>
                </div>
                Semester Control Center
            </h2>
            <p class="text-sm text-muted mt-2 max-w-2xl">Advance all students' semesters by one. Graduates MCA (sem 4+) and IMCA (sem 10+) automatically. Use this only at the start of a new academic session.</p>
        </div>
        <form method="POST" action="{{ route('admin.users.bulk-semester-update') }}" onsubmit="return confirm('Are you sure a new semester has started? This will increment all student semesters by 1!')">
            @csrf
            <button type="submit" class="bg-charcoal text-cream hover:bg-charcoal-lighter font-extrabold px-6 py-3.5 rounded-2xl text-sm shadow-xl transition-all duration-300 flex items-center gap-2 hover:scale-105 shrink-0 whitespace-nowrap">
                <i class="fas fa-university"></i> Start New Semester
            </button>
        </form>
    </div>
</div>
@endif

<div class="mt-8 glass-card rounded-[2.5rem] p-8 border border-charcoal/5 shadow-xl mb-12">
    <div class="flex items-center gap-3 mb-6">
        <div class="w-10 h-10 rounded-xl bg-yellow-100 dark:bg-yellow-900/40 text-yellow-600 dark:text-yellow-400 flex items-center justify-center">
            <i class="fas fa-lightbulb"></i>
        </div>
        <h2 class="text-2xl font-bold text-charcoal font-display tracking-tight">Event Suggestions</h2>
    </div>
    
    <div class="space-y-4">
        @forelse($suggestions as $suggestion)
            <div class="bg-cream-dark/50 border border-charcoal/5 rounded-[1.5rem] p-5 flex flex-col md:flex-row md:items-center justify-between gap-5 transition-colors hover:bg-cream-dark ">
                <div class="space-y-2.5 flex-1">
                    <h3 class="font-extrabold text-charcoal text-lg font-display">{{ $suggestion->title }}</h3>
                    <p class="text-sm text-muted leading-relaxed">{{ $suggestion->description }}</p>
                    <div class="flex flex-wrap gap-4 text-[11px] font-bold text-muted mt-2 pt-2 border-t border-charcoal/5 ">
                        <span class="flex items-center gap-1.5"><i class="fas fa-user text-cyan-500"></i> <span class="text-charcoal ">{{ $suggestion->name }} ({{ $suggestion->email }})</span></span>
                        @if($suggestion->suggested_date)
                            <span class="flex items-center gap-1.5"><i class="far fa-calendar-alt text-purple-500"></i> Timeline: <span class="text-charcoal ">{{ \Carbon\Carbon::parse($suggestion->suggested_date)->format('M d, Y') }}</span></span>
                        @endif
                        <span class="flex items-center gap-1.5"><i class="far fa-clock"></i> <span class="text-charcoal/70 ">{{ $suggestion->created_at->diffForHumans() }}</span></span>
                    </div>
                </div>
                @if(auth()->user()->role === 'admin')
                <form method="POST" action="{{ route('admin.suggestions.destroy', $suggestion) }}" onsubmit="return confirm('Are you sure you want to dismiss this suggestion?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-900/40 border border-red-200 dark:border-red-800/30 px-5 py-2.5 rounded-xl text-xs font-bold transition shrink-0 uppercase tracking-wider">Dismiss</button>
                </form>
                @endif
            </div>
        @empty
            <div class="py-12 text-center">
                <div class="w-16 h-16 mx-auto bg-charcoal/5 rounded-full flex items-center justify-center mb-3">
                    <i class="fas fa-inbox text-2xl text-muted"></i>
                </div>
                <p class="text-muted text-sm font-bold uppercase tracking-widest">No event suggestions submitted yet.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection

