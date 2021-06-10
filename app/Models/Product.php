<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Já cria a migrate junto com o model
    // php artisan make:model Product -m

    // protected $table = 'products';   
}
