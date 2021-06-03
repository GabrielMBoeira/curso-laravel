<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB; //Importar aqui para usar DB::table('users')->insert([]);

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Gabriel',
            'email' => 'gabrielmboeira@gmail.com',
            'password' => bcrypt('123456'),
            'created_at' => now(),
            'updated_at' => now()
        ]);


        // DB::table('users')->insert([
        //     'name' => 'Gabriel',
        //     'email' => 'gabrielmboeira@gmail.com',
        //     'password' => bcrypt('123456'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
    }
}
