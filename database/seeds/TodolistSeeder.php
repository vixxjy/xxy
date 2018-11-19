<?php

use Illuminate\Database\Seeder;
use todo\Todolist;

class TodolistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Todolist::create([
        // 'name' => 'San Juan Vacation',
        // 'description' => 'Things to do before we leave for Puerto Rico!'
        // ]);
        // Todolist::create([
        // 'name' => 'Home Winterization',
        // 'description' => 'Winter is coming.'
        // ]);
        // Todolist::create([
        // 'name' => 'Rental Maintenance',
        // 'description' => 'Cleanup and improvements for new tenants'
        // ]);
        
        
        // using faker
        $faker = \Faker\Factory::create();
        
        Todolist::truncate();
        
        foreach(range(1,20) as $index) {
            Todolist::create([
               'name' => $faker->sentence(2),
                'description' => $faker->sentence(4), 
            ]);
        }
    }
}
