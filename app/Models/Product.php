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

    protected $fillable = ['name', 'price', 'description', 'image'];


    public function search ($filter = null)
    {
        $results = $this->where(function ($query) use ($filter) {

            if ($filter) {
                // $query->where('name','=', $filter);
                $query->where('name','LIKE', "%{$filter}%");
            }

        })
        // ->toSql();
        ->paginate();

        return $results;
    }

}
