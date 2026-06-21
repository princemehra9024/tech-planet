{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('title', 'Login - Tech Planet SRM')

@section('content')
<section class="relative min-h-[85vh] flex items-center justify-center px-4 sm:px-8 py-12 mt-10">
    <div class="max-w-[1400px] mx-auto w-full h-full">
        <div class="grid grid-cols-1 lg:grid-cols-[55%_45%] gap-8 items-center h-full min-h-[75vh]">
            
            <!-- LEFT COLUMN: Immersive Image -->
            <div class="reveal relative rounded-[2.5rem] overflow-hidden hidden lg:block h-full min-h-[600px] shadow-[0_25px_80px_-20px_rgba(0,0,0,0.25)] border-[6px] border-white/50 bg-cream-dark/50 backdrop-blur-md">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=85&w=1200&h=1600" alt="Tech community" class="w-full h-full object-cover absolute inset-0 transition-transform duration-[2s] hover:scale-105">
                
                <div class="absolute inset-0 bg-gradient-to-t from-charcoal/90 via-charcoal/30 to-transparent pointer-events-none"></div>
                
                <div class="absolute bottom-0 left-0 right-0 p-10 z-10">
                    <span class="inline-flex items-center gap-2 bg-cream-dark/10 backdrop-blur-md text-white text-[11px] uppercase tracking-widest font-bold px-4 py-2 rounded-full mb-4 border border-white/20">
                        <span class="w-2 h-2 rounded-full bg-blue-400 animate-pulse"></span>
                        Welcome Back
                    </span>
                    <h3 class="font-display font-black text-4xl text-white mb-3 leading-tight tracking-tight">Pick up right where you left off.</h3>
                    <p class="text-white/80 text-sm leading-relaxed max-w-md">
                        Reconnect with the Tech Planet community. Access your developer profile, register for upcoming hackathons, and explore new learning tracks.
                    </p>
                </div>
            </div>

            <!-- RIGHT COLUMN: Login Form -->
            <div class="reveal reveal-delay-1 flex justify-center py-8 lg:py-4 h-full items-center">
                <div class="w-full max-w-md">
                    <!-- Glassmorphism Form Card -->
                    <div class="glass rounded-[2.5rem] p-8 sm:p-10 border border-charcoal/5 relative z-10 card-lift shadow-2xl shadow-charcoal/5 dark:shadow-none">
                        <!-- Header -->
                        <div class="text-center mb-8">
                            <div class="mx-auto w-14 h-14 rounded-2xl bg-cream-dark flex items-center justify-center shadow-lg mb-4 img-zoom border border-charcoal/5 group">
                                <i class="fas fa-lock text-charcoal text-2xl group-hover:scale-110 transition-transform"></i>
                            </div>
                            <h2 class="text-3xl font-extrabold text-charcoal font-display tracking-tight mb-2">Access Portal</h2>
                            <p class="text-muted text-sm px-4">Login to your SRM CSI student profile console</p>
                        </div>

                        <form class="space-y-5" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div>
                                <label class="block text-charcoal font-bold text-[11px] mb-1.5 uppercase tracking-widest pl-1">Developer Email</label>
                                <div class="relative group">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-muted group-focus-within:text-charcoal transition-colors"><i class="fas fa-envelope"></i></span>
                                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full bg-cream-dark border-2 @error('email') border-red-500 @else border-transparent focus:border-charcoal/20 @enderror rounded-xl pl-12 pr-4 py-3 text-charcoal placeholder-muted focus:outline-none transition-all shadow-inner text-sm" placeholder="student@srmist.edu.in">
                                </div>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1 pl-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <div class="flex justify-between items-center mb-1.5 pl-1 pr-1">
                                    <label class="block text-charcoal font-bold text-[11px] uppercase tracking-widest">Secret Key (Password)</label>
                                    <a href="#" class="text-charcoal/60 text-[10px] font-bold hover:text-charcoal transition-colors">Forgot?</a>
                                </div>
                                <div class="relative group">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-muted group-focus-within:text-charcoal transition-colors"><i class="fas fa-key"></i></span>
                                    <input type="password" name="password" required class="w-full bg-cream-dark border-2 @error('password') border-red-500 @else border-transparent focus:border-charcoal/20 @enderror rounded-xl pl-12 pr-4 py-3 text-charcoal placeholder-muted focus:outline-none transition-all shadow-inner text-sm" placeholder="â€¢â€¢â€¢â€¢â€¢â€¢â€¢â€¢">
                                </div>
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1 pl-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-between text-xs text-charcoal/80 pt-2 pb-3">
                                <label class="flex items-center select-none cursor-pointer group">
                                    <input type="checkbox" class="rounded bg-cream-dark border-charcoal/20 text-charcoal focus:ring-charcoal/50 focus:ring-offset-0 w-4 h-4 cursor-pointer">
                                    <span class="ml-2 font-semibold group-hover:text-charcoal transition-colors">Keep Console Session Active</span>
                                </label>
                            </div>

                            <button type="submit" class="w-full btn-pill btn-pill-primary justify-center py-3.5 text-[15px] shadow-lg shadow-charcoal/10 dark:shadow-none mt-2">
                                <i class="fas fa-sign-in-alt mr-2"></i> Decrypt & Login
                            </button>
                        </form>
                        
                        <p class="mt-8 text-center text-sm text-muted">
                            First time logging in? 
                            <a href="{{ url('/signup') }}" class="nav-link text-charcoal font-bold ml-1">Register console account</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
