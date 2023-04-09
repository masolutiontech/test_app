<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table="books";

    public function author()
    {
        return $this->belongsTo(USer::class,'author_id');
    }
}
