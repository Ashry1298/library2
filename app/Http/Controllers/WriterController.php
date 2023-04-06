<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Composer;

class WriterController extends Controller
{
    public function index()
    {
        $writers = Writer::get();
        return view('writers.index', compact('writers'));
    }

    public function show($id)
    {
        $writer = Writer::findorfail($id);
        return view('writers.show', compact('writer'));
    }

    public function create()
    {
        return view('writers.create');
    }


    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:64']);
        $book = Writer::create([
            'name' =>  $request->name
        ]);
        return redirect()->route('writer.index');
    }

    public function edit($id)
    {
        $writer = Writer::findorfail($id);
        return view('writers.edit', compact('writer'));
    }


    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:64']);
        $writer = Writer::findorfail($id);
        $writer->update([
            'name' => $request->name,
        ]);
        return redirect()->route('writer.index');
    }


    public function destroy($id)
    {
        $writer=Writer::where('id',$id)->delete();
        return redirect()->route('writer.index');
    }
}
