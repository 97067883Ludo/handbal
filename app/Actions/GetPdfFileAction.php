<?php

namespace App\Actions;

use Illuminate\Support\Facades\Auth;

class GetPdfFileAction
{
    public $media;

    public function __construct(public $fileId, public $collectionName)
    {
        $user = Auth::user();

        $this->media = $user->getMedia($collectionName);

        $this->media = $this->findFile($this->media, $this->fileId);
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
