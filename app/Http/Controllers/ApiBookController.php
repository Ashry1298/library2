<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ApiBookController extends Controller
{

    public function index()
    {
        $books = Book::get();
        return response()->json($books);
    }
    public function show(Book $id)
    {
        return response()->json($id);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'desc' => 'required|string',
            'img' => 'required|image|mimes:jpg,bmp,png'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }
        $img = $request->file('img');
        $ext = $img->getClientOriginalExtension();
        $name = "book-" . uniqid() . $ext;
        $book =  Book::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'img' => $name
        ]);
        if ($book) {
            $success = "Book Created Successfully";
            return response()->json($success);
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'desc' => 'required|string',
        ]);

        $book = Book::where('id', $id)->update([
            'title' => $request->title,
            'desc' => $request->desc,
        ]);
        if ($book) {
            $success = "Book Updated Successfully";
            return response()->json($success);
        }
    }


    public function destroy(Book $book)
    {

        unlink(public_path('uploads/books/' . $book->img));
        $book->delete();
        if ($book) {
            $success = "Book Deleted Successfully";
            return response()->json($success);
        }
    }
}
