<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\StudentController;

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

Route::get('/', [PageController::class, 'home'])->name('homePage');
// Route::get('/about', [PageController::class, 'about'])->name('aboutPage');

Route::view('about','/about');  // another way to create single page specify route 

// If you want to not define any parameter, you should do 2 things. Example below: the id should be (id?) and receive the function parameter (id) define null
// Route::get('/contact/{id?}', function(string $id = null){
//      return "hello $id";
// });


Route::get('/contact/{id}', function(string $id){
   return "hello $id";
})->where('id', '[a-zA-Z]+');




// students
route::group(['prefix' => '/student'], function () {
   route::get('/manage', [StudentController::class, 'manage'])->name('student.manage');
   // route::get('/create', [StudentController::class, 'create'])->name('student.create');
   // route::post('/store', [StudentController::class, 'store'])->name('student.store');
   // route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
   // route::post('/update/{id}', [StudentController::class, 'update'])->name('student.update');
   // route::get('/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');
});
