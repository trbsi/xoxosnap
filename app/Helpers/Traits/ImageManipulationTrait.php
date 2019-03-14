<?php

namespace App\Helpers\Traits;

use Image;
use Imagick;
use Intervention\Image\Image as InterventionImage;

trait ImageManipulationTrait
{
    
    /**
     * Resize and lower quality of an image
     */
    public function resizeOrientateAndLowerQuality(string $picturePath): ?InterventionImage
    {
        try {
            $mime = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $picturePath);

            if (strpos($mime, 'image') !== false) {
                $img = Image::make($picturePath);
             
                // resize the image to a width of 500 and constrain aspect ratio (auto height)
                // prevent possible upsizing
                $image = $img->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                $img->orientate();
                $img->save($picturePath, 60);

                return $image;
            }

            return null;
        } catch (Exception $e) {
            return null;
        }
    }
}
