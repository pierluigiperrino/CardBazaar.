<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    private $w, $h, $fileName, $path;

    public function __construct($filePath, $w, $h)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;
        $srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->fileName;

        $image = Image::load($srcPath);

        $image->fit(Manipulations::FIT_STRETCH, $w, $h)->save($destPath);

        $image->watermark(base_path ('resources/Img/watermark_CB.png'))
        ->watermarkPosition(Manipulations::POSITION_BOTTOM_LEFT)
        ->watermarkHeight(18, Manipulations::UNIT_PERCENT)
        ->watermarkWidth(18, Manipulations::UNIT_PERCENT)
        ->watermarkPadding(10)
        ->watermarkOpacity(70)
        ->save($destPath);
    }
}
