<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'abbreviation', 'language_id'];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
