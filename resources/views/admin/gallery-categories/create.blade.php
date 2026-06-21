@extends('layouts.admin')
@section('title', 'Create Category')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.gallery-categories.index') }}" class="text-charcoal/50 hover:text-charcoal mb-4 inline-block font-medium"><i class="fas fa-arrow-left mr-2"></i>Back to Categories</a>
    <h1 class="text-3xl font-display font-bold text-charcoal">New Category</h1>
</div>

<div class="bg-cream-dark/30 rounded-2xl border border-charcoal/5 p-6 md:p-8 max-w-2xl">
    <form action="{{ route('admin.gallery-categories.store') }}" method="POST">
        @csrf
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-bold text-charcoal mb-2">Category Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full bg-cream rounded-xl border border-charcoal/10 px-4 py-3 text-charcoal focus:outline-none focus:ring-2 focus:ring-charcoal" placeholder="e.g. Bootcamps" required oninput="generateSlug()">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-charcoal mb-2">Slug <span class="text-red-500">*</span></label>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="w-full bg-charcoal/5 rounded-xl border border-charcoal/10 px-4 py-3 text-charcoal/70 focus:outline-none" placeholder="e.g. bootcamps" required>
                <p class="text-xs text-charcoal/50 mt-1">This is the identifier used in the URL and filter system. Usually generated automatically.</p>
                @error('slug') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            
        </div>

        <div class="mt-8 pt-6 border-t border-charcoal/10 flex justify-end">
            <button type="submit" class="px-8 py-3 bg-charcoal text-cream rounded-xl font-bold shadow-lg hover:bg-charcoal-light transition-colors text-lg">
                Create Category
            </button>
        </div>
    </form>
</div>

<script>
function generateSlug() {
    const name = document.getElementById('name').value;
    const slug = name.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');
    document.getElementById('slug').value = slug;
}
</script>
@endsection
