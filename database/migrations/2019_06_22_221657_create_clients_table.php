<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblclientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('gender', 10);
            $table->integer('age');
            $table->string('email', 30)->unique();
            $table->string('phone', 20)->unique();
            $table->string('organization', 20)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clients');
    }
}
