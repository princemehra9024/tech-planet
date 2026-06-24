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
            --color-cream: #ffffff;
            --color-cream-dark: #f9f9f9;
            --color-cream-darker: #f0f0f0;
            --color-charcoal: #000000;
            --color-charcoal-light: #1a1a1a;
            --color-charcoal-lighter: #333333;
            --color-warm: #000000;
            --color-warm-light: #333333;
            --color-warm-lighter: #666666;
            --color-warm-dark: #000000;
            --color-sage: #888888;
            --color-sage-light: #aaaaaa;
            --color-sage-dark: #555555;
            --color-muted: #999999;
        }

        html.dark {
            --color-cream: #000000;
            --color-cream-dark: #0a0a0a;
            --color-cream-darker: #141414;
            --color-charcoal: #ffffff;
            --color-charcoal-light: #e5e5e5;
            --color-charcoal-lighter: #cccccc;
            --color-warm: #ffffff;
            --color-warm-light: #eeeeee;
            --color-warm-lighter: #cccccc;
            --color-warm-dark: #ffffff;
            --color-sage: #888888;
            --color-sage-light: #aaaaaa;
            --color-sage-dark: #555555;
            --color-muted: #777777;
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
            background: color-mix(in srgb, var(--color-cream-dark) 80%, transparent);
            border: 1px solid color-mix(in srgb, var(--color-charcoal) 10%, transparent);
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
    <div class="flex-1 flex flex-col md:flex-row overflow-hidden w-full">
        <!-- Desktop Sidebar Nav -->
        <aside class="hidden md:flex md:w-64 flex-col bg-cream-darker/50 glass-card border-r border-charcoal/5 p-6 h-full shrink-0 justify-between z-30">
            <div class="space-y-8 overflow-y-auto no-scrollbar">
                <!-- Brand logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-cream-darker flex items-center justify-center shadow-lg shadow-purple-500/15">
                        <i class="fas fa-user-graduate text-charcoal text-xs"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-lg font-bold text-black dark:text-white font-display leading-none tracking-widest uppercase">Tech Planet</span>
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
                    <a href="{{ route('student.dashboard') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all {{ request()->routeIs('student.dashboard') ? 'bg-black text-white dark:bg-white dark:text-black shadow-md' : 'text-muted hover:bg-charcoal/5 hover:text-charcoal/80 ' }}">
                        <i class="fas fa-th-large w-5 text-center"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('student.events') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all {{ request()->routeIs('student.events') ? 'bg-black text-white dark:bg-white dark:text-black shadow-md' : 'text-muted hover:bg-charcoal/5 hover:text-charcoal/80 ' }}">
                        <i class="fas fa-calendar-alt w-5 text-center"></i>
                        <span>Events</span>
                    </a>
                    <a href="{{ route('student.coding-arena') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all {{ request()->routeIs('student.coding-arena') || request()->routeIs('student.quiz.*') ? 'bg-black text-white dark:bg-white dark:text-black shadow-md' : 'text-muted hover:bg-charcoal/5 hover:text-charcoal/80 ' }}">
                        <i class="fas fa-code w-5 text-center"></i>
                        <span>Coding Arena</span>
                    </a>
                    <a href="{{ route('student.leaderboard') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all {{ request()->routeIs('student.leaderboard') ? 'bg-black text-white dark:bg-white dark:text-black shadow-md' : 'text-muted hover:bg-charcoal/5 hover:text-charcoal/80 ' }}">
                        <i class="fas fa-trophy w-5 text-center"></i>
                        <span>Leaderboard</span>
                    </a>
                    <a href="{{ route('student.profile') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-sm font-semibold transition-all {{ request()->routeIs('student.profile') ? 'bg-black text-white dark:bg-white dark:text-black shadow-md' : 'text-muted hover:bg-charcoal/5 hover:text-charcoal/80 ' }}">
                        <i class="fas fa-user-circle w-5 text-center"></i>
                        <span>Profile</span>
                    </a>
                    @php $unreadCount = auth()->user()->userNotifications()->where('is_read', false)->count(); @endphp
                    <a href="{{ route('student.notifications') }}" class="flex items-center justify-between rounded-xl px-4 py-3 text-sm font-semibold transition-all {{ request()->routeIs('student.notifications') ? 'bg-black text-white dark:bg-white dark:text-black shadow-md' : 'text-muted hover:bg-charcoal/5 hover:text-charcoal/80 ' }}">
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
                <span class="text-lg font-bold text-black dark:text-white font-display leading-none tracking-widest uppercase">Tech Planet</span>
            </div>
            <button id="mobile-toggle-sidebar" class="text-black dark:text-white hover:text-gray-500 focus:outline-none transition">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </header>

        <!-- Mobile Drawer Overlay -->
        <div id="mobile-sidebar-overlay" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-sm transition-opacity duration-300 opacity-0 pointer-events-none md:hidden"></div>

        <!-- Mobile Drawer Menu -->
        <div id="mobile-sidebar" class="fixed inset-y-0 left-0 z-50 w-[280px] max-w-[80vw] bg-white dark:bg-[#0a0a0a] border-r border-gray-200 dark:border-gray-900 flex flex-col justify-between transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden shadow-2xl overflow-y-auto">
            <div class="p-6 space-y-8">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-black dark:text-white text-xs"><i class="fas fa-user-graduate"></i></div>
                        <span class="text-lg font-bold text-black dark:text-white font-display uppercase tracking-widest">Tech Planet</span>
                    </div>
                    <button id="mobile-close-sidebar" class="text-black dark:text-white hover:text-gray-500 text-2xl p-2 -mr-2"><i class="fas fa-times"></i></button>
                </div>
                <nav class="space-y-2">
                    <a href="{{ route('student.dashboard') }}" class="block px-4 py-3 rounded-xl font-semibold text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors">Dashboard</a>
                    <a href="{{ route('student.events') }}" class="block px-4 py-3 rounded-xl font-semibold text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors">Events</a>
                    <a href="{{ route('student.coding-arena') }}" class="block px-4 py-3 rounded-xl font-semibold text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors">Coding Arena</a>
                    <a href="{{ route('student.leaderboard') }}" class="block px-4 py-3 rounded-xl font-semibold text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors">Leaderboard</a>
                    <a href="{{ route('student.profile') }}" class="block px-4 py-3 rounded-xl font-semibold text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors">Profile</a>
                    <a href="{{ route('student.notifications') }}" class="flex justify-between items-center px-4 py-3 rounded-xl font-semibold text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors">
                        <span>Notifications</span>
                        @if($unreadCount) <span class="bg-black text-white dark:bg-white dark:text-black text-[10px] font-bold rounded-full px-2 py-0.5">{{ $unreadCount }}</span> @endif
                    </a>
                    @if(auth()->user()->role !== 'student' && auth()->user()->role)
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-xl font-semibold text-black dark:text-white bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 mt-4 transition-colors">Admin Panel</a>
                    @endif
                </nav>
            </div>
            <div class="p-6 border-t border-gray-100 dark:border-gray-900">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center space-x-3 rounded-xl py-3 text-red-600 bg-red-50 hover:bg-red-100 dark:bg-red-950/30 dark:hover:bg-red-950/50 dark:text-red-400 transition-colors font-semibold"><i class="fas fa-sign-out-alt"></i><span>Logout</span></button>
                </form>
            </div>
        </div>
        <!-- Main Content Area -->
        <div class="flex-grow flex flex-col min-w-0 overflow-y-auto h-full">
            <div class="w-full mx-auto px-0 md:px-6 lg:px-8 py-0 md:py-8">
                <div class="flex flex-col lg:flex-row gap-0 lg:gap-8">
                    <!-- Main Content -->
                    <main class="flex-grow min-w-0 w-full">
                        @yield('content')
                    </main>

                    <!-- Right Sidebar (Hidden on mobile for full width content) -->
                    <aside class="hidden lg:block lg:w-96 shrink-0">
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
            const overlay = document.getElementById('mobile-sidebar-overlay');
            
            function openDrawer() {
                if(overlay) overlay.classList.remove('opacity-0', 'pointer-events-none');
                if(overlay) overlay.classList.add('opacity-100');
                if(drawer) drawer.classList.remove('-translate-x-full');
            }
            
            function closeDrawer() {
                if(overlay) overlay.classList.remove('opacity-100');
                if(overlay) overlay.classList.add('opacity-0', 'pointer-events-none');
                if(drawer) drawer.classList.add('-translate-x-full');
            }
            
            if (toggleBtn) toggleBtn.addEventListener('click', openDrawer);
            if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
            if (overlay) overlay.addEventListener('click', closeDrawer);
        });
    </script>

    <x-share-toast />
    @stack('scripts')
</body>
</html>


