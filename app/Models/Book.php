<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['testament_id', 'position', 'name', 'abbreviation'];

    public function testament()
    {
        return $this->belongsTo(Testament::class);
    }

    public function verses()
    {
        return $this->hasMany(Verse::class);
    }
}
