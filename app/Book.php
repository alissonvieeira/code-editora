<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'author_id', 'title', 'subtitle', 'price'
    ];

    public function author()
    {
        return $this->belongsTo('App\Models\User');
    }
}
