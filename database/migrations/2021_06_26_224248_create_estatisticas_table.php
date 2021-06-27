<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstatisticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estatisticas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->decimal('amount', 10, 2)->nullable()->default(0);
            $table->bigInteger('ltv')->nullable()->default(0);
            $table->decimal('cac', 10, 2)->nullable()->default(0);
            $table->decimal('ticket_medio', 10, 2)->nullable()->default(0);
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
        Schema::dropIfExists('estatisticas');
    }
}
