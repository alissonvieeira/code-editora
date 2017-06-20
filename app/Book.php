<?php

namespace CodePub;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Book extends Model implements TableInterface
{
    protected $fillable = [
        'author_id', 'title', 'subtitle', 'price'
    ];

    public function author()
    {
        return $this->belongsTo('CodePub\Models\User');
    }

    public function getTableHeaders()
    {
        return ['#', 'Título', 'Subtítulo', 'Preço'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case '#':
                return $this->id;
            case 'Título':
                return $this->title;
            case 'Subtítulo':
                return $this->subtitle;
            case 'Preço':
                return $this->price;
        }

        return $this->$header;
    }
}
