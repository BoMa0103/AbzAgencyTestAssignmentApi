<?php

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
            ->orderByDesc('created_at')
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

    public function findUserByPhone(string $phone): ?User
    {
        return User::where('phone', $phone)->first();
    }

    public function findUserByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function createFromArray(array $data): User
    {
        return User::create($data);
    }
}
