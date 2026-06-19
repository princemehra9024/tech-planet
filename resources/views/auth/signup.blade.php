{{-- resources/views/auth/signup.blade.php --}}
@extends('layouts.app')

@section('title', 'Sign Up - Tech Planet SRM')

@section('content')
<div class="min-h-[85vh] flex items-center justify-center py-6 px-4 relative overflow-hidden">
    <!-- Clean background, gradients removed as requested -->

    <div class="max-w-4xl w-full reveal visible">
        <div class="glass rounded-[2.5rem] p-6 md:p-8 border border-charcoal/5 dark:border-cream/5 relative z-10 card-lift shadow-2xl shadow-charcoal/5 dark:shadow-none">
            <!-- Header -->
            <div class="text-center mb-6">
                <div class="mx-auto w-12 h-12 rounded-xl bg-cream-dark flex items-center justify-center shadow-lg mb-3 img-zoom border border-charcoal/5 dark:border-cream/5">
                    <i class="fas fa-rocket text-charcoal text-2xl"></i>
                </div>
                <h2 class="text-3xl font-extrabold text-charcoal font-display tracking-tight mb-2">Create Console</h2>
                <p class="text-muted text-sm px-4">Become part of the SRM Computer Society of India (CSI) chapter. Join our elite developer community.</p>
            </div>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                    <!-- Full Name -->
                    <div>
                        <label class="block text-charcoal font-bold text-[11px] mb-1.5 uppercase tracking-widest pl-1">Developer Name</label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-muted group-focus-within:text-charcoal transition-colors"><i class="fas fa-user-astronaut"></i></span>
                            <input type="text" name="name" required class="w-full bg-cream-dark border-2 border-transparent focus:border-charcoal/20 rounded-xl pl-12 pr-4 py-2.5 text-charcoal placeholder-muted focus:outline-none transition-all shadow-inner text-sm" placeholder="Alex Johnson">
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div>
                        <label class="block text-charcoal font-bold text-[11px] mb-1.5 uppercase tracking-widest pl-1">SRM Email Address</label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-muted group-focus-within:text-charcoal transition-colors"><i class="fas fa-envelope"></i></span>
                            <input type="email" name="email" required class="w-full bg-cream-dark border-2 border-transparent focus:border-charcoal/20 rounded-xl pl-12 pr-4 py-2.5 text-charcoal placeholder-muted focus:outline-none transition-all shadow-inner text-sm" placeholder="alex@srmist.edu.in">
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-charcoal font-bold text-[11px] mb-1.5 uppercase tracking-widest pl-1">Password</label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-muted group-focus-within:text-charcoal transition-colors"><i class="fas fa-key"></i></span>
                            <input type="password" name="password" required class="w-full bg-cream-dark border-2 border-transparent focus:border-charcoal/20 rounded-xl pl-12 pr-4 py-2.5 text-charcoal placeholder-muted focus:outline-none transition-all shadow-inner text-sm" placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Confirm Pass -->
                    <div>
                        <label class="block text-charcoal font-bold text-[11px] mb-1.5 uppercase tracking-widest pl-1">Confirm Pass</label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-muted group-focus-within:text-charcoal transition-colors"><i class="fas fa-shield-alt"></i></span>
                            <input type="password" name="password_confirmation" required class="w-full bg-cream-dark border-2 border-transparent focus:border-charcoal/20 rounded-xl pl-12 pr-4 py-2.5 text-charcoal placeholder-muted focus:outline-none transition-all shadow-inner text-sm" placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Department -->
                    <div>
                        <label class="block text-charcoal font-bold text-[11px] mb-1.5 uppercase tracking-widest pl-1">Department</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-muted"><i class="fas fa-network-wired"></i></span>
                            <input type="text" name="branch" value="Computer Science & Informatics" readonly class="w-full bg-cream-darker border-2 border-transparent rounded-xl pl-12 pr-4 py-2.5 text-muted cursor-not-allowed text-sm">
                        </div>
                    </div>

                    <!-- Course -->
                    <div>
                        <label class="block text-charcoal font-bold text-[11px] mb-1.5 uppercase tracking-widest pl-1">Course</label>
                        <div class="relative group font-medium">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-muted group-focus-within:text-charcoal transition-colors"><i class="fas fa-book-open"></i></span>
                            <select name="course" id="course-select" required class="w-full bg-cream-dark border-2 border-transparent focus:border-charcoal/20 rounded-xl pl-12 pr-10 py-2.5 text-charcoal focus:outline-none transition-all shadow-inner text-sm appearance-none cursor-pointer">
                                <option value="" disabled selected>Select Course</option>
                                <option value="MCA">MCA (4 Semesters)</option>
                                <option value="IMCA">IMCA (10 Semesters)</option>
                            </select>
                            <span class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none text-muted"><i class="fas fa-chevron-down text-xs"></i></span>
                        </div>
                    </div>

                    <!-- Semester -->
                    <div>
                        <label class="block text-charcoal font-bold text-[11px] mb-1.5 uppercase tracking-widest pl-1">Semester</label>
                        <div class="relative group font-medium">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-muted group-focus-within:text-charcoal transition-colors"><i class="fas fa-graduation-cap"></i></span>
                            <select name="semester" id="semester-select" required class="w-full bg-cream-dark border-2 border-transparent focus:border-charcoal/20 rounded-xl pl-12 pr-10 py-2.5 text-charcoal focus:outline-none transition-all shadow-inner text-sm appearance-none cursor-pointer">
                                <option value="" disabled selected>Select Course First</option>
                            </select>
                            <span class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none text-muted"><i class="fas fa-chevron-down text-xs"></i></span>
                        </div>
                    </div>
                </div>

                <div class="pt-5 mt-5 border-t border-charcoal/5 dark:border-cream/5 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p class="text-sm text-muted text-center sm:text-left order-2 sm:order-1">
                        Already have an active console? 
                        <a href="{{ url('/login') }}" class="nav-link text-charcoal font-bold ml-1">Login here</a>
                    </p>
                    <button type="submit" class="w-full sm:w-auto btn-pill btn-pill-primary justify-center px-8 py-3 text-[15px] shadow-lg shadow-charcoal/10 dark:shadow-none order-1 sm:order-2">
                        <i class="fas fa-satellite-dish mr-2"></i> Initialize Registration
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const courseSelect = document.getElementById('course-select');
    const semesterSelect = document.getElementById('semester-select');

    if (courseSelect && semesterSelect) {
        courseSelect.addEventListener('change', function() {
            const course = this.value;
            semesterSelect.innerHTML = '<option value="" disabled selected>Select Semester</option>';
            
            let maxSemesters = 0;
            if (course === 'MCA') {
                maxSemesters = 4;
            } else if (course === 'IMCA') {
                maxSemesters = 10;
            }

            for (let i = 1; i <= maxSemesters; i++) {
                const opt = document.createElement('option');
                opt.value = i;
                opt.textContent = 'Semester ' + i;
                semesterSelect.appendChild(opt);
            }
        });
    }
});
</script>
@endpush