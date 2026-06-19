@extends('layouts.student')
@section('title', 'Notifications')

@section('content')
<div class="space-y-6">
    <div class="mb-4">
        <h2 class="text-3xl font-extrabold text-white font-display flex items-center gap-2.5"><i class="fas fa-bell text-purple-400"></i> Notifications</h2>
        <p class="text-slate-400 mt-2 text-xs sm:text-sm">Stay updated with SRM CSI activities, coding challenges, and coordinator updates.</p>
    </div>

    @if($notifications->count())
        <div class="space-y-4">
            @foreach($notifications as $notif)
            <div class="glass-card rounded-2xl p-5 border-l-4 {{ $notif->is_read ? 'border-slate-800' : 'border-purple-500 shadow-md shadow-purple-500/5' }} transition hover:border-l-8 duration-200">
                <div class="flex justify-between items-start gap-4">
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-xl bg-purple-950/40 border border-purple-800/30 flex items-center justify-center text-purple-400 mt-0.5 shrink-0">
                            <i class="fas fa-info-circle text-xs"></i>
                        </div>
                        <div>
                            <p class="text-slate-200 text-xs sm:text-sm leading-relaxed">{{ $notif->message }}</p>
                            <p class="text-[10px] text-slate-500 font-bold uppercase tracking-wider mt-2.5">{{ $notif->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @if(!$notif->is_read)
                        <span class="bg-purple-950/80 text-purple-300 border border-purple-800/35 text-[9px] uppercase tracking-wider font-extrabold px-2.5 py-1 rounded-full shadow-sm shrink-0">New</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="glass-card rounded-2xl p-12 text-center text-slate-505 border border-white/5 shadow-xl">
            <div class="w-14 h-14 rounded-full bg-slate-900/50 flex items-center justify-center mx-auto text-slate-650 border border-white/5 text-2xl mb-4">
                <i class="fas fa-inbox"></i>
            </div>
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-450">No notifications yet. You're all caught up!</p>
        </div>
    @endif
</div>
@endsection