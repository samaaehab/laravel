<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Laravel\Socialite\Facades\Socialite;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/hello', function () {
//     return view('posts.index');
// });

Route::get('/posts',[PostController::class,'index'])->name('posts.index')->middleware('auth');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create')->middleware('auth');
Route::post('/posts',[PostController::class,'store'])->name('posts.store')->middleware('auth');
Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show')->middleware('auth');
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/{post}',[PostController::class,'update'])->name('posts.update')->middleware('auth');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy')->middleware('auth');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->stateless()->redirect();
})->name('auth.github');



Route::get('/auth/callback', function () {
    // $user = Socialite::driver('github')->user();
    // dd($user);
    // $user->token
    $githubUser = Socialite::driver('github')->stateless()->user();

    // dd($githubUser);

    $user = User::where('github_id', $githubUser->id)->first();

    if ($user) {
        $user->update([
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    } else {
        $user = User::create([
            'name' => $githubUser->nickname,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    }

    Auth::login($user);

    return redirect('/home');
});


Route::get('/auth2/redirect', function () {
    return Socialite::driver('google')->stateless()->redirect();
})->name('auth2.google');



Route::get('auth2/callback', function () {
    // $user = Socialite::driver('google')->stateless()->user();
    // dd($user);
    // $user->token
    $googleUser = Socialite::driver('google')->stateless()->user();

    // dd($googleUser);

    $user = User::where('google_id', $googleUser->id)->first();

    if ($user) {
        $user->update([
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]);
    } else {
        $user = User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_id' => $googleUser->id,
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]);
    }

    Auth::login($user);

    return redirect('/home');
});


