<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';

    protected $primaryKey = 'book_id';

    protected $fillable = [
        "book_name",
        "author_id",
        "nxb_id",
        "qty",
        "active",
        "created_at",
        "updated_at"
    ];
}
