@extends('layout.layout')
@section('title', 'Book List')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{$book->title}}</h4>
            <p class="card-text">{{$book->description}}</p>
        </div>
    </div>
@endsection