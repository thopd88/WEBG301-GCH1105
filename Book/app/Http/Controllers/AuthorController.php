<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();

        return view('author.index', [
            'authors' => $authors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("author.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $author = new Author();

        $author->name = $request->name;
        $author->email = $request->email;
        $author->phone = $request->phone;
        $author->biodata = $request->biodata;
        $photo = $request->file('photo')->store('public');
        $author->photo = substr($photo,strlen('public/'));


        // http://127.0.0.1:8000/upload/z4QI9El9zF9jCv3Su9V1xfPn5NXtpqRfYLaTK8NF.png

        $author->save();

        return redirect('/authors');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $author = Author::find($id);
        return view('author.show', [
            'author' => $author,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author = Author::find($id);
        return view('author.edit', [
            'author' => $author,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $author = Author::find($id);

        $author->name = $request->name;
        $author->email = $request->email;
        $author->phone = $request->phone;
        $author->biodata = $request->biodata;

        $author->save();

        return redirect('/authors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::find($id);

        $author->delete();

        return redirect('/authors');
    }
}
