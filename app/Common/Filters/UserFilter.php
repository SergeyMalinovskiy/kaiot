<?php

namespace App\Common\Filters;

use App\Common\Filters\User\CredenitialCombinedFilter;
use App\Common\QueryFilter;
use App\Http\Requests\UserSearchRequest;

class UserFilter extends QueryFilter
{
    /**
     * @var UserSearchRequest
     */
    private $request;

    public function __construct(UserSearchRequest $request)
    {
        $this->request = $request;
    }

    public function apply(\Illuminate\Database\Eloquent\Builder $query)
    {
        return [
            new DaterangeFilter(null, null),
            new CredenitialCombinedFilter($this->request->getSearchText())
        ];
    }
}
