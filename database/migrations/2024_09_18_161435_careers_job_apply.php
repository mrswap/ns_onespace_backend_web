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
        //

        Schema::create('careers_jobs_apply', function (Blueprint $table) {
            $table->id();
            $table->integer('jobs_id');
            $table->string('name');
            $table->string('email');
            $table->string('number');
            $table->string('jobtitle');
            $table->string('resume');
            $table->text('message');
           
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
        //
        Schema::dropIfExists('careers_jobs_apply');
    }
};
