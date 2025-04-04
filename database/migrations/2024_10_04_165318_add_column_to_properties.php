<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            //
            $table->integer('balcony')->default(0);
            $table->integer('carpetArea')->nullable();
            $table->string('furnishedStatus')->default('Non funrnished');
            $table->text('extras')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            //
           
            $table->dropColumn('balcony');
            $table->dropColumn('carpetArea');
            $table->dropColumn('furnishedStatus');
            $table->dropColumn('extras');
        });
    }
};
