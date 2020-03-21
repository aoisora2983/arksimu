<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chara extends Model
{
    protected $table = 'mst_chara';
    protected $tagType = 'tag_type_id';
    protected $tagDistance = 'tag_distance_id';
    protected $tagOther1 = 'tag_other_id1';
    protected $tagOther2 = 'tag_other_id2';
    protected $tagOther3 = 'tag_other_id3';
    public $timestamps = false;
}
