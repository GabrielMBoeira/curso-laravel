<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = ['Product 01', 'Product 02', 'Product 03',];

        return $products;
    }

    public function show($id)
    {
        return "Exibindo o produto de id: {$id}";
    }

    public function create()
    {
        return 'Exibindo Form para criar um novo produto';
    }

    public function edit($id)
    {
        return "Exibindo Form para editar o produto: {$id}";
    }

    public function store()
    {
        return "Cadastrando um novo produto";
    }

    public function update($id)
    {
        return "Editando o produto: {$id}";
    }

    public function destroy($id)
    {
        return "Deletando o produto: {$id}";
    }



}
