@extends('layout.layout')
@section('title', 'Author List')
@section('content')
<div class="table-responsive">
  <table class="table table-striped table-hover">
      <thead class="table-light">
          <tr>
              <th>Name</th>
              <th>Photo</th>
              <th>Email</th>
              <th>Action</th>
          </tr>
          </thead>
          <tbody class="table-group-divider">
                @foreach ($authors as $author)
                <tr class="table-primary" >
                  <td>
                    <a href="{{url("/authors/".$author->id)}}">
                    {{$author->name}}
                    </a>
                  </td>
                  <td>
                    <img src="{{url("/upload/".$author->photo)}}" class="img-fluid rounded-top" alt="">
                  </td>
                  <td>{{$author->email}}</td>
                  <td>
                    <a href="{{url("/authors/".$author->id)}}" class="btn btn-primary">View</a>
                    <a href="{{url("/authors/".$author->id."/edit")}}" class="btn btn-warning">Edit</a>
                    <form action="{{url("/authors/".$author->id)}}" method="post" class="d-inline">
                      {{ method_field('DELETE') }}
                      @csrf
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
          </tbody>
          <tfoot>
              
          </tfoot>
  </table>
</div>

@endsection
