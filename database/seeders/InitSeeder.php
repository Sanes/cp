<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'customer']);
        // $user = User::create([
        //     'name' => 'Sanes',
        //     'email' => 'top-smart@ya.ru',
        //     'password' => bcrypt('Pass123123')
        // ]);
        // $user->assignRole('admin');
    }
}
