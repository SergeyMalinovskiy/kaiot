<?php

namespace App\Common\Filters\User\Partials;

use Illuminate\Database\Eloquent\Builder;

class FullnameFilter implements \App\Common\Interfaces\QueryFilterInterface
{

    private $fullname;
    public function __construct(string $fullname)
    {
        $this->fullname = $fullname;
    }
    /**
     * @inheritDoc
     */
    public function apply(Builder $query)
    {
        if ($this->fullname)
        {
            return $query
                    ->whereRaw('CONCAT(surname, \' \', name) ILIKE ?', [$this->fullname])
                    ->orWhereRaw('CONCAT(name, \' \', surname) ILIKE ?', [$this->fullname]);
        }

        return $query;
    }
}
