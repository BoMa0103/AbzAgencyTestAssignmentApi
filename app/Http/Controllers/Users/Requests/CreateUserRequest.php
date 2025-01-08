<?php
/**
 * Description of CreateUserRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Http\Controllers\Users\Requests;

use App\Services\Users\DTO\StoreUserDTO;

class CreateUserRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:60',
            'email' => 'required|email',
            'phone' => 'required|string',
            'position_id' => 'required|numeric',
            'photo' => 'required|image|max:5120',
        ];
    }

    public function getDTO(): StoreUserDTO
    {
        return StoreUserDTO::fromArray([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'position_id' => request('position_id'),
            'photo' => request('photo'),
        ]);
    }
}
