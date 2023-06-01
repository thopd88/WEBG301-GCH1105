@extends('layout.layout')
@section('title', 'Author Details')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{$author->name}}</h4>
            <p class="card-text">{{$author->email}}</p>
            <p class="card-text">{{$author->phone}}</p>
            <p class="card-text">{{$author->biodata}}</p>
        </div>
    </div>
@endsection