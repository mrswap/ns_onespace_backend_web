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
            $table->integer('TotalFloor')->default(0);
            $table->integer('FloorNo')->default(0);
            $table->string('availability')->nullable();
            $table->float('expectedPrice')->default(0.0);
            $table->float('sqrPrice')->default(0.0);
            $table->text('video')->nullable();
            
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

            
            $table->dropColumn('TotalFloor');
            $table->dropColumn('FloorNo');
            $table->dropColumn('availability');
            $table->dropColumn('expectedPrice');
            $table->dropColumn('sqrPrice');
            $table->dropColumn('video');
        });
    }
};
