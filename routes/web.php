<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Models\Person;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $data =Person::get();
    return view('welcome', compact('data'));
});
Route::post('/persons/save', [PersonController::class,'savePerson']);
Route::post('/persons/update', [PersonController::class,'update']);
Route::get('/persons/create', [PersonController::class,'create']);
Route::get('/persons/edit/{id}', [PersonController::class,'edit']);
Route::get('/persons/delete/{id}', [PersonController::class,'delete']);

