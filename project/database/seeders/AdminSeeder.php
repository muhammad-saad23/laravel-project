<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin=[
            'name'=>'muhammad saad',
            'email'=>'ms22458881@gmail.com',
            'password'=> bcrypt('saad123')
        ];
        Admin::create($admin);
    }
}
