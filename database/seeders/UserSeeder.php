<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::create([
          'name'=>'admin',
          'email'=>'admin@gmail.com',
          'password'=>Hash::make('password'),
          'phone_number'=>'09876543210',
          'store_id'=>Store::inRandomOrder()->first()->id,
       ]);

       DB::table('users')->insert([
        'name'=>'hader',
        'email'=>'hader@gmail.com',
        'password'=>Hash::make('password'),
        'phone_number'=>'09876543211',
        'store_id'=>Store::inRandomOrder()->first()->id,
       ]);

       User::create([
        'name'=>'ahmed',
        'email'=>'ahmed@gmail.com',
        'password'=>Hash::make('password'),
        'phone_number'=>'09576543210',
        'store_id'=>Store::inRandomOrder()->first()->id,
     ]);

     User::create([
        'name'=>'nada',
        'email'=>'nada@gmail.com',
        'password'=>Hash::make('password'),
        'phone_number'=>'09676543210',
        'store_id'=>Store::inRandomOrder()->first()->id,
     ]);

     
    }
}
