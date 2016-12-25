<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThanhviensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhviens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->integer('namsinh');
            $table->string('gioitinh');
            $table->string('tinhtrang');
            $table->text('mongmuon');
            $table->string('sdt');
            $table->string('facebook');
            $table->text('gioithieu');
            $table->string('avatar');
            $table->string('duyet');
            $table->integer('id_quequan')->unsigned();
            $table->foreign('id_quequan')->references('id_quequan')->on('quequans');
            $table->integer('id_truong')->unsigned();
            $table->foreign('id_truong')->references('id_truong')->on('truongs');
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
        Schema::dropIfExists('thanhviens');
    }
}
