<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Book;
use \App\Models\Author;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        if(!Auth::check()) {
            return redirect('/login');
        }

        $books = Book::all();

        return view('book.index', [
            'books' => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('book.create',[
            'authors' => $authors,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = new Book();

        $book->title = $request->title;
        $book->author_id = $request->author;
        $book->category_id = $request->category;
        $book->description = $request->description;

        $book->save();
        $book->tags()->attach($request->tags);

        return redirect('/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);

        return view('book.show', [
            'book' => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        $authors = Author::all();
        $categories = Category::all();
        $tags = Tag::all();

        return view('book.edit', [
            'book' => $book,
            'authors' => $authors,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);

        $book->title = $request->title;
        $book->author_id = $request->author;
        $book->category_id = $request->category;
        $book->tags()->sync($request->tags);
        $book->description = $request->description;

        $book->save();

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);

        $book->delete();

        return redirect('/books');
    }
}
