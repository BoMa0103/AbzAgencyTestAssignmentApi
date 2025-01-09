<?php
/**
 * Description of CreateUserRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Http\Controllers\Users\Requests;

use App\Services\Users\DTO\StoreUserDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:60',
            'email' => 'required|email',
            'phone' => 'required|string',
            'position_id' => 'required|numeric',
            'photo' => 'required|string',
        ];
    }

    public function getDTO(): StoreUserDTO
    {
        return StoreUserDTO::fromArray([
            'name' => $this->get('name'),
            'email' => $this->get('email'),
            'phone' => $this->get('phone'),
            'position_id' => $this->get('position_id'),
            'photo' => $this->get('photo'),
        ]);
    }
}
