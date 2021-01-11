<?php

use App\Models\Post;
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
    return view('welcome');
})->middleware('auth');

// Rutas para el post
Route::get('/posts/create', function () {
    return view('posts.create');
})->middleware('auth')->name('posts.create');

Route::post('/posts', function () {
    // Comprobar si no existe el campo 'mi_nombre' en la consulta
    if(! request()->has('mi_nombre')) {
        abort(422, "Spam detectado");
    }
    // Comprobar si el campo 'mi_nombre' ha sido rellenado
    if(! empty(request('mi_nombre'))) {
        abort(422, "Spam detectado");
    }
    // Comprobar cuanto tiempo se tardo en rellenar el formulario
    $ahora = microtime(true);
    $tiempo_transcurrido = $ahora - request('tiempo');
    if($tiempo_transcurrido <= 3) {
        abort(422, "Spam detectado");
    }

    Post::create(
        request()->validate([
            'title' => 'required',
            'body' => 'required'
        ])
    );

    return "Publicado!";
})->middleware('auth')->name('posts.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
