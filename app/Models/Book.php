<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['testament_id', 'position', 'name', 'abbreviation', 'translate_id'];

    public function testament()
    {
        return $this->belongsTo(Testament::class);
    }

    public function verses()
    {
        return $this->hasMany(Verse::class);
    }

    public function translate()
    {
        return $this->belongsTo(Translate::class);
    }
}
