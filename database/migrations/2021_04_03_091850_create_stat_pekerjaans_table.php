<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatPekerjaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stat_pekerjaans', function (Blueprint $table) {
            $table->id();
            $table->string('statistik');
            $table->integer('pria')->nullable();
            $table->integer('wanita')->nullable();
            $table->integer('perempuan')->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('stat_pekerjaans');
    }
}
