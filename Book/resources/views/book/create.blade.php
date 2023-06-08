@extends('layout.layout')
@section('title', 'New Book')
@section('content')
<form action="/books" method="post">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Book Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Book Title">
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Book Author</label>
        <select id="author" name="author" class="form-select" aria-label="Select Author">
            <option selected>Please choose one</option>
            @foreach($authors as $author)
            <option value="{{$author->id}}">{{$author->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Book Category</label>
        <select id="category" name="category" class="form-select" aria-label="Select Category">
            <option selected>Please choose one</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="tags" class="form-label">Book Tags</label>
        <select id="tags" name="tags[]" class="form-select" aria-label="Select Tags" multiple>            
            @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Book Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection