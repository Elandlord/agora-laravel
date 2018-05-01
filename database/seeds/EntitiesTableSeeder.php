<?php

use Illuminate\Database\Seeder;

use App\Entity;

class EntitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Entity::truncate();
        App\NavGroup::truncate();
        
        App\NavGroup::create([
            'name' => 'Admin',
        ]);
        
        App\NavGroup::create([
            'name' => 'Website',
        ]);

        Entity::create([
            'name' => 'User',
            'nav_group_id' => '1',
            'title' => 'Gebruikers',
            'description' => 'Beheer hier de accounts',
            'icon' => 'group',
        ]);    


        Entity::create([
            'name' => 'News',
            'nav_group_id' => '2',
            'title' => 'Nieuws',
            'description' => 'Beheer hier de nieuwsberichten.',
            'icon' => 'build',
        ]);

        Entity::create([
            'name' => 'Event',
            'nav_group_id' => '2',
            'title' => 'Events',
            'description' => 'Beheer hier de agenda.',
            'icon' => 'description',
        ]);
    }
}
