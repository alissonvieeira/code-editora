<?php

namespace CodePub\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindBySubtitleCriteriaCriteria
 * @package namespace CodePub\Criteria;
 */
class FindBySubtitleCriteriaCriteria implements CriteriaInterface
{
    private $subtitle;

    public function __construct($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('subtitle', 'LIKE', "%{$this->subtitle}%");
    }
}
