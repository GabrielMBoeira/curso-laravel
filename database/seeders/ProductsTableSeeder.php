<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Criando usuários MODEL=USER
       // Comando para rodar a Seeder: php artisan db:seed --class=ProductsTableSeeder
       Product::factory()->count(100)->create();
    }
}
