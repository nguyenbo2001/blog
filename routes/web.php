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

Route::get('/', function() {
  return view('welcome');
});

// Route::get('/', "HomeController@welcome");

Route::get('user/{id}', function($id) {
  echo 'User: ' . $id;
})->where('id', '[0-9]+');

Route::get('user/{name?}', function(string $name = 'John') {
  echo 'Hello, My name is ' . $name;
})->where('name', '[A-Za-z]+');

Route::get('user/{id}/{name}', function($id, $name) {
  echo 'User ID: ' . $id . ' - User Name: ' . $name;
})->where(['id' => '[0-9]+', 'name' => '[a-zA-Z]+']);

// Route::get('posts/{post}/comments/{comment}', function($post, $comment) {
//   // to do something
// });

Route::redirect('/home', '/', 301);

Route::view('welcome', 'welcome');

Route::view('welcome', 'welcome', ['name' => 'Taylor']);

Route::get('user/list', function() {
  echo 'List of users';
})->name('user.list');

Route::get('search/{search}', function($search) {
  return $search;
})->where('search', '.*');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', function() {
      // To do something
    });
});


Route::get('check-age/{age}', function($age) {
  echo 'Check age is less than > 18';
})->middleware(\App\Http\Middleware\CheckAge::class);

Route::get('check-age/{age}', function($age) {
  echo 'Check age is less than > 18';
})->middleware('check.age');

Route::put('post/{id}', function($id) {
  // to do something
})->middleware('role:editor');

Route::get('terminate', [
  'middleware' => 'terminate',
  'uses' => 'HomeController@terminate'
]);


// Route::middleware(['first', 'second'])->group(function() {
//   Route::get('/', function() {
//     // first & second is name of middleware
//     // uses first and second Middleware
//   });
// });

Route::namespace('Admin')->group(function() {
  // Controllers within the 'App\Http\Controllers\Admin' namespace
});


// Route::get('post/{id}', function($id) {
//   // find the post using the $id
//   $post = Post::find($id);

//   // if not found the post, return 404
//   if ( ! $post ) return abort(404);

//   // return view with the post
//   return view('posts.show', compact('post'));
// });


// Route::get('post/{post}', function(App\Post $post) {
//   return view('posts.show', compact('post'));
// });

// Route::bind('post', function($value) {
//   return App\Post::find($value)->where('status', '=', 'publish')
//                   ->first();
// });

Route::group(['domain' => '{account}.blog.loc'], function () {
  Route::get('user/{id}', function($account, $id) {
    echo $account . ' - ' . $id;
  });
});

Route::group(['prefix' => 'admin'], function() {
  Route::get('users', function() {
    // Matches the "/admin/users" URL
  });
});

Route::name("admin.")->group(function() {
  Route::get("users", function() {
    // Route assigned name "admin.users"
  });
});

Route::view('form', 'form');


Route::get('get-route', function() {
  echo 'Route::current() : ' . print_r(Route::current());
  echo '<br>';
  echo 'Route::currentRouteName() : ' . print_r(Route::currentRouteName());
  echo '<br>';
  echo 'Route::currentRouteAction() : ' . print_r(Route::currentRouteAction());
});

Route::get('foo', 'Photos\AdminController@method');


// Application Route

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('user/{id}', 'UserController@show');

Route::get('profile/{id}', 'ShowProfile');

Route::resource('photos', 'PhotoController', ['names' => [
  'create' => 'photo.build'
]]);

Route::resources([
  'photos' => 'PhotoController',
  'posts' => 'PostController',
]);

Route::resource('photo', 'PhotoController', ['only' => ['index', 'show']]);

Route::resource('photo', 'PhotoController', ['except' => ['create', 'store', 'update', 'destroy']]);

Route::apiResource('photos', 'PhotoController');

// Route::apiResources([
//   'photos' => 'PhotoController',
//   'posts' => 'PostController',
// ]);

Route::resource('users', 'AdminUserController')->parameters([
  'users' => 'admin_user'
]);
