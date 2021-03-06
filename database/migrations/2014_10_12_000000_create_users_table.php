<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('estatus')->default(1);
            $table->unsignedBigInteger('tipo_usuario_id');
            $table->unsignedBigInteger('area_id');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('tipo_usuario_id')
                ->references('id')->on('tipos_usuario');
            
            $table->foreign('area_id')
                ->references('id')->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
