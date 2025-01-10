<?php

namespace App\Services\Images\Resolvers;

use Illuminate\Support\Facades\Storage;
use Nette\Utils\Image;
use Nette\Utils\ImageException;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class StoreImageFromEncodedDataHandler
{
    /**
     * @throws ImageException
     */
    public function handle(string $encodedImage): string
    {
        $imageData = base64_decode($encodedImage);
        $image = Image::fromString($imageData);

        $croppedImage = $this->cropImage($image);

        $image->resize(70, 70);

        $imageName = uniqid() . '.jpg';
        $imagePath = 'images/' . $imageName;
        Storage::disk('public')->put($imagePath, $croppedImage->toString());

        $this->optimizeImage($imagePath);

        return $imageName;
    }

    private function cropImage(Image $image): Image
    {
        $width = $image->getWidth();
        $height = $image->getHeight();

        $minSide = min($width, $height);

        $left = max(0, ($width - $minSide) / 2);
        $top = max(0, ($height - $minSide) / 2);

        return $image->crop((int) $left, (int) $top, $minSide, $minSide);
    }

    private function optimizeImage(string $path): void
    {
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize('storage/'.$path);
    }
}
