<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Spatie\SimpleExcel\SimpleExcelReader;

class XlsxController extends Controller
{

    protected $allMatches;
    protected $filePath;
    protected $header;

    function __construct()
    {
        $this->filePath = $this->getMediaPath();
    }

    public function GetRows()
    {
        $matches = SimpleExcelReader::create($this->filePath)->getRows();
        foreach ($matches as $match){

           $this->allMatches[] = $this->convertDateTimeToString($match);
        }
        return $this->allMatches;
    }

    protected function convertDateTimeToString(mixed $match)
    {
        foreach ($match as $key => $matchItem) {
            $key = strtolower($key);
            if(gettype($matchItem) == 'object' && get_class($matchItem) == 'DateTime'){
                $matchItem = match ($key) {
                    'datum' => $matchItem->format('Y-m-d'),
                    'tijd' => $matchItem->format('H:i:s'),
                    default => $matchItem->format('Y-m-d H:i'),
                };

            }
            $convertedMatch[$key] = $matchItem;
        }
        return $convertedMatch;
    }

    public function getHeader()
    {
        $header = SimpleExcelReader::create($this->filePath)->getHeaders();

        foreach ($header as $key => $headerItem) {
            $header[$key] = strtolower($headerItem);
            if (empty($headerItem)) {
                array_splice($header, $key, null, "Nb.");
            }
        }
        return $header;
    }

    private function getMediaPath()
    {

        $mediaItems = Auth::user()->getMedia();

        $filePath = $mediaItems[0]->getPath();

        return $filePath;
    }
}
