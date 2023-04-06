<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\WriterController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\RouterInterface;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('Setlang')->group(function () {

    Route::middleware('IsLogin')->group(
        function () {
            //books
            Route::get("/books/create", [BookController::class, 'create'])->name('book.create');
            Route::post("/books/create", [BookController::class, 'store'])->name('book.store');
            Route::get("/books/edit/{book:id}", [BookController::class, 'edit'])->name('book.edit');
            Route::post("/books/update/{id}", [BookController::class, 'update'])->name('book.update');
            Route::get("/books/delete/{book:id}", [BookController::class, 'destroy'])->name('book.destroy');
            //categories
            Route::post("/categories/create", [CategoryController::class, 'store'])->name('category.store');
            Route::get("/categories/edit/{category:id}", [CategoryController::class, 'edit'])->name('category.edit');
            Route::post("/categories/update/{id}", [CategoryController::class, 'update'])->name('category.update');
            Route::get("/categories/create", [CategoryController::class, 'create'])->name('category.create');
            Route::get("/categories/delete/{category:id}", [CategoryController::class, 'destroy'])->name('category.destroy');
            //writers
            Route::get("/writers/create", [WriterController::class, 'create'])->name('writer.create');
            Route::get("/writers/edit/{id}", [WriterController::class, 'edit'])->name('writer.edit');
            Route::post("/writers/store", [WriterController::class, 'store'])->name('writer.store');
            Route::post("/writers/update/{id}", [WriterController::class, 'update'])->name('writer.update');
            Route::get('/delete/{id}', [WriterController::class, 'destroy'])->name('writer.delete');
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
