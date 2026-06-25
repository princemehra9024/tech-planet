<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Planet Command Center | @yield('title')</title>
    <!-- Tailwind CSS + Google Fonts + Font Awesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        surface: {
                            DEFAULT: '#000000',
                            raised: '#0d0d0d',
                            overlay: '#141414',
                            card: '#0a0a0a',
                        },
                        accent: {
                            DEFAULT: '#0ea5e9',
                            light: '#38bdf8',
                            dim: '#0284c7',
                        },
                        text: {
                            primary: '#f0f0f0',
                            secondary: '#a0a0a0',
                            muted: '#6b6b6b',
                        },
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
        * { font-family: 'DM Sans', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-display { font-family: 'Outfit', sans-serif; }

        body {
            background-color: #000000;
            color: #f0f0f0;
            scroll-behavior: smooth;
        }

        /* Custom scrollbar - dark themed */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #0a0a0a; }
        ::-webkit-scrollbar-thumb { background: #2a2a2a; border-radius: 99px; }
        ::-webkit-scrollbar-thumb:hover { background: #3a3a3a; }

        /* Sidebar nav link active state with cyan glow */
        .nav-link-active {
            background: linear-gradient(135deg, rgba(14, 165, 233, 0.15), rgba(14, 165, 233, 0.05));
            color: #f0f0f0;
            border: 1px solid rgba(14, 165, 233, 0.25);
        }

        /* Card hover lift */
        .card-lift {
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.3s;
        }
        .card-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(14, 165, 233, 0.06);
            border-color: rgba(14, 165, 233, 0.3);
        }

        /* Stat card border glow on hover */
        .stat-card {
            background: #0d0d0d;
            border: 1px solid #1a1a1a;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .stat-card:hover {
            border-color: rgba(14, 165, 233, 0.3);
            box-shadow: 0 0 30px rgba(14, 165, 233, 0.04);
        }

        /* Command card styling */
        .command-card {
            background: #0d0d0d;
            border: 1px solid #1a1a1a;
        }

        /* Action button hover */
        .action-btn {
            background: #0d0d0d;
            border: 1px solid #1f1f1f;
            transition: all 0.3s ease;
        }
        .action-btn:hover {
            border-color: rgba(14, 165, 233, 0.35);
            background: #111111;
            box-shadow: 0 0 20px rgba(14, 165, 233, 0.05);
        }

        /* Fade in animation */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeInUp 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }
        .animate-delay-1 { animation-delay: 0.05s; }
        .animate-delay-2 { animation-delay: 0.1s; }
        .animate-delay-3 { animation-delay: 0.15s; }
        .animate-delay-4 { animation-delay: 0.2s; }
        .animate-delay-5 { animation-delay: 0.25s; }
        .animate-delay-6 { animation-delay: 0.3s; }

        /* Sidebar link transition */
        .sidebar-link {
            transition: all 0.2s ease;
        }
        .sidebar-link:hover {
            background: rgba(255,255,255,0.04);
            color: #f0f0f0;
        }

        /* No scrollbar utility */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
    @stack('styles')

    <!-- Theme Init - Force dark -->
    <script>
        document.documentElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');

        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                document.body.style.backgroundColor = '#ffffff';
                document.body.style.color = '#000000';
                localStorage.setItem('theme', 'light');
                updateThemeIcon('light');
            } else {
                document.documentElement.classList.add('dark');
                document.body.style.backgroundColor = '#000000';
                document.body.style.color = '#f0f0f0';
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
<body class="antialiased min-h-screen flex flex-col md:flex-row">
    @if(session()->has('impersonator_id'))
        <div class="absolute top-0 left-0 right-0 bg-gradient-to-r from-red-600 to-rose-600 text-white px-6 py-3 flex items-center justify-between gap-4 text-xs font-bold shadow-lg z-50">
            <div class="flex items-center gap-2.5">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-white"></span>
                </span>
                <span>Impersonation Active: You are logged in as <span class="underline">{{ auth()->user()->name }}</span> ({{ ucfirst(auth()->user()->role) }})</span>
            </div>
            <form method="POST" action="{{ route('student.stop-impersonating') }}">
                @csrf
                <button type="submit" class="bg-white/20 hover:bg-white/30 border border-white/30 text-white font-bold px-3 py-1 rounded-lg transition text-[10px] uppercase tracking-wider flex items-center gap-1.5 shadow-sm">
                    <i class="fas fa-sign-out-alt"></i> Return to Admin
                </button>
            </form>
        </div>
    @endif

    <div class="flex-1 flex flex-col md:flex-row overflow-hidden w-full {{ session()->has('impersonator_id') ? 'pt-12' : '' }}">
        <!-- Desktop Sidebar -->
        <aside class="hidden md:flex w-64 bg-[#0a0a0a] border-r border-[#1a1a1a] p-5 shrink-0 flex-col justify-between z-30 min-h-screen">
            <div class="space-y-7 overflow-y-auto no-scrollbar">
                <!-- Brand Header -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2.5">
                        <div class="w-8 h-8 rounded-lg bg-[#1a1a1a] flex items-center justify-center border border-[#2a2a2a]">
                            <i class="fas fa-layer-group text-accent text-xs"></i>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-white font-display leading-none">Command</div>
                            <div class="text-sm font-bold text-white font-display leading-none">Center</div>
                        </div>
                    </div>
                    <!-- Theme Toggle -->
                    <button onclick="toggleTheme()" class="w-8 h-8 rounded-full flex items-center justify-center bg-[#1a1a1a] text-text-secondary hover:text-white hover:bg-[#252525] transition-all border border-[#2a2a2a]" title="Toggle Light/Dark Mode">
                        <i class="fas theme-icon fa-sun text-xs"></i>
                    </button>
                </div>

                <!-- Navigation -->
                <nav class="space-y-1 font-medium text-sm">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 rounded-xl px-3.5 py-2.5 transition-all {{ request()->routeIs('admin.dashboard') ? 'nav-link-active font-semibold' : 'sidebar-link text-text-secondary' }}">
                        <i class="fas fa-chart-pie w-5 text-center {{ request()->routeIs('admin.dashboard') ? 'text-accent' : '' }}"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.posts.index') }}" class="flex items-center space-x-3 rounded-xl px-3.5 py-2.5 transition-all {{ request()->routeIs('admin.posts.*') ? 'nav-link-active font-semibold' : 'sidebar-link text-text-secondary' }}">
                        <i class="fas fa-bullhorn w-5 text-center {{ request()->routeIs('admin.posts.*') ? 'text-accent' : '' }}"></i>
                        <span>Posts</span>
                    </a>
                    @if(auth()->user()->role !== 'media_manager')
                    <a href="{{ route('admin.quizzes.index') }}" class="flex items-center space-x-3 rounded-xl px-3.5 py-2.5 transition-all {{ request()->routeIs('admin.quizzes.*') || request()->routeIs('admin.questions.*') ? 'nav-link-active font-semibold' : 'sidebar-link text-text-secondary' }}">
                        <i class="fas fa-laptop-code w-5 text-center {{ request()->routeIs('admin.quizzes.*') || request()->routeIs('admin.questions.*') ? 'text-accent' : '' }}"></i>
                        <span>Quizzes</span>
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="flex items-center space-x-3 rounded-xl px-3.5 py-2.5 transition-all {{ request()->routeIs('admin.users.*') ? 'nav-link-active font-semibold' : 'sidebar-link text-text-secondary' }}">
                        <i class="fas fa-users-cog w-5 text-center {{ request()->routeIs('admin.users.*') ? 'text-accent' : '' }}"></i>
                        <span>Users</span>
                    </a>
                    <a href="{{ route('admin.suggestions.index') }}" class="flex items-center space-x-3 rounded-xl px-3.5 py-2.5 transition-all {{ request()->routeIs('admin.suggestions.*') ? 'nav-link-active font-semibold' : 'sidebar-link text-text-secondary' }}">
                        <i class="fas fa-vote-yea w-5 text-center {{ request()->routeIs('admin.suggestions.*') ? 'text-accent' : '' }}"></i>
                        <span>Suggestions & Votes</span>
                    </a>
                    <a href="{{ route('admin.events.index') }}" class="flex items-center space-x-3 rounded-xl px-3.5 py-2.5 transition-all {{ request()->routeIs('admin.events.*') ? 'nav-link-active font-semibold' : 'sidebar-link text-text-secondary' }}">
                        <i class="fas fa-calendar-alt w-5 text-center {{ request()->routeIs('admin.events.*') ? 'text-accent' : '' }}"></i>
                        <span>Events</span>
                    </a>
                    @endif
                    @if(auth()->user()->canManageGallery())
                    <a href="{{ route('admin.gallery.index') }}" class="flex items-center space-x-3 rounded-xl px-3.5 py-2.5 transition-all {{ request()->routeIs('admin.gallery.*') || request()->routeIs('admin.gallery-categories.*') ? 'nav-link-active font-semibold' : 'sidebar-link text-text-secondary' }}">
                        <i class="fas fa-images w-5 text-center {{ request()->routeIs('admin.gallery.*') || request()->routeIs('admin.gallery-categories.*') ? 'text-accent' : '' }}"></i>
                        <span>Gallery</span>
                    </a>
                    @endif


                </nav>
            </div>

            <!-- Bottom Section -->
            <div class="mt-6 pt-5 border-t border-[#1a1a1a] space-y-1">
                <a href="{{ route('student.dashboard') }}" class="flex items-center space-x-3 rounded-xl px-3.5 py-2.5 sidebar-link text-text-secondary text-sm font-medium">
                    <i class="fas fa-user-graduate w-5 text-center"></i>
                    <span>Student Portal</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 rounded-xl px-3.5 py-2.5 text-red-500 hover:bg-red-950/20 transition-all font-semibold text-sm">
                        <i class="fas fa-sign-out-alt w-5 text-center"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Mobile Header -->
        <header class="md:hidden flex justify-between items-center h-14 bg-[#0a0a0a] border-b border-[#1a1a1a] px-4 sticky top-0 z-40">
            <div class="flex items-center space-x-2.5">
                <div class="w-7 h-7 rounded-lg bg-[#1a1a1a] flex items-center justify-center border border-[#2a2a2a]">
                    <i class="fas fa-layer-group text-accent text-[10px]"></i>
                </div>
                <span class="text-sm font-bold text-white font-display leading-none">Command Center</span>
            </div>
            <button id="mobile-toggle-sidebar" class="text-white hover:text-accent focus:outline-none transition w-9 h-9 flex items-center justify-center rounded-lg hover:bg-[#1a1a1a]">
                <i class="fas fa-bars text-lg"></i>
            </button>
        </header>

        <!-- Mobile Drawer Overlay -->
        <div id="mobile-sidebar-overlay" class="fixed inset-0 z-40 bg-black/70 backdrop-blur-sm transition-opacity duration-300 opacity-0 pointer-events-none md:hidden"></div>

        <!-- Mobile Drawer Menu -->
        <div id="mobile-sidebar" class="fixed inset-y-0 left-0 z-50 w-[280px] max-w-[85vw] bg-[#0a0a0a] border-r border-[#1a1a1a] flex flex-col justify-between transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden shadow-2xl overflow-y-auto">
            <div class="p-5 space-y-6">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-2.5">
                        <div class="w-7 h-7 rounded-lg bg-[#1a1a1a] flex items-center justify-center border border-[#2a2a2a]">
                            <i class="fas fa-layer-group text-accent text-[10px]"></i>
                        </div>
                        <div>
                            <span class="text-sm font-bold text-white font-display">Command Center</span>
                        </div>
                    </div>
                    <button id="mobile-close-sidebar" class="text-text-secondary hover:text-white text-xl p-2 -mr-2 rounded-lg hover:bg-[#1a1a1a] transition"><i class="fas fa-times"></i></button>
                </div>

                <!-- Theme Toggle Mobile -->
                <button onclick="toggleTheme()" class="w-full flex items-center space-x-3 rounded-xl px-3.5 py-2.5 bg-[#141414] text-text-secondary hover:text-white transition-all text-sm font-medium border border-[#1f1f1f]">
                    <i class="fas theme-icon fa-sun w-5 text-center text-accent"></i>
                    <span>Toggle Theme</span>
                </button>

                <nav class="space-y-1 text-sm font-medium">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 rounded-xl px-3.5 py-3 transition-all {{ request()->routeIs('admin.dashboard') ? 'nav-link-active font-semibold' : 'sidebar-link text-text-secondary' }}">
                        <i class="fas fa-chart-pie w-5 text-center {{ request()->routeIs('admin.dashboard') ? 'text-accent' : '' }}"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.posts.index') }}" class="flex items-center space-x-3 rounded-xl px-3.5 py-3 transition-all {{ request()->routeIs('admin.posts.*') ? 'nav-link-active font-semibold' : 'sidebar-link text-text-secondary' }}">
                        <i class="fas fa-bullhorn w-5 text-center {{ request()->routeIs('admin.posts.*') ? 'text-accent' : '' }}"></i>
                        <span>Posts</span>
                    </a>
                    @if(auth()->user()->role !== 'media_manager')
                    <a href="{{ route('admin.quizzes.index') }}" class="flex items-center space-x-3 rounded-xl px-3.5 py-3 transition-all {{ request()->routeIs('admin.quizzes.*') || request()->routeIs('admin.questions.*') ? 'nav-link-active font-semibold' : 'sidebar-link text-text-secondary' }}">
                        <i class="fas fa-laptop-code w-5 text-center {{ request()->routeIs('admin.quizzes.*') || request()->routeIs('admin.questions.*') ? 'text-accent' : '' }}"></i>
                        <span>Quizzes</span>
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="flex items-center space-x-3 rounded-xl px-3.5 py-3 transition-all {{ request()->routeIs('admin.users.*') ? 'nav-link-active font-semibold' : 'sidebar-link text-text-secondary' }}">
                        <i class="fas fa-users-cog w-5 text-center {{ request()->routeIs('admin.users.*') ? 'text-accent' : '' }}"></i>
                        <span>Users</span>
                    </a>
                    <a href="{{ route('admin.suggestions.index') }}" class="flex items-center space-x-3 rounded-xl px-3.5 py-3 transition-all {{ request()->routeIs('admin.suggestions.*') ? 'nav-link-active font-semibold' : 'sidebar-link text-text-secondary' }}">
                        <i class="fas fa-vote-yea w-5 text-center {{ request()->routeIs('admin.suggestions.*') ? 'text-accent' : '' }}"></i>
                        <span>Suggestions & Votes</span>
                    </a>
                    <a href="{{ route('admin.events.index') }}" class="flex items-center space-x-3 rounded-xl px-3.5 py-3 transition-all {{ request()->routeIs('admin.events.*') ? 'nav-link-active font-semibold' : 'sidebar-link text-text-secondary' }}">
                        <i class="fas fa-calendar-alt w-5 text-center {{ request()->routeIs('admin.events.*') ? 'text-accent' : '' }}"></i>
                        <span>Events</span>
                    </a>
                    @endif
                    @if(auth()->user()->canManageGallery())
                    <a href="{{ route('admin.gallery.index') }}" class="flex items-center space-x-3 rounded-xl px-3.5 py-3 transition-all {{ request()->routeIs('admin.gallery.*') || request()->routeIs('admin.gallery-categories.*') ? 'nav-link-active font-semibold' : 'sidebar-link text-text-secondary' }}">
                        <i class="fas fa-images w-5 text-center {{ request()->routeIs('admin.gallery.*') || request()->routeIs('admin.gallery-categories.*') ? 'text-accent' : '' }}"></i>
                        <span>Gallery</span>
                    </a>
                    @endif
                </nav>
            </div>
            <div class="p-5 border-t border-[#1a1a1a] space-y-1">
                <a href="{{ route('student.dashboard') }}" class="flex items-center space-x-3 rounded-xl px-3.5 py-3 sidebar-link text-text-secondary text-sm font-medium">
                    <i class="fas fa-user-graduate w-5 text-center"></i>
                    <span>Student Portal</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 rounded-xl px-3.5 py-3 text-red-500 hover:bg-red-950/20 transition-all font-semibold text-sm">
                        <i class="fas fa-sign-out-alt w-5 text-center"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <main class="flex-grow min-w-0 flex flex-col overflow-y-auto h-screen p-4 md:p-8 bg-black">
            @if(session('success'))
                <div class="mb-5 rounded-xl bg-emerald-950/40 border border-emerald-800/40 text-emerald-400 px-4 py-3 flex items-center gap-3 text-sm font-medium animate-fade-in">
                    <i class="fas fa-check-circle text-emerald-400"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            @if(session('error'))
                <div class="mb-5 rounded-xl bg-red-950/40 border border-red-800/40 text-red-400 px-4 py-3 flex items-center gap-3 text-sm font-medium animate-fade-in">
                    <i class="fas fa-exclamation-circle text-red-400"></i>
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
                document.body.style.overflow = 'hidden';
            }

            function closeDrawer() {
                if(overlay) overlay.classList.remove('opacity-100');
                if(overlay) overlay.classList.add('opacity-0', 'pointer-events-none');
                if(drawer) drawer.classList.add('-translate-x-full');
                document.body.style.overflow = '';
            }

            if (toggleBtn) toggleBtn.addEventListener('click', openDrawer);
            if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
            if (overlay) overlay.addEventListener('click', closeDrawer);
        });
    </script>
    @stack('scripts')
</body>
</html>
