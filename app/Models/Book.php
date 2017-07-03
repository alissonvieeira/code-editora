<?php

namespace CodePub\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Book extends Model implements TableInterface
{
    protected $fillable = [
        'author_id', 'title', 'subtitle', 'price'
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getTableHeaders()
    {
        return ['#', 'Título', 'Subtítulo', 'Autor', 'Preço'];
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
            case 'Autor':
                return $this->author->name;
            case 'Preço':
                return $this->price;
        }

        return $this->$header;
    }
}
