<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

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
});

Route::get('/log', function() {
    //Log::channel('slack')->info('teste');
    Log::stack(['slack', 'daily'])->info('teste');
});

Route::get('/session', function() {
    session([
        'course' => 'LaraDev'
    ]);
    session()->put('name', 'Gustavo Web');

    // echo session()->get('name');

    // session()->put('time', []);

    // session()->push('time', 'Gustavo Web');

    // $student = session()->pull('name');

    // echo $student;
    // session()->forget('name'); //apaga a key name mas sem retorno

    // session()->flush(); //apaga o array de toda a session

    // if(session()->has('course')){
    //     echo "O curso selecionado foi: ". session()->get('course')."<br>";
    // }

    // if(session()->exists('course')){
    //     echo "Esse indice existe";
    // } else {
    //     echo "Esse indice não existe";
    // }

    // session()->flash('message', 'O artigo foi publicado com sucesso');

    // session()->reflash();

    dump(session()->all());
});

Route::get('/email', function() {

    $user = new stdClass();
    $user->name = 'Gustavo Web';
    $user->email = 'renatoslip@hotmail.com';

    $order = new stdClass();
    $order->type = 'billet';
    $order->due_at = '2019-01-10';
    $order->value = 697;

    Mail::send(new \App\Mail\welcomeLaraDev($user, $order));
    return new \App\Mail\welcomeLaraDev($user, $order);
});

Route::get('envio-email', function() {
    $user = new stdClass();
    $user->name = 'Gustavo Web';
    $user->email = 'renatoslip@hotmail.com';


    // return new \App\Mail\welcomeLaraDev($user);
    // Mail::send(new \App\Mail\welcomeLaraDev($user, $order));
});
