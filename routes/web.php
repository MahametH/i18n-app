<?php
	
	use Illuminate\Support\Facades\Route;
	
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
	
	Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localize','localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function () {
		Route::get(LaravelLocalization::transRoute('routes.dashboard'), function () {
			return view('dashboard');
		})->middleware(['auth'])->name('dashboard');
		
		require __DIR__ . '/auth.php';
		
		Route::get('/', 'App\Http\Controllers\PostsController@index')->name('index');
		Route::get(LaravelLocalization::transRoute('routes.posts'), 'App\Http\Controllers\PostsController@show')->name('post');
		Route::post(LaravelLocalization::transRoute('routes.create'), 'App\Http\Controllers\PostsController@create')->name('create');
	});
