<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
        // dd($request);

        // $this->middleware('auth'); //Todos os métodos precisa estar autenticado

        // $this->middleware('auth')->only('create'); //Somente create ou ['create', 'store'] precisa estar autenticado

        // $this->middleware('auth')->except(['index', 'show']); //Todos os métodos precisa estar autenticado -> exceto index e show

        $this->request = $request;
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

        // //Se não passar a requisição volta para o arquivo de onde veio para mostrar erros 
        // $request->validate([
        //     'name' => 'required|min:3|max:255',
        //     'descripition' => 'nullable|min:3|max:10000',      //nullable = opcional
        //     'photo' => 'required|image',
        // ]);

        dd('ok');

        //Pega todos os dados da requisição
        // dd($request->all());

        //Pegar dados específicos
        // dd($request->only(['name', 'description']));
        // dd($request->description);

        //Retorna true e false se existe o name no form
        // dd($request->has('fulano'));

        //Se vier valor no input ele seta, se não vier ele retorna o valor informado como default
        // dd($request->input('name', 'default'));

        //Pega todos menos o exceto
        // dd($request->except('_token', 'name'));

        // if ( $request->file('photo')->isValid() ) {
        //     // dd( $request->photo->extension());
        //     // dd( $request->photo->getClientOriginalName());

        //     // dd( $request->file('photo')->store('products')); //Enviando para dentro do laravel storage/app/productsphoto

        //     // $nameFile = $request->name . '.' . $request->photo->extension();
        //     // dd( $request->file('photo')->storeAs('products', $nameFile));  //storeAs

        //     // Upload de arquivos públicos no laravel
        //     // 'default' => env('FILESYSTEM_DRIVER', 'public'),
        //     // php artisan storage:link = LINK SIMBÓLICO ver no cmd:  ls -la public/
        //     // http://app-laravel.test/storage/products/Gab2.png  = Acessando imagens publicas através do link simbólico

        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Detalhes do produto {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.products.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd("Editando Produto $id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
