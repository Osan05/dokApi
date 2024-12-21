<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => ['required', 'string'],
'email' => ['required', 'string', 'email', 'unique:users'],
'password' => ['required', 'confirmed', Password::min(8)], // Gunakan password yang aman di lingkungan produksi
        ]);
    }
}
