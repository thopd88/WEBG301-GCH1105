@extends('book.layout')
@section('title', 'Edit Book')
@section('content')
<form action="/books/{{$book->id}}" method="post">
    {{ method_field('PUT') }}
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Book Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Book Title" value="{{$book->title}}">
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Book Author</label>
        <input type="text" class="form-control" id="author" name="author" placeholder="Book Author" value="{{$book->author}}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Book Description</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{$book->description}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection