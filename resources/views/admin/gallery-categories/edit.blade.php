@extends('layouts.admin')
@section('title', 'Edit Category')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.gallery-categories.index') }}" class="text-charcoal/50 hover:text-charcoal mb-4 inline-block font-medium"><i class="fas fa-arrow-left mr-2"></i>Back to Categories</a>
    <h1 class="text-3xl font-display font-bold text-charcoal">Edit Category</h1>
</div>

<div class="bg-cream-dark/30 rounded-2xl border border-charcoal/5 p-6 md:p-8 max-w-2xl">
    <form action="{{ route('admin.gallery-categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-bold text-charcoal mb-2">Category Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="w-full bg-cream rounded-xl border border-charcoal/10 px-4 py-3 text-charcoal focus:outline-none focus:ring-2 focus:ring-charcoal" required>
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-charcoal mb-2">Slug <span class="text-red-500">*</span></label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}" class="w-full bg-cream rounded-xl border border-charcoal/10 px-4 py-3 text-charcoal focus:outline-none focus:ring-2 focus:ring-charcoal" required>
                <p class="text-xs text-charcoal/50 mt-1">Warning: Changing the slug might break existing links or filters if they are hardcoded.</p>
                @error('slug') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            
        </div>

        <div class="mt-8 pt-6 border-t border-charcoal/10 flex justify-end">
            <button type="submit" class="px-8 py-3 bg-charcoal text-cream rounded-xl font-bold shadow-lg hover:bg-charcoal-light transition-colors text-lg">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
