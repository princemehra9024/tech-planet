@extends('layouts.student')
@section('title', 'Leaderboard')

@section('content')
<div class="space-y-8">
    <div class="mb-4">
        <h2 class="text-3xl font-extrabold text-charcoal font-display flex items-center gap-2.5"><i class="fas fa-trophy text-yellow-500"></i> Leaderboard</h2>
        <p class="text-muted mt-2 text-xs sm:text-sm">Rise to the top of Club rankings by gaining XP in assessments.</p>
    </div>

    <!-- Visual Podium (Only on Page 1) -->
    @if($topStudents->currentPage() == 1 && count($topStudents) >= 1)
    <div class="grid grid-cols-3 gap-4 items-end max-w-xl mx-auto pt-10 pb-8 relative">
        <!-- 2nd Place -->
        @if(isset($topStudents[1]))
        <div class="flex flex-col items-center space-y-3">
            <div class="relative">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-slate-400 to-slate-500 flex items-center justify-center text-charcoal text-base font-extrabold border border-charcoal/10 shadow-lg">
                    {{ substr($topStudents[1]->name, 0, 1) }}
                </div>
                <span class="absolute -bottom-1 -right-1 bg-slate-400 text-charcoal text-[9px] font-extrabold rounded-full w-5 h-5 flex items-center justify-center border border-cream ">2</span>
            </div>
            <a href="{{ route('portfolio.show', $topStudents[1]->portfolioSlug()) }}" class="text-slate-350 text-xs font-bold font-display truncate max-w-full text-center hover:underline hover:text-cyan-400">{{ $topStudents[1]->name }}</a>
            @if($topStudents[1]->role !== 'student' && $topStudents[1]->role)
                <div class="mt-0.5">
                    @if($topStudents[1]->role === 'admin')
                        <span class="inline-flex items-center gap-0.5 bg-amber-500/10 border border-amber-500/30 text-amber-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-amber-500/10"><i class="fas fa-shield-alt text-[7px]"></i> Admin</span>
                    @elseif($topStudents[1]->role === 'president')
                        <span class="inline-flex items-center gap-0.5 bg-purple-500/10 border border-purple-500/30 text-purple-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-purple-500/10"><i class="fas fa-crown text-[7px]"></i> Pres.</span>
                    @elseif($topStudents[1]->role === 'secretary')
                        <span class="inline-flex items-center gap-0.5 bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-cyan-500/10"><i class="fas fa-signature text-[7px]"></i> Sec.</span>
                    @elseif($topStudents[1]->role === 'treasurer')
                        <span class="inline-flex items-center gap-0.5 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-emerald-500/10"><i class="fas fa-coins text-[7px]"></i> Treas.</span>
                    @elseif($topStudents[1]->role === 'media_manager')
                        <span class="inline-flex items-center gap-0.5 bg-rose-500/10 border border-rose-500/30 text-rose-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-rose-500/10"><i class="fas fa-photo-video text-[7px]"></i> Media</span>
                    @endif
                </div>
            @endif
            <div class="w-full bg-slate-500/10 border border-slate-500/20 rounded-t-2xl h-24 flex flex-col justify-center items-center mt-2">
                <span class="text-xs font-bold text-charcoal/70 ">2nd</span>
                <span class="text-[10px] text-slate-450 font-semibold mt-1">{{ $topStudents[1]->xp }} XP</span>
            </div>
        </div>
        @endif

        <!-- 1st Place -->
        @if(isset($topStudents[0]))
        <div class="flex flex-col items-center space-y-3 relative z-10 -mt-8">
            <div class="relative">
                <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-yellow-400 to-amber-500 flex items-center justify-center text-charcoal text-xl font-extrabold border border-white/20 shadow-xl shadow-yellow-500/5 ring-4 ring-yellow-500/15">
                    {{ substr($topStudents[0]->name, 0, 1) }}
                </div>
                <span class="absolute -bottom-1 -right-1 bg-yellow-500 text-charcoal text-xs font-extrabold rounded-full w-6 h-6 flex items-center justify-center border border-cream shadow-md">1</span>
            </div>
            <a href="{{ route('portfolio.show', $topStudents[0]->portfolioSlug()) }}" class="text-charcoal text-sm font-bold font-display truncate max-w-full text-center hover:underline hover:text-cyan-400">{{ $topStudents[0]->name }}</a>
            @if($topStudents[0]->role !== 'student' && $topStudents[0]->role)
                <div class="mt-0.5">
                    @if($topStudents[0]->role === 'admin')
                        <span class="inline-flex items-center gap-0.5 bg-amber-500/10 border border-amber-500/30 text-amber-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-amber-500/10"><i class="fas fa-shield-alt text-[7px]"></i> Admin</span>
                    @elseif($topStudents[0]->role === 'president')
                        <span class="inline-flex items-center gap-0.5 bg-purple-500/10 border border-purple-500/30 text-purple-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-purple-500/10"><i class="fas fa-crown text-[7px]"></i> Pres.</span>
                    @elseif($topStudents[0]->role === 'secretary')
                        <span class="inline-flex items-center gap-0.5 bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-cyan-500/10"><i class="fas fa-signature text-[7px]"></i> Sec.</span>
                    @elseif($topStudents[0]->role === 'treasurer')
                        <span class="inline-flex items-center gap-0.5 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-emerald-500/10"><i class="fas fa-coins text-[7px]"></i> Treas.</span>
                    @elseif($topStudents[0]->role === 'media_manager')
                        <span class="inline-flex items-center gap-0.5 bg-rose-500/10 border border-rose-500/30 text-rose-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-rose-500/10"><i class="fas fa-photo-video text-[7px]"></i> Media</span>
                    @endif
                </div>
            @endif
            <div class="w-full bg-yellow-500/10 border border-yellow-500/25 rounded-t-3xl h-32 flex flex-col justify-center items-center shadow-lg shadow-yellow-500/5 mt-2">
                <span class="text-sm font-extrabold text-yellow-400">1st</span>
                <span class="text-xs text-yellow-500 font-bold mt-1">{{ $topStudents[0]->xp }} XP</span>
            </div>
        </div>
        @endif

        <!-- 3rd Place -->
        @if(isset($topStudents[2]))
        <div class="flex flex-col items-center space-y-3">
            <div class="relative">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-600 to-amber-800 flex items-center justify-center text-charcoal text-base font-extrabold border border-charcoal/10 shadow-lg">
                    {{ substr($topStudents[2]->name, 0, 1) }}
                </div>
                <span class="absolute -bottom-1 -right-1 bg-amber-700 text-charcoal text-[9px] font-extrabold rounded-full w-5 h-5 flex items-center justify-center border border-cream ">3</span>
            </div>
            <a href="{{ route('portfolio.show', $topStudents[2]->portfolioSlug()) }}" class="text-slate-350 text-xs font-bold font-display truncate max-w-full text-center hover:underline hover:text-cyan-400">{{ $topStudents[2]->name }}</a>
            @if($topStudents[2]->role !== 'student' && $topStudents[2]->role)
                <div class="mt-0.5">
                    @if($topStudents[2]->role === 'admin')
                        <span class="inline-flex items-center gap-0.5 bg-amber-500/10 border border-amber-500/30 text-amber-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-amber-500/10"><i class="fas fa-shield-alt text-[7px]"></i> Admin</span>
                    @elseif($topStudents[2]->role === 'president')
                        <span class="inline-flex items-center gap-0.5 bg-purple-500/10 border border-purple-500/30 text-purple-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-purple-500/10"><i class="fas fa-crown text-[7px]"></i> Pres.</span>
                    @elseif($topStudents[2]->role === 'secretary')
                        <span class="inline-flex items-center gap-0.5 bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-cyan-500/10"><i class="fas fa-signature text-[7px]"></i> Sec.</span>
                    @elseif($topStudents[2]->role === 'treasurer')
                        <span class="inline-flex items-center gap-0.5 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-emerald-500/10"><i class="fas fa-coins text-[7px]"></i> Treas.</span>
                    @elseif($topStudents[2]->role === 'media_manager')
                        <span class="inline-flex items-center gap-0.5 bg-rose-500/10 border border-rose-500/30 text-rose-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-rose-500/10"><i class="fas fa-photo-video text-[7px]"></i> Media</span>
                    @endif
                </div>
            @endif
            <div class="w-full bg-amber-700/10 border border-amber-700/20 rounded-t-2xl h-20 flex flex-col justify-center items-center mt-2">
                <span class="text-xs font-bold text-amber-500">3rd</span>
                <span class="text-[10px] text-slate-450 font-semibold mt-1">{{ $topStudents[2]->xp }} XP</span>
            </div>
        </div>
        @endif
    </div>
    @endif

    <!-- Leaderboard Ranks Table -->
    <div class="glass-card rounded-3xl overflow-hidden border border-charcoal/5 shadow-2xl">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-white/5">
                <thead class="bg-cream-darker/50 ">
                    <tr class="text-[10px] font-bold uppercase tracking-wider text-muted">
                        <th class="px-6 py-4 text-left">Rank</th>
                        <th class="px-6 py-4 text-left">Name</th>
                        <th class="px-6 py-4 text-left">Compiled XP</th>
                        <th class="px-6 py-4 text-left">Progress Rank</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 bg-cream-dark/30 text-xs text-slate-350">
                    @foreach($topStudents as $index => $student)
                    @php
                        $rank = (($topStudents->currentPage() - 1) * $topStudents->perPage()) + $index + 1;
                    @endphp
                    <tr class="hover:bg-cream-dark/[0.01] transition-all duration-150">
                        <td class="px-6 py-4 whitespace-nowrap font-bold">
                            @if($rank == 1) 
                                <span class="text-charcoal/70 font-bold">#1</span>
                            @elseif($rank == 2) 
                                <span class="text-charcoal/70 font-bold">#2</span>
                            @elseif($rank == 3) 
                                <span class="text-charcoal/70 font-bold">#3</span>
                            @else 
                                <span class="text-charcoal/70 font-bold">#{{ $rank }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-cream-darker flex items-center justify-center text-[10px] font-extrabold text-charcoal ">
                                    {{ substr($student->name,0,1) }}
                                </div>
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('portfolio.show', $student->portfolioSlug()) }}" class="font-bold text-charcoal text-sm hover:underline hover:text-cyan-400">{{ $student->name }}</a>
                                    @if($student->role !== 'student' && $student->role)
                                        @if($student->role === 'admin')
                                            <span class="inline-flex items-center gap-1 bg-amber-500/10 border border-amber-500/30 text-amber-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-amber-500/10"><i class="fas fa-shield-alt text-[7px]"></i> Admin</span>
                                        @elseif($student->role === 'president')
                                            <span class="inline-flex items-center gap-1 bg-purple-500/10 border border-purple-500/30 text-purple-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-purple-500/10"><i class="fas fa-crown text-[7px]"></i> President</span>
                                        @elseif($student->role === 'secretary')
                                            <span class="inline-flex items-center gap-1 bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-cyan-500/10"><i class="fas fa-signature text-[7px]"></i> Secretary</span>
                                        @elseif($student->role === 'treasurer')
                                            <span class="inline-flex items-center gap-1 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-emerald-500/10"><i class="fas fa-coins text-[7px]"></i> Treasurer</span>
                                        @elseif($student->role === 'media_manager')
                                            <span class="inline-flex items-center gap-1 bg-rose-500/10 border border-rose-500/30 text-rose-400 font-extrabold uppercase tracking-wider text-[8px] px-1.5 py-0.2 rounded-full shadow shadow-rose-500/10"><i class="fas fa-photo-video text-[7px]"></i> Media Manager</span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap font-extrabold text-purple-400">{{ $student->xp }} XP</td>
                        <td class="px-6 py-4 whitespace-nowrap text-muted font-bold uppercase tracking-wide">Level {{ floor($student->xp / 100) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="mt-6">
        {{ $topStudents->links() }}
    </div>
</div>
@endsection




