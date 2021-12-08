<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Nestor Catari',
            'email'=>'firrewall2000@gmail.com',
            'password'=>bcrypt('Catmam46501'),
        ])->assignRole('Admin');
        
        //User::factory(99)->create();
    }
}
