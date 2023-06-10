@extends('layout.layout')
@section('title', 'Login')
@section('content')
<form action="/login" method="post">
    @csrf
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" required>
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
    </div>
    @error('message')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Login</button>
</form>
@endsection