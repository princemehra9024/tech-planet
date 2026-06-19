@extends('layouts.admin')

@section('title', 'Manage Events')

@section('content')
<div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
    <div>
        <h1 class="text-3xl font-display font-bold text-white mb-2">Manage Events</h1>
        <p class="text-slate-400">View and manage all official club events.</p>
    </div>
    @if(auth()->user()->role === 'admin')
    <a href="{{ route('admin.events.create') }}" class="bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 text-white font-bold px-6 py-2.5 rounded-xl shadow-lg shadow-purple-500/20 transition flex items-center gap-2">
        <i class="fas fa-plus"></i> Create New Event
    </a>
    @endif
</div>

<div class="space-y-4">
    @forelse($events as $event)
        <div class="glass-card rounded-2xl p-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div>
                <h3 class="text-xl font-bold text-white font-display mb-1">{{ $event->title }}</h3>
                <p class="text-sm text-slate-400 mb-3">{{ Str::limit($event->description, 100) }}</p>
                <div class="flex flex-wrap gap-4 text-xs font-semibold text-slate-500">
                    <span class="flex items-center gap-1.5"><i class="fas fa-calendar-day text-purple-400"></i> {{ \Carbon\Carbon::parse($event->date)->format('M d, Y h:i A') }}</span>
                    <span class="flex items-center gap-1.5"><i class="fas fa-map-marker-alt text-cyan-400"></i> {{ $event->location }}</span>
                    <span class="flex items-center gap-1.5"><i class="fas fa-users text-amber-400"></i> {{ $event->registrations->count() }} / {{ $event->max_participants }} Registered</span>
                </div>
            </div>
            
            @if(auth()->user()->role === 'admin')
            <div class="shrink-0">
                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-rose-950/40 border border-rose-500/30 hover:bg-rose-900/40 text-rose-400 px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>
                </form>
            </div>
            @endif
        </div>
    @empty
        <div class="glass-card rounded-2xl p-12 text-center">
            <div class="w-16 h-16 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-4 border border-white/10">
                <i class="fas fa-calendar-times text-2xl text-slate-500"></i>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">No Events Found</h3>
            <p class="text-slate-400">There are currently no events scheduled.</p>
        </div>
    @endforelse
</div>
@endsection
