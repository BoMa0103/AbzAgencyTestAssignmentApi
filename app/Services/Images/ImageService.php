<?php

namespace App\Services\Images;

use App\Services\Images\Resolvers\StoreImageFromEncodedDataHandler;
use Nette\Utils\ImageException;

class ImageService
{
    public function __construct(
        private readonly StoreImageFromEncodedDataHandler $storeImageFromEncodedDataHandler,
    ) {
    }

    /**
     * @throws ImageException
     */
    public function storeImageFromEncodedData(string $encodedData): string
    {
        return $this->storeImageFromEncodedDataHandler->handle($encodedData);
    }
}
