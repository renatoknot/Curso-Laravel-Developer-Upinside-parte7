<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
    //return new \App\Mail\welcomeLaraDev($user, $order);
});

Route::get('/email-queue', function() {

    $user = new stdClass();
    $user->name = 'Gustavo Web';
    $user->email = 'renatoslip@hotmail.com';

    $order = new stdClass();
    $order->type = 'billet';
    $order->due_at = '2019-01-10';
    $order->value = 697;

    //Mail::queue(new \App\Mail\welcomeLaraDev($user, $order));
    //return new \App\Mail\welcomeLaraDev($user, $order);

    \App\Jobs\welcomeLaraDev::dispatch($user, $order)->delay(now()->addSeconds(15));
});

Route::get('envio-email', function() {
    $user = new stdClass();
    $user->name = 'Gustavo Web';
    $user->email = 'renatoslip@hotmail.com';


    // return new \App\Mail\welcomeLaraDev($user);
    // Mail::send(new \App\Mail\welcomeLaraDev($user, $order));
});

Route::get('/files', function() {
    $files = Storage::files('');
    $allFiles = Storage::allFiles('');

    //Storage::makeDirectory('public/students');

    $directories = Storage::directories('');
    $allDirectories = Storage::allDirectories('');

    // Storage::makeDirectory('public/course');

    //Storage::deleteDirectory('public/course');

    // Storage::disk('public')->put('upinside.txt', 'O melhor curso de Laravel do mercado é aqui.');
    //Storage::put('upinside-treinamentos.txt', 'O melhor curso de Laravel do mercado é aqui.');

    //echo Storage::get('upinside-treinamentos.txt');

    //return Storage::download('upinside-treinamentos.txt');

    // if(Storage::exists('upinside-treinamentos.txt')) {
    //     echo "O arquivo existe!";
    // } else {
    //     echo "O arquivo não existe";
    // }

    // echo Storage::size('upinside-treinamentos.txt');
    // echo Storage::lastModified('upinside-treinamentos.txt');

    // Storage::prepend('upinside-treinamentos.txt', 'Upinside Treinamentos');//insere conteudo no começo do arquivo
    //Storage::append('upinside-treinamentos.txt', 'Vem estudar com a gente!');//insere conteudo no final do arquivo

    //Storage::copy('upinside-treinamentos.txt', 'public/upinside-treinamentos.txt');//cria uma cópia do arquivo
    //Storage::move('upinside-treinamentos.txt', 'public/upinside-treinamentos.txt');//cria uma cópia do arquivo
    Storage::delete('public/upinside-treinamentos.txt');
    //dump($files, $allFiles, $directories, $allDirectories);
});
