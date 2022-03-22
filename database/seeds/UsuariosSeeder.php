<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Marcos',
            'email' => 'marcos@admin.org',
            'password' => Hash::make('123123123'),
            'url' => 'http://127.0.0.1:8000/login',
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'juan',
            'email' => 'admin@admin.org',
            'password' => Hash::make('123123123'),
            'url' => 'http://127.0.0.1:8000/login',
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s'),
        ]);
    }
}
