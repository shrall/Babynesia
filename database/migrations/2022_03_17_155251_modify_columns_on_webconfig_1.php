<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnsOnWebconfig1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('webconfig', function (Blueprint $table) {
            $table->string('color_bg')->nullable();
            $table->string('color_text')->nullable();
            $table->string('color_button')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('webconfig', function (Blueprint $table) {
            //
        });
    }
}
