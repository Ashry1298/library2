<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BookValidation;
use App\Http\Requests\UpdateBookValidation;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::get();
        $categories=Category::get();
        return view('books.index',['books'=>$books,'categories'=>$categories]);
    }

    public function show(Book $book)
    {
        return view("books.show", compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }


    public function store(BookValidation $request)
    {
        $img = $request->img;
        $ext = $img->getClientOriginalExtension();
        $name = 'book-' . uniqid() . $ext;
        $img->move(public_path("uploads/books"), $name);
        $book = Book::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'img' => $name,
        ]);
        return redirect()->route('book.index');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }


    public function update(UpdateBookValidation  $request, string $id)
    {
        $book = Book::findorfail($id);
        $book->update([
            'title' => $request->title,
            'desc' => $request->desc
        ]);
        return redirect()->route('book.index');
    }


    public function destroy(Book $book)
    {
        if ($book->img) {
            unlink(public_path('uploads/books/' . $book->img));
        }
        $book->delete();
        if ($book) {
            $success = 'Book Deleted Successfully';
            return redirect()->route('book.index');
        }
    }
}
