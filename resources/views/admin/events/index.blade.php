@extends('layouts.admin')

@section('title', 'Manage Events')

@section('content')
<div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
    <div>
        <h1 class="text-3xl font-display font-bold text-charcoal mb-2">Manage Events</h1>
        <p class="text-slate-500 dark:text-slate-400">View and manage all official club events.</p>
    </div>
    @if(auth()->user()->role === 'admin')
    <a href="{{ route('admin.events.create') }}" class="bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 text-white font-bold px-6 py-2.5 rounded-xl shadow-lg shadow-purple-500/20 transition flex items-center gap-2">
        <i class="fas fa-plus"></i> Create New Event
    </a>
    @endif
</div>

<div class="space-y-4">
    @forelse($events as $event)
        <div class="glass-card rounded-2xl p-6 border border-charcoal/10 dark:border-white/10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex-1 min-w-0">
                <h3 class="text-xl font-bold text-charcoal dark:text-white font-display mb-1">{{ $event->title }}</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mb-3">{{ Str::limit($event->description, 100) }}</p>
                <div class="flex flex-wrap gap-4 text-xs font-semibold text-slate-500 dark:text-slate-400">
                    <span class="flex items-center gap-1.5">
                        <i class="fas fa-calendar-day text-purple-600 dark:text-purple-400"></i>
                        {{ \Carbon\Carbon::parse($event->date)->format('M d, Y h:i A') }}
                    </span>
                    <span class="flex items-center gap-1.5">
                        <i class="fas fa-map-marker-alt text-cyan-600 dark:text-cyan-400"></i>
                        {{ $event->location }}
                    </span>
                    <span class="flex items-center gap-1.5">
                        <i class="fas fa-users text-amber-600 dark:text-amber-400"></i>
                        {{ $event->registrations->count() }} / {{ $event->max_participants }} Registered
                    </span>
                </div>
            </div>

            @if(auth()->user()->role === 'admin')
            <div class="shrink-0">
                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-rose-500/15 dark:bg-rose-500/20 border border-rose-500/40 hover:bg-rose-500/25 text-rose-700 dark:text-rose-400 px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>
                </form>
            </div>
            @endif
        </div>
    @empty
        <div class="glass-card rounded-2xl p-12 text-center border border-charcoal/10 dark:border-white/10">
            <div class="w-16 h-16 bg-charcoal/8 dark:bg-white/8 rounded-full flex items-center justify-center mx-auto mb-4 border border-charcoal/10 dark:border-white/10">
                <i class="fas fa-calendar-times text-2xl text-slate-400 dark:text-slate-500"></i>
            </div>
            <h3 class="text-xl font-bold text-charcoal dark:text-white mb-2">No Events Found</h3>
            <p class="text-slate-500 dark:text-slate-400">There are currently no events scheduled.</p>
        </div>
    @endforelse
</div>
@endsection