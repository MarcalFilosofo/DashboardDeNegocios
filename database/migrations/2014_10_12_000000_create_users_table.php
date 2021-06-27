<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// use App\Models\User;

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
            $table->string('nome');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('numeroInscricao');
            $table->string('nivel');
            $table->string('site');
            $table->string('localizacao');
            $table->rememberToken();
            $table->timestamps();
        });

        $user = new App\Models\User();
        $user->nome = "Guilherme";
        $user->email = "guilherme@gmail.com";
        $user->password = "12345678";
        $user->numeroInscricao = "00011122233";
        $user->nivel = "ADM";
        $user->site = "guilherme.com";
        $user->localizacao = "Brasília";
        $user->save();
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
