<?php

namespace App\Service;

use phpDocumentor\Reflection\Types\Collection;
use Spatie\SimpleExcel\SimpleExcelReader;

class XlsxReader
{

    private SimpleExcelReader $simpleExcelReader;

    public function __construct(string $filePath)
    {
        $this->simpleExcelReader = SimpleExcelReader::create($filePath);

    }

    protected $allMatches;
    protected $filePath;
    protected $header;

    public function getRows()
    {
        $matches = $this->simpleExcelReader->getRows();
        foreach ($matches as $match){

            $this->allMatches[] = $match;

        }
        return $this->allMatches;
    }

    public static function convertDateTimeToString(mixed $matches)
    {
        $allMatches = collect();
        foreach ($matches as $match) {
            foreach ($match as $key => $matchItem) {
                $key = strtolower($key);
                if (gettype($matchItem) == 'object' && get_class($matchItem) == 'DateTime') {
                    $matchItem = match ($key) {
                        'datum' => $matchItem->format('Y-m-d'),
                        'tijd' => $matchItem->format('H:i'),
                        default => $matchItem->format('Y-m-d H:i'),
                    };
                }
                $convertedMatch[$key] = $matchItem;
            }
            $allMatches[] = collect($convertedMatch);
        }
        return $allMatches;
    }
}
