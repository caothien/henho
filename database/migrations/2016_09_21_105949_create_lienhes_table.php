<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLienhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lienhes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('ten');
            $table->text('sdt');
            $table->text('email');
            $table->text('noidung');
            $table->text('check');
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
        Schema::dropIfExists('lienhes');
    }
}
