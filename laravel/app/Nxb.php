<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nxb extends Model
{
    protected $table = 'nxb';
    protected $primaryKey = 'nxb_id';
    protected $fillable = [
        'nxb_name',
        'active',
        'created_at',
        'updated_at'
    ];
}
