@extends('layouts.student')
@section('title', 'Developer CV')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    @if(session('success'))
        <div class="bg-emerald-950/40 border border-emerald-500/30 text-emerald-300 px-5 py-4 rounded-2xl flex items-center gap-2.5">
            <i class="fas fa-check-circle text-emerald-400"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="glass-card rounded-3xl overflow-hidden border border-white/5 shadow-2xl relative">
        <!-- Profile Banner -->
        <div class="bg-gradient-to-r from-cyan-500/10 via-blue-500/10 to-purple-650/20 h-40 border-b border-white/5 relative">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-purple-500/15 via-transparent to-transparent"></div>
        </div>
        
        <div class="px-6 pb-8 relative">
            <!-- Profile Avatar Overlay -->
            <div class="absolute -top-16 left-6">
                <div class="w-32 h-32 rounded-3xl bg-[#07080f] p-1 border border-white/10 shadow-xl">
                    <div class="w-full h-full rounded-2xl bg-gradient-to-br from-cyan-500 to-purple-650 flex items-center justify-center text-white text-5xl font-extrabold shadow-lg">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                </div>
            </div>
            
            <div class="pt-20">
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
                    <div>
                        <div class="flex items-center gap-3 flex-wrap">
                            <h2 class="text-3xl font-extrabold text-white font-display tracking-tight">{{ $user->name }}</h2>
                            @if($user->role !== 'student' && $user->role)
                                @if($user->role === 'admin')
                                    <span class="inline-flex items-center gap-1.5 bg-amber-500/10 border border-amber-500/30 text-amber-400 font-extrabold uppercase tracking-wider text-xs px-3 py-1 rounded-full shadow-lg shadow-amber-500/10"><i class="fas fa-shield-alt"></i> Administrator</span>
                                @elseif($user->role === 'president')
                                    <span class="inline-flex items-center gap-1.5 bg-purple-500/10 border border-purple-500/30 text-purple-400 font-extrabold uppercase tracking-wider text-xs px-3 py-1 rounded-full shadow-lg shadow-purple-500/10"><i class="fas fa-crown"></i> Club President</span>
                                @elseif($user->role === 'secretary')
                                    <span class="inline-flex items-center gap-1.5 bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 font-extrabold uppercase tracking-wider text-xs px-3 py-1 rounded-full shadow-lg shadow-cyan-500/10"><i class="fas fa-signature"></i> Secretary</span>
                                @elseif($user->role === 'treasurer')
                                    <span class="inline-flex items-center gap-1.5 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 font-extrabold uppercase tracking-wider text-xs px-3 py-1 rounded-full shadow-lg shadow-emerald-500/10"><i class="fas fa-coins"></i> Treasurer</span>
                                @elseif($user->role === 'media_manager')
                                    <span class="inline-flex items-center gap-1.5 bg-rose-500/10 border border-rose-500/30 text-rose-400 font-extrabold uppercase tracking-wider text-xs px-3 py-1 rounded-full shadow-lg shadow-rose-500/10"><i class="fas fa-photo-video"></i> Media Manager</span>
                                @endif
                            @endif
                        </div>
                        <div class="flex flex-wrap gap-4 mt-2 text-xs font-semibold text-slate-450">
                            @if($user->course)
                                <span class="flex items-center gap-1.5"><i class="fas fa-book-reader text-pink-450"></i> {{ $user->course }}</span>
                            @endif
                            <span class="flex items-center gap-1.5"><i class="fas fa-graduation-cap text-cyan-400"></i> {{ is_numeric($user->semester) ? 'Semester ' . $user->semester : ($user->semester ?? 'Semester not set') }}</span>
                            <span class="flex items-center gap-1.5"><i class="fas fa-code-branch text-purple-400"></i> {{ $user->branch ?? 'Branch not set' }}</span>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <span class="bg-purple-950/80 text-purple-300 border border-purple-800/35 px-4 py-1.5 rounded-full text-xs font-bold shadow-sm">🏆 {{ $user->xp }} XP</span>
                        <span class="bg-cyan-950/80 text-cyan-300 border border-cyan-800/35 px-4 py-1.5 rounded-full text-xs font-bold shadow-sm">Level {{ floor($user->xp / 100) }}</span>
                    </div>
                </div>
                
                <div class="mt-6 space-y-2">
                    <h3 class="text-[10px] uppercase font-bold tracking-widest text-slate-500">Developer Bio</h3>
                    <p class="text-slate-300 text-xs sm:text-sm leading-relaxed max-w-xl">{{ $user->bio ?? 'No biography added yet. Share some details about your technology interests!' }}</p>
                </div>
                
                @if(count($badges))
                    <div class="mt-8 pt-6 border-t border-white/5">
                        <h4 class="text-[10px] font-extrabold text-slate-500 uppercase tracking-widest mb-3">Earned Achievements</h4>
                        <div class="flex flex-wrap gap-2.5">
                            @foreach($badges as $badge)
                                <span class="bg-[#0e1122]/70 border border-white/5 text-slate-300 px-4 py-1.5 rounded-xl text-xs font-semibold shadow-inner flex items-center gap-1.5">
                                    <i class="fas fa-award text-purple-400"></i> {{ $badge }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
                
                <div class="mt-8 pt-6 border-t border-white/5 flex justify-end gap-3">
                    <button onclick="shareProfile('{{ route('portfolio.show', $user->portfolioSlug()) }}')" class="bg-cyan-950/40 border border-cyan-500/30 hover:border-cyan-400 text-cyan-400 font-bold px-6 py-3 rounded-xl text-xs shadow hover:shadow-cyan-500/5 transition flex items-center gap-2">
                        <i class="far fa-share-square"></i> Share Portfolio
                    </button>
                    <a href="{{ route('student.profile.edit') }}" class="bg-[#0e1122] border border-white/10 hover:border-cyan-500/30 text-white font-bold px-6 py-3 rounded-xl text-xs shadow hover:shadow-cyan-500/5 transition">
                        Configure Console Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection