<div class="glass-card rounded-2xl p-5 border border-white/5 shadow-xl sticky top-24 space-y-6">
    <!-- User Avatar & Level Ring Column -->
    <div class="flex items-center gap-4 border-b border-white/5 pb-4">
        <!-- SVG Radial Ring Container -->
        @php
            $level = floor(auth()->user()->xp / 100);
            $progress = min(100, (auth()->user()->xp % 100));
            $radius = 24;
            $circumference = 2 * pi() * $radius; // ~150.79
            $strokeOffset = $circumference - ($circumference * $progress) / 100;
        @endphp
        <div class="relative w-16 h-16 shrink-0 flex items-center justify-center">
            <svg class="w-full h-full transform -rotate-90">
                <!-- Track ring -->
                <circle cx="32" cy="32" r="{{ $radius }}" stroke="rgba(255,255,255,0.05)" stroke-width="4" fill="transparent" />
                <!-- Active progress ring -->
                <circle cx="32" cy="32" r="{{ $radius }}" stroke="url(#cyanPurpleGrad)" stroke-width="4" fill="transparent" 
                        stroke-dasharray="{{ $circumference }}" 
                        stroke-dashoffset="{{ $strokeOffset }}" 
                        stroke-linecap="round" />
                <!-- Gradients def -->
                <defs>
                    <linearGradient id="cyanPurpleGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#22d3ee" />
                        <stop offset="100%" stop-color="#8b5cf6" />
                    </linearGradient>
                </defs>
            </svg>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-11 h-11 rounded-full bg-[#0e1122] flex items-center justify-center text-white font-extrabold text-sm border border-white/10">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
            </div>
            <!-- Floating Level Badge -->
            <span class="absolute -bottom-1 -right-1 bg-gradient-to-r from-cyan-500 to-purple-600 text-white text-[9px] font-bold rounded-full w-5 h-5 flex items-center justify-center border border-[#07080f]">
                {{ $level }}
            </span>
        </div>
        <div>
            <div class="flex flex-col gap-1">
                <p class="font-bold text-white text-base font-display leading-tight">{{ auth()->user()->name }}</p>
                @if(auth()->user()->role !== 'student' && auth()->user()->role)
                    <div class="mt-0.5">
                        @if(auth()->user()->role === 'admin')
                            <span class="inline-flex items-center gap-0.5 bg-amber-500/10 border border-amber-500/30 text-amber-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-amber-500/10"><i class="fas fa-shield-alt text-[7px]"></i> Admin</span>
                        @elseif(auth()->user()->role === 'president')
                            <span class="inline-flex items-center gap-0.5 bg-purple-500/10 border border-purple-500/30 text-purple-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-purple-500/10"><i class="fas fa-crown text-[7px]"></i> Pres.</span>
                        @elseif(auth()->user()->role === 'secretary')
                            <span class="inline-flex items-center gap-0.5 bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-cyan-500/10"><i class="fas fa-signature text-[7px]"></i> Sec.</span>
                        @elseif(auth()->user()->role === 'treasurer')
                            <span class="inline-flex items-center gap-0.5 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-emerald-500/10"><i class="fas fa-coins text-[7px]"></i> Treas.</span>
                        @elseif(auth()->user()->role === 'media_manager')
                            <span class="inline-flex items-center gap-0.5 bg-rose-500/10 border border-rose-500/30 text-rose-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-rose-500/10"><i class="fas fa-photo-video text-[7px]"></i> Media</span>
                        @endif
                    </div>
                @endif
            </div>
            <p class="text-xs text-cyan-400 mt-1 font-medium">{{ auth()->user()->xp }} XP total</p>
        </div>
    </div>
    
    <!-- Quick Stats -->
    <div>
        <h3 class="font-bold text-xs text-slate-350 font-display flex items-center gap-1.5"><i class="fas fa-chart-line text-cyan-400"></i> Stats Center</h3>
        <ul class="text-xs font-semibold space-y-2 mt-3 text-slate-400">
            <li class="flex justify-between items-center bg-[#07080f]/40 border border-white/5 rounded-xl px-3 py-2">
                <span>📝 Posts Shared</span>
                <span class="text-white bg-white/5 px-2 py-0.5 rounded-md">{{ auth()->user()->posts->count() }}</span>
            </li>
            <li class="flex justify-between items-center bg-[#07080f]/40 border border-white/5 rounded-xl px-3 py-2">
                <span>💬 Comments Made</span>
                <span class="text-white bg-white/5 px-2 py-0.5 rounded-md">{{ auth()->user()->comments->count() }}</span>
            </li>
            <li class="flex justify-between items-center bg-[#07080f]/40 border border-white/5 rounded-xl px-3 py-2">
                <span>🎉 Events Joined</span>
                <span class="text-white bg-white/5 px-2 py-0.5 rounded-md">{{ auth()->user()->eventRegistrations->count() }}</span>
            </li>
            <li class="flex justify-between items-center bg-[#07080f]/40 border border-white/5 rounded-xl px-3 py-2">
                <span>📚 Quizzes Taken</span>
                <span class="text-white bg-white/5 px-2 py-0.5 rounded-md">{{ auth()->user()->quizAttempts->count() }}</span>
            </li>
        </ul>
    </div>
    
    <!-- Next Level Progress Tracker -->
    <div class="pt-4 border-t border-white/5">
        <div class="flex justify-between items-center text-[10px] text-slate-500 font-bold uppercase tracking-wider">
            <span>Progress ({{ $progress }}%)</span>
            <span>Target: {{ ($level + 1) * 100 }} XP</span>
        </div>
    </div>

    <!-- Achievements Board (Badges) -->
    <div class="pt-4 border-t border-white/5">
        <h3 class="font-bold text-xs text-slate-350 font-display flex items-center gap-1.5 mb-3"><i class="fas fa-award text-purple-400"></i> Unlocked Badges</h3>
        <div class="grid grid-cols-4 gap-2">
            <!-- Badge 1: Registered -->
            <div class="group relative flex items-center justify-center p-2 rounded-xl bg-white/5 border border-white/5 hover:border-cyan-500/30 transition duration-300" title="Cadet Badge: Account Initialised">
                <i class="fas fa-user-shield text-cyan-400 text-base"></i>
                <!-- Tooltip -->
                <span class="absolute bottom-full mb-2 hidden group-hover:block bg-[#0e1122] text-white text-[9px] px-2 py-1 rounded border border-white/10 whitespace-nowrap z-30">Cadet (Initialised)</span>
            </div>

            <!-- Badge 2: Quiz Taker -->
            @php $hasQuiz = auth()->user()->quizAttempts->count() > 0; @endphp
            <div class="group relative flex items-center justify-center p-2 rounded-xl {{ $hasQuiz ? 'bg-white/5 border-purple-500/20 text-purple-400' : 'bg-white/[0.01] border-white/5 opacity-30 text-slate-600' }} border transition duration-300">
                <i class="fas fa-brain text-base"></i>
                <span class="absolute bottom-full mb-2 hidden group-hover:block bg-[#0e1122] text-white text-[9px] px-2 py-1 rounded border border-white/10 whitespace-nowrap z-30">
                    {{ $hasQuiz ? 'Code Squire (Quiz Taken)' : 'Locked: Squire Badge' }}
                </span>
            </div>

            <!-- Badge 3: Contributor -->
            @php $hasPost = auth()->user()->posts->count() > 0 || auth()->user()->comments->count() > 0; @endphp
            <div class="group relative flex items-center justify-center p-2 rounded-xl {{ $hasPost ? 'bg-white/5 border-pink-500/20 text-pink-400' : 'bg-white/[0.01] border-white/5 opacity-30 text-slate-600' }} border transition duration-300">
                <i class="fas fa-comments text-base"></i>
                <span class="absolute bottom-full mb-2 hidden group-hover:block bg-[#0e1122] text-white text-[9px] px-2 py-1 rounded border border-white/10 whitespace-nowrap z-30">
                    {{ $hasPost ? 'Spark Badge (Communicator)' : 'Locked: Spark Badge' }}
                </span>
            </div>

            <!-- Badge 4: Level 5+ master -->
            @php $isLevel5 = $level >= 5; @endphp
            <div class="group relative flex items-center justify-center p-2 rounded-xl {{ $isLevel5 ? 'bg-white/5 border-yellow-500/20 text-yellow-400' : 'bg-white/[0.01] border-white/5 opacity-30 text-slate-600' }} border transition duration-300">
                <i class="fas fa-crown text-base"></i>
                <span class="absolute bottom-full mb-2 hidden group-hover:block bg-[#0e1122] text-white text-[9px] px-2 py-1 rounded border border-white/10 whitespace-nowrap z-30">
                    {{ $isLevel5 ? 'Grandmaster Badge (Lvl 5+)' : 'Locked: Grandmaster Badge' }}
                </span>
            </div>
        </div>
    </div>
</div>