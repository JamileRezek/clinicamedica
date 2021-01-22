<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatoriosFinanceirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatorios_financeiros', function (Blueprint $table) {
            //3
            $table->increments('id');

            $table->unsignedinteger('fk_despesa');
            $table->foreign('fk_despesa')->references('id')->on('despesas_financeiras')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedinteger('fk_administradora');
            $table->foreign('fk_administradora')->references('id')->on('administradoras')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('relatorios_financeiros');
    }
}
