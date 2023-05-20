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
## index.blade.php
```
<a href="{{url("/books/".$book->id."/edit")}}" class="btn btn-warning">Edit</a>
```