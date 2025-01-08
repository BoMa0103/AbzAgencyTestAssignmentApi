<?php
/**
 * Description of IndexUsersRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Http\Controllers\Users\Requests;

use App\Services\Users\DTO\SearchUsersDTO;

class IndexUsersRequest
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
            'page' => request('page'),
            'count' => request('count'),
        ]);
    }
}
