@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<!-- Page Header -->
<div class="mb-8 animate-fade-in">
    <h1 class="text-2xl md:text-4xl font-black text-white font-display tracking-tight">Command Center Dashboard</h1>
    <p class="text-sm text-text-muted mt-1.5">Overview of Tech Planet's community activity and assessments.</p>
</div>

<!-- Stats Cards Grid -->
<div class="grid gap-3 md:gap-4 grid-cols-2 {{ auth()->user()->role === 'media_manager' ? 'xl:grid-cols-1' : 'xl:grid-cols-4' }} animate-fade-in animate-delay-1">
    <!-- Total Announcements -->
    <div class="stat-card rounded-2xl md:rounded-[1.5rem] p-4 md:p-6 flex items-center justify-between card-lift">
        <div>
            <p class="text-[10px] md:text-[11px] font-bold text-text-muted uppercase tracking-[0.15em] mb-1">Total Announcements</p>
            <p class="text-2xl md:text-4xl font-extrabold text-white font-display tracking-tight">{{ $postCount }}</p>
        </div>
        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl md:rounded-2xl bg-purple-900/30 border border-purple-700/20 flex items-center justify-center text-purple-400 text-base md:text-xl shrink-0">
            <i class="fas fa-bullhorn"></i>
        </div>
    </div>

    @if(auth()->user()->role !== 'media_manager')
    <!-- Active Quizzes -->
    <div class="stat-card rounded-2xl md:rounded-[1.5rem] p-4 md:p-6 flex items-center justify-between card-lift">
        <div>
            <p class="text-[10px] md:text-[11px] font-bold text-text-muted uppercase tracking-[0.15em] mb-1">Active Quizzes</p>
            <p class="text-2xl md:text-4xl font-extrabold text-white font-display tracking-tight">{{ $quizCount }}</p>
        </div>
        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl md:rounded-2xl bg-cyan-900/30 border border-cyan-700/20 flex items-center justify-center text-cyan-400 text-base md:text-xl shrink-0">
            <i class="fas fa-laptop-code"></i>
        </div>
    </div>

    <!-- Assessment Questions -->
    <div class="stat-card rounded-2xl md:rounded-[1.5rem] p-4 md:p-6 flex items-center justify-between card-lift">
        <div>
            <p class="text-[10px] md:text-[11px] font-bold text-text-muted uppercase tracking-[0.15em] mb-1">Assessments Questions</p>
            <p class="text-2xl md:text-4xl font-extrabold text-white font-display tracking-tight">{{ $questionCount }}</p>
        </div>
        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl md:rounded-2xl bg-yellow-900/30 border border-yellow-700/20 flex items-center justify-center text-yellow-400 text-base md:text-xl shrink-0">
            <i class="far fa-question-circle"></i>
        </div>
    </div>

    <!-- Registered Users -->
    <div class="stat-card rounded-2xl md:rounded-[1.5rem] p-4 md:p-6 flex items-center justify-between card-lift">
        <div>
            <p class="text-[10px] md:text-[11px] font-bold text-text-muted uppercase tracking-[0.15em] mb-1">Registered Users</p>
            <p class="text-2xl md:text-4xl font-extrabold text-white font-display tracking-tight">{{ $userCount }}</p>
        </div>
        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl md:rounded-2xl bg-blue-900/30 border border-blue-700/20 flex items-center justify-center text-blue-400 text-base md:text-xl shrink-0">
            <i class="fas fa-users"></i>
        </div>
    </div>
    @endif
</div>

<!-- Quick Command Actions -->
<div class="mt-6 md:mt-8 command-card rounded-2xl md:rounded-[1.5rem] p-5 md:p-8 animate-fade-in animate-delay-3">
    <h2 class="text-lg md:text-2xl font-bold text-white font-display mb-5 md:mb-6 tracking-tight">Quick Command Actions</h2>
    <div class="grid gap-3 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
        <a href="{{ route('admin.posts.create') }}" class="group action-btn flex items-center justify-center gap-2.5 rounded-xl px-4 py-4 md:px-6 md:py-5 text-text-primary font-semibold text-sm">
            <i class="fas fa-plus text-purple-400 group-hover:scale-110 transition-transform"></i>
            <span>Create a post</span>
        </a>
        @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.events.create') }}" class="group action-btn flex items-center justify-center gap-2.5 rounded-xl px-4 py-4 md:px-6 md:py-5 text-text-primary font-semibold text-sm">
            <i class="fas fa-calendar-plus text-green-400 group-hover:scale-110 transition-transform"></i>
            <span>Create an event</span>
        </a>
        <a href="{{ route('admin.quizzes.create') }}" class="group action-btn flex items-center justify-center gap-2.5 rounded-xl px-4 py-4 md:px-6 md:py-5 text-text-primary font-semibold text-sm">
            <i class="fas fa-plus text-cyan-400 group-hover:scale-110 transition-transform"></i>
            <span>Create a quiz</span>
        </a>
        @endif
        @if(auth()->user()->role !== 'media_manager')
        <a href="{{ route('admin.quizzes.index') }}" class="group action-btn flex items-center justify-center gap-2.5 rounded-xl px-4 py-4 md:px-6 md:py-5 text-text-primary font-semibold text-sm">
            <i class="fas fa-tasks text-yellow-400 group-hover:scale-110 transition-transform"></i>
            <span>Manage quizzes</span>
        </a>
        @endif
    </div>
