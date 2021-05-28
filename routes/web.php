<?php

use App\Exports\Chemhunt\UsersExport;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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

Route::redirect('/home','/main');
Route::get('/test',function (){
    $users=User::with('riddlesToday')->get(['id','user_email','email'])->keyBy('id')->map(function ($user){

    });
    dd($users);
});
