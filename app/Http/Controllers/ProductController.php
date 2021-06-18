<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    protected $request;
    private $repository;

    public function __construct(Request $request, Product $product)
    {
        // dd($request);

        // $this->middleware('auth'); //Todos os métodos precisa estar autenticado

        // $this->middleware('auth')->only('create'); //Somente create ou ['create', 'store'] precisa estar autenticado

        // $this->middleware('auth')->except(['index', 'show']); //Todos os métodos precisa estar autenticado -> exceto index e show

        $this->request = $request;
        $this->repository = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $products = Product::all();
        // $products = Product::get();
        // $products = Product::latest()->paginate(); //ultimos 15 registros
        $products = Product::paginate();

        return view('admin.pages.products.index', ["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        $data = $request->only('name', 'description', 'price');

        if ($request->hasFile('image') && $request->image->isValid()) {
            $imagePath = $request->image->store('products');

            $data['image'] = $imagePath;
        }

        // Formato simples para salvar
        $this->repository->create($data);

        return redirect()->route('products.index');

        //Formato simples para salvar
        // $data = $request->all();
        // Product::create($data);


        //Formato mais trabalhoso para salvar
        // $product = new Product;   
        // $product->name = $request->name;
        // $product->price = $request->price;
        // $product->description = $request->description;
        // $product->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $product = Product::where('id', $id)->get(); //retorna um array
        // $product = Product::where('id', $id)->first(); //retorna apenas objeto

        // --------------------------------
        //Encontra produto por id e se não encontrar retorna de onde veio

        if (!$product = $this->repository->find($id))
            return redirect()->back();

        // dd($product);
        // --------------------------------


        return view('admin.pages.products.show', [
            "product" => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (!$product = $this->repository->find($id))
            return redirect()->back();


        return view('admin.pages.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductRequest $request, $id)
    {

        if (!$product = $this->repository->find($id))
            return redirect()->back();

        $data = $request->all();


        if ($request->hasFile('image') && $request->image->isValid()) {
            $imagePath = $request->image->store('products');

            if ($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }

            $data['image'] = $imagePath;
        }


        $product->update($data);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $product = $this->repository->find($id)->where('id', $id)->first();
        if (!$product) {
            return redirect()->back();
        }

        //Deletando também uma imagem caso exista
        if ($product->image && Storage::exists($product->image)) {
            Storage::delete($product->image);
        }

        // dd("Deletando um produto pelo id: $id");

        $product->delete();

        return redirect()->route('products.index');
    }


    /**
     *
     * Search products
     */
    public function search(Request $request)
    {

        // $filters = $request->all();
        $filters = $request->except('_token');

        $products = $this->repository->search($request->filter);

        return view('admin.pages.products.index', [
            "products" => $products,
            "filters" => $filters
        ]);
    }
}
