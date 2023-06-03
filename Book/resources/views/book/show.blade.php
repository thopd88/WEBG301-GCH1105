@extends('layout.layout')
@section('title', 'Book List')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{$book->title}}</h4>
            <h6 class="card-subtitle mb-2 text-muted">{{$book->author->name}}</h6>
            <h6 class="card-subtitle mb-2 text-muted">{{$book->category->name}}</h6>
            <p class="card-text">{{$book->description}}</p>
        </div>
    </div>
@endsection