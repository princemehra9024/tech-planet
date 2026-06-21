<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cat1 = \App\Models\GalleryCategory::create(['name' => 'Workshops', 'slug' => 'workshop']);
        $cat2 = \App\Models\GalleryCategory::create(['name' => 'Hackathons', 'slug' => 'hackathon']);
        $cat3 = \App\Models\GalleryCategory::create(['name' => 'Seminars', 'slug' => 'seminar']);

        \App\Models\Gallery::create([
            'gallery_category_id' => $cat2->id,
            'title' => 'AI Forge Hackathon',
            'event_date' => '2025-04-12',
            'coordinator' => 'Kunal Mehta',
            'location' => 'SRM Main Lab',
            'description' => 'Students building AI agents during our 36-hour sprint.',
            'image_path' => 'https://images.unsplash.com/photo-1504384764586-bb4cdc1707b0?w=800&fit=crop',
            'is_featured' => true
        ]);

        \App\Models\Gallery::create([
            'gallery_category_id' => $cat1->id,
            'title' => 'React Frontend Workshop',
            'event_date' => '2025-03-14',
            'coordinator' => 'Sneha Raj',
            'location' => 'Tech Hall 3',
            'description' => 'Interactive session covering component trees and state hooks.',
            'image_path' => 'https://images.unsplash.com/photo-1633356122544-f134324a6cee?w=800&h=1000&fit=crop',
            'is_featured' => false
        ]);

        \App\Models\Gallery::create([
            'gallery_category_id' => $cat3->id,
            'title' => 'Generative AI Seminar',
            'event_date' => '2025-01-19',
            'coordinator' => 'Dr. Meera Srinivas',
            'location' => 'CSI Seminar Hall',
            'description' => 'Exploring decoder architectures and tokenized models.',
            'image_path' => 'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=800&fit=crop',
            'is_featured' => true
        ]);
    }
}
