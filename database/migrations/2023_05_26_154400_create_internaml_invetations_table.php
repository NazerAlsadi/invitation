<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternamlInvetationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internaml_invetations', function (Blueprint $table) {
            $table->id();
            $table->integer('prefix_id');
            $table->string('fullName');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->integer('category_id');
            $table->boolean('email_verify')->default(false);
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
        Schema::dropIfExists('internaml_invetations');
    }
}
