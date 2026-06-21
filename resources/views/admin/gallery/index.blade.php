@extends('layouts.admin')
@section('title', 'Manage Gallery')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
        <h1 class="text-3xl font-display font-bold text-charcoal">Gallery Management</h1>
        <p class="text-charcoal/60 mt-1">Upload and manage images for the public gallery.</p>
    </div>
    <div class="flex gap-3">
        <a href="{{ route('admin.gallery-categories.index') }}" class="px-5 py-2.5 bg-cream-dark hover:bg-charcoal/10 text-charcoal rounded-xl font-bold transition-all shadow-sm flex items-center gap-2">
            <i class="fas fa-tags"></i> Manage Categories
        </a>
        <a href="{{ route('admin.gallery.create') }}" class="px-5 py-2.5 bg-charcoal text-cream hover:bg-charcoal-light rounded-xl font-bold transition-all shadow-lg flex items-center gap-2">
            <i class="fas fa-upload"></i> Upload Image
        </a>
    </div>
</div>

<div class="bg-cream-dark/30 rounded-2xl border border-charcoal/5 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-charcoal/5 border-b border-charcoal/5 text-sm uppercase tracking-wider text-charcoal/70">
                    <th class="p-4 font-bold">Image</th>
                    <th class="p-4 font-bold">Title / Details</th>
                    <th class="p-4 font-bold">Category</th>
                    <th class="p-4 font-bold text-center">Featured</th>
                    <th class="p-4 font-bold text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-charcoal/5">
                @forelse($galleries as $gallery)
                    <tr class="hover:bg-cream-dark/50 transition-colors">
                        <td class="p-4 w-32">
                            <img src="{{ asset($gallery->image_path) }}" class="w-24 h-16 object-cover rounded-lg shadow-sm border border-charcoal/10" alt="{{ $gallery->title }}">
                        </td>
                        <td class="p-4">
                            <div class="font-bold text-charcoal">{{ $gallery->title }}</div>
                            <div class="text-xs text-charcoal/60 mt-1">
                                @if($gallery->event_date)
                                    <i class="far fa-calendar-alt mr-1"></i> {{ \Carbon\Carbon::parse($gallery->event_date)->format('M d, Y') }}
                                @endif
                                @if($gallery->location)
                                    <i class="fas fa-map-marker-alt ml-2 mr-1"></i> {{ $gallery->location }}
                                @endif
                            </div>
                        </td>
                        <td class="p-4">
                            <span class="px-3 py-1 bg-charcoal/10 text-charcoal text-xs font-bold rounded-full">
                                {{ $gallery->category->name ?? 'None' }}
                            </span>
                        </td>
                        <td class="p-4 text-center">
                            @if($gallery->is_featured)
                                <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                            @else
                                <span class="text-charcoal/20"><i class="far fa-star"></i></span>
                            @endif
                        </td>
                        <td class="p-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="w-8 h-8 rounded-lg bg-charcoal/5 hover:bg-charcoal/10 text-charcoal flex items-center justify-center transition-colors" title="Edit">
                                    <i class="fas fa-edit text-sm"></i>
                                </a>
                                <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-8 h-8 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 flex items-center justify-center transition-colors" title="Delete">
                                        <i class="fas fa-trash text-sm"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-8 text-center text-charcoal/50">
                            No gallery images uploaded yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($galleries->hasPages())
        <div class="p-4 border-t border-charcoal/5 bg-charcoal/5">
            {{ $galleries->links() }}
        </div>
    @endif
</div>
@endsection
