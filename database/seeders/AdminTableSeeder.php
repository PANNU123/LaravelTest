<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Sajjad Hossain',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('password'),
            'image'=>'sajjad.jpg',
            'number'=>'01796234234',
            'about'=>'i am sajjad hossain.',
        ]);
    }
}
