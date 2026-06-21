@extends('layouts.admin')

@section('title', 'Event Suggestions & Votes')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-display font-bold text-charcoal mb-2">Event Suggestions & Votes</h1>
    <p class="text-muted">Review community suggestions and monitor voting activity.</p>
</div>

<div class="space-y-6">
    @foreach($suggestions as $suggestion)
        @php
            $totalVotes = $suggestion->votes->count();
            $supportCount = $suggestion->votes->where('vote', 'support')->count();
            $neutralCount = $suggestion->votes->where('vote', 'neutral')->count();
            $rejectCount = $suggestion->votes->where('vote', 'reject')->count();
            
            $supportPercent = $totalVotes > 0 ? round(($supportCount / $totalVotes) * 100) : 0;
            $neutralPercent = $totalVotes > 0 ? round(($neutralCount / $totalVotes) * 100) : 0;
            $rejectPercent = $totalVotes > 0 ? round(($rejectCount / $totalVotes) * 100) : 0;
        @endphp
        <div class="glass-card rounded-2xl p-6">
            <div class="flex flex-col md:flex-row justify-between items-start gap-4 mb-4">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <h3 class="text-xl font-bold text-charcoal ">{{ $suggestion->title }}</h3>
                        @if($suggestion->status == 'pending')
                            <span class="bg-yellow-500/20 text-yellow-400 text-xs px-2 py-1 rounded-full font-bold border border-yellow-500/30">Pending</span>
                        @elseif($suggestion->status == 'approved')
                            <span class="bg-emerald-500/20 text-emerald-400 text-xs px-2 py-1 rounded-full font-bold border border-emerald-500/30">Approved for Voting</span>
                        @elseif($suggestion->status == 'dismissed')
                            <span class="bg-rose-500/20 text-rose-400 text-xs px-2 py-1 rounded-full font-bold border border-rose-500/30">Dismissed</span>
                        @elseif($suggestion->status == 'published')
                            <span class="bg-purple-500/20 text-purple-400 text-xs px-2 py-1 rounded-full font-bold border border-purple-500/30">Published</span>
                        @endif
                    </div>
                    <p class="text-sm text-muted">Suggested by <span class="text-charcoal ">{{ $suggestion->name }}</span> ({{ $suggestion->email }}) on {{ $suggestion->created_at->format('M d, Y') }}</p>
                    @if($suggestion->suggested_date)
                        <p class="text-sm text-purple-400 mt-1"><i class="fas fa-calendar-day mr-1"></i> Suggested Date: {{ \Carbon\Carbon::parse($suggestion->suggested_date)->format('M d, Y') }}</p>
                    @endif
                </div>
                <div class="flex gap-2">
                    @if($suggestion->status == 'pending')
                        <form action="{{ route('admin.suggestions.update-status', $suggestion->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="approved">
                            <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-charcoal px-4 py-2 rounded-xl text-sm font-bold transition">Approve for Voting</button>
                        </form>
                        <form action="{{ route('admin.suggestions.update-status', $suggestion->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="dismissed">
                            <button type="submit" class="bg-rose-600/50 hover:bg-rose-500 text-charcoal px-4 py-2 rounded-xl text-sm font-bold transition border border-rose-500/30">Dismiss</button>
                        </form>
                    @elseif($suggestion->status == 'approved')
                        <div class="flex gap-2">
                            <a href="{{ route('admin.suggestions.publish', $suggestion->id) }}" class="bg-purple-600 hover:bg-purple-500 text-charcoal px-4 py-2 rounded-xl text-sm font-bold transition shadow-lg shadow-purple-500/20">Publish Event</a>
                            <form action="{{ route('admin.suggestions.update-status', $suggestion->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="dismissed">
                                <button type="submit" class="bg-rose-600/50 hover:bg-rose-500 text-charcoal px-4 py-2 rounded-xl text-sm font-bold transition border border-rose-500/30">Dismiss</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
            
            <p class="text-charcoal/70 mb-6 bg-charcoal/5 p-4 rounded-xl border border-charcoal/10 ">{{ $suggestion->description }}</p>
            
            @if($suggestion->status == 'approved')
                <div class="mt-4 border-t border-charcoal/10 pt-4">
                    <h4 class="text-sm font-bold text-charcoal mb-3">Voting Results ({{ $totalVotes }} total votes)</h4>
                    
                    <div class="space-y-3">
                        <!-- Support -->
                        <div>
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-emerald-400 font-bold"><i class="fas fa-thumbs-up mr-1"></i> Support ({{ $supportCount }})</span>
                                <span class="text-emerald-400">{{ $supportPercent }}%</span>
                            </div>
                            <div class="w-full bg-charcoal/5 rounded-full h-2">
                                <div class="bg-emerald-500 h-2 rounded-full" style="width: {{ $supportPercent }}%"></div>
                            </div>
                        </div>
                        
                        <!-- Neutral -->
                        <div>
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-yellow-400 font-bold"><i class="fas fa-meh mr-1"></i> Neutral ({{ $neutralCount }})</span>
                                <span class="text-yellow-400">{{ $neutralPercent }}%</span>
                            </div>
                            <div class="w-full bg-charcoal/5 rounded-full h-2">
                                <div class="bg-yellow-500 h-2 rounded-full" style="width: {{ $neutralPercent }}%"></div>
                            </div>
                        </div>
                        
                        <!-- Reject -->
                        <div>
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-rose-400 font-bold"><i class="fas fa-thumbs-down mr-1"></i> Reject ({{ $rejectCount }})</span>
                                <span class="text-rose-400">{{ $rejectPercent }}%</span>
                            </div>
                            <div class="w-full bg-charcoal/5 rounded-full h-2">
                                <div class="bg-rose-500 h-2 rounded-full" style="width: {{ $rejectPercent }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endforeach
    
    @if($suggestions->isEmpty())
        <div class="glass-card rounded-2xl p-12 text-center">
            <div class="w-16 h-16 bg-charcoal/5 rounded-full flex items-center justify-center mx-auto mb-4 border border-charcoal/10 ">
                <i class="fas fa-inbox text-2xl text-muted"></i>
            </div>
            <h3 class="text-xl font-bold text-charcoal mb-2">No Suggestions Yet</h3>
            <p class="text-muted">When students submit event suggestions, they will appear here.</p>
        </div>
    @endif
</div>
@endsection


