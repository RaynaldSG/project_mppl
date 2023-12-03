<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => "Raynald S.K.",
            'username' => 'raynald',
            'password' => 123210092,
            'email' => 'ray@gmail.com',
            'country' => 'indonesia',
            'is_admin' => true
        ]);

        Event::create([
            'title' => "Sendratari Ramayana",
            'organizer' => "Oragnisasi Penari Ramayana",
            'desc_EN' => "This is a description in english",
            'desc_ID' => "Ini Deskripsi Indo",
            'location' => "Prambanan, Sleman, Yogyakarta",
            'start' => Carbon::now()->addDay(),
            'end' => Carbon::now()->addDays(2),
            'image' => "event-image/ramayana.jpeg",
            'use_ticket' => true,
        ]);

        Event::create([
            'title' => "Wayangan",
            'organizer' => "Dinas Kebudayaan DIY",
            'desc_EN' => "This is a description in english",
            'desc_ID' => "Ini Deskripsi Indo",
            'location' => "Ngaglik, Sleman, Yogyakarta",
            'start' => Carbon::now()->addDays(7),
            'end' => Carbon::now()->addDays(8),
            'image' => "event-image/wayang.jpeg",
        ]);

        Ticket::create([
            'event_id' => 1,
            'slot' => 50,
            'purchased' => 0,
            'price' => 150000,
        ]);
    }
}
