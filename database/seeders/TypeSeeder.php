<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $types = [
            [
                'id' => '1',
                'nama' => 'MPV',
            ],
            [
                'id' => '2',
                'nama' => 'SUV',
            ],
            [
                'id' => '3',
                'nama' => 'Hatchback',
            ],
            [
                'id' => '4',
                'nama' => 'Sedan',
            ]
        ];

        Type::insert($types);

    }
}
