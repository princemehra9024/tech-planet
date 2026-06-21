@extends('layouts.admin')
@section('title', 'Gallery Categories')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <a href="{{ route('admin.gallery.index') }}" class="text-charcoal/50 hover:text-charcoal mb-4 inline-block font-medium"><i class="fas fa-arrow-left mr-2"></i>Back to Gallery</a>
        <h1 class="text-3xl font-display font-bold text-charcoal">Gallery Categories</h1>
        <p class="text-charcoal/60 mt-1">Manage filters for the gallery page.</p>
    </div>
    <div>
        <a href="{{ route('admin.gallery-categories.create') }}" class="px-5 py-2.5 bg-charcoal text-cream hover:bg-charcoal-light rounded-xl font-bold transition-all shadow-lg flex items-center gap-2">
            <i class="fas fa-plus"></i> New Category
        </a>
    </div>
</div>

<div class="bg-cream-dark/30 rounded-2xl border border-charcoal/5 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-charcoal/5 border-b border-charcoal/5 text-sm uppercase tracking-wider text-charcoal/70">
                    <th class="p-4 font-bold">Category Name</th>
                    <th class="p-4 font-bold">Slug</th>
                    <th class="p-4 font-bold text-center">Images Used</th>
                    <th class="p-4 font-bold text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-charcoal/5">
                @forelse($categories as $category)
                    <tr class="hover:bg-cream-dark/50 transition-colors">
                        <td class="p-4 font-bold text-charcoal">{{ $category->name }}</td>
                        <td class="p-4 text-charcoal/60 font-mono text-sm">{{ $category->slug }}</td>
                        <td class="p-4 text-center">
                            <span class="px-3 py-1 bg-charcoal/10 text-charcoal font-bold rounded-full text-xs">{{ $category->galleries_count ?? 0 }}</span>
                        </td>
                        <td class="p-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.gallery-categories.edit', $category->id) }}" class="w-8 h-8 rounded-lg bg-charcoal/5 hover:bg-charcoal/10 text-charcoal flex items-center justify-center transition-colors" title="Edit">
                                    <i class="fas fa-edit text-sm"></i>
                                </a>
                                @if(($category->galleries_count ?? 0) == 0)
                                    <form action="{{ route('admin.gallery-categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-8 h-8 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 flex items-center justify-center transition-colors" title="Delete">
                                            <i class="fas fa-trash text-sm"></i>
                                        </button>
                                    </form>
                                @else
                                    <button class="w-8 h-8 rounded-lg bg-charcoal/5 text-charcoal/20 flex items-center justify-center cursor-not-allowed" title="Cannot delete category with associated images">
                                        <i class="fas fa-trash text-sm"></i>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-8 text-center text-charcoal/50">
                            No categories created yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
