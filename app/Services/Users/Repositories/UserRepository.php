<?php
/**
 * Description of UserRepository.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Services\Users\Repositories;

use App\Models\User;
use App\Services\Users\DTO\SearchUsersDTO;
use Illuminate\Support\Collection;

class UserRepository
{
    public function getUsers(SearchUsersDTO $dto): Collection
    {
        $limit = $dto->getCount();
        $offset = $dto->getCount() * ($dto->getPage() - 1);

        return User::query()
            ->limit($limit)
            ->offset($offset)
            ->get();
    }

    public function getUsersCount(): int
    {
        return User::count();
    }

    public function findById(int $id): ?User
    {
        return User::find($id);
    }

    public function createFromArray(array $data): int
    {
        return User::create($data);
    }
}
