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

    public Const ACTIVE = 1;
    public Const DEACTIVE = 0;
    public Const DEACTIVE2 = 2;

    public static $_StatusLabel = [
        self::ACTIVE => "active",
        self::DEACTIVE => "Deactive",
        self::DEACTIVE2 => "Deactive2",
    ];

    public function getStatus(){
        if($this->active){
            return "Active";
        }
        return "Deactive";
    }
}
