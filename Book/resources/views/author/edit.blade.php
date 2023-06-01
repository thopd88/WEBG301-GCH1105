@extends('layout.layout')
@section('title', 'Edit Author')
@section('content')
<form action="/authors/{{$author->id}}" method="post">
    {{ method_field('PUT') }}
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Author Name</label>
        <input type="text" class="form-control" id="name" value="{{$author->name}}" name="name" placeholder="Author Name">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Author Email</label>
        <input type="text" class="form-control" id="email"  value="{{$author->email}}" name="email" placeholder="Author Email">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Author Phone</label>
        <input type="text" class="form-control" id="phone" value="{{$author->phone}}" name="phone" placeholder="Author Phone">
    </div>
    <div class="mb-3">
        <label for="biodata" class="form-label">Author Biodata</label>
        <textarea class="form-control" id="biodata" name="biodata" rows="3">{{$author->biodata}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection