<?php
/**
 * Description of UsersService.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Services\Users;

use App\Models\User;
use App\Services\Users\DTO\SearchUsersDTO;
use App\Services\Users\DTO\StoreUserDTO;
use App\Services\Users\Handlers\CreateUserHandler;
use App\Services\Users\Repositories\UserRepository;
use Illuminate\Support\Collection;

class UsersService
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly CreateUserHandler $createUserHandler,
    ) {
    }

    public function getUsers(SearchUsersDTO $dto): Collection
    {
        return $this->userRepository->getUsers($dto);
    }

    public function getUsersCount(): int
    {
        return $this->userRepository->getUsersCount();
    }

    public function findById(int $id): ?User
    {
        return $this->userRepository->findById($id);
    }

    public function createUser(StoreUserDTO $dto): int
    {
        return $this->createUserHandler->handle($dto);
    }
}
