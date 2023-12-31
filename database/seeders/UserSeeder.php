<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->datas();
    }

    private function datas()
    {
        $records = [
            [
                'name' => 'Admin',
                'uuid' => Str::uuid()->toString(),
                'email' => 'admin@mail.com',
                'password' => Hash::make('Pass1234'),
                'role_id' => 1
            ],
            [
                'name' => 'User Satu',
                'uuid' => Str::uuid()->toString(),
                'email' => 'user1@mail.com',
                'password' => Hash::make('Pass1234'),
                'role_id' => 2
            ]
        ];

        foreach ($records as $item) {
            $user = User::create($item);
        }
    }
}
