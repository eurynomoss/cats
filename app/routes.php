<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**2nd solution
 * Route::model('cat', 'Cat');
 */

Route::get('/', function(){
	return Redirect::to('cats');
});

Route::get('cats', function(){
	$cats = Cat::all();
	return View::make('cats.index')
		->with('cats', $cats);
});

Route::get('cats/breeds/{name}', function($name){
	$breed = Breed::whereName($name)->with('cats')->first();
	return View::make('cats.index')
		->with('breed', $breed)
		->with('cats', $breed->cats);
});

Route::get('cats/{id}', function($id)
{
	$cat = Cat::find($id);
	return View::make('cats.single')
		->with('cat', $cat);
})->where('id', '[0-9]+');

/**2nd solution
 * Route::get('cats/{cat}', function(Cat $cat) {
 * return View::make('cats.single')
 * ->with('cat', $cat);
 * });
 */

Route::get('about', function(){
	return View::make('about')->with('number_of_cats', 9000);
});