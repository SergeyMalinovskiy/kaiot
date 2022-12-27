<?php

namespace App\Common\Filters\User\Partials;

use Illuminate\Database\Eloquent\Builder;

class UsernameFilter implements \App\Common\Interfaces\QueryFilterInterface
{
    /**
     * @var string
     */
    private $username;

    public function __construct(string $username)
    {
        $this->username = $username;
    }
    /**
     * @inheritDoc
     */
    public function apply(Builder $query)
    {
        if ($this->username)
        {
            return $query->where('username', $this->username);
        }

        return $query;
    }
}
