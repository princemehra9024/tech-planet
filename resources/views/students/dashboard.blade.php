@extends('layouts.student')
@section('title', 'Developer Feed')

@section('content')
<div class="space-y-6">
    @if(session('success'))
        <div class="bg-emerald-950/40 border border-emerald-500/30 text-emerald-300 px-5 py-4 rounded-2xl flex items-center gap-2.5 shadow-lg shadow-emerald-500/5">
            <i class="fas fa-check-circle text-emerald-400"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        <!-- Left Column: LinkedIn-style Mini Profile Card -->
        <div class="lg:col-span-4 space-y-6">
            <div class="glass-card rounded-2xl border border-white/5 shadow-xl bg-[#0e1122] overflow-hidden">
                <!-- Cover Image/Gradient Banner -->
                <div class="h-20 bg-gradient-to-r from-[#0a66c2]/40 via-[#8b5cf6]/20 to-cyan-500/40 relative">
                    <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.05)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.05)_1px,transparent_1px)] bg-[size:10px_10px]"></div>
                </div>
                <!-- Profile details -->
                <div class="p-4 pt-0 relative flex flex-col items-center border-b border-white/5">
                    <!-- Avatar overlapping -->
                    <div class="w-16 h-16 rounded-full border-4 border-[#0e1122] -mt-8 flex items-center justify-center bg-gradient-to-br from-cyan-500 to-purple-655 font-extrabold text-lg text-white shadow-lg shrink-0 z-10">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <!-- Name & Headline -->
                    <h3 class="font-bold text-white text-center mt-3 text-sm hover:underline cursor-pointer font-display leading-tight flex items-center justify-center gap-1.5">
                        <a href="{{ route('student.profile') }}">{{ auth()->user()->name }}</a>
                    </h3>
                    <div class="mt-1 flex justify-center">
                        @if(auth()->user()->role === 'admin')
                            <span class="inline-flex items-center gap-1 bg-amber-500/10 border border-amber-500/30 text-amber-400 font-extrabold uppercase tracking-wider text-[9px] px-2.5 py-0.5 rounded-full shadow-lg shadow-amber-500/10"><i class="fas fa-shield-alt text-[8px]"></i> Admin</span>
                        @elseif(auth()->user()->role === 'president')
                            <span class="inline-flex items-center gap-1 bg-purple-500/10 border border-purple-500/30 text-purple-400 font-extrabold uppercase tracking-wider text-[9px] px-2.5 py-0.5 rounded-full shadow-lg shadow-purple-500/10"><i class="fas fa-crown text-[8px]"></i> President</span>
                        @elseif(auth()->user()->role === 'secretary')
                            <span class="inline-flex items-center gap-1 bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 font-extrabold uppercase tracking-wider text-[9px] px-2.5 py-0.5 rounded-full shadow-lg shadow-cyan-500/10"><i class="fas fa-signature text-[8px]"></i> Secretary</span>
                        @elseif(auth()->user()->role === 'treasurer')
                            <span class="inline-flex items-center gap-1 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 font-extrabold uppercase tracking-wider text-[9px] px-2.5 py-0.5 rounded-full shadow-lg shadow-emerald-500/10"><i class="fas fa-coins text-[8px]"></i> Treasurer</span>
                        @elseif(auth()->user()->role === 'media_manager')
                            <span class="inline-flex items-center gap-1 bg-rose-500/10 border border-rose-500/30 text-rose-400 font-extrabold uppercase tracking-wider text-[9px] px-2.5 py-0.5 rounded-full shadow-lg shadow-rose-500/10"><i class="fas fa-photo-video text-[8px]"></i> Media Manager</span>
                        @else
                            <p class="text-[10px] text-slate-400 text-center font-semibold leading-relaxed">Student Developer • Tech Planet Club</p>
                        @endif
                    </div>
                </div>
                <!-- Stats Center -->
                <div class="p-4 space-y-3 text-xs border-b border-white/5">
                    <div class="flex justify-between items-center">
                        <span class="text-[10px] font-semibold text-slate-400">Total XP</span>
                        <span class="font-bold text-cyan-400">{{ auth()->user()->xp }} XP</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-[10px] font-semibold text-slate-400">User Level</span>
                        <span class="font-bold text-purple-400">Level {{ floor(auth()->user()->xp / 100) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-[10px] font-semibold text-slate-400">Department</span>
                        <span class="font-bold text-white">{{ auth()->user()->branch ?? 'CSI Member' }}</span>
                    </div>
                </div>
                <!-- Action links -->
                <div class="grid grid-cols-2 divide-x divide-white/5 border-t border-white/5 bg-white/[0.01]">
                    <a href="{{ route('student.profile') }}" class="block text-center py-3 text-xs font-bold text-[#0a66c2] hover:bg-white/[0.02] hover:text-[#004182] transition">
                        <i class="far fa-user mr-1.5"></i> View Profile
                    </a>
                    <button onclick="shareProfile('{{ route('portfolio.show', auth()->user()->portfolioSlug()) }}')" class="block text-center py-3 text-xs font-bold text-cyan-400 hover:bg-white/[0.02] hover:text-cyan-300 transition">
                        <i class="far fa-share-square mr-1.5"></i> Share Profile
                    </button>
                </div>
            </div>

            <!-- Recent activity section card -->
            <div class="glass-card rounded-2xl p-4 border border-white/5 shadow-xl bg-[#0e1122] space-y-3 hidden lg:block">
                <h4 class="font-bold text-[10px] text-slate-400 uppercase tracking-wider font-display">Recent Hub Access</h4>
                <div class="space-y-2">
                    <a href="{{ route('student.events') }}" class="flex items-center gap-2.5 text-xs font-semibold text-slate-400 hover:text-cyan-400 transition">
                        <i class="fas fa-calendar-check text-[10px] text-cyan-400 w-4 text-center"></i>
                        <span>CSI Events Panel</span>
                    </a>
                    <a href="{{ route('student.coding-arena') }}" class="flex items-center gap-2.5 text-xs font-semibold text-slate-400 hover:text-purple-400 transition">
                        <i class="fas fa-code text-[10px] text-purple-400 w-4 text-center"></i>
                        <span>Quizzes & Arena</span>
                    </a>
                    <a href="{{ route('student.leaderboard') }}" class="flex items-center gap-2.5 text-xs font-semibold text-slate-400 hover:text-yellow-400 transition">
                        <i class="fas fa-trophy text-[10px] text-yellow-400 w-4 text-center"></i>
                        <span>Live Leaderboards</span>
                    </a>
                    <a href="{{ route('student.notifications') }}" class="flex items-center gap-2.5 text-xs font-semibold text-slate-400 hover:text-red-400 transition">
                        <i class="fas fa-bell text-[10px] text-red-400 w-4 text-center"></i>
                        <span>System Notifications</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Right/Feed Column -->
        <div class="lg:col-span-8 space-y-6">
            <!-- Community Voting Poll -->
            @if(isset($approvedSuggestions) && $approvedSuggestions->count() > 0)
                <div class="glass-card rounded-2xl p-6 border border-white/5 shadow-xl bg-gradient-to-br from-[#0e1122] to-[#161033] relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-purple-500/10 blur-3xl"></div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-amber-500 flex items-center justify-center shadow-lg">
                            <i class="fas fa-vote-yea text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white font-display">Community Voting Poll</h3>
                            <p class="text-xs text-slate-400">Vote on event suggestions approved by the board.</p>
                        </div>
                    </div>
                    
                    <div class="space-y-4 relative z-10">
                        @foreach($approvedSuggestions as $suggestion)
                            @php
                                $userVote = $suggestion->votes->where('user_id', auth()->id())->first();
                                $totalVotes = $suggestion->votes->count();
                                $supportCount = $suggestion->votes->where('vote', 'support')->count();
                                $neutralCount = $suggestion->votes->where('vote', 'neutral')->count();
                                $rejectCount = $suggestion->votes->where('vote', 'reject')->count();
                                
                                $supportPercent = $totalVotes > 0 ? round(($supportCount / $totalVotes) * 100) : 0;
                                $neutralPercent = $totalVotes > 0 ? round(($neutralCount / $totalVotes) * 100) : 0;
                                $rejectPercent = $totalVotes > 0 ? round(($rejectCount / $totalVotes) * 100) : 0;
                            @endphp
                            <div class="bg-black/30 border border-white/5 rounded-xl p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="font-bold text-white text-sm">{{ $suggestion->title }}</h4>
                                    <span class="text-xs text-slate-500">{{ $totalVotes }} votes</span>
                                </div>
                                <p class="text-xs text-slate-400 mb-4">{{ Str::limit($suggestion->description, 150) }}</p>
                                
                                <form action="{{ route('student.events.vote', $suggestion->id) }}" method="POST" class="grid grid-cols-3 gap-2">
                                    @csrf
                                    <!-- Support -->
                                    <button type="submit" name="vote" value="support" class="flex flex-col items-center justify-center py-2 px-1 rounded-lg border {{ $userVote && $userVote->vote === 'support' ? 'bg-emerald-500/20 border-emerald-500/50 text-emerald-400' : 'bg-white/5 border-white/5 text-slate-400 hover:bg-emerald-500/10 hover:text-emerald-400' }} transition">
                                        <span class="text-lg mb-1">👍</span>
                                        <span class="text-[10px] font-bold">Support</span>
                                        <span class="text-[9px] opacity-70">{{ $supportPercent }}%</span>
                                    </button>
                                    
                                    <!-- Neutral -->
                                    <button type="submit" name="vote" value="neutral" class="flex flex-col items-center justify-center py-2 px-1 rounded-lg border {{ $userVote && $userVote->vote === 'neutral' ? 'bg-yellow-500/20 border-yellow-500/50 text-yellow-400' : 'bg-white/5 border-white/5 text-slate-400 hover:bg-yellow-500/10 hover:text-yellow-400' }} transition">
                                        <span class="text-lg mb-1">🤔</span>
                                        <span class="text-[10px] font-bold">Neutral</span>
                                        <span class="text-[9px] opacity-70">{{ $neutralPercent }}%</span>
                                    </button>
                                    
                                    <!-- Reject -->
                                    <button type="submit" name="vote" value="reject" class="flex flex-col items-center justify-center py-2 px-1 rounded-lg border {{ $userVote && $userVote->vote === 'reject' ? 'bg-rose-500/20 border-rose-500/50 text-rose-400' : 'bg-white/5 border-white/5 text-slate-400 hover:bg-rose-500/10 hover:text-rose-400' }} transition">
                                        <span class="text-lg mb-1">👎</span>
                                        <span class="text-[10px] font-bold">Reject</span>
                                        <span class="text-[9px] opacity-70">{{ $rejectPercent }}%</span>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Create Post (LinkedIn-style Start a Post Box) -->
            @if(auth()->user()->canManagePosts())
            <div class="glass-card rounded-xl p-4 border border-white/5 shadow-xl relative overflow-hidden bg-[#0e1122]">
                <form method="POST" action="{{ route('student.post.create') }}" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-cyan-500 to-purple-655 flex items-center justify-center text-white font-extrabold text-sm shrink-0 border border-white/10">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <textarea name="content" required rows="2" class="w-full bg-[#07080f]/60 border border-white/10 rounded-2xl px-4 py-3 text-slate-200 placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-[#0a66c2] focus:border-transparent transition text-xs sm:text-sm resize-none" placeholder="Start a post... share news or project work!"></textarea>
                    </div>
                    
                    <!-- Media Upload Preview Grid -->
                    <div id="media-preview-grid" class="hidden grid grid-cols-3 gap-2 mt-2 border border-white/10 bg-[#07080f]/50 p-2 rounded-xl max-h-48 overflow-y-auto">
                        <!-- Javascript previews will go here -->
                    </div>

                    <div class="flex flex-wrap items-center justify-between gap-3 pt-3 border-t border-white/5">
                        <div class="flex items-center gap-4">
                            <!-- Photo Upload Label -->
                            <label class="flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-cyan-400 transition cursor-pointer">
                                <i class="far fa-image text-cyan-400 text-base"></i>
                                <span>Photo</span>
                                <input type="file" name="photos[]" id="photos-upload-input" accept="image/*" multiple class="hidden">
                            </label>
                            <!-- Video Upload Label -->
                            <label class="flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-red-400 transition cursor-pointer">
                                <i class="fab fa-youtube text-red-550 text-base"></i>
                                <span>Video</span>
                                <input type="file" name="videos[]" id="videos-upload-input" accept="video/*" multiple class="hidden">
                            </label>
                            <!-- Event Creation Trigger -->
                            @if(auth()->user()->canSeeAdminDetails())
                            <button type="button" id="open-event-modal-btn" class="flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-yellow-400 transition">
                                <i class="far fa-calendar-alt text-yellow-500 text-base"></i>
                                <span>Event</span>
                            </button>
                            @else
                            <span class="flex items-center gap-2 text-xs font-semibold text-slate-600 cursor-not-allowed" title="Only board members can create events.">
                                <i class="far fa-calendar-alt text-yellow-500/30 text-base"></i>
                                <span>Event</span>
                            </span>
                            @endif
                        </div>
                        <button type="submit" class="bg-[#0a66c2] hover:bg-[#004182] text-white font-bold px-5 py-2 rounded-full text-xs transition">
                            Post
                        </button>
                    </div>
                </form>
            </div>
            @endif

            <!-- LinkedIn-style Feed Posts -->
            <div class="space-y-6">
                @forelse($posts as $post)
                <div class="glass-card rounded-xl border border-white/5 shadow-md bg-[#0e1122] overflow-hidden" id="post-{{ $post->id }}">
                    <!-- Post Header -->
                    <div class="p-4 flex justify-between items-start">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-cyan-500 to-purple-655 flex items-center justify-center text-white font-extrabold shadow-md border border-white/10 shrink-0">
                                {{ substr($post->user->name, 0, 1) }}
                            </div>
                            <div>
                                <div class="flex items-center gap-2 flex-wrap">
                                    <h4 class="font-bold text-white text-sm hover:text-[#0a66c2] hover:underline cursor-pointer font-display leading-tight">
                                        <a href="{{ route('portfolio.show', $post->user->portfolioSlug()) }}">{{ $post->user->name }}</a>
                                    </h4>
                                    @if($post->user->role !== 'student' && $post->user->role)
                                        @if($post->user->role === 'admin')
                                            <span class="inline-flex items-center gap-1 bg-amber-500/10 border border-amber-500/30 text-amber-400 font-extrabold uppercase tracking-wider text-[9px] px-2 py-0.5 rounded-full shadow-lg shadow-amber-500/10"><i class="fas fa-shield-alt text-[8px]"></i> Admin</span>
                                        @elseif($post->user->role === 'president')
                                            <span class="inline-flex items-center gap-1 bg-purple-500/10 border border-purple-500/30 text-purple-400 font-extrabold uppercase tracking-wider text-[9px] px-2 py-0.5 rounded-full shadow-lg shadow-purple-500/10"><i class="fas fa-crown text-[8px]"></i> President</span>
                                        @elseif($post->user->role === 'secretary')
                                            <span class="inline-flex items-center gap-1 bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 font-extrabold uppercase tracking-wider text-[9px] px-2 py-0.5 rounded-full shadow-lg shadow-cyan-500/10"><i class="fas fa-signature text-[8px]"></i> Secretary</span>
                                        @elseif($post->user->role === 'treasurer')
                                            <span class="inline-flex items-center gap-1 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 font-extrabold uppercase tracking-wider text-[9px] px-2 py-0.5 rounded-full shadow-lg shadow-emerald-500/10"><i class="fas fa-coins text-[8px]"></i> Treasurer</span>
                                        @elseif($post->user->role === 'media_manager')
                                            <span class="inline-flex items-center gap-1 bg-rose-500/10 border border-rose-500/30 text-rose-400 font-extrabold uppercase tracking-wider text-[9px] px-2 py-0.5 rounded-full shadow-lg shadow-rose-500/10"><i class="fas fa-photo-video text-[8px]"></i> Media Manager</span>
                                        @endif
                                    @endif
                                </div>
                                <p class="text-[10px] text-slate-400 mt-1.5 leading-none font-semibold">
                                    @if($post->user->role === 'admin')
                                        SRM CSI Department Advisory
                                    @elseif(in_array($post->user->role, ['president', 'secretary', 'treasurer', 'media_manager']))
                                        SRM CSI Board Member
                                    @else
                                        Student Developer • Tech Planet Club
                                    @endif
                                </p>
                                <p class="text-[10px] text-slate-500 mt-2 flex items-center gap-1 leading-none">
                                    <span>{{ $post->created_at->diffForHumans() }}</span>
                                    <span>•</span>
                                    <i class="fas fa-globe-americas"></i>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Post Content (Text) -->
                    <div class="px-4 pb-3">
                        <p class="text-slate-200 text-xs sm:text-sm leading-relaxed whitespace-pre-line">{{ $post->content }}</p>
                    </div>

                    <!-- Post Media (Photos / Videos Grid) -->
                    @if($post->media && count($post->media) > 0)
                        <div class="border-t border-b border-white/5 bg-[#07080f]/40 p-2">
                            @php $count = count($post->media); @endphp
                            <div class="grid gap-2 {{ $count === 1 ? 'grid-cols-1' : ($count === 2 ? 'grid-cols-2' : 'grid-cols-2 md:grid-cols-3') }}">
                                @foreach($post->media as $item)
                                    <div class="relative overflow-hidden rounded-lg bg-black/30 flex justify-center items-center max-h-[360px] border border-white/5">
                                        @if($item['type'] === 'photo')
                                            <img src="{{ asset('storage/' . $item['path']) }}" class="w-full h-auto object-cover max-h-[360px]" alt="post photo attachment">
                                        @elseif($item['type'] === 'video')
                                            <video src="{{ asset('storage/' . $item['path']) }}" class="w-full max-h-[360px]" controls></video>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @elseif($post->image_path)
                        <div class="border-t border-b border-white/5 bg-[#07080f]/40 flex justify-center items-center overflow-hidden max-h-[500px]">
                            <img src="{{ asset('storage/' . $post->image_path) }}" class="w-full h-auto object-cover max-h-[500px]" alt="post photo attachment">
                        </div>
                    @endif

                    <!-- Social Activity Counters -->
                    <div class="px-4 py-2.5 flex justify-between items-center text-[10px] text-slate-400 border-b border-white/5 font-semibold">
                        <div class="flex items-center gap-1.5">
                            <span class="w-4.5 h-4.5 rounded-full bg-[#0a66c2] flex items-center justify-center text-white text-[9px]"><i class="fas fa-thumbs-up"></i></span>
                            <span><span class="like-count">{{ $post->likes->count() }}</span> reactions</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="toggle-comment-btn cursor-pointer hover:text-[#0a66c2] hover:underline" data-post="{{ $post->id }}">
                                <span class="comment-count">{{ $post->comments->count() }}</span> comments
                            </span>
                        </div>
                    </div>

                    <!-- Action Buttons (Like / Comment Slices) -->
                    <div class="grid grid-cols-2 text-xs font-bold text-slate-400 border-b border-white/5">
                        @php $liked = $post->likes->contains('user_id', auth()->id()) @endphp
                        <button class="like-btn flex items-center justify-center gap-2 py-3 hover:bg-white/[0.02] transition {{ $liked ? 'text-[#0a66c2]' : 'text-slate-400 hover:text-white' }}" data-post="{{ $post->id }}">
                            <i class="fa-thumbs-up text-base {{ $liked ? 'fas' : 'far' }}"></i>
                            <span>Like</span>
                        </button>
                        <button class="toggle-comment-btn flex items-center justify-center gap-2 py-3 hover:bg-white/[0.02] hover:text-white text-slate-400 transition" data-post="{{ $post->id }}">
                            <i class="far fa-comment-dots text-base"></i>
                            <span>Comment</span>
                        </button>
                    </div>

                    <!-- Comments Section -->
                    <div class="comment-section hidden p-4 bg-[#0a0c16]/50 space-y-4" id="comments-{{ $post->id }}">
                        <!-- Write a Comment Row -->
                        <form method="POST" action="{{ route('student.post.comment', $post->id) }}" class="flex gap-2.5 items-center">
                            @csrf
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-cyan-500 to-purple-655 flex items-center justify-center text-white font-extrabold text-[10px] shrink-0">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <input type="text" name="content" required class="flex-grow bg-[#07080f]/80 border border-white/10 rounded-full px-4 py-2.5 text-xs text-white placeholder-slate-600 focus:outline-none focus:ring-1 focus:ring-[#0a66c2] focus:border-transparent" placeholder="Add a comment...">
                            <button type="submit" class="bg-[#0a66c2] hover:bg-[#004182] text-white font-bold px-4 py-2 rounded-full text-xs transition">Post</button>
                        </form>

                        <!-- Comments List -->
                        <div class="comments-list space-y-3 max-h-72 overflow-y-auto pr-1.5">
                            @forelse($post->comments as $comment)
                                <div class="flex gap-2.5 items-start">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-cyan-500 to-purple-655 flex items-center justify-center text-white font-extrabold text-[10px] shrink-0">
                                        {{ substr($comment->user->name, 0, 1) }}
                                    </div>
                                    <div class="bg-[#111625] border border-white/5 rounded-2xl p-3 flex-grow text-xs">
                                        <div class="flex justify-between items-center mb-1">
                                            <div>
                                                <div class="flex items-center gap-2 flex-wrap">
                                                    <span class="font-bold text-white hover:text-[#0a66c2] hover:underline cursor-pointer">
                                                        <a href="{{ route('portfolio.show', $comment->user->portfolioSlug()) }}">{{ $comment->user->name }}</a>
                                                    </span>
                                                    @if($comment->user->role !== 'student' && $comment->user->role)
                                                        @if($comment->user->role === 'admin')
                                                            <span class="inline-flex items-center gap-1 bg-amber-500/10 border border-amber-500/30 text-amber-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-amber-500/10"><i class="fas fa-shield-alt text-[7px]"></i> Admin</span>
                                                        @elseif($comment->user->role === 'president')
                                                            <span class="inline-flex items-center gap-1 bg-purple-500/10 border border-purple-500/30 text-purple-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-purple-500/10"><i class="fas fa-crown text-[7px]"></i> President</span>
                                                        @elseif($comment->user->role === 'secretary')
                                                            <span class="inline-flex items-center gap-1 bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-cyan-500/10"><i class="fas fa-signature text-[7px]"></i> Secretary</span>
                                                        @elseif($comment->user->role === 'treasurer')
                                                            <span class="inline-flex items-center gap-1 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-emerald-500/10"><i class="fas fa-coins text-[7px]"></i> Treasurer</span>
                                                        @elseif($comment->user->role === 'media_manager')
                                                            <span class="inline-flex items-center gap-1 bg-rose-500/10 border border-rose-500/30 text-rose-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-rose-500/10"><i class="fas fa-photo-video text-[7px]"></i> Media Manager</span>
                                                        @endif
                                                    @endif
                                                </div>
                                                <span class="text-[9px] text-slate-500 block leading-none mt-1">
                                                    @if($comment->user->role === 'admin')
                                                        SRM CSI Department Advisory
                                                    @elseif(in_array($comment->user->role, ['president', 'secretary', 'treasurer', 'media_manager']))
                                                        SRM CSI Board Member
                                                    @else
                                                        Student Developer
                                                    @endif
                                                </span>
                                            </div>
                                            <span class="text-[8px] text-slate-500 font-semibold">{{ $comment->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-slate-300 mt-2 leading-relaxed">{{ $comment->content }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-[10px] text-slate-500 text-center py-2 font-bold uppercase tracking-wider">No comments yet. Write one above!</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                @empty
                <div class="glass-card rounded-xl p-12 text-center text-slate-550 border border-white/5 bg-[#0e1122]">
                    <i class="far fa-newspaper text-4xl mb-4 text-slate-650 animate-pulse"></i>
                    <p class="text-xs font-bold uppercase tracking-wider">Your Developer feed is empty.</p>
                </div>
                @endforelse

                <div class="mt-6">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Event Creation Modal (Glassmorphic) -->
@if(auth()->user()->canSeeAdminDetails())
<div id="event-creation-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm hidden">
    <div class="glass-card rounded-3xl w-full max-w-lg border border-white/10 shadow-2xl relative bg-[#0e1122] overflow-hidden">
        <!-- Modal Header -->
        <div class="p-5 border-b border-white/5 flex justify-between items-center bg-[#07080f]/20">
            <h3 class="font-bold text-white text-base font-display flex items-center gap-2">
                <i class="fas fa-calendar-plus text-yellow-400"></i> Create Club Event
            </h3>
            <button type="button" id="close-event-modal-btn" class="text-slate-400 hover:text-white transition text-lg"><i class="fas fa-times"></i></button>
        </div>
        
        <!-- Modal Body -->
        <form method="POST" action="{{ route('student.event.create') }}" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-slate-350 font-semibold text-[10px] mb-1.5 uppercase tracking-widest">Event Title</label>
                <input type="text" name="title" required class="w-full bg-[#07080f]/60 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-slate-600 focus:outline-none focus:ring-1 focus:ring-yellow-500 transition text-xs sm:text-sm" placeholder="e.g. Generative AI Bootcamp">
            </div>
            <div>
                <label class="block text-slate-350 font-semibold text-[10px] mb-1.5 uppercase tracking-widest">Description</label>
                <textarea name="description" required rows="3" class="w-full bg-[#07080f]/60 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-slate-600 focus:outline-none focus:ring-1 focus:ring-yellow-500 transition text-xs sm:text-sm resize-none" placeholder="Provide event details, schedule, requirements..."></textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-slate-350 font-semibold text-[10px] mb-1.5 uppercase tracking-widest">Date & Time</label>
                    <input type="datetime-local" name="date" required class="w-full bg-[#07080f]/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:ring-1 focus:ring-yellow-500 transition text-xs sm:text-sm">
                </div>
                <div>
                    <label class="block text-slate-350 font-semibold text-[10px] mb-1.5 uppercase tracking-widest">Max Participants</label>
                    <input type="number" name="max_participants" required min="1" max="1000" class="w-full bg-[#07080f]/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:ring-1 focus:ring-yellow-500 transition text-xs sm:text-sm" placeholder="e.g. 100">
                </div>
            </div>
            <div>
                <label class="block text-slate-350 font-semibold text-[10px] mb-1.5 uppercase tracking-widest">Venue / Location</label>
                <input type="text" name="location" required class="w-full bg-[#07080f]/60 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-slate-600 focus:outline-none focus:ring-1 focus:ring-yellow-500 transition text-xs sm:text-sm" placeholder="e.g. CSI Lab, tech park 5th floor">
            </div>
            
            <!-- Footer buttons -->
            <div class="flex justify-end gap-3 pt-4 border-t border-white/5">
                <button type="button" id="cancel-event-modal-btn" class="px-4 py-2 border border-white/10 text-slate-300 hover:bg-white/5 rounded-xl text-xs font-semibold transition">Cancel</button>
                <button type="submit" class="bg-gradient-to-r from-yellow-500 to-amber-600 text-white font-extrabold px-5 py-2 rounded-xl text-xs shadow-lg hover:shadow-yellow-500/20 transition">Create Event</button>
            </div>
        </form>
    </div>
</div>
@endif
@endsection

@push('scripts')
<script>
    // Multiple files upload preview logic
    const photosInput = document.getElementById('photos-upload-input');
    const videosInput = document.getElementById('videos-upload-input');
    const previewGrid = document.getElementById('media-preview-grid');

    let selectedFiles = []; // Array of { file: File, type: 'photo'|'video' }

    function updateMediaPreview() {
        if (!previewGrid) return;
        previewGrid.innerHTML = '';
        if (selectedFiles.length === 0) {
            previewGrid.classList.add('hidden');
            return;
        }
        previewGrid.classList.remove('hidden');

        selectedFiles.forEach((fileInfo, index) => {
            const previewItem = document.createElement('div');
            previewItem.className = 'relative rounded-lg overflow-hidden h-24 bg-black/40 border border-white/10 flex items-center justify-center';
            
            if (fileInfo.type === 'photo') {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(fileInfo.file);
                img.className = 'w-full h-full object-cover';
                previewItem.appendChild(img);
            } else {
                const icon = document.createElement('div');
                icon.className = 'text-center flex flex-col items-center justify-center p-1 text-slate-400';
                icon.innerHTML = '<i class="fas fa-video text-lg text-red-500 mb-1 animate-pulse"></i><span class="text-[8px] font-bold truncate max-w-[80px] block">' + fileInfo.file.name + '</span>';
                previewItem.appendChild(icon);
            }

            // Remove button
            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.className = 'absolute top-1 right-1 bg-black/70 hover:bg-black text-white w-5 h-5 rounded-full flex items-center justify-center text-[8px] transition';
            removeBtn.innerHTML = '<i class="fas fa-times"></i>';
            removeBtn.addEventListener('click', function(e) {
                e.preventDefault();
                selectedFiles.splice(index, 1);
                syncFileInputs();
                updateMediaPreview();
            });

            previewItem.appendChild(removeBtn);
            previewGrid.appendChild(previewItem);
        });
    }

    function syncFileInputs() {
        const photoDT = new DataTransfer();
        const videoDT = new DataTransfer();

        selectedFiles.forEach(fileInfo => {
            if (fileInfo.type === 'photo') {
                photoDT.items.add(fileInfo.file);
            } else {
                videoDT.items.add(fileInfo.file);
            }
        });

        if (photosInput) photosInput.files = photoDT.files;
        if (videosInput) videosInput.files = videoDT.files;
    }

    if (photosInput) {
        photosInput.addEventListener('change', function() {
            Array.from(this.files).forEach(file => {
                selectedFiles.push({ file: file, type: 'photo' });
            });
            updateMediaPreview();
        });
    }

    if (videosInput) {
        videosInput.addEventListener('change', function() {
            Array.from(this.files).forEach(file => {
                selectedFiles.push({ file: file, type: 'video' });
            });
            updateMediaPreview();
        });
    }

    // Event Modal triggers
    const openEventBtn = document.getElementById('open-event-modal-btn');
    const closeEventBtn = document.getElementById('close-event-modal-btn');
    const cancelEventBtn = document.getElementById('cancel-event-modal-btn');
    const eventModal = document.getElementById('event-creation-modal');

    if (openEventBtn && eventModal) {
        openEventBtn.addEventListener('click', function() {
            eventModal.classList.remove('hidden');
        });
    }

    function hideEventModal() {
        if (eventModal) {
            eventModal.classList.add('hidden');
        }
    }

    if (closeEventBtn) closeEventBtn.addEventListener('click', hideEventModal);
    if (cancelEventBtn) cancelEventBtn.addEventListener('click', hideEventModal);

    // Toggle comments dropdown
    document.querySelectorAll('.toggle-comment-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            let id = this.dataset.post;
            let commentDiv = document.getElementById('comments-'+id);
            commentDiv.classList.toggle('hidden');
        });
    });

    // Like via AJAX
    document.querySelectorAll('.like-btn').forEach(btn => {
        btn.addEventListener('click', async function() {
            let postId = this.dataset.post;
            let response = await fetch(`/student/like/${postId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            });
            if (response.ok) {
                let data = await response.json();
                // Find nearest post container to update likes count correctly
                let postContainer = this.closest('.glass-card');
                let countSpan = postContainer.querySelector('.like-count');
                countSpan.innerText = data.likes;
                // Change heart style to thumbs-up blue
                let icon = this.querySelector('i');
                if (data.liked) {
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                    this.classList.add('text-[#0a66c2]');
                    this.classList.remove('text-slate-400', 'hover:text-white');
                } else {
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                    this.classList.remove('text-[#0a66c2]');
                    this.classList.add('text-slate-400', 'hover:text-white');
                }
            }
        });
    });
</script>
@endpush