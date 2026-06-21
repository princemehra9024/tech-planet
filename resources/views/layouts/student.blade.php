<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Planet Club | @yield('title')</title>
    <!-- Tailwind CSS + Google Fonts + Font Awesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        cream: { DEFAULT: 'var(--color-cream)', dark: 'var(--color-cream-dark)', darker: 'var(--color-cream-darker)' },
                        charcoal: { DEFAULT: 'var(--color-charcoal)', light: 'var(--color-charcoal-light)', lighter: 'var(--color-charcoal-lighter)' },
                        warm: { DEFAULT: 'var(--color-warm)', light: 'var(--color-warm-light)', lighter: 'var(--color-warm-lighter)', dark: 'var(--color-warm-dark)' },
                        sage: { DEFAULT: 'var(--color-sage)', light: 'var(--color-sage-light)', dark: 'var(--color-sage-dark)' },
                        muted: 'var(--color-muted)',
                    },
                    fontFamily: {
                        sans: ['DM Sans', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                    },
                    borderRadius: {
                        '4xl': '2rem',
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --color-cream: #F5F0E8;
            --color-cream-dark: #EDE7D9;
            --color-cream-darker: #E0D8C8;
            --color-charcoal: #1A1A1A;
            --color-charcoal-light: #2D2D2D;
            --color-charcoal-lighter: #3D3D3D;
            --color-warm: #000000;
            --color-warm-light: #333333;
            --color-warm-lighter: #666666;
            --color-warm-dark: #000000;
            --color-sage: #7A8B6F;
            --color-sage-light: #95A888;
            --color-sage-dark: #5E6D54;
            --color-muted: #6B6B6B;
        }

        html.dark {
            --color-cream: #09090b;
            --color-cream-dark: #18181b;
            --color-cream-darker: #27272a;
            --color-charcoal: #fafafa;
            --color-charcoal-light: #e4e4e7;
            --color-charcoal-lighter: #a1a1aa;
            --color-warm: #FFFFFF;
            --color-warm-light: #E0E0E0;
            --color-warm-lighter: #CCCCCC;
            --color-warm-dark: #FFFFFF;
            --color-sage: #5E6D54;
            --color-sage-light: #7A8B6F;
            --color-sage-dark: #95A888;
            --color-muted: #A0A0A0;
        }

        * { font-family: 'DM Sans', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-display { font-family: 'Outfit', sans-serif; }
        
        body { 
            background-color: var(--color-cream); 
            color: var(--color-charcoal);
            scroll-behavior: smooth;
        }

        /* Glassmorphism */
        .glass {
            background: color-mix(in srgb, var(--color-cream) 75%, transparent);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        .glass-dark {
            background: color-mix(in srgb, var(--color-charcoal) 85%, transparent);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: var(--color-cream); }
        ::-webkit-scrollbar-thumb { background: var(--color-warm-light); border-radius: 99px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--color-warm); }
        
        /* Card hover lift */
        .card-lift {
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .card-lift:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.08);
        }
        html.dark .card-lift:hover { box-shadow: 0 20px 60px rgba(255,255,255,0.03); }

        .glass-card {
            background: color-mix(in srgb, var(--color-cream-dark) 50%, transparent);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid color-mix(in srgb, var(--color-charcoal) 5%, transparent);
        }
        html.dark .glass-card {
            background: color-mix(in srgb, var(--color-charcoal-light) 50%, transparent);
            border: 1px solid color-mix(in srgb, var(--color-cream) 5%, transparent);
        }
        
    </style>
    @stack('styles')
    
    <!-- Dark Mode Init Script -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
        
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                updateThemeIcon('light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                updateThemeIcon('dark');
            }
        }
        
        function updateThemeIcon(theme) {
            const icons = document.querySelectorAll('.theme-icon');
            icons.forEach(icon => {
                if(theme === 'dark') {
                    icon.classList.remove('fa-moon');
                    icon.classList.add('fa-sun');
                } else {
                    icon.classList.remove('fa-sun');
                    icon.classList.add('fa-moon');
                }
            });
        }
        
        document.addEventListener('DOMContentLoaded', () => {
            const currentTheme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
            updateThemeIcon(currentTheme);
        });
    </script>
