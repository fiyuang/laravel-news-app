<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
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
                'name' => 'admin',
            ],
            [
                'name' => 'non-admin',
            ],
        ];

        foreach ($records as $item) {
            Role::create([
                'name' => strtolower($item['name']),
            ]);
        }
    }
}
