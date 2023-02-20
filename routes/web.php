<?php

use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

Auth::routes(['verify' => true]);




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); //add admin controller & dashboard Home path

Route::group(['prefix'=>'admin', 'middleware'=>['auth','dashboard']],function(){

    Route::get('categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');

    Route::post('categories', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');

    Route::get('categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');

    Route::get('categories/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');

    Route::get('categories/{id}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit')->middleware('admin');

    Route::put('categories/{id}/edit', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update')->middleware('admin');

    Route::delete('categories/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy')->middleware('admin');

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    Route::get('products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');

    Route::post('products', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');

    Route::get('products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');

    Route::get('products/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');

    Route::get('products/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit')->middleware('admin');

    Route::put('products/{id}/edit', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update')->middleware('admin');

    Route::delete('products/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy')->middleware('admin');


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    Route::get('users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');

    Route::post('users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');

    Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('users/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');

    Route::get('users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit')->middleware('admin');

    Route::put('users/{id}/edit', [App\Http\Controllers\UserController::class, 'update'])->name('users.update')->middleware('admin');

    Route::delete('users/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy')->middleware('admin');


    Route::get('/', function(){
        // dd('test');
        return view('admin.dashboard');
    });
});

    Route::get('home',[HomeController::class,'index'])->name('home');

    Route::get('about',[HomeController::class,'about'])->name('about');

    Route::get('products',[HomeController::class,'products'])->name('products');

    Route::group([
        'middleware'=>'auth'
    ],function(){
        Route::get('account',[HomeController::class,'account'])->name('account');

        Route::get('addtocart/{product_id}', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');

        Route::get('cart/delete/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
    });



    use Laravel\Socialite\Facades\Socialite;

    Route::get('/auth/redirect', function () {
        return Socialite::driver('github')->redirect();
    });

    Route::get('/auth/github/callback', function () {
        $githubUser = Socialite::driver('github')->user();


        $user = User::where('email', $githubUser->email)->first();

        if (!$user){
            $user = new User();

        $user->name = $githubUser->name;
        $user->email = $githubUser->email;
        $user->password = Hash::make(uniqid());


        $user->save();
    }
    Auth::login($user);
    return redirect(url('home'));

        // dd($user);

        // $user->token
    });
