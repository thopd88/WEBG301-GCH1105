@extends('layout.layout')
@section('title', 'New Category')
@section('content')
<form action="/categories" method="post">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Category Name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection