@extends('layout.layout')
@section('title', 'Category Details')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{$category->name}}</h4>
        </div>
    </div>
@endsection