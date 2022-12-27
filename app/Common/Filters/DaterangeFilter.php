<?php

namespace App\Common\Filters;

use Illuminate\Database\Eloquent\Builder;

class DaterangeFilter implements \App\Common\Interfaces\QueryFilterInterface
{

    private $from;
    private $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }
    public function apply(Builder $query)
    {
        return $query;
    }
}
