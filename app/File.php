<?php

namespace LinksApp;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';

    protected $fillable = [
        'name', 'hash', 'user_id',
    ];

    public $timestamps = true;
}
