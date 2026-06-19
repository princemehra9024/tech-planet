@extends('layouts.student')
@section('title', 'Events Console')

@section('content')
<div class="space-y-10">
    @if(session('success'))
        <div class="bg-emerald-950/40 border border-emerald-500/30 text-emerald-300 px-5 py-4 rounded-2xl flex items-center gap-2.5">
            <i class="fas fa-check-circle text-emerald-400"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    @if(session('error'))
        <div class="bg-rose-950/40 border border-rose-500/30 text-rose-300 px-5 py-4 rounded-2xl flex items-center gap-2.5">
            <i class="fas fa-exclamation-circle text-rose-400"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <!-- Upcoming Events -->
    <div>
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <h2 class="text-2xl font-bold text-white font-display flex items-center gap-2.5"><i class="fas fa-calendar-alt text-purple-400"></i> Live Sprints & workshops</h2>
            <button type="button" id="open-suggest-modal-btn" class="inline-flex items-center gap-1.5 bg-[#0e1122] border border-white/10 hover:border-purple-500/30 text-white font-bold px-5 py-2.5 rounded-xl text-xs transition shadow-md">
                <i class="fas fa-lightbulb text-yellow-400"></i> Suggest New Event
            </button>
        </div>
        @if($upcomingEvents->count())
            <div class="grid md:grid-cols-2 gap-6 mt-6">
                @foreach($upcomingEvents as $event)
                <div class="glass-card rounded-3xl p-6 border border-white/5 hover:border-cyan-500/30 hover:shadow-cyan-500/5 transition-all duration-300 flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute -right-8 -top-8 w-20 h-20 bg-cyan-500/[0.02] rounded-full blur-lg pointer-events-none"></div>
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <span class="bg-cyan-950/80 text-cyan-400 border border-cyan-800/30 text-[9px] uppercase tracking-wider font-extrabold px-2.5 py-0.5 rounded-full">Active</span>
                            <span class="text-[9px] font-mono font-bold text-slate-500 uppercase tracking-widest bg-white/5 px-2 py-0.5 rounded-md">+10 XP reward</span>
                        </div>
                        <h3 class="text-lg font-bold text-white font-display group-hover:text-cyan-400 transition-colors mt-2">{{ $event->title }}</h3>
                        <p class="text-slate-400 text-xs mt-2 leading-relaxed">{{ Str::limit($event->description, 100) }}</p>
                        <div class="mt-5 space-y-2.5 text-xs font-semibold text-slate-500">
                            <p class="text-purple-400 flex items-center gap-2"><i class="far fa-clock"></i> {{ $event->date->format('M d, Y - h:i A') }}</p>
                            <p class="flex items-center gap-2"><i class="fas fa-map-marker-alt text-cyan-400"></i> {{ $event->location }}</p>
                        </div>
                    </div>
                    @php $registered = auth()->user()->eventRegistrations->contains('event_id', $event->id) @endphp
                    @if(!$registered)
                    <form method="POST" action="{{ route('student.event.register', $event->id) }}" class="mt-6">
                        @csrf
                        <button type="submit" class="w-full bg-gradient-to-r from-cyan-500 via-blue-500 to-purple-650 text-white font-bold py-3 rounded-xl text-xs shadow hover:shadow-lg transition">
                            Register For Campaign
                        </button>
                    </form>
                    @else
                    <div class="mt-6 w-full text-center bg-emerald-950/20 border border-emerald-800/30 text-emerald-400 py-3 rounded-xl text-xs font-bold flex items-center justify-center gap-1.5">
                        <i class="fas fa-check-circle"></i> Registered
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        @else
            <p class="text-slate-500 mt-4 text-xs bg-[#0e1122]/30 border border-white/5 rounded-2xl p-6 text-center uppercase tracking-wider font-semibold">No active campaigns scheduled at the moment.</p>
        @endif
    </div>

    <!-- My Registered Events -->
    <div>
        <h2 class="text-2xl font-bold text-white font-display flex items-center gap-2.5"><i class="fas fa-check-circle text-cyan-400"></i> My Registry Sprints</h2>
        @if($myRegistrations->count())
            <div class="grid md:grid-cols-2 gap-5 mt-6">
                @foreach($myRegistrations as $reg)
                <div class="bg-[#0e1122]/40 border border-white/5 rounded-3xl p-5 hover:border-cyan-500/20 transition-all duration-300 relative overflow-hidden flex items-center justify-between">
                    <div>
                        <h3 class="font-bold text-white font-display text-sm">{{ $reg->event->title }}</h3>
                        <p class="text-[10px] text-slate-500 mt-2 flex items-center gap-1.5"><i class="far fa-clock"></i> {{ $reg->event->date->format('M d, Y - h:i A') }}</p>
                    </div>
                    <span class="text-emerald-400 text-lg"><i class="fas fa-calendar-check"></i></span>
                </div>
                @endforeach
            </div>
        @else
            <p class="text-slate-505 mt-4 text-xs bg-[#0e1122]/30 border border-white/5 rounded-2xl p-6 text-center uppercase tracking-wider font-semibold">You have not registered for any active sprints.</p>
        @endif
    </div>
