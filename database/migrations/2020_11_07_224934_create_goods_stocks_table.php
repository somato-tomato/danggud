<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_stocks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('goods_id');
            $table->string('namaPengirim');
            $table->string('namaPenerima');
            $table->integer('stokMasuk');
            $table->string('keterangan');
            $table->bigInteger('users_id');
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
        Schema::dropIfExists('goods_stocks');
    }
}
