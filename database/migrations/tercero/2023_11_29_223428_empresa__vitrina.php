<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmpresaVitrina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_vitrina', function (Blueprint $table) {
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('vitrina_id');
            $table->primary(['empresa_id', 'vitrina_id']);
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('vitrina_id')->references('id')->on('vitrinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa_vitrina');
    }
}