</div>

<!-- Event Suggestion Modal (Glassmorphic) -->
<div id="suggest-event-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm hidden">
    <div class="glass-card rounded-3xl w-full max-w-lg border border-white/10 shadow-2xl relative bg-[#0e1122] overflow-hidden">
        <!-- Modal Header -->
        <div class="p-5 border-b border-white/5 flex justify-between items-center bg-[#07080f]/20">
            <h3 class="font-bold text-white text-base font-display flex items-center gap-2">
                <i class="fas fa-lightbulb text-yellow-400 animate-pulse"></i> Suggest New Club Event
            </h3>
            <button type="button" id="close-suggest-modal-btn" class="text-slate-400 hover:text-white transition text-lg"><i class="fas fa-times"></i></button>
        </div>
        
        <!-- Modal Body -->
        <form method="POST" action="{{ route('events.suggest') }}" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-slate-350 font-semibold text-[10px] mb-1.5 uppercase tracking-widest">Event Title</label>
                <input type="text" name="title" required class="w-full bg-[#07080f]/60 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-slate-600 focus:outline-none focus:ring-1 focus:ring-purple-500 transition text-xs sm:text-sm" placeholder="e.g. Next.js & Server Actions Workshop">
            </div>
            <div>
                <label class="block text-slate-350 font-semibold text-[10px] mb-1.5 uppercase tracking-widest">Description & Goals</label>
                <textarea name="description" required rows="4" class="w-full bg-[#07080f]/60 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-slate-600 focus:outline-none focus:ring-1 focus:ring-purple-500 transition text-xs sm:text-sm resize-none" placeholder="What should we learn? Who is the target audience?"></textarea>
            </div>
            <div>
                <label class="block text-slate-350 font-semibold text-[10px] mb-1.5 uppercase tracking-widest">Suggested Timeline (Optional)</label>
                <input type="date" name="suggested_date" class="w-full bg-[#07080f]/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:ring-1 focus:ring-purple-500 transition text-xs sm:text-sm">
            </div>
            
            <div class="flex justify-end gap-3 pt-4 border-t border-white/5">
                <button type="button" id="cancel-suggest-btn" class="bg-[#07080f]/60 hover:bg-white/5 border border-white/10 text-slate-300 font-bold px-5 py-2.5 rounded-xl text-xs transition">
                    Cancel
                </button>
                <button type="submit" class="bg-gradient-to-r from-cyan-500 to-purple-650 hover:from-cyan-600 hover:to-purple-750 text-white font-bold px-5 py-2.5 rounded-xl text-xs transition shadow-lg shadow-purple-500/10">
                    Submit Suggestion
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('suggest-event-modal');
        const openBtn = document.getElementById('open-suggest-modal-btn');
        const closeBtn = document.getElementById('close-suggest-modal-btn');
        const cancelBtn = document.getElementById('cancel-suggest-btn');
        
        if (openBtn && modal) {
            openBtn.addEventListener('click', () => modal.classList.remove('hidden'));
        }
        
        const hideModal = () => {
            if (modal) modal.classList.add('hidden');
        };
        
        if (closeBtn) closeBtn.addEventListener('click', hideModal);
        if (cancelBtn) cancelBtn.addEventListener('click', hideModal);
        
        // Close on outside click
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) hideModal();
            });
        }
    });
</script>
@endpush
@endsection