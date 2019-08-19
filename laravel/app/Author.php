<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'author';
    protected $primaryKey = 'author_id';
    protected $fillable = [
        "author_name",
        "active",
        "created_at",
        "updated_at"
    ];
}
