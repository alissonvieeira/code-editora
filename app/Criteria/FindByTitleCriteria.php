<?php

namespace CodePub\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class FindByTitleCriteria implements CriteriaInterface {

    private $title;

    public function __construct($title)
    {
        $this->title = $title;
    }


    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('title', 'LIKE', "%{$this->title}%");
    }
}