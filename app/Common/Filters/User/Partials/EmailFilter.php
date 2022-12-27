<?php

namespace App\Common\Filters\User\Partials;

use Illuminate\Database\Eloquent\Builder;

class EmailFilter implements \App\Common\Interfaces\QueryFilterInterface
{

    /**
     * @var string
     */
    private $email;
    public function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * @inheritDoc
     */
    public function apply(Builder $query)
    {
        if ($this->email)
        {
            return $query->where('email', $this->email);
        }

        return $query;
    }
}
