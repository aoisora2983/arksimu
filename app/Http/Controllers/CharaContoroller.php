<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chara;
use SplFileObject;

class CharaContoroller extends Controller
{
    public function getCharas()
    {
        $path = public_path('csv/chara.csv');

        $file = new SplFileObject($path);
        $file->setFlags(SplFileObject::READ_CSV);

        $header = [];
        $record = [];

        $index = 0;
        foreach ($file as $line) {
            \Log::info($line);
            $headerIndex = 0;
            foreach ($line as $column) {
                // header処理
                if ($index == 0) {
                    $header[$headerIndex] = $column;
                } else {
                    $record[$index][$header[$headerIndex]] = $column;
                }
                $headerIndex++;
            }
            if ($index != 0) {
                $record[$index]['other'] = preg_split('/@/', $record[$index]['other']);
                $record[$index]['chara_img'] = public_path("img/" . $record[$index]['chara_img']);
            }
            $index++;
        }

        return $record;
    }
}
