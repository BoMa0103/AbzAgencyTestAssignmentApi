<?php
/**
 * Description of CreateUserHandler.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Services\Users\Handlers;

use App\Models\Position;
use App\Models\User;
use App\Services\Images\ImageService;
use App\Services\Positions\Repositories\PositionRepository;
use App\Services\Users\DTO\StoreUserDTO;
use App\Services\Users\Repositories\UserRepository;
use InvalidArgumentException;
use Nette\Utils\ImageException;

class CreateUserHandler
{
    public function __construct(
        private readonly ImageService $imageService,
        private readonly UserRepository $userRepository,
        private readonly PositionRepository $positionRepository,
    ) {
    }

    /**
     * @throws ImageException
     */
    public function handle(StoreUserDTO $storeUserDTO): User
    {
        $userPosition = $this->findUserPosition($storeUserDTO->getPositionId());

        if (!$userPosition) {
            throw new InvalidArgumentException('Position not found');
        }

        return $this->userRepository->createFromArray([
            'name' => $storeUserDTO->getName(),
            'email' => $storeUserDTO->getEmail(),
            'phone' => $storeUserDTO->getPhone(),
            'position_id' => $storeUserDTO->getPositionId(),
            'position' => $userPosition->name,
            'photo' => $this->imageService->storeImageFromEncodedData($storeUserDTO->getPhoto()),
        ]);
    }

    private function findUserPosition(int $positionId): ?Position
    {
        return $this->positionRepository->findById($positionId);
    }
}
