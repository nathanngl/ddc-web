<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * Class UsersSeeder generates 3 users with role Dosen and 5 users with role Siswa.
 */
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User with role Dosen
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'supervisor',
            'email' => 'supervisor@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'supervisor',
        ]);

    }
}
