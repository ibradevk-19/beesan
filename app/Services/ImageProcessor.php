<?php

namespace App\Services;

class ImageProcessor
{
    public function process($originalPath, $filename, $destinationPath)
    {
        $presets = config('imagepresets');
        $paths = [];

        foreach ($presets as $preset => $size) {
            if ($preset === 'original') {
                $paths[$preset] = 'articles/originals/' . $this->filename;
                continue;
            }

            [$width, $height] = $size;
            $destination = "articles/resized/{$preset}_{$this->filename}";
            $outputPath = storage_path('app/public/' . $destination);

            if (!file_exists(dirname($outputPath))) {
                mkdir(dirname($outputPath), 0755, true);
            }

            $cmd = "magick convert {$this->originalPath} -resize {$width}x{$height}^ -gravity center -extent {$width}x{$height} {$outputPath}";
            exec($cmd);

            $paths[$preset] = $destination;
        }

    }
}
