<?php

namespace App\Common\Interfaces;

use Illuminate\Database\Eloquent\Builder;

interface QueryFilterInterface
{
    /**
     * @param Builder $query
     * @return Builder|array<self>
     */
    public function apply(Builder $query);
}
