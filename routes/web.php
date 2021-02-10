<?php

use App\Http\Controllers\Admin\TesteController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return 'Olá, Mundo!';
});

Route::get('/empresa', function () {
    return 'Sobre a empresa';
});

Route::post('/register', function () {
    return '';
});

Route::get('/categorias/{flag}/posts', function ($flag) {
    return 'Categoria: ' . $flag . ';';
});

Route::get('/produtos/{flag?}', function ($flag = null) {
    $flag == null ? $flag = 'todos' : $flag = $flag;
    return 'Produtos: ' . $flag . ';';
});

Route::any('/any', function () {
    return 'Any';
});

Route::match(['get', 'post'], '/match', function () {
    return 'Match';
});

// Route::redirect('/redirect1', '/redirect2');

Route::get('/redirect1', function () {
    return redirect('/redirect2');
});

Route::get('/redirect2', function () {
    return 'Redirect 2';
});

// Route::view('/contato', 'contact', ['id' => 'teste']);

// Route::view('/contato', 'contact');

Route::get('/contato', function () {
    return view('contact');
});

ROute::get('/nome-url', function () {
    return 'http://';
})->name('url.name');

Route::get('/redirect3', function () {
    return redirect()->route('url.name');
});

// Route::get('/login', function () {
//     return 'Login';
// })->name('login');

// Route::get('/admin/dashboard', function () {
//     return 'Home Admin';
// })->middleware(['auth']);

// Route::get('/admin/financeiro', function () {
//     return 'Financeiro Admin';
// })->middleware('auth');

// Route::get('/admin/produtos', function () {
//     return 'Produtos Admin';
// })->middleware('auth');

// Route::get('/login', function () {
//     return 'Login';
// })->name('login');

// Route::middleware(['auth'])->group(function () {
//     Route::prefix('admin')->group(function () {
//         Route::name('admin.')->group(function () {
//             Route::get('/', [TesteController::class, 'index'])->name('');

//             Route::get('/dashboard', [TesteController::class, 'dashboard'])->name('dashboard');

//             Route::get('/financeiro', [TesteController::class, 'financeiro'])->name('financeiro');

//             Route::get('/produtos', [TesteController::class, 'produtos'])->name('produtos');
//         });
//     });
// });

Route::get('/login', function () {
    return 'Login';
})->name('login');

Route::group([
    // 'middleware' => ['auth'],
    'prefix' => 'admin',
], function () {
    Route::get('/', [TesteController::class, 'index'])->name('admin.');

    Route::get('/dashboard', [TesteController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/financeiro', [TesteController::class, 'financeiro'])->name('admin.financeiro');

    Route::get('/produtos', [TesteController::class, 'produtos'])->name('admin.produtos');
});

Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
