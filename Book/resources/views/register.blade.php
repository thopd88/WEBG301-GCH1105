@extends('layout.layout')
@section('title', 'Register')
@section('content')
<form action="/register" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required>
    </div>
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" required>
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
    </div>
    <div class="form-group">
        <label for="pwd">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Enter password" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
@endsection