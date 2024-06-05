<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopularBook extends Model
{
    use HasFactory;
    function rel_to_book(){
        return $this->belongsTo(Book::class,'book_id');
    }
}
