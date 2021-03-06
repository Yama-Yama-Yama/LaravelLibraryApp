<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(config('admin')) {
            User::firstOrCreate(
                ['email' => 'admin@admin.com'], [
                    'name' => 'admin',
                    'password' => 'password',
                ]
            );
        }
    }
}
