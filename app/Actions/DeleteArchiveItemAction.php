<?php

namespace App\Actions;

use App\Actions\GetPdfFileAction;

class DeleteArchiveItemAction
{

    public static function handle($file)
    {
        $archiveItem = (new getPdfFileAction($file, 'archive'));

        $archiveItem->media->delete();
    }
}
