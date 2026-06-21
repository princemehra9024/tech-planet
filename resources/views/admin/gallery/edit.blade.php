@extends('layouts.admin')
@section('title', 'Edit Gallery Image')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.gallery.index') }}" class="text-charcoal/50 hover:text-charcoal mb-4 inline-block font-medium"><i class="fas fa-arrow-left mr-2"></i>Back to Gallery</a>
    <h1 class="text-3xl font-display font-bold text-charcoal">Edit Image</h1>
</div>

<div class="bg-cream-dark/30 rounded-2xl border border-charcoal/5 p-6 md:p-8">
    <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <div class="space-y-6">
                <!-- Current Image Preview -->
                <div>
                    <label class="block text-sm font-bold text-charcoal mb-2">Current Image</label>
                    <img src="{{ asset($gallery->image_path) }}" class="w-full max-h-64 object-cover rounded-xl shadow-md border border-charcoal/10" alt="Current Image">
                </div>

                <!-- Image Upload Field -->
                <div>
                    <label class="block text-sm font-bold text-charcoal mb-2">Replace Image (Optional)</label>
                    <div class="border-2 border-dashed border-charcoal/20 rounded-xl p-8 text-center hover:bg-charcoal/5 transition-colors cursor-pointer relative" id="drop-zone">
                        <input type="file" name="image" id="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*" onchange="previewImage(event)">
                        <div id="upload-prompt">
                            <i class="fas fa-cloud-upload-alt text-4xl text-charcoal/30 mb-3"></i>
                            <p class="text-charcoal/60 font-medium">Click to select new image</p>
                        </div>
                        <img id="image-preview" src="#" alt="Preview" class="hidden mx-auto max-h-48 rounded-lg shadow-md mt-2">
                    </div>
                    @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-bold text-charcoal mb-2">Category <span class="text-red-500">*</span></label>
                    <select name="gallery_category_id" class="w-full bg-cream rounded-xl border border-charcoal/10 px-4 py-3 text-charcoal focus:outline-none focus:ring-2 focus:ring-charcoal" required>
                        <option value="">Select Category...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('gallery_category_id', $gallery->gallery_category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('gallery_category_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="space-y-6">
                <!-- Title -->
                <div>
                    <label class="block text-sm font-bold text-charcoal mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $gallery->title) }}" class="w-full bg-cream rounded-xl border border-charcoal/10 px-4 py-3 text-charcoal focus:outline-none focus:ring-2 focus:ring-charcoal" required>
                    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Event Date -->
                <div>
                    <label class="block text-sm font-bold text-charcoal mb-2">Event Date</label>
                    <input type="date" name="event_date" value="{{ old('event_date', $gallery->event_date ? \Carbon\Carbon::parse($gallery->event_date)->format('Y-m-d') : '') }}" class="w-full bg-cream rounded-xl border border-charcoal/10 px-4 py-3 text-charcoal focus:outline-none focus:ring-2 focus:ring-charcoal">
                    @error('event_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Coordinator & Location -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-charcoal mb-2">Coordinator</label>
                        <input type="text" name="coordinator" value="{{ old('coordinator', $gallery->coordinator) }}" class="w-full bg-cream rounded-xl border border-charcoal/10 px-4 py-3 text-charcoal focus:outline-none focus:ring-2 focus:ring-charcoal">
                        @error('coordinator') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-charcoal mb-2">Location</label>
                        <input type="text" name="location" value="{{ old('location', $gallery->location) }}" class="w-full bg-cream rounded-xl border border-charcoal/10 px-4 py-3 text-charcoal focus:outline-none focus:ring-2 focus:ring-charcoal">
                        @error('location') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-bold text-charcoal mb-2">Description / Caption</label>
                    <textarea name="description" rows="3" class="w-full bg-cream rounded-xl border border-charcoal/10 px-4 py-3 text-charcoal focus:outline-none focus:ring-2 focus:ring-charcoal">{{ old('description', $gallery->description) }}</textarea>
                    @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Is Featured Toggle -->
                <label class="flex items-center cursor-pointer mt-4">
                    <div class="relative">
                        <input type="checkbox" name="is_featured" class="sr-only" value="1" {{ old('is_featured', $gallery->is_featured) ? 'checked' : '' }}>
                        <div class="block bg-charcoal/10 w-14 h-8 rounded-full transition-colors toggle-bg"></div>
                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition-transform shadow-md"></div>
                    </div>
                    <div class="ml-3 text-charcoal font-bold text-sm">
                        Feature this image
                    </div>
                </label>
                <style>
                    input:checked ~ .toggle-bg { background-color: var(--color-charcoal); }
                    input:checked ~ .dot { transform: translateX(100%); }
                </style>
            </div>
            
        </div>

        <div class="mt-8 pt-6 border-t border-charcoal/10 flex justify-end">
            <button type="submit" class="px-8 py-3 bg-charcoal text-cream rounded-xl font-bold shadow-lg hover:bg-charcoal-light transition-colors text-lg">
                Save Changes
            </button>
        </div>
    </form>
</div>

<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('image-preview');
        const prompt = document.getElementById('upload-prompt');
        output.src = reader.result;
        output.classList.remove('hidden');
        prompt.classList.add('hidden');
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
