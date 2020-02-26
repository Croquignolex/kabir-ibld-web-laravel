<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContributorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contributors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 255);
            $table->string('name', 255);
            $table->string('file', 255)->default('default');
            $table->string('extension', 50)->default('png');
            $table->string('address', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('domain_id')->unsigned();
            $table->timestamps();

            $table->foreign('domain_id')
                ->references('id')
                ->on('domains')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contributors');
    }
}