</div>

<!-- Semester Control Center -->
@if(auth()->user()->role === 'admin')
<div class="mt-6 md:mt-8 command-card rounded-2xl md:rounded-[1.5rem] p-5 md:p-8 animate-fade-in animate-delay-4">
    <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-5">
        <div>
            <h2 class="text-lg md:text-2xl font-bold text-white font-display flex items-center gap-3 tracking-tight">
                <div class="w-9 h-9 md:w-10 md:h-10 rounded-xl bg-cyan-900/30 text-cyan-400 flex items-center justify-center border border-cyan-700/20 shrink-0">
                    <i class="fas fa-forward text-sm"></i>
                </div>
                Semester Control Center
            </h2>
            <p class="text-xs md:text-sm text-text-muted mt-2 max-w-2xl leading-relaxed">Advance all students' semesters by one. Graduates MCA (sem 4+) and IMCA (sem 10+) automatically. Use this only at the start of a new academic session.</p>
        </div>
        <form method="POST" action="{{ route('admin.users.bulk-semester-update') }}" onsubmit="return confirm('Are you sure a new semester has started? This will increment all student semesters by 1!')">
            @csrf
            <button type="submit" class="bg-white text-black hover:bg-gray-200 font-bold px-5 py-3 md:px-6 md:py-3.5 rounded-xl text-sm shadow-lg transition-all duration-300 flex items-center gap-2 hover:scale-[1.02] shrink-0 whitespace-nowrap w-full lg:w-auto justify-center">
                <i class="fas fa-university"></i> Start New Semester
            </button>
        </form>
    </div>
</div>
@endif

<!-- Event Suggestions -->
<div class="mt-6 md:mt-8 command-card rounded-2xl md:rounded-[1.5rem] p-5 md:p-8 mb-8 md:mb-12 animate-fade-in animate-delay-5">
    <div class="flex items-center gap-3 mb-5 md:mb-6">
        <div class="w-9 h-9 md:w-10 md:h-10 rounded-xl bg-yellow-900/30 text-yellow-400 flex items-center justify-center border border-yellow-700/20 shrink-0">
            <i class="fas fa-lightbulb text-sm"></i>
        </div>
        <h2 class="text-lg md:text-2xl font-bold text-white font-display tracking-tight">Event Suggestions</h2>
    </div>

    <div class="space-y-3 md:space-y-4">
        @forelse($suggestions as $suggestion)
            <div class="bg-[#111111] border border-[#1f1f1f] rounded-xl md:rounded-2xl p-4 md:p-5 flex flex-col md:flex-row md:items-center justify-between gap-4 transition-all hover:border-[#2a2a2a]">
                <div class="space-y-2 flex-1 min-w-0">
                    <h3 class="font-bold text-white text-base md:text-lg font-display truncate">{{ $suggestion->title }}</h3>
                    <p class="text-sm text-text-secondary leading-relaxed line-clamp-2">{{ $suggestion->description }}</p>
                    <div class="flex flex-wrap gap-3 md:gap-4 text-[10px] md:text-[11px] font-semibold text-text-muted mt-2 pt-2 border-t border-[#1f1f1f]">
                        <span class="flex items-center gap-1.5">
                            <i class="fas fa-user text-cyan-400"></i>
                            <span class="text-text-secondary">{{ $suggestion->name }}</span>
                            <span class="hidden sm:inline text-text-muted">({{ $suggestion->email }})</span>
                        </span>
                        @if($suggestion->suggested_date)
                            <span class="flex items-center gap-1.5">
                                <i class="far fa-calendar-alt text-purple-400"></i>
                                <span class="text-text-secondary">{{ \Carbon\Carbon::parse($suggestion->suggested_date)->format('M d, Y') }}</span>
                            </span>
                        @endif
                        <span class="flex items-center gap-1.5">
                            <i class="far fa-clock text-text-muted"></i>
                            <span class="text-text-muted">{{ $suggestion->created_at->diffForHumans() }}</span>
                        </span>
                    </div>
                </div>
                @if(auth()->user()->role === 'admin')
                <form method="POST" action="{{ route('admin.suggestions.destroy', $suggestion) }}" onsubmit="return confirm('Are you sure you want to dismiss this suggestion?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-950/30 text-red-400 hover:bg-red-950/50 border border-red-800/30 px-4 py-2 md:px-5 md:py-2.5 rounded-xl text-xs font-bold transition shrink-0 uppercase tracking-wider w-full md:w-auto">Dismiss</button>
                </form>
                @endif
            </div>
        @empty
            <div class="py-10 md:py-12 text-center">
                <div class="w-14 h-14 md:w-16 md:h-16 mx-auto bg-[#141414] border border-[#1f1f1f] rounded-2xl flex items-center justify-center mb-3">
                    <i class="fas fa-inbox text-xl md:text-2xl text-text-muted"></i>
                </div>
                <p class="text-text-muted text-xs md:text-sm font-bold uppercase tracking-[0.15em]">No event suggestions submitted yet.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
