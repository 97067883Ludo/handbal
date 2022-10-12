<?php

namespace App\Actions\Xlsx;

use App\Service\ColumnMapper;
use App\Service\XlsxReader;

Class MapXlsxHeaderToDbColumnsAction {

    public function __construct()
    {
        //
    }

    public function __invoke(string $filePath)
    {
        $xlsx = new XlsxReader($filePath);
        $rows = $xlsx->GetRows();
        $rows = (new ColumnMapper)->map($rows);
        return XlsxReader::convertDateTimeToString($rows);
    }
}
