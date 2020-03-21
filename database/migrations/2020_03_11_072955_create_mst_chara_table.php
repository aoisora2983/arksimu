<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstCharaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_chara', function (Blueprint $table) {
            $table->increments('chara_id');
            $table->string('chara_name', 50);
            $table->integer('tag_type_id');
            $table->integer('tag_distance_id');
            $table->integer('tag_other_id1');
            $table->integer('tag_other_id2');
            $table->integer('tag_other_id3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_chara');
    }
}
