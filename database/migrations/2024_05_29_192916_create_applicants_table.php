<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('course');
            $table->integer('rate')->nullable();
            $table->string('country');
            $table->string('governante');
            $table->string('address');
            $table->string('qualification');
            $table->string('attended');
            $table->string('graduation');
            $table->string('prev_education');
            $table->string('job');
            $table->string('organization_name');
            $table->string('duration_of_employment');
            $table->string('subject_studied');
            $table->boolean('gender');
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
        Schema::dropIfExists('applicants');
    }
};
