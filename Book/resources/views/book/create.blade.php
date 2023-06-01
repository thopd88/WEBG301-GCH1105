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
        <label for="description" class="form-label">Book Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection