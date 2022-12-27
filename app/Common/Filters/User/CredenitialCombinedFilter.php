<?php

namespace App\Common\Filters\User;

use App\Common\Filters\User\Partials\EmailFilter;
use App\Common\Filters\User\Partials\FullnameFilter;
use App\Common\Filters\User\Partials\UsernameFilter;
use App\Common\Interfaces\QueryFilterInterface;
use Illuminate\Database\Eloquent\Builder;
use PHPUnit\Util\Filter;

class CredenitialCombinedFilter extends \App\Common\QueryFilter
{
    const FILTERS = [
        self::EMAIL_FILTER => EmailFilter::class,
        self::FULLNAME_FILTER => FullnameFilter::class,
        self::USERNAME_FILTER => UsernameFilter::class
    ];

    const EMAIL_FILTER = 'user_email_filter';
    const FULLNAME_FILTER = 'user_fullname_filter';
    const USERNAME_FILTER = 'user_username_filter';
    /**
     * @var string
     */
    private $credenitialText;
    public function __construct(string $credenitialText)
    {
        $this->credenitialText = $credenitialText;
    }

    /**
     * @inheritDoc
     */
    public function apply(Builder $query)
    {
        $filterClass = $this->getFilterByText($this->credenitialText);

        $filter = new $filterClass($this->credenitialText);

        if ($filter instanceof QueryFilterInterface)
        {
            return $filter->apply($query);
        }

        return $query;
    }


    private function getFilterByText($text): string
    {
        if ($this->isValidMail($text))
            return self::FILTERS[self::EMAIL_FILTER];

        if (count(explode(' ', $text)) >= 2)
            return self::FILTERS[self::FULLNAME_FILTER];
        else
            return self::FILTERS[self::USERNAME_FILTER];

        return '';
    }

    private function isValidMail($text)
    {
        return (bool)preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $text);
    }
}
