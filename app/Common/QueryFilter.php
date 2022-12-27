<?php

namespace App\Common;

use App\Common\Interfaces\QueryFilterInterface;

abstract class QueryFilter implements QueryFilterInterface
{

    private $subFilters = [];

    /**
     * @param QueryFilterInterface $filter
     */
    public function addFilter(QueryFilterInterface $filter)
    {
        $this->subFilters[] = $filter;
    }

    /**
     * @param array<QueryFilterInterface> $filters
     */
    public function addFilters(array $filters)
    {
        foreach ($filters as $filter)
            $this->addFilter($filter);
    }

    /**
     * @return array<QueryFilterInterface>
     */
    public function getNestedFilters(): array
    {
        return $this->subFilters;
    }

}
