
<?php
  //
  $namespace = 'App\\Http\\Controllers';
use App\Http\Controllers\ProfileController;
use App\Http\Controllers;
use App\Http\Controllers\BookController;
// ...

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
 Route::namespace('Auth')->middleware('guest:admin')->group(function(){
    //login co
    // Route::get('login','AuthenticatedSessionController@index')->name('login');
    Route::get('login', [App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'store'])->name('adminlogin');
});


Route::middleware('admin')->group(function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('dashboard');
});
Route::post('logout', [App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
//Route::post('/addBook', [BookController::class, 'addBook'])->name(addBook);
// Assigning a book
//Route::post('/assignBook', [BookController::class, 'assignBook'])->name(assignBook);
//use App\Http\Controllers\BookController;

// Example route for handling book creation
Route::post('/books', [BookController::class, 'store'])->name('books.store');
