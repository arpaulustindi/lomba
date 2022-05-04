<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'arifintindi@gmail.com',
            'password' => Hash::make('admin'),
            'level' => 'ADMIN'
        ]);

        DB::table('users')->insert([
            'name' => 'Operator',
            'email' => 'operator@lomba.com',
            'password' => Hash::make('operator'),
            'level' => 'OPERATOR'
        ]);

        DB::table('users')->insert([
            'name' => 'Juri 1',
            'email' => 'juri1@lomba.com',
            'password' => Hash::make('juri1'),
            'level' => 'JURI',
            'juri' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Juri 2',
            'email' => 'juri2@lomba.com',
            'password' => Hash::make('juri2'),
            'level' => 'JURI',
            'juri' => 2
        ]);

        DB::table('users')->insert([
            'name' => 'Juri 3',
            'email' => 'juri3@lomba.com',
            'password' => Hash::make('juri3'),
            'level' => 'JURI',
            'juri' => 3
        ]);
    }
}
