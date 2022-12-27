<?php

namespace App\Common\Builders;

use App\Common\Interfaces\QueryFilterInterface;
use App\Common\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchBuilder
{
    const PER_PAGE = 50;
    /**
     * @var Builder
     */
    private $query;

    /**
     * @var LengthAwarePaginator|null
     */
    private $paginator;

    /**
     * @var array
     */
    private $registeredFilters = [];

    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    public function addFilter(QueryFilterInterface $filter): self
    {
        $this->handleFilter($filter);

        $this->registerFilter($filter);;

        return $this;
    }

    public function addFilters(array $filters): self
    {
        foreach ($filters as $filter)
        {
            $this->addFilter($filter);
        }

        return $this;
    }

    public function build(): Builder
    {
        return $this->query;
    }

    public function addPagination($perPage = self::PER_PAGE, $page = null, $pageName = 'page'): self
    {
        $this->paginator = $this->query->paginate($perPage ?? self::PER_PAGE, ['*'], $pageName, $page ?? 1);

        return $this;
    }

    public function getPaginator()
    {
        return $this->paginator;
    }

    /**
     * @param QueryFilterInterface $filter
     * @return void
     */
    private function handleFilter(QueryFilterInterface $filter)
    {
        $filterResult = $filter->apply($this->query);

        if (is_array($filterResult))
        {
            foreach ($filterResult as $nestedFilter)
                $this->handleFilter($nestedFilter);

            if ($filter instanceof QueryFilter)
                $filter->addFilters($filterResult);
        }
        else {
            $this->query = $filterResult;
        }
    }

    private function registerFilter(QueryFilterInterface $filter)
    {
        $this->registeredFilters[] = $filter;
    }

    public function getRegisteredFilters(): array
    {
        return $this->registeredFilters;
    }
}
