<?php

namespace App\Services\Users\Validators;

use App\Services\Users\DTO\StoreUserDTO;
use App\Services\Users\Exceptions\UniqueUserEmailException;
use App\Services\Users\Exceptions\UniqueUserPhoneException;
use App\Services\Users\Repositories\UserRepository;

class CreateUserValidator
{
    public function __construct(
        private readonly UserRepository $userRepository,
    ) {
    }

    /**
     * @throws UniqueUserPhoneException
     * @throws UniqueUserEmailException
     */
    public function validate(StoreUserDTO $dto): void
    {
        $this->validatePhone($dto->getPhone());
        $this->validateEmail($dto->getEmail());
    }

    /**
     * @throws UniqueUserPhoneException
     */
    public function validatePhone(string $phone): void
    {
        $user = $this->userRepository->findUserByPhone($phone);

        if (! $user) {
            return;
        }

        throw new UniqueUserPhoneException();
    }

    /**
     * @throws UniqueUserEmailException
     */
    public function validateEmail(string $email): void
    {
        $user = $this->userRepository->findUserByEmail($email);

        if (! $user) {
            return;
        }

        throw new UniqueUserEmailException();
    }
}
