<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
    return view('form');
})->name('page.login');

Route::get('/login', 'App\Http\Controllers\AdminController@login')->name('admincontroleur.login');

Route::get('/pageaccueiladmin', function () {
    $contenus = DB::table('contenu')->get();
    $contenusArray = $contenus->toArray();
    return view('accueilAdmin', ['contenus' => $contenusArray]);
})->name('page.accueiladmin');

Route::get('/pagegestioncontenu', function () {
    $contenus = DB::table('contenu')->get();
    return view('gestionContenu', ['contenus' => $contenus]);
})->name('page.gestioncontenu');

Route::get('/pageinsertcontenu', function () {
    return view('insertContenu');
})->name('page.insertcontenu');

Route::post('/insertcontenu', 'App\Http\Controllers\ContenuController@insert')->name('contenucontroleur.insert');

Route::get('/deletecontenu', 'App\Http\Controllers\ContenuController@delete')->name('contenucontroleur.delete');