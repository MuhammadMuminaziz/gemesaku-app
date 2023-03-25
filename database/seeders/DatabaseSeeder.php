<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\School;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Role::create([
            'name'      => "Super Admin"
        ]);
        Role::create([
            'name'      => "Admin"
        ]);
        
        User::create([
            'name'      => "muhammad Mu'min Azis",
            'email'     => "admin@gmail.com",
            'password'  => Hash::make('admin123'),
            'role_id'   => 1
        ]);

        School::create([
            'name'      => "Mts Al-Hidayah Karangmangu",
            'religion'  => "Cirebon Timur"
        ]);
        School::create([
            'name'      => "MA Jamiyyah Islamiyyah",
            'religion'  => "Tangerang Selatan"
        ]);
    }
}
