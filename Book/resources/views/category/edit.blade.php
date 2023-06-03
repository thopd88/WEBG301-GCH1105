@extends('layout.layout')
@section('title', 'Edit Category')
@section('content')
<form action="/categories/{{$category->id}}" method="post">
    {{ method_field('PUT') }}
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" class="form-control" id="name" value="{{$category->name}}" name="name" placeholder="Category Name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection