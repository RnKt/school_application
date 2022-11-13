<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('applicant_test_score', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_id');
            $table->foreignId('applicant_id');
            $table->integer('score');
            $table->integer('points');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('applicant_test_score');
    }
};
