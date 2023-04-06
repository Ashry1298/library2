<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryValidation;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        
        return view("categories.show", compact('category'));
    }

    public function create()
    {
        return view('categories.create');
    }
    
    public function store(CategoryValidation $request)
    {
        $category = Category::create([
            'name' => $request->name,
        ]);
        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }


    public function update(CategoryValidation $request, string $id)
    {
        $category = Category::findorfail($id);
        $category->update([
            'name' => $request->name,
        ]);
        return redirect()->route('category.index');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
