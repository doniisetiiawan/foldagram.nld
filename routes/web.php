<?php

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

use Illuminate\Support\Facades\Input as InputAlias;

Route::get('/', function () {
    return view('home')
        ->with('title', 'The Foldagram')
        ->with('class', 'home');
});

Route::get('/about', function () {
    return view('about')
        ->with('title', 'About Foldagram')
        ->with('class', 'about');
})->name('about');

Route::post('/subscribe', function () {
    $input      = InputAlias::all();
    $rules      = array('email' => 'required|email');
    $validation = Validator::make($input, $rules);
    if ($validation->fails()) {
        return Redirect::to('/')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }
    \App\Subscribers::create($input);
    return Redirect::to('/')->with('success', 'Thanks for signing Up Foldagram.');
});
