<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * 1 x n
     */
    public function translates()
    {
        return $this->hasMany(Translate::class);
    }
}
