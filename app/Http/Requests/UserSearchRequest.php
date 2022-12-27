<?php

namespace App\Http\Requests;

use Carbon\Carbon;

class UserSearchRequest extends \Illuminate\Foundation\Http\FormRequest
{
    const SEARCH_FIELD_NAME = 'search';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            self::SEARCH_FIELD_NAME  => 'string|nullable|max:255',
            'from'  => 'date|nullable',
            'to'    => 'date|nullable',
            'is_verified' => 'bool|nullable'
        ];
    }

    /**
     * @return string
     */
    public function getSearchText(): string
    {
        return $this->get(self::SEARCH_FIELD_NAME) ?? '';
    }
}
