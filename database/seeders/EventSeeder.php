<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run(): void
    {

        Event::create([
            'name' => 'Laravel Workshop',
            'capacity' => 50,
        ]);

        Event::create([
            'name' => 'PHP Conference',
            'capacity' => 100,
        ]);

        Event::create([
            'name' => 'Tech Meetup',
            'capacity' => 30,
        ]);
    }
}
