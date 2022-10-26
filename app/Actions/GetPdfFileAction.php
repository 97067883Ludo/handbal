<?php

namespace App\Actions;

use Illuminate\Support\Facades\Auth;

class GetPdfFileAction
{
    public $media;

    public function __construct(public $fileId = null, public $collectionName)
    {
        $user = Auth::user();

        $this->media = $user->getMedia($collectionName);

        if ($this->fileId !== null) {
            $this->media = $this->findFile($this->media, $this->fileId);
        }
        return $this->media;
    }

    public function getUri()
    {
        return $this->media->getFullUrl();
    }

    private function findFile($files, $needle)
    {
        foreach ( $files as $file ) {
            if ($file->id == $needle) {
                return $file;
            }
        }
    }
}
