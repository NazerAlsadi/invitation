<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_invites', function (Blueprint $table) {
            $table->id(); 
            $table->integer('prefix_id');
            $table->string('fullName');
            $table->string('email');
            $table->string('mobile');
            $table->string('company');
            $table->string('jobfunction');
            $table->integer('status_id')->default(1);
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
        Schema::dropIfExists('ex_invites');
    }
}
