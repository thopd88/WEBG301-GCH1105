@extends('book.layout')
@section('title', 'Book List')
@section('content')
<div class="table-responsive">
  <table class="table table-striped table-hover">
      <thead class="table-light">
          <tr>
              <th>Title</th>
              <th>Author</th>
              <th>Action</th>
          </tr>
          </thead>
          <tbody class="table-group-divider">
                @foreach ($books as $book)
                <tr class="table-primary" >
                  <td>
                    <a href="{{url("/books/".$book->id)}}">
                    {{$book->title}}
                    </a>
                  </td>
                  <td>{{$book->author}}</td>
                  <td>
                    <a href="{{url("/books/".$book->id)}}" class="btn btn-primary">View</a>
                    <a href="{{url("/books/".$book->id."/edit")}}" class="btn btn-warning">Edit</a>
                    <form action="{{url("/books/".$book->id)}}" method="post" class="d-inline">
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
