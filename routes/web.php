<?php

use App\Http\Controllers\appController;
use App\Http\Controllers\edituserController;
use App\Http\Controllers\resumesController;
use App\Http\Controllers\webController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
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
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('frontend.panel');
})->middleware(['auth'])->name('dashboard');




require __DIR__.'/auth.php';



Route::get('laravel', [webController::class, "laravel"])->name('laravel');
Route::get('symfony', [webController::class, "symfony"])->name('symfony');
Route::get('phpreact', [webController::class, "phpreact"])->name('phpreact');
Route::get('swoole', [webController::class, "swoole"])->name('swoole');
Route::get('index', [webController::class, "index"])->name('home');
Route::get('editUser', [appController::class, "editUser"])->name('edituser');
Route::get('myarea', [appController::class, "myArea"])->name('myarea');
Route::get('uploadCurriculum', [appController::class, "uploadcurriculum"])->name('uploadcurriculum');
Route::post('uploadcv', [resumesController::class,"insert"])->name('uploadcv');
Route::delete('deletecv/{id}', [resumesController::class,"delete"])->name('deletecv');
Route::POST('updateuser', [edituserController::class,"editUser"])->name('updateuser');





Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
})->name('google');

Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();
    $userExist = user::where('external_id',$user->id)->where('external_auth','google')->first();
    if($userExist){
        auth::login($userExist);
    }else{
        $userNew = user::create([
            'name'=>$user->name,
            'email'=>$user->email,
            'avatar'=>$user->avatar,
            'external_id'=>$user->id,
            'external_auth' => 'google',
        ]);
        auth::login($userNew);

    }
    return redirect('/dashboard');

});

Route::get('/login-linkedin', function () {
    return Socialite::driver('linkedin')->redirect();
})->name('linkedin');

Route::get('/linkedin-callback', function () {
    $user = Socialite::driver('linkedin')->user();
    $userExist = user::where('external_id',$user->id)->where('external_auth','linkedin')->first();
    if($userExist){
        auth::login($userExist);
    }else{
        $userNew = user::create([
            'name'=>$user->name,
            'email'=>$user->email,
            'avatar'=>$user->avatar,
            'external_id'=>$user->id,
            'external_auth' => 'linkedin',
        ]);
        auth::login($userNew);

    }
    return redirect('/dashboard');
});

Route::get('/login-stack', function () {
    return Socialite::driver('stackexchange')->redirect();
})->name('stack');

Route::get('/stack-callback', function () {
    $user = Socialite::driver('stackexchange')->user();
    dd($user);
});

Route::get('/login-github', function () {
    return Socialite::driver('github')->redirect();
})->name('github');

Route::get('/github-callback', function () {
    $user = Socialite::driver('github')->user();
    $userExist = user::where('external_id',$user->id)->where('external_auth','github')->first();
    if($userExist){
        auth::login($userExist);
    }else{
        $userNew = user::create([
            'name'=>$user->nickname,
            'email'=>$user->email,
            'avatar'=>$user->avatar,
            'external_id'=>$user->id,
            'external_auth' => 'github',
        ]);
        auth::login($userNew);

    }
    return redirect('/dashboard');


});
