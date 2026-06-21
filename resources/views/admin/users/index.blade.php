@extends('layouts.admin')
@section('title', 'Users')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-extrabold text-charcoal font-display">User Management</h1>
    <p class="text-sm text-muted mt-1">View registered student accounts and update access levels.</p>
</div>

<div class="glass-card rounded-2xl overflow-hidden border border-charcoal/5 shadow-2xl">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-white/5">
            <thead class="bg-cream-darker/50 ">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-muted uppercase tracking-wider">Name</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-muted uppercase tracking-wider">Email Address</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-muted uppercase tracking-wider">Course</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-muted uppercase tracking-wider">Semester</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-muted uppercase tracking-wider">Role</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-muted uppercase tracking-wider">Joined Date</th>
                    <th class="px-6 py-4 text-right text-xs font-bold text-muted uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5 bg-cream-dark/30 ">
                @foreach($users as $user)
                <tr class="hover:bg-charcoal/5 transition duration-150">
                    <td class="px-6 py-4 text-sm font-semibold text-charcoal/80 ">{{ $user->name }}</td>
                    <td class="px-6 py-4 text-sm font-semibold text-muted">{{ $user->email }}</td>
                    <td class="px-6 py-4 text-sm font-semibold text-charcoal/70 ">{{ $user->course ?? 'N/A' }}</td>
                    <td class="px-6 py-4 text-sm font-semibold text-charcoal/70 ">
                        @if(is_numeric($user->semester))
                            Sem {{ $user->semester }}
                        @else
                            {{ $user->semester ?? 'N/A' }}
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($user->role === 'admin')
                            <span class="inline-flex items-center rounded-lg bg-amber-500/10 border border-amber-500/30 text-amber-400 px-2.5 py-1 text-xs font-semibold shadow shadow-amber-500/5">
                                {{ ucfirst($user->role) }}
                            </span>
                        @elseif($user->role === 'president')
                            <span class="inline-flex items-center rounded-lg bg-purple-500/10 border border-purple-500/30 text-purple-400 px-2.5 py-1 text-xs font-semibold shadow shadow-purple-500/5">
                                {{ ucfirst($user->role) }}
                            </span>
                        @elseif($user->role === 'secretary')
                            <span class="inline-flex items-center rounded-lg bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 px-2.5 py-1 text-xs font-semibold shadow shadow-cyan-500/5">
                                {{ ucfirst($user->role) }}
                            </span>
                        @elseif($user->role === 'treasurer')
                            <span class="inline-flex items-center rounded-lg bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 px-2.5 py-1 text-xs font-semibold shadow shadow-emerald-500/5">
                                {{ ucfirst($user->role) }}
                            </span>
                        @elseif($user->role === 'media_manager')
                            <span class="inline-flex items-center rounded-lg bg-rose-500/10 border border-rose-500/30 text-rose-400 px-2.5 py-1 text-xs font-semibold shadow shadow-rose-500/5">
                                Media Manager
                            </span>
                        @else
                            <span class="inline-flex items-center rounded-lg bg-charcoal/5 border border-charcoal/5 px-2.5 py-1 text-xs font-semibold text-muted">
                                Student
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-muted">{{ $user->created_at->format('M d, Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-xs">
                        @if(auth()->user()->role === 'admin')
                            <form method="POST" action="{{ route('admin.users.update', $user) }}" class="inline-flex items-center gap-2">
                                @csrf
                                @method('PATCH')
                                <select name="role" class="bg-cream-dark/50 border border-charcoal/10 rounded-xl px-2.5 py-1.5 text-xs text-charcoal/80 focus:outline-none focus:ring-1 focus:ring-purple-500">
                                    <option value="student" {{ $user->role === 'student' ? 'selected' : '' }}>Student</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="president" {{ $user->role === 'president' ? 'selected' : '' }}>President</option>
                                    <option value="secretary" {{ $user->role === 'secretary' ? 'selected' : '' }}>Secretary</option>
                                    <option value="treasurer" {{ $user->role === 'treasurer' ? 'selected' : '' }}>Treasurer</option>
                                    <option value="media_manager" {{ $user->role === 'media_manager' ? 'selected' : '' }}>Media Manager</option>
                                </select>
                                <button type="submit" class="bg-blue-955/20 border border-blue-500/30 text-blue-400 hover:bg-blue-900/20 px-3 py-1.5 rounded-xl font-bold transition">Update</button>
                            </form>
                            @if($user->id !== auth()->id())
                                <form method="POST" action="{{ route('admin.users.impersonate', $user) }}" class="inline-block ml-1">
                                    @csrf
                                    <button type="submit" class="bg-purple-955/20 border border-purple-500/30 text-purple-400 hover:bg-purple-900/20 px-3 py-1.5 rounded-xl font-bold transition flex items-center gap-1">
                                        <i class="fas fa-user-secret text-[10px]"></i> Login As
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline-block ml-1" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-rose-955/20 border border-rose-500/30 text-rose-400 hover:bg-rose-900/20 px-3 py-1.5 rounded-xl font-bold transition">Delete</button>
                                </form>
                            @endif
                        @else
                            <span class="text-muted italic font-semibold">No Actions Allowed</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


