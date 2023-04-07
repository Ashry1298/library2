<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Symfony\Component\Routing\RouterInterface;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('Setlang')->group(function () {

    Route::middleware('IsLogin')->group(
        function () {
            Route::controller(BookController::class)->group(function () {
                Route::get("/books/create", 'create')->name('book.create');
                Route::post("/books/create", 'store')->name('book.store');
                Route::get("/books/edit/{book:id}", 'edit')->name('book.edit');
                Route::post("/books/update/{id}", 'update')->name('book.update');
                Route::get("/books/delete/{book:id}", 'destroy')->name('book.destroy');
            });
            Route::controller(CategoryController::class)->group(function () {
                Route::post("/categories/create", 'store')->name('category.store');
                Route::get("/categories/edit/{category:id}", 'edit')->name('category.edit');
                Route::post("/categories/update/{id}", 'update')->name('category.update');
                Route::get("/categories/create", 'create')->name('category.create');
                Route::get("/categories/delete/{category:id}", 'destroy')->name('category.destroy');
            });
            Route::controller(WriterController::class)->group(function () {
                Route::get("/writers/create", 'create')->name('writer.create');
                Route::get("/writers/edit/{id}", 'edit')->name('writer.edit');
                Route::post("/writers/store", 'store')->name('writer.store');
                Route::post("/writers/update/{id}", 'update')->name('writer.update');
                Route::get('/delete/{id}', 'destroy')->name('writer.delete');
            });
            //logout
            Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
        }
    );
    Route::middleware('IsNotLogin')->group(
        function () {
            Route::get("/register", [AuthController::class, 'register'])->name('auth.register');
            Route::post("/register", [AuthController::class, 'handleRegister'])->name('auth.handleRegister');
            Route::get("/login", [AuthController::class, 'login'])->name('auth.login');
            Route::post("/login", [AuthController::class, 'handleLogin'])->name('auth.handleLogin');
        }
    );
    //books

    //Auth 
    Route::get('/books/show/{book:id}', [BookController::class, 'show'])->name('book.show');
    //categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/categories/show/{category:id}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/books', [BookController::class, 'index'])->name('book.index');
    Route::get("/writers", [WriterController::class, 'index'])->name('writer.index');
    Route::get("/writers/show/{id}", [WriterController::class, 'show'])->name('writer.show');


    Route::get("/lang/en", [LangController::class, 'changetoenglish'])->name('lang.en');
    Route::get("/lang/ar", [LangController::class, 'changetoarabic'])->name('lang.ar');
});

// Route::get('/test',function ()
// {
//     return view('test');
// });

// Route::post('/testrequest',function(Request $request)
// {
//  return dd($request->all());
// })->name('testrequest');
