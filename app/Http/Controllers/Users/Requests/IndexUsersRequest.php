<?php

namespace App\Http\Controllers\Users\Requests;

use App\Services\Users\DTO\SearchUsersDTO;
use Illuminate\Foundation\Http\FormRequest;

class IndexUsersRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'page' => 'nullable|numeric',
            'count' => 'nullable|numeric',
        ];
    }

    public function getDTO(): SearchUsersDTO
    {
        return SearchUsersDTO::fromArray([
            'page' => $this->get('page'),
            'count' => $this->get('count'),
        ]);
    }
}
