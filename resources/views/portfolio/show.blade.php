@extends('layouts.app')
@section('title', $user->name . ' - Developer Portfolio')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-12 space-y-8">
    <!-- Back links -->
    <div class="flex items-center justify-between">
        @auth
            <a href="{{ route('student.dashboard') }}" class="text-xs font-semibold text-slate-400 hover:text-cyan-400 transition flex items-center gap-1.5">
                <i class="fas fa-arrow-left"></i> Return to Feed Console
            </a>
        @else
            <a href="{{ route('home') }}" class="text-xs font-semibold text-slate-400 hover:text-cyan-400 transition flex items-center gap-1.5">
                <i class="fas fa-arrow-left"></i> Back to Tech Planet Home
            </a>
        @endauth
        <div class="flex items-center gap-3">
            <button onclick="shareProfile('{{ route('portfolio.show', $user->portfolioSlug()) }}')" class="text-[10px] font-bold text-cyan-400 hover:text-cyan-300 transition flex items-center gap-1.5 bg-cyan-950/40 border border-cyan-500/20 px-3 py-1.5 rounded-full">
                <i class="far fa-share-square"></i> Share Portfolio
            </button>
            <span class="text-[9px] uppercase font-bold tracking-widest text-slate-500 bg-cream-dark/5 border border-white/5 px-3 py-1.5 rounded-full">Public Developer CV</span>
        </div>
    </div>

    <!-- Cover banner card -->
    <div class="glass-card rounded-3xl overflow-hidden border border-white/5 shadow-2xl relative">
        <!-- Banner Background -->
        <div class="h-44 bg-gradient-to-r from-cyan-500/20 via-purple-500/10 to-indigo-500/20 relative border-b border-white/5">
            <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.02)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.02)_1px,transparent_1px)] bg-[size:15px_15px]"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#07080f] to-transparent"></div>
        </div>

        <div class="px-8 pb-8 relative -mt-16">
            <div class="flex flex-col md:flex-row items-center md:items-end justify-between gap-6">
                <!-- Avatar and Name info -->
                <div class="flex flex-col md:flex-row items-center md:items-end gap-5 text-center md:text-left">
                    <div class="w-32 h-32 rounded-3xl bg-[#07080f] p-1 border border-white/10 shadow-xl shrink-0 z-10">
                        <div class="w-full h-full rounded-2xl bg-gradient-to-br from-cyan-500 to-purple-650 flex items-center justify-center text-white text-5xl font-extrabold shadow-inner">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-center justify-center md:justify-start gap-2.5 flex-wrap">
                            <h1 class="text-3xl font-bold text-white font-display tracking-tight">{{ $user->name }}</h1>
                            @if($user->role !== 'student' && $user->role)
                                @if($user->role === 'admin')
                                    <span class="inline-flex items-center gap-1 bg-amber-500/10 border border-amber-500/30 text-amber-400 font-extrabold uppercase tracking-wider text-[10px] px-2.5 py-0.5 rounded-full"><i class="fas fa-shield-alt text-[8px]"></i> Admin</span>
                                @elseif($user->role === 'president')
                                    <span class="inline-flex items-center gap-1 bg-purple-500/10 border border-purple-500/30 text-purple-400 font-extrabold uppercase tracking-wider text-[10px] px-2.5 py-0.5 rounded-full"><i class="fas fa-crown text-[8px]"></i> President</span>
                                @elseif($user->role === 'secretary')
                                    <span class="inline-flex items-center gap-1 bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 font-extrabold uppercase tracking-wider text-[10px] px-2.5 py-0.5 rounded-full"><i class="fas fa-signature text-[8px]"></i> Secretary</span>
                                @elseif($user->role === 'treasurer')
                                    <span class="inline-flex items-center gap-1 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 font-extrabold uppercase tracking-wider text-[10px] px-2.5 py-0.5 rounded-full"><i class="fas fa-coins text-[8px]"></i> Treasurer</span>
                                @elseif($user->role === 'media_manager')
                                    <span class="inline-flex items-center gap-1 bg-rose-500/10 border border-rose-500/30 text-rose-400 font-extrabold uppercase tracking-wider text-[10px] px-2.5 py-0.5 rounded-full"><i class="fas fa-photo-video text-[8px]"></i> Media Manager</span>
                                @endif
                            @endif
                        </div>
                        <p class="text-xs text-slate-400 font-medium flex items-center justify-center md:justify-start gap-2">
                            <span class="flex items-center gap-1"><i class="fas fa-graduation-cap text-cyan-400"></i> {{ $user->course ?? 'MCA' }} â€¢ Sem {{ $user->semester ?? '1' }}</span>
                            <span>â€¢</span>
                            <span class="flex items-center gap-1"><i class="fas fa-code-branch text-purple-400"></i> {{ $user->branch ?? 'Computer Science & Informatics' }}</span>
                        </p>
                    </div>
                </div>

                <!-- Stats summary badges -->
                <div class="flex gap-2.5">
                    <span class="bg-purple-955/80 text-purple-300 border border-purple-800/35 px-4 py-2 rounded-2xl text-xs font-bold shadow flex items-center gap-1.5"><i class="fas fa-award text-purple-400"></i> {{ $user->xp }} XP</span>
                    <span class="bg-cyan-955/80 text-cyan-300 border border-cyan-800/35 px-4 py-2 rounded-2xl text-xs font-bold shadow flex items-center gap-1.5"><i class="fas fa-arrow-up text-cyan-400"></i> Lvl {{ floor($user->xp / 100) }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Grid Content -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left details panel -->
        <div class="lg:col-span-5 space-y-6">
            
            <!-- Bio Card -->
            <div class="glass-card rounded-2xl p-6 border border-white/5 bg-[#0e1122]">
                <h3 class="text-[10px] uppercase font-bold tracking-widest text-slate-500 border-b border-white/5 pb-2 mb-3">Developer Biography</h3>
                <p class="text-slate-300 text-sm leading-relaxed whitespace-pre-line">{{ $user->bio ?? 'This developer has not written a bio yet. Stay tuned for future details!' }}</p>
            </div>

            <!-- Credentials & Badges -->
            <div class="glass-card rounded-2xl p-6 border border-white/5 bg-[#0e1122]">
                <h3 class="text-[10px] uppercase font-bold tracking-widest text-slate-500 border-b border-white/5 pb-2 mb-3">Earned Achievements</h3>
                @if(count($badges))
                    <div class="flex flex-wrap gap-2 pt-1">
                        @foreach($badges as $badge)
                            <span class="bg-[#07080f]/60 border border-white/5 text-slate-300 px-3 py-1.5 rounded-xl text-xs font-semibold flex items-center gap-1.5 shadow-sm">
                                <i class="fas fa-certificate text-purple-400"></i> {{ $badge }}
                            </span>
                        @endforeach
                    </div>
                @else
                    <p class="text-xs text-slate-500 italic">Achievements will unlock as this member gains XP.</p>
                @endif
            </div>

            <!-- Registry campaigns -->
            <div class="glass-card rounded-2xl p-6 border border-white/5 bg-[#0e1122]">
                <h3 class="text-[10px] uppercase font-bold tracking-widest text-slate-500 border-b border-white/5 pb-2 mb-3">Campaigns & Workshops Joined</h3>
                <div class="space-y-3 pt-1">
                    @forelse($user->eventRegistrations as $reg)
                        <div class="bg-[#07080f]/40 border border-white/5 rounded-xl p-3 flex justify-between items-center text-xs">
                            <div>
                                <h4 class="font-bold text-white">{{ $reg->event->title }}</h4>
                                <p class="text-[10px] text-slate-500 mt-1 flex items-center gap-1.5"><i class="far fa-clock"></i> {{ $reg->event->date->format('M d, Y') }}</p>
                            </div>
                            <span class="text-emerald-400 text-sm"><i class="fas fa-calendar-check"></i></span>
                        </div>
                    @empty
                        <p class="text-xs text-slate-500 italic">Not registered for any campaign sprint yet.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Right Feed/Posts panel -->
        <div class="lg:col-span-7 space-y-6">
            <h3 class="text-xl font-bold text-white font-display flex items-center gap-2"><i class="far fa-comments text-purple-400"></i> Portal Contributions</h3>
            
            <div class="space-y-4">
                @forelse($user->posts as $post)
                    <div class="glass-card rounded-2xl p-5 border border-white/5 bg-[#0e1122] space-y-4">
                        <div class="flex justify-between items-center text-[10px] text-slate-500 font-semibold border-b border-white/5 pb-2">
                            <span>Posted {{ $post->created_at->diffForHumans() }}</span>
                            <span class="flex items-center gap-1"><i class="fas fa-globe-americas"></i> Public</span>
                        </div>
                        <p class="text-slate-200 text-xs sm:text-sm leading-relaxed whitespace-pre-line">{{ $post->content }}</p>
                        
                        @if($post->media && count($post->media) > 0)
                            <div class="border border-white/5 bg-[#07080f]/40 rounded-xl p-2">
                                @php $count = count($post->media); @endphp
                                <div class="grid gap-2 {{ $count === 1 ? 'grid-cols-1' : ($count === 2 ? 'grid-cols-2' : 'grid-cols-2 md:grid-cols-3') }}">
                                    @foreach($post->media as $item)
                                        <div class="relative overflow-hidden rounded-lg bg-black/30 flex justify-center items-center max-h-[220px] border border-white/5">
                                            @if($item['type'] === 'photo')
                                                <img src="{{ asset('storage/' . $item['path']) }}" class="w-full h-auto object-cover max-h-[220px]" alt="post attachment">
                                            @elseif($item['type'] === 'video')
                                                <video src="{{ asset('storage/' . $item['path']) }}" class="w-full max-h-[220px]" controls></video>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @elseif($post->image_path)
                            <div class="border border-white/5 bg-[#07080f]/40 rounded-xl overflow-hidden max-h-[300px] flex justify-center items-center">
                                <img src="{{ asset('storage/' . $post->image_path) }}" class="w-full h-auto object-cover max-h-[300px]" alt="post attachment">
                            </div>
                        @endif

                        <!-- Social activity read-only indicators -->
                        <div class="flex items-center gap-4 text-[10px] font-bold text-slate-505 pt-2">
                            <span class="flex items-center gap-1"><i class="far fa-thumbs-up text-cyan-400"></i> {{ $post->likes->count() }} Reactions</span>
                            <span class="flex items-center gap-1"><i class="far fa-comment-dots text-purple-400"></i> {{ $post->comments->count() }} Comments</span>
                        </div>
                    </div>
                @empty
                    <div class="glass-card rounded-2xl p-10 text-center text-slate-500 border border-white/5 bg-[#0e1122]">
                        <i class="far fa-folder-open text-3xl mb-2 text-slate-650 block"></i>
                        No posts or public contributions shared by this developer.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

