<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use SplFileObject;

class TagContoroller extends Controller
{
    public function getTags()
    {
        $path = public_path('csv/tag.csv');

        $file = new SplFileObject($path);
        $file->setFlags(SplFileObject::READ_CSV);

        $record = [];

        $index = 0;
        foreach ($file as $line) {
            if ($index == 0) {
                $index++;
                continue;
            }
            if (!isset($record[$line[0]])) {
                $record[$line[0]] = [];
            }
            $record[$line[0]][$line[1]] = $line[2];
        }

        return $record;
    }

    public function getTagsName() {
        $path = public_path('csv/tag_name.csv');

        $file = new SplFileObject($path);
        $file->setFlags(SplFileObject::READ_CSV);

        $record = [];

        $index = 0;
        foreach ($file as $line) {
            if ($index == 0) {
                $index++;
                continue;
            }
            $record[$line[0]] = $line[1];
        }

        return $record;
    }
}
