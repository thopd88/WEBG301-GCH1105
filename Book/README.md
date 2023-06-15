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

```
public function store(Request $request)
{
    $book = new Book();

    $book->title = $request->title;
    $book->author_id = $request->author_id;
    $book->description = $request->description;

    $book->save();

    return redirect('/books');
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

# Add Tags
## Create Model and Migration
```php artisan make:model Tag -m```

## Migration (tags table)
```
$table->string('name');
```

## Model (Tag.php)
```
public function books()
{
    return $this->belongsToMany(Book::class);
}
```

## Model (Book.php)
```
public function tags()
{
    return $this->belongsToMany(Tag::class);
}
```

## Migration (book_tag table)
```
$table->foreignId('book_id')->constrained()->onDelete('cascade');
$table->foreignId('tag_id')->constrained()->onDelete('cascade');
```

## Controller (BookController.php)
```
public function create()
{
    $authors = Author::all();
    $tags = Tag::all();
    return view('books.create', compact('authors', 'tags'));
}
```

```
public function store(Request $request)
{
    $book = new Book();

    $book->title = $request->title;
    $book->author_id = $request->author_id;
    $book->description = $request->description;

    $book->save();

    $book->tags()->attach($request->tags);

    return redirect('/books');
}
```

```
public function edit($id)
{
    $book = Book::find($id);
    $authors = Author::all();
    $tags = Tag::all();
    return view('books.edit', compact('book', 'authors', 'tags'));
}
```

```
public function update(Request $request, $id)
{
    $book = Book::find($id);

    $book->title = $request->title;
    $book->author_id = $request->author_id;
    $book->description = $request->description;

    $book->save();

    $book->tags()->sync($request->tags);

    return redirect('/books');
}
```

## create.blade.php (book)
```
<div class="form-group">
    <label for="tags">Tags</label>
    <select name="tags[]" id="tags" class="form-control" multiple>
        @foreach($tags as $tag)
        <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
    </select>
</div>
```

## edit.blade.php (book)
```
<div class="form-group">
    <label for="tags">Tags</label>
    <select name="tags[]" id="tags" class="form-control" multiple>
        @foreach($tags as $tag)
        <option value="{{$tag->id}}" @if($book->tags->contains($tag->id)) selected @endif>{{$tag->name}}</option>
        @endforeach
    </select>
</div>
```

## login.blade.php
```
<form action="/login" method="post">
    @csrf
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" required>
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
    </div>
    @error('message')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Login</button>
</form>
@endsection
```

## register.blade.php
```
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
```

## web.php
```
Route::get('/login', AuthenticationController::class . '@loginIndex');
Route::get('/register', AuthenticationController::class . '@registerIndex');
Route::post('/login', AuthenticationController::class . '@login');
Route::post('/register', AuthenticationController::class . '@register');
Route::get('/logout', AuthenticationController::class . '@logout');
```

## AuthenticationController.php
```
public function loginIndex()
{
    return view('login');
}
```

```
public function registerIndex()
{
    return view('register');
}
```

```
public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended('/books');
    }

    return back()->withErrors([
        'message' => 'The provided credentials do not match our records.',
    ]);
}
```

```
public function register(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed',
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();

    Auth::login($user);

    return redirect('/books');
}
```

```
public function logout()
{
    Auth::logout();

    return redirect('/login');
}
```

## navbar.blade.php
```
<ul class="navbar-nav ml-auto">
@if (Auth::check())
    <li class="nav-item">
        <a class="nav-link" href="#">{{ Auth::user()->name }} <span class="visually-hidden"></span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/logout">Logout <span class="visually-hidden"></span></a>
    </li>
@else
    <li class="nav-item">
        <a class="nav-link" href="/login">Login <span class="visually-hidden"></span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/register">Register <span class="visually-hidden"></span></a>
    </li>
@endif
</ul>

## Authentication for Book List
# BookController.php
```
if(!Auth::check()) {
    return redirect('/login');
}
```

## Upload images
```
  $photo = $request->file('photo')->store('public');
  $author->photo = substr($photo,strlen('public/'));
```

```
php artisan storage:link
```