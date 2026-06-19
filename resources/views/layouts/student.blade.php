<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Planet Club | @yield('title')</title>
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
        body { 
            background-color: #07080f; 
            background-image: 
                radial-gradient(rgba(139, 92, 246, 0.04) 1px, transparent 0),
                radial-gradient(rgba(6, 182, 212, 0.04) 1px, transparent 0);
            background-size: 40px 40px;
            background-position: 0 0, 20px 20px;
            color: #cbd5e1; 
            min-height: 100vh; 
        }
        
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
        <div class="bg-gradient-to-r from-purple-900 via-indigo-950 to-purple-900 border-b border-purple-500/30 text-purple-200 px-6 py-3 flex items-center justify-between gap-4 text-xs font-bold shadow-lg shadow-purple-500/5 relative z-50">
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
        <!-- Desktop Sidebar Nav -->
        <aside class="hidden md:flex md:w-64 flex-col bg-[#0e1122]/90 border-r border-white/5 p-6 h-screen sticky top-0 shrink-0 justify-between z-30">
            <div class="space-y-8">
                <!-- Brand logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-cyan-500 to-purple-600 flex items-center justify-center shadow-lg shadow-purple-500/15">
                        <i class="fas fa-user-graduate text-white text-xs"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-lg font-bold bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent font-display leading-none">Tech Planet</span>
                        <span class="text-[9px] uppercase tracking-wider text-slate-400 mt-1 font-semibold">Student Portal</span>
                    </div>
                </div>

                <!-- Nav Items -->
                <nav class="space-y-1.5">
                    <a href="{{ route('student.dashboard') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all {{ request()->routeIs('student.dashboard') ? 'bg-purple-600/10 text-purple-400 border border-purple-800/20' : 'text-slate-400 hover:bg-white/5 hover:text-slate-200' }}">
                        <i class="fas fa-th-large w-5 text-center"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('student.events') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all {{ request()->routeIs('student.events') ? 'bg-purple-600/10 text-purple-400 border border-purple-800/20' : 'text-slate-400 hover:bg-white/5 hover:text-slate-200' }}">
                        <i class="fas fa-calendar-alt w-5 text-center"></i>
                        <span>Events</span>
                    </a>
                    <a href="{{ route('student.coding-arena') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all {{ request()->routeIs('student.coding-arena') || request()->routeIs('student.quiz.*') ? 'bg-purple-600/10 text-purple-400 border border-purple-800/20' : 'text-slate-400 hover:bg-white/5 hover:text-slate-200' }}">
                        <i class="fas fa-code w-5 text-center"></i>
                        <span>Coding Arena</span>
                    </a>
                    <a href="{{ route('student.leaderboard') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all {{ request()->routeIs('student.leaderboard') ? 'bg-purple-600/10 text-purple-400 border border-purple-800/20' : 'text-slate-400 hover:bg-white/5 hover:text-slate-200' }}">
                        <i class="fas fa-trophy w-5 text-center"></i>
                        <span>Leaderboard</span>
                    </a>
                    <a href="{{ route('student.profile') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all {{ request()->routeIs('student.profile') ? 'bg-purple-600/10 text-purple-400 border border-purple-800/20' : 'text-slate-400 hover:bg-white/5 hover:text-slate-200' }}">
                        <i class="fas fa-user-circle w-5 text-center"></i>
                        <span>Profile</span>
                    </a>
                    @php $unreadCount = auth()->user()->userNotifications()->where('is_read', false)->count(); @endphp
                    <a href="{{ route('student.notifications') }}" class="flex items-center justify-between rounded-xl px-4 py-3 text-sm font-semibold transition-all {{ request()->routeIs('student.notifications') ? 'bg-purple-600/10 text-purple-400 border border-purple-800/20' : 'text-slate-400 hover:bg-white/5 hover:text-slate-200' }}">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-bell w-5 text-center"></i>
                            <span>Notifications</span>
                        </div>
                        @if($unreadCount)
                            <span class="bg-red-500 text-white text-[10px] font-bold rounded-full px-2 py-0.5 animate-pulse">{{ $unreadCount }}</span>
                        @endif
                    </a>
                    @if(auth()->user()->role !== 'student' && auth()->user()->role)
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-sm font-semibold text-yellow-500 hover:bg-white/5 hover:text-yellow-400 transition-all border border-yellow-500/10 mt-6">
                            <i class="fas fa-shield-alt w-5 text-center"></i>
                            <span>Admin Panel</span>
                        </a>
                    @endif
                </nav>
            </div>
            
            <form method="POST" action="{{ route('logout') }}" class="pt-4 border-t border-white/5">
                @csrf
                <button type="submit" class="w-full flex items-center space-x-3 rounded-xl px-4 py-3 text-sm font-semibold text-red-400 hover:bg-red-950/20 hover:text-red-300 transition-all">
                    <i class="fas fa-sign-out-alt w-5 text-center"></i>
                    <span>Logout</span>
                </button>
            </form>
        </aside>

        <!-- Mobile Header -->
        <header class="md:hidden flex justify-between items-center h-16 bg-[#0e1122]/90 border-b border-white/5 px-6 sticky top-0 z-40 backdrop-blur-md">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-cyan-500 to-purple-600 flex items-center justify-center shadow-lg">
                    <i class="fas fa-user-graduate text-white text-xs"></i>
                </div>
                <span class="text-lg font-bold bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent font-display leading-none">Tech Planet</span>
            </div>
            <button id="mobile-toggle-sidebar" class="text-slate-400 hover:text-cyan-400 focus:outline-none transition">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </header>

        <!-- Mobile Drawer Menu -->
        <div id="mobile-sidebar" class="hidden md:hidden fixed inset-0 z-50 bg-obsidian-950/95 backdrop-blur-md p-6 flex flex-col justify-between">
            <div class="space-y-8">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-cyan-500 to-purple-600 flex items-center justify-center text-white text-xs"><i class="fas fa-user-graduate"></i></div>
                        <span class="text-lg font-bold bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">Tech Planet</span>
                    </div>
                    <button id="mobile-close-sidebar" class="text-slate-400 hover:text-cyan-400 text-2xl"><i class="fas fa-times"></i></button>
                </div>
                <nav class="space-y-2">
                    <a href="{{ route('student.dashboard') }}" class="block px-4 py-3 rounded-xl font-semibold text-slate-300 hover:bg-white/5">Dashboard</a>
                    <a href="{{ route('student.events') }}" class="block px-4 py-3 rounded-xl font-semibold text-slate-300 hover:bg-white/5">Events</a>
                    <a href="{{ route('student.coding-arena') }}" class="block px-4 py-3 rounded-xl font-semibold text-slate-300 hover:bg-white/5">Coding Arena</a>
                    <a href="{{ route('student.leaderboard') }}" class="block px-4 py-3 rounded-xl font-semibold text-slate-300 hover:bg-white/5">Leaderboard</a>
                    <a href="{{ route('student.profile') }}" class="block px-4 py-3 rounded-xl font-semibold text-slate-300 hover:bg-white/5">Profile</a>
                    <a href="{{ route('student.notifications') }}" class="block px-4 py-3 rounded-xl font-semibold text-slate-300 hover:bg-white/5 flex justify-between items-center">
                        <span>Notifications</span>
                        @if($unreadCount) <span class="bg-red-500 text-white text-xs rounded-full px-2 py-0.5">{{ $unreadCount }}</span> @endif
                    </a>
                    @if(auth()->user()->role !== 'student' && auth()->user()->role)
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-xl font-semibold text-yellow-500 hover:bg-white/5">Admin Panel</a>
                    @endif
                </nav>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center space-x-3 rounded-xl py-3 text-red-400 bg-red-955/10 border border-red-955/20 font-semibold"><i class="fas fa-sign-out-alt"></i><span>Logout</span></button>
            </form>
        </div>

        <!-- Main Content Area -->
        <div class="flex-grow flex flex-col min-w-0">
            <div class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Main Content -->
                    <main class="flex-grow min-w-0">
                        @yield('content')
                    </main>

                    <!-- Right Sidebar -->
                    <aside class="lg:w-80 w-full shrink-0">
                        @include('students.partials.sidebar')
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <!-- Toggle Drawer JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('mobile-toggle-sidebar');
            const closeBtn = document.getElementById('mobile-close-sidebar');
            const drawer = document.getElementById('mobile-sidebar');
            if (toggleBtn && drawer) {
                toggleBtn.addEventListener('click', () => drawer.classList.remove('hidden'));
            }
            if (closeBtn && drawer) {
                closeBtn.addEventListener('click', () => drawer.classList.add('hidden'));
            }
        });
    </script>

    <x-share-toast />
    @stack('scripts')
</body>
</html>