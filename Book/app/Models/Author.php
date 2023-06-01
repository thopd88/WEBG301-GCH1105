<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Books;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    protected $fillable = [
        'name', 'email', 'phone', 'biodata'
    ];

    public function books(){
        return $this->hasMany(Book::class);
    }

}
