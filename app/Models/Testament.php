<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testament extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // 1 (testament) x n (books)
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
