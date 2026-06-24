<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Planet Club Admin | @yield('title')</title>
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
        }
        html.dark .glass-card {
            background: color-mix(in srgb, var(--color-charcoal-light) 50%, transparent);
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
<body class="antialiased min-h-screen flex flex-col md:flex-row transition-colors duration-500 selection:bg-charcoal selection:text-cream dark:selection:bg-cream dark:selection:text-charcoal">
    @if(session()->has('impersonator_id'))
        <div class="absolute top-0 left-0 right-0 bg-gradient-to-r from-red-600 to-rose-600 text-white px-6 py-3 flex items-center justify-between gap-4 text-xs font-bold shadow-lg z-50">
            <div class="flex items-center gap-2.5">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cream-dark opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-cream-dark"></span>
                </span>
                <span>Impersonation Active: You are logged in as <span class="underline">{{ auth()->user()->name }}</span> ({{ ucfirst(auth()->user()->role) }})</span>
            </div>
            <form method="POST" action="{{ route('student.stop-impersonating') }}">
                @csrf
                <button type="submit" class="bg-cream-dark/20 hover:bg-cream-dark/30 border border-white/30 text-white font-bold px-3 py-1 rounded-lg transition text-[10px] uppercase tracking-wider flex items-center gap-1.5 shadow-sm">
                    <i class="fas fa-sign-out-alt"></i> Return to Admin
                </button>
            </form>
        </div>
    @endif

    <div class="flex-1 flex flex-col md:flex-row overflow-hidden w-full {{ session()->has('impersonator_id') ? 'pt-12' : '' }}">
        <!-- Desktop Sidebar -->
        <aside class="hidden md:flex w-72 bg-gray-50 dark:bg-[#0a0a0a] border-r border-gray-200 dark:border-gray-900 p-6 shrink-0 flex-col justify-between z-30">
            <div class="space-y-8 overflow-y-auto no-scrollbar">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-lg bg-gray-200 dark:bg-gray-800 flex items-center justify-center">
                            <i class="fas fa-shield-alt text-black dark:text-white text-xs"></i>
                        </div>
                        <div>
                            <div class="text-lg font-bold text-black dark:text-white font-display leading-none tracking-widest uppercase">Admin Panel</div>
                        </div>
                    </div>
                    <!-- Theme Toggle -->
                    <button onclick="toggleTheme()" class="w-8 h-8 rounded-full flex items-center justify-center bg-gray-200 dark:bg-gray-800 text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700 transition-colors" title="Toggle Light/Dark Mode">
                        <i class="fas theme-icon fa-moon text-sm"></i>
                    </button>
                </div>

                <nav class="space-y-1.5 font-medium">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-black text-white dark:bg-white dark:text-black shadow-md' : 'text-gray-500 hover:bg-gray-200 dark:hover:bg-gray-800 hover:text-black dark:hover:text-white' }}">
                        <i class="fas fa-chart-pie w-5 text-center"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.posts.index') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 transition-all {{ request()->routeIs('admin.posts.*') ? 'bg-black text-white dark:bg-white dark:text-black shadow-md' : 'text-gray-500 hover:bg-gray-200 dark:hover:bg-gray-800 hover:text-black dark:hover:text-white' }}">
                        <i class="fas fa-bullhorn w-5 text-center"></i>
                        <span>Posts</span>
                    </a>
                    @if(auth()->user()->role !== 'media_manager')
                    <a href="{{ route('admin.quizzes.index') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 transition-all {{ request()->routeIs('admin.quizzes.*') || request()->routeIs('admin.questions.*') ? 'bg-black text-white dark:bg-white dark:text-black shadow-md' : 'text-gray-500 hover:bg-gray-200 dark:hover:bg-gray-800 hover:text-black dark:hover:text-white' }}">
                        <i class="fas fa-laptop-code w-5 text-center"></i>
                        <span>Quizzes</span>
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 transition-all {{ request()->routeIs('admin.users.*') ? 'bg-black text-white dark:bg-white dark:text-black shadow-md' : 'text-gray-500 hover:bg-gray-200 dark:hover:bg-gray-800 hover:text-black dark:hover:text-white' }}">
                        <i class="fas fa-users-cog w-5 text-center"></i>
                        <span>Users</span>
                    </a>
                    <a href="{{ route('admin.suggestions.index') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 transition-all {{ request()->routeIs('admin.suggestions.*') ? 'bg-black text-white dark:bg-white dark:text-black shadow-md' : 'text-gray-500 hover:bg-gray-200 dark:hover:bg-gray-800 hover:text-black dark:hover:text-white' }}">
                        <i class="fas fa-vote-yea w-5 text-center"></i>
                        <span>Suggestions</span>
                    </a>
                    <a href="{{ route('admin.events.index') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 transition-all {{ request()->routeIs('admin.events.*') ? 'bg-black text-white dark:bg-white dark:text-black shadow-md' : 'text-gray-500 hover:bg-gray-200 dark:hover:bg-gray-800 hover:text-black dark:hover:text-white' }}">
                        <i class="fas fa-calendar-alt w-5 text-center"></i>
                        <span>Events</span>
                    </a>
                    @endif
                    @if(auth()->user()->canManageGallery())
                    <a href="{{ route('admin.gallery.index') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 transition-all {{ request()->routeIs('admin.gallery.*') || request()->routeIs('admin.gallery-categories.*') ? 'bg-black text-white dark:bg-white dark:text-black shadow-md' : 'text-gray-500 hover:bg-gray-200 dark:hover:bg-gray-800 hover:text-black dark:hover:text-white' }}">
                        <i class="fas fa-images w-5 text-center"></i>
                        <span>Gallery</span>
                    </a>
                    @endif
                </nav>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-800 space-y-2">
                <a href="{{ route('student.dashboard') }}" class="flex items-center space-x-3 rounded-xl px-4 py-3 text-gray-500 hover:bg-gray-200 dark:hover:bg-gray-800 hover:text-black dark:hover:text-white transition-all">
                    <i class="fas fa-user-graduate w-5 text-center"></i>
                    <span>Student Portal</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 rounded-xl px-4 py-3 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-950/30 transition-all font-bold">
                        <i class="fas fa-sign-out-alt w-5 text-center"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Mobile Header -->
        <header class="md:hidden flex justify-between items-center h-16 bg-white dark:bg-[#0a0a0a] border-b border-gray-200 dark:border-gray-900 px-6 sticky top-0 z-40">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
                    <i class="fas fa-shield-alt text-black dark:text-white text-xs"></i>
                </div>
                <span class="text-lg font-bold text-black dark:text-white font-display leading-none tracking-widest uppercase">Admin Panel</span>
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
                        <div class="w-8 h-8 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-black dark:text-white text-xs"><i class="fas fa-shield-alt"></i></div>
                        <span class="text-lg font-bold text-black dark:text-white font-display uppercase tracking-widest">Admin</span>
                    </div>
                    <button id="mobile-close-sidebar" class="text-black dark:text-white hover:text-gray-500 text-2xl p-2 -mr-2"><i class="fas fa-times"></i></button>
                </div>
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-xl font-semibold text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors">Dashboard</a>
                    <a href="{{ route('admin.posts.index') }}" class="block px-4 py-3 rounded-xl font-semibold text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors">Posts</a>
                    @if(auth()->user()->role !== 'media_manager')
                    <a href="{{ route('admin.quizzes.index') }}" class="block px-4 py-3 rounded-xl font-semibold text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors">Quizzes</a>
                    <a href="{{ route('admin.users.index') }}" class="block px-4 py-3 rounded-xl font-semibold text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors">Users</a>
                    <a href="{{ route('admin.suggestions.index') }}" class="block px-4 py-3 rounded-xl font-semibold text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors">Suggestions</a>
                    <a href="{{ route('admin.events.index') }}" class="block px-4 py-3 rounded-xl font-semibold text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors">Events</a>
                    @endif
                    @if(auth()->user()->canManageGallery())
                    <a href="{{ route('admin.gallery.index') }}" class="block px-4 py-3 rounded-xl font-semibold text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors">Gallery</a>
                    @endif
                    <a href="{{ route('student.dashboard') }}" class="block px-4 py-3 rounded-xl font-semibold text-black dark:text-white bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 mt-4 transition-colors">Student Portal</a>
                </nav>
            </div>
            <div class="p-6 border-t border-gray-100 dark:border-gray-900">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center space-x-3 rounded-xl py-3 text-red-600 bg-red-50 hover:bg-red-100 dark:bg-red-950/30 dark:hover:bg-red-950/50 dark:text-red-400 transition-colors font-semibold"><i class="fas fa-sign-out-alt"></i><span>Logout</span></button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <main class="flex-grow min-w-0 flex flex-col overflow-y-auto h-full p-4 md:p-8 bg-white dark:bg-black">
            @if(session('success'))
                <div class="mb-6 rounded-2xl bg-green-50 dark:bg-green-950/30 border border-green-200 dark:border-green-800/50 text-green-700 dark:text-green-400 px-5 py-4 flex items-center gap-3 shadow-sm">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 rounded-2xl bg-red-50 dark:bg-red-950/30 border border-red-200 dark:border-red-800/50 text-red-700 dark:text-red-400 px-5 py-4 flex items-center gap-3 shadow-sm">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif
            @yield('content')
        </main>
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
    @stack('scripts')
</body>
</html>

