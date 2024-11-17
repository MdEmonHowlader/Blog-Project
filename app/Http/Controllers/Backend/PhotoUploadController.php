<?php


namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class PhotoUploadController extends Controller
{
    // public function imageUpload(string $name, int $height, int $width, string $path, $file):string{
    //     $image_name = $name.'.webp';
    //     Image::make($file)
    //     ->fit($width,$height)->save(public_path($path).$image_name,50,'webp');
    //     return $image_name;
    // }
    // public function imageUnlink($path, $name):void{
    //     $image_path=public_path($path).$name;
    //     if(file_exists($image_path)){
    //         unlink($image_path);
    //     }
    // }
    public function imageUpload(string $name, int $height, int $width, string $path, $file): string
    {
        try {
            // Ensure the directory exists
            if (!file_exists(public_path($path))) {
                mkdir(public_path($path), 0775, true);
            }

            // Generate a unique image name
            $image_name = $name . '_' . time() . '.webp';

            // Process and save the image
            Image::make($file)
                ->fit($width, $height)
                ->save(public_path($path) . $image_name, 50, 'webp');

            return $image_name;
        } catch (\Exception $e) {
            throw new \Exception('Image processing failed: ' . $e->getMessage());
        }
    }

    public function imageUnlink(string $path, string $name): void
    {
        $image_path = public_path($path) . $name;

        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }

}
