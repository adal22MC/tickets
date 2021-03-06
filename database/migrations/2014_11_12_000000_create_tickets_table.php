<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('estatus_ticket_id');
            $table->text('descripcion');
            $table->timestamps();

            $table->foreign('usuario_id')
                ->references('id')->on('users');

            $table->foreign('estatus_ticket_id')
                ->references('id')->on('estatus_tickets');
                   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
