<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Planet Club Admin | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        obsidian: {
                            50: '#f4f5f6',
                            100: '#e9ebed',
                            200: '#c7ccd2',
                            300: '#a5adb7',
                            400: '#627081',
                            500: '#1f324c',
                            600: '#1c2d44',
                            700: '#172639',
                            800: '#131e2e',
                            900: '#0b0d19',
                            950: '#07080f'
                        },
                        cardbg: '#0e1122',
                    },
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                        display: ['Space Grotesk', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * { font-family: 'Outfit', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-display { font-family: 'Space Grotesk', sans-serif; }
        body { background-color: #07080f; color: #cbd5e1; min-height: 100vh; }
        
        .glass-card {
            background: rgba(14, 17, 34, 0.75);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        
        .glass-panel {
            background: rgba(10, 11, 20, 0.5);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .neon-border {
            box-shadow: 0 0 15px rgba(139, 92, 246, 0.05);
            transition: all 0.3s ease;
        }
        .neon-border:hover {
            box-shadow: 0 0 25px rgba(139, 92, 246, 0.18);
            border-color: rgba(139, 92, 246, 0.3);
        }
    </style>
    @stack('styles')
</head>
<body class="antialiased selection:bg-purple-600 selection:text-white">
    @if(session()->has('impersonator_id'))
        <div class="bg-gradient-to-r from-purple-900 via-indigo-950 to-purple-900 border-b border-purple-500/30 text-purple-200 px-6 py-3 flex items-center justify-between gap-4 text-xs font-bold shadow-lg shadow-purple-500/5 relative z-50 w-full">
            <div class="flex items-center gap-2.5">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-purple-500"></span>
                </span>
                <span>Impersonation Active: You are logged in as <span class="text-white underline">{{ auth()->user()->name }}</span> ({{ ucfirst(auth()->user()->role) }})</span>
            </div>
            <form method="POST" action="{{ route('student.stop-impersonating') }}">
                @csrf
                <button type="submit" class="bg-white/10 hover:bg-white/20 border border-white/20 hover:border-white/30 text-white font-bold px-3 py-1 rounded-lg transition text-[10px] uppercase tracking-wider flex items-center gap-1.5 shadow-sm">
                    <i class="fas fa-sign-out-alt"></i> Return to Admin
                </button>
            </form>
        </div>
    @endif
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Sidebar -->
        <aside class="w-full md:w-72 bg-[#0e1122]/90 border-r border-white/5 p-6 shrink-0">
            <div class="mb-8">
                <div class="flex items-center space-x-3 mb-2">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-yellow-500 to-purple-600 flex items-center justify-center shadow-lg">
                        <i class="fas fa-shield-alt text-white text-sm"></i>
                    </div>
                    <div class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-purple-400">Tech Admin</div>
                </div>
                <p class="text-xs text-slate-400">Command Center: Manage activities, assessments, and students.</p>
            </div>
            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-slate-300 hover:bg-white/5 hover:text-white transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-white/5 text-white border-l-4 border-purple-500' : '' }}">
                    <i class="fas fa-chart-pie w-5 text-purple-400"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.posts.index') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-slate-300 hover:bg-white/5 hover:text-white transition-all {{ request()->routeIs('admin.posts.*') ? 'bg-white/5 text-white border-l-4 border-purple-500' : '' }}">
                    <i class="fas fa-bullhorn w-5 text-purple-400"></i>
                    <span>Posts</span>
                </a>
                @if(auth()->user()->role !== 'media_manager')
                <a href="{{ route('admin.quizzes.index') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-slate-300 hover:bg-white/5 hover:text-white transition-all {{ request()->routeIs('admin.quizzes.*') || request()->routeIs('admin.questions.*') ? 'bg-white/5 text-white border-l-4 border-purple-500' : '' }}">
                    <i class="fas fa-laptop-code w-5 text-purple-400"></i>
                    <span>Quizzes</span>
                </a>
                <a href="{{ route('admin.users.index') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-slate-300 hover:bg-white/5 hover:text-white transition-all {{ request()->routeIs('admin.users.*') ? 'bg-white/5 text-white border-l-4 border-purple-500' : '' }}">
                    <i class="fas fa-users-cog w-5 text-purple-400"></i>
                    <span>Users</span>
                </a>
                <a href="{{ route('admin.suggestions.index') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-slate-300 hover:bg-white/5 hover:text-white transition-all {{ request()->routeIs('admin.suggestions.*') ? 'bg-white/5 text-white border-l-4 border-purple-500' : '' }}">
                    <i class="fas fa-vote-yea w-5 text-purple-400"></i>
                    <span>Suggestions & Votes</span>
                </a>
                <a href="{{ route('admin.events.index') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-slate-300 hover:bg-white/5 hover:text-white transition-all {{ request()->routeIs('admin.events.*') ? 'bg-white/5 text-white border-l-4 border-purple-500' : '' }}">
                    <i class="fas fa-calendar-alt w-5 text-purple-400"></i>
                    <span>Events</span>
                </a>
                @endif
                <a href="{{ route('student.dashboard') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-slate-300 hover:bg-white/5 hover:text-white transition-all mt-8 border border-white/10">
                    <i class="fas fa-user-graduate w-5 text-blue-400"></i>
                    <span>Student Portal</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="mt-6 pt-4 border-t border-white/5">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 rounded-xl px-4 py-3 bg-red-950/20 text-red-400 hover:bg-red-900/20 transition-all">
                        <i class="fas fa-sign-out-alt w-5 text-red-500"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 md:p-8 min-w-0">
            @if(session('success'))
                <div class="mb-6 rounded-2xl bg-emerald-950/40 border border-emerald-500/30 text-emerald-300 px-5 py-4 flex items-center gap-3">
                    <i class="fas fa-check-circle text-emerald-400"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 rounded-2xl bg-rose-950/40 border border-rose-500/30 text-rose-300 px-5 py-4 flex items-center gap-3">
                    <i class="fas fa-exclamation-circle text-rose-400"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>
</html>
