## Create Laravel App
```composer create-project laravel/laravel Book```

## Create Model and Migration
```php artisan make:model Book -m```

## Create Controller
```php artisan make:controller BookController --resource```

--------------

## edit.blade.php
```
<form action="/books/{{$book->id}}" method="post">
        {{ method_field('PUT') }}
```
## index.blade.php Action column
```
<a href="{{url("/books/".$book->id."/edit")}}" class="btn btn-warning">Edit</a>
<form action="{{url("/books/".$book->id)}}" method="post" class="d-inline">
{{ method_field('DELETE') }}
@csrf
<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
</form>
```

-------
# Connect Books and Authors
## Migration (books table)
```
$table->foreignId('author_id')->constrained()->onDelete('cascade');
```
## Model (Book.php)
```
public function author()
{
    return $this->belongsTo(Author::class);
}
```
## Model (Author.php)
```
public function books()
{
    return $this->hasMany(Book::class);
}
```

## Controller (BookController.php)
```
public function create()
{
    $authors = Author::all();
    return view('books.create', compact('authors'));
}
```

## create.blade.php
```
<div class="form-group">
    <label for="author_id">Author</label>
    <select name="author_id" id="author_id" class="form-control">
        @foreach($authors as $author)
        <option value="{{$author->id}}">{{$author->name}}</option>
        @endforeach
    </select>
</div>
```