<?php

namespace App\Console\Commands;

use Intervention\Image\Drivers\Gd\Encoders\WebpEncoder;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CompressImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:compress-image';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to reduce image size';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Comprimindo imagems...');

        $mainImages = Storage::disk('public')->files('product_main_images');

        foreach ($mainImages as $mainImage) {
            $file = Storage::disk('public')->get($mainImage);
            $path = $mainImage;

            Storage::disk('public')->delete($mainImage);

            $this->compressImage($path, $file);
        }

        $secondaryImages = Storage::disk('public')->files('product_secondary_images');

        foreach ($secondaryImages as $secondaryImage) {
            $file = Storage::disk('public')->get($secondaryImage);
            $path = $secondaryImage;

            Storage::disk('public')->delete($secondaryImage);

            $this->compressImage($path, $file);
        }

        $this->info('Imagems comprimidas com sucesso!');
    }

    private function compressImage($savePath, $image)
    {
        $imageManager = new ImageManager(new Driver());

        $img = $imageManager->read($image);
        $encodedImage = $img->encode(new WebpEncoder(quality: 40));
        $imageContent = $encodedImage->toString();

        Storage::disk('public')->put($savePath, $imageContent);
    }
}
