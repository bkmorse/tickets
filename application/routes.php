<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::controller('group');
Route::controller('user');
Route::controller('category');
Route::controller('ticket');
Route::controller('download');

Route::filter('pattern: /*', 'auth');

Route::filter('admin', function()
{
  if( !Session::has('user_id') )
    return Redirect::to('login')->with('status', 'Please login first');
  $user = User::find( Session::get('user_id') );
  if( !$user->admin )
    return Redirect::to('ticket')->with('status', 'You are not an admin');
});

// admin routes begin
Route::get('user/add', array('before' => 'admin', 'uses' => 'user@add'));
Route::get('category/add', array('before' => 'admin', 'uses' => 'category@add'));
Route::get('group/add', array('before' => 'admin', 'uses' => 'group@add'));
// admin routes end

//Route::get( 'group/add', array('before' => 'auth|csrf') );

// LOGIN 
Route::post('login', function() {
  $salt = User::where( 'email', '=', Input::get('username') )->only('salt');
  $subsalt = '12301980';

  $userdata = array(
    'username'  =>  Input::get('username'),
    'password'  =>  $subsalt . $salt . Input::get('password')
  );

  if( Auth::attempt( $userdata ) ):
    $user = User::where('email', '=', Input::get('username'))->first();
    Session::put('user_id', $user->id);
    Session::put('is_admin', $user->admin);
    return Redirect::to('ticket');
  else:
    return Redirect::to('login')->with('login_errors', true);
  endif;
});

Route::get('logout', function () {
  Auth::logout();
  Session::flush();
  return Redirect::to('login')->with('status', 'You are now logged out');
});

Route::get('login', function () {
  Return View::make('login');
});
// END LOGIN


Route::get('/', 'home@dashboard');

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});