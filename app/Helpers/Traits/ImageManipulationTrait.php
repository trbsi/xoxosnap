<?php

namespace App\Helpers\Traits;

use Image;
use Imagick;
use Intervention\Image\Image as InterventionImage;

trait ImageManipulationTrait
{
    
    /**
     * Resize and lower quality of an image
     * @param string $picturePath Absoluthe picture path
     */
    public function resizeOrientateAndLowerImageQuality(
        string $picturePath,
        ?int $width = null,
        ?int $height = null
    ): ?InterventionImage {
        try {
            if (null !== $width && null !== $height) {
                $height = null;
            }

            $mime = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $picturePath);

            if (strpos($mime, 'image') !== false) {
                /** @var InterventionImage $img */
                $img = Image::make($picturePath);
             
                // resize the image to a width of 500 and constrain aspect ratio (auto height)
                // prevent possible upsizing
                $image = $img->resize($width, $height, function ($constraint) {
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
