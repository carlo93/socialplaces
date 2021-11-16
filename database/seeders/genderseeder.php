<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gender;

class genderseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
              'name' => 'Male',
              'val' => 'm'
            ],
            [
              'name' => 'Female',
              'val' => 'f'
            ],
        ];

        Gender::insert($data);
    }
}
