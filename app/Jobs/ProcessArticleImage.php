<?php

namespace App\Jobs;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessArticleImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public string $originalPath,
        public string $filename,
        public int $articleId
    ) {}

    public function handle(): void
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

        // تحديث المسارات في قاعدة البيانات
        $article = Article::find($this->articleId);
        $article->images = $paths;
        $article->save();
    }
}
