@extends('layout.layout')
@section('title', 'New Author')
@section('content')
<form action="/authors" method="post">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Author Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Author Name">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Author Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Author Email">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Author Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Author Phone">
    </div>
    <div class="mb-3">
        <label for="biodata" class="form-label">Author Biodata</label>
        <textarea class="form-control" id="biodata" name="biodata" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection