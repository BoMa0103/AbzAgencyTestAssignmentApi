<?php
/**
 * Description of CreateUserHandler.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Services\Users\Handlers;

use App\Services\Users\DTO\StoreUserDTO;
use App\Services\Users\Repositories\UserRepository;

class CreateUserHandler
{
    public function __construct(
        private readonly UserRepository $userRepository,
    ) {
    }

    public function handle(StoreUserDTO $storeUserDTO): int
    {
        return $this->userRepository->createFromArray([
            'name' => $storeUserDTO->getName(),
            'email' => $storeUserDTO->getEmail(),
            'phone' => $storeUserDTO->getPhone(),
            'position_id' => $storeUserDTO->getPositionId(),
            'photo' => $storeUserDTO->getPhoto(),
        ]);
    }
}
