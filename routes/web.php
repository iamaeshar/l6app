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

use Illuminate\Support\Facades\Artisan;

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/', 'WelcomeController@welcome');

// Email Verification
// Auth::routes(['verify' => true]);
Auth::routes();

Route::match(['get', 'post'], '/home', 'HomeController@index')->name('home');

// Example of Multi Middleware with Gate:isAdmin
// Route::prefix('admin')->middleware(['auth', 'password.confirm', 'verified', 'can:isAdmin'])->group(function () {

// Gate With Parameter
// Route::prefix('admin')->middleware(['auth', 'can:isAllowed, "Administrator:Subscriber:Publisher"'])->group(function () {
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::view('/', 'dashboard.index');
    Route::resource('users', 'UserController');
    Route::resource('pages', 'PageController');
    Route::resource('posts', 'PostController');
    Route::resource('posts', 'PostController');
    Route::resource('profiles', 'UserProfileController');
    Route::resource('categories', 'CategoryController');
    Route::resource('categories', 'CategoryController');
    Route::resource('roles', 'RoleController');
    Route::post('upload', function () {
        $filename = sprintf('tiny_%s.jpg', random_int(1, 1000));
        if (request()->hasFile('file')) {
            $filename = request()->file('file')->storeAs('tiny', $filename, 'public');
        } else {
            $filename = null;
        }

        if ($filename !== null) {
            return response()->json(['location' => asset('storage/' . $filename)], 200);
        } else {
            return response()->json(['location' => 'File not uploaded'], 200);
        }
    });
});
