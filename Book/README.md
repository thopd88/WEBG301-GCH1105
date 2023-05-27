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