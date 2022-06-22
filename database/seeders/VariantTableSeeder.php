<?php

namespace Database\Seeders;

use App\Models\Variant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VariantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Variant::create([
            'title'=>'color',
            'description'=>''

        ]);
        Variant::create([
            'title'=>'size',
            'description'=>''

        ]);
    }
}
