@extends('layouts.student')
@section('title', 'Configure Profile')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="glass-card rounded-3xl p-6 border border-white/5 shadow-2xl relative overflow-hidden">
        <div class="absolute -right-8 -top-8 w-20 h-20 bg-purple-500/5 rounded-full blur-xl"></div>
        <h1 class="text-2xl font-bold text-white font-display mb-6">Configure Profile</h1>
        <form method="POST" action="{{ route('student.profile.update') }}">
            @csrf
            @method('PUT')
            <div class="space-y-6">
                <div>
                    <label class="block text-slate-350 font-semibold text-[10px] mb-2 uppercase tracking-widest">Developer Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full bg-[#0a0b14]/80 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition text-xs sm:text-sm">
                    @error('name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-slate-355 font-semibold text-[10px] mb-2 uppercase tracking-widest">Department</label>
                        <input type="text" name="branch" value="Computer Science & Informatics" readonly class="w-full bg-[#0a0b14]/80 border border-white/10 rounded-xl px-4 py-3 text-slate-400 focus:outline-none cursor-not-allowed text-xs sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-slate-350 font-semibold text-[10px] mb-2 uppercase tracking-widest">Course</label>
                        <div class="relative font-bold">
                            <select name="course" id="course-select" required class="w-full bg-[#0a0b14]/80 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition text-xs sm:text-sm appearance-none cursor-pointer">
                                <option value="MCA" {{ old('course', $user->course) === 'MCA' ? 'selected' : '' }}>MCA (4 Semesters)</option>
                                <option value="IMCA" {{ old('course', $user->course) === 'IMCA' ? 'selected' : '' }}>IMCA (10 Semesters)</option>
                            </select>
                            <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-500"><i class="fas fa-chevron-down text-xs"></i></span>
                        </div>
                    </div>
                </div>
                
                <div>
                    <label class="block text-slate-350 font-semibold text-[10px] mb-2 uppercase tracking-widest">Semester</label>
                    <div class="relative font-bold">
                        <select name="semester" id="semester-select" data-selected="{{ old('semester', $user->semester) }}" required class="w-full bg-[#0a0b14]/80 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition text-xs sm:text-sm appearance-none cursor-pointer">
                        </select>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-500"><i class="fas fa-chevron-down text-xs"></i></span>
                    </div>
                </div>
                
                <div>
                    <label class="block text-slate-350 font-semibold text-[10px] mb-2 uppercase tracking-widest">Biography</label>
                    <textarea name="bio" rows="4" class="w-full bg-[#0a0b14]/80 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition text-xs sm:text-sm" placeholder="Tell the community about yourself...">{{ old('bio', $user->bio) }}</textarea>
                </div>
                
                <div class="border-t border-white/5 pt-5">
                    <label class="block text-slate-350 font-semibold text-[10px] mb-2 uppercase tracking-widest">Change Secret Key (Password)</label>
                    <input type="password" name="password" class="w-full bg-[#0a0b14]/85 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition text-xs sm:text-sm">
                    @error('password') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                
                <div>
                    <label class="block text-slate-355 font-semibold text-[10px] mb-2 uppercase tracking-widest">Confirm Secret Key</label>
                    <input type="password" name="password_confirmation" class="w-full bg-[#0a0b14]/85 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition text-xs sm:text-sm">
                </div>
                
                <div class="flex justify-end gap-3 pt-6 border-t border-white/5">
                    <a href="{{ route('student.profile') }}" class="px-5 py-2.5 border border-white/10 text-slate-300 hover:bg-white/5 rounded-xl text-xs font-semibold transition">Cancel</a>
                    <button type="submit" class="bg-gradient-to-r from-cyan-500 to-purple-655 text-white font-bold px-6 py-2.5 rounded-xl text-xs shadow hover:shadow-lg transition">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const courseSelect = document.getElementById('course-select');
    const semesterSelect = document.getElementById('semester-select');

    if (courseSelect && semesterSelect) {
        function updateSemesters() {
            const course = courseSelect.value;
            const selectedVal = semesterSelect.dataset.selected;
            semesterSelect.innerHTML = '';
            
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
                if (String(i) === String(selectedVal)) {
                    opt.selected = true;
                }
                semesterSelect.appendChild(opt);
            }
        }

        courseSelect.addEventListener('change', function() {
            semesterSelect.dataset.selected = ''; // Reset selected on manual change
            updateSemesters();
        });

        updateSemesters(); // Initial run
    }
});
</script>
@endpush