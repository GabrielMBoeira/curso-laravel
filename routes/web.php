<?php

//Laravel 8
// use App\Http\Controllers\PostController;
// Route::get('/posts', [PostController::class, 'index']);

// Criar um controller comando: php artisan make:controller Admin\TesteController
// LIMPAR CACHE (ROTAS) Comando: php artisan route:cache
// Listar rotas comando: php artisan route:list

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

//Crud automático
Route::resource('products', 'ProductController'); //->middleware('auth');

// // //Rotas para fazer o CRUD
// Route::delete('/products/{id}', 'ProductController@destroy')->name('products.destroy'); //Faz de fato o update do prooduto
// Route::put('/products/{id}', 'ProductController@update')->name('products.update'); //Faz de fato o update do prooduto
// Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit'); //Direciona para o form para editar
// Route::get('/products/create', 'ProductController@create')->name('products.create'); //Direciona para o form para criar
// Route::get('/products/{id}', 'ProductController@show')->name('products.show'); //Exibe um produto específico
// Route::get('/products', 'ProductController@index')->name('products.index'); //Exibe uma lista de produtos
// Route::post('/products', 'ProductController@store')->name('products.store'); //Faz de fato o cadastro do prooduto

Route::get('/login', function () {
    return 'Login';
})->name('login');

//----------------------------------Grupos de Rotas--------------------------------------------


// Route::group(['middleware' => [], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {

//     Route::get('/dashboards', 'TesteController@teste')->name('dashboard');

//     Route::get('/financeiro', 'TesteController@teste')->name('financeiro');

//     Route::get('/produtos', 'TesteController@teste')->name('products');

//     Route::get('/', function () {
//         return redirect()->route('dashboard');
//     })->name('home');
    
// });



// Route::middleware([])->group(function () {

//     Route::prefix('admin')->group(function () {

//         Route::namespace('Admin')->group(function () {

//             Route::name('admin.')->group(function () {

//                 Route::get('/dashboards', 'TesteController@teste')->name('dashboard');

//                 Route::get('/financeiro', 'TesteController@teste')->name('financeiro');

//                 Route::get('/produtos', 'TesteController@teste')->name('products');

//                 Route::get('/', function () {
//                     return redirect()->route('dashboard');
//                 })->name('home');
//             });
//         });
//     });
// });



// //LOGIN
// Route::get('/login', function () {
//     return 'Login';
// })->name('login');



// //----------------------------------Rotas nomeadas--------------------------------------------

// Route::get('/redirect3', function () {
//     return redirect()->route('url.name');
// });

// // route('url.name'); Trabalhar deste formato nas views

// Route::get('/nome-url', function () {
//     return 'Hey Hey Hey';
// })->name('url.name');


// //-----Passando uma view diretamente sem passar pelo controller-------------------------------

// Route::view('/view', 'welcome', ['id' => 'teste']);

// //-----------------------------------------Redirect--------------------------------------------

// Route::redirect('/redirect1', '/redirect2');

// // Route::get('redirect1', function () {
// //     return redirect('/redirect2');
// // });

// Route::get('redirect2', function () {
//     return 'Redirect 02';
// });


// //----------------------------------------------------------------------------------------------

// //Passando parametros OPCIONAIS na URL
// Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
//     return "Produto (s): {$idProduct}";
// });

// //Passando parametros com varias barras nome flag deve ser igual
// Route::get('/categoria/{flag}/posts', function ($flag) {
//     return "Produtos da categoria: {$flag}";
// });

// //Passando parametros na URL
// Route::get('/categoria/{flag}', function ($flag) {
//     return "Produtos da categoria: {$flag}";
// });

// //Aceita os verbos HTTP mencionados
// Route::match(['get', 'post'], '/match', function () {
//     return 'match';
// });

// //Aceita todos os tipos de verbos HTTP
// Route::any('/any', function () {
//     return 'any';
// });

// Route::get('/contato', function () {
//     return view('contact');
// });

Route::get('/', function () {
    return view('welcome');
});