</head>
<body class="antialiased h-screen flex flex-col transition-colors duration-500 selection:bg-charcoal selection:text-cream dark:selection:bg-cream dark:selection:text-charcoal bg-cream">
    @if(session()->has('impersonator_id'))
        <div class="bg-gradient-to-r from-purple-900 via-indigo-950 to-purple-900 border-b border-purple-500/30 text-purple-200 px-6 py-3 flex items-center justify-between gap-4 text-xs font-bold shadow-lg shadow-purple-500/5 relative z-50 shrink-0">
            <div class="flex items-center gap-2.5">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-purple-500"></span>
                </span>
                <span>Impersonation Active: You are logged in as <span class="text-charcoal underline">{{ auth()->user()->name }}</span> ({{ ucfirst(auth()->user()->role) }})</span>
            </div>
            <form method="POST" action="{{ route('student.stop-impersonating') }}">
                @csrf
                <button type="submit" class="bg-charcoal/10 hover:bg-cream-dark/20 border border-charcoal/20 hover:border-white/30 text-charcoal font-bold px-3 py-1 rounded-lg transition text-[10px] uppercase tracking-wider flex items-center gap-1.5 shadow-sm">
                    <i class="fas fa-sign-out-alt"></i> Return to Admin
                </button>
            </form>
        </div>
    @endif
    <div class="flex-1 flex overflow-hidden w-full">
        <!-- Desktop Sidebar Nav -->
        <aside class="hidden md:flex md:w-64 flex-col bg-cream-darker/50 glass-card border-r border-charcoal/5 p-6 h-full shrink-0 justify-between z-30">
            <div class="space-y-8 overflow-y-auto no-scrollbar">
                <!-- Brand logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-cream-darker flex items-center justify-center shadow-lg shadow-purple-500/15">
                        <i class="fas fa-user-graduate text-charcoal text-xs"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-lg font-bold text-purple-600 dark:text-purple-400 font-display leading-none">Tech Planet</span>
                        <span class="text-[9px] uppercase tracking-wider text-muted mt-1 font-semibold">Student Portal</span>
                    </div>
                </div>

                                <div class="pt-4 mt-2 border-t border-charcoal/5 flex justify-center">
                    <button onclick="toggleTheme()" class="w-10 h-10 rounded-full flex items-center justify-center bg-cream-dark text-charcoal hover:bg-cream-darker transition-colors shadow-sm" aria-label="Toggle Dark Mode">
                        <i class="theme-icon fas fa-moon text-lg"></i>
                    </button>
                </div>
                <!-- Nav Items -->
                <nav class="space-y-1.5">
                    <a href="{{ route('student.dashboard') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all {{ request()->routeIs('student.dashboard') ? 'bg-purple-600/10 text-purple-400 border border-purple-800/20' : 'text-muted hover:bg-charcoal/5 hover:text-charcoal/80 ' }}">
                        <i class="fas fa-th-large w-5 text-center"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('student.events') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all {{ request()->routeIs('student.events') ? 'bg-purple-600/10 text-purple-400 border border-purple-800/20' : 'text-muted hover:bg-charcoal/5 hover:text-charcoal/80 ' }}">
                        <i class="fas fa-calendar-alt w-5 text-center"></i>
                        <span>Events</span>
                    </a>
                    <a href="{{ route('student.coding-arena') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all {{ request()->routeIs('student.coding-arena') || request()->routeIs('student.quiz.*') ? 'bg-purple-600/10 text-purple-400 border border-purple-800/20' : 'text-muted hover:bg-charcoal/5 hover:text-charcoal/80 ' }}">
                        <i class="fas fa-code w-5 text-center"></i>
                        <span>Coding Arena</span>
                    </a>
                    <a href="{{ route('student.leaderboard') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all {{ request()->routeIs('student.leaderboard') ? 'bg-purple-600/10 text-purple-400 border border-purple-800/20' : 'text-muted hover:bg-charcoal/5 hover:text-charcoal/80 ' }}">
                        <i class="fas fa-trophy w-5 text-center"></i>
                        <span>Leaderboard</span>
                    </a>
                    <a href="{{ route('student.profile') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all {{ request()->routeIs('student.profile') ? 'bg-purple-600/10 text-purple-400 border border-purple-800/20' : 'text-muted hover:bg-charcoal/5 hover:text-charcoal/80 ' }}">
                        <i class="fas fa-user-circle w-5 text-center"></i>
                        <span>Profile</span>
                    </a>
                    @php $unreadCount = auth()->user()->userNotifications()->where('is_read', false)->count(); @endphp
                    <a href="{{ route('student.notifications') }}" class="flex items-center justify-between rounded-xl px-4 py-3 text-sm font-semibold transition-all {{ request()->routeIs('student.notifications') ? 'bg-purple-600/10 text-purple-400 border border-purple-800/20' : 'text-muted hover:bg-charcoal/5 hover:text-charcoal/80 ' }}">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-bell w-5 text-center"></i>
                            <span>Notifications</span>
                        </div>
                        @if($unreadCount)
                            <span class="bg-red-500 text-charcoal text-[10px] font-bold rounded-full px-2 py-0.5 animate-pulse">{{ $unreadCount }}</span>
                        @endif
                    </a>
                    @if(auth()->user()->role !== 'student' && auth()->user()->role)
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-sm font-semibold text-yellow-500 hover:bg-charcoal/5 hover:text-yellow-400 transition-all border border-yellow-500/10 mt-6">
                            <i class="fas fa-shield-alt w-5 text-center"></i>
                            <span>Admin Panel</span>
                        </a>
                    @endif
                </nav>
            </div>
            
            <form method="POST" action="{{ route('logout') }}" class="pt-4 border-t border-charcoal/5 ">
                @csrf
                <button type="submit" class="w-full flex items-center space-x-3 rounded-xl px-4 py-3 text-sm font-semibold text-red-400 hover:bg-red-950/20 hover:text-red-300 transition-all">
                    <i class="fas fa-sign-out-alt w-5 text-center"></i>
                    <span>Logout</span>
                </button>
            </form>
        </aside>

        <!-- Mobile Header -->
        <header class="md:hidden flex justify-between items-center h-16 bg-cream-darker/50 glass-card border-b border-charcoal/5 px-6 sticky top-0 z-40 backdrop-blur-md">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-lg bg-cream-darker flex items-center justify-center shadow-lg">
                    <i class="fas fa-user-graduate text-charcoal text-xs"></i>
                </div>
                <span class="text-lg font-bold text-purple-600 dark:text-purple-400 font-display leading-none">Tech Planet</span>
            </div>
            <button id="mobile-toggle-sidebar" class="text-muted hover:text-cyan-400 focus:outline-none transition">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </header>

        <!-- Mobile Drawer Menu -->
        <div id="mobile-sidebar" class="hidden md:hidden fixed inset-0 z-50 bg-cream-darker/95 backdrop-blur-md p-6 flex flex-col justify-between">
            <div class="space-y-8">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-lg bg-cream-darker flex items-center justify-center text-charcoal text-xs"><i class="fas fa-user-graduate"></i></div>
                        <span class="text-lg font-bold text-purple-600 dark:text-purple-400">Tech Planet</span>
                    </div>
                    <button id="mobile-close-sidebar" class="text-muted hover:text-cyan-400 text-2xl"><i class="fas fa-times"></i></button>
                </div>
                <nav class="space-y-2">
                    <a href="{{ route('student.dashboard') }}" class="block px-4 py-3 rounded-xl font-semibold text-charcoal/70 hover:bg-charcoal/5 ">Dashboard</a>
                    <a href="{{ route('student.events') }}" class="block px-4 py-3 rounded-xl font-semibold text-charcoal/70 hover:bg-charcoal/5 ">Events</a>
                    <a href="{{ route('student.coding-arena') }}" class="block px-4 py-3 rounded-xl font-semibold text-charcoal/70 hover:bg-charcoal/5 ">Coding Arena</a>
                    <a href="{{ route('student.leaderboard') }}" class="block px-4 py-3 rounded-xl font-semibold text-charcoal/70 hover:bg-charcoal/5 ">Leaderboard</a>
                    <a href="{{ route('student.profile') }}" class="block px-4 py-3 rounded-xl font-semibold text-charcoal/70 hover:bg-charcoal/5 ">Profile</a>
                    <a href="{{ route('student.notifications') }}" class="block px-4 py-3 rounded-xl font-semibold text-charcoal/70 hover:bg-charcoal/5 flex justify-between items-center">
                        <span>Notifications</span>
                        @if($unreadCount) <span class="bg-red-500 text-charcoal text-xs rounded-full px-2 py-0.5">{{ $unreadCount }}</span> @endif
                    </a>
                    @if(auth()->user()->role !== 'student' && auth()->user()->role)
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-xl font-semibold text-yellow-500 hover:bg-charcoal/5 ">Admin Panel</a>
                    @endif
                </nav>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center space-x-3 rounded-xl py-3 text-red-500 bg-red-500/10 border border-red-500/20 font-semibold"><i class="fas fa-sign-out-alt"></i><span>Logout</span></button>
            </form>
        </div>
        <!-- Main Content Area -->
        <div class="flex-grow flex flex-col min-w-0 overflow-y-auto h-full">
            <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Main Content -->
                    <main class="flex-grow min-w-0">
                        @yield('content')
                    </main>

                    <!-- Right Sidebar -->
                    <aside class="lg:w-96 w-full shrink-0">
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


