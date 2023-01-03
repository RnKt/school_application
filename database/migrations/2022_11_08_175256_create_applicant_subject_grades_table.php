<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('applicant_subject_grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->onDelete('cascade');;
            $table->foreignId('applicant_id');
            $table->enum('grade', [1, 2, 3, 4, 5]);
            $table->integer('points');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('applicant_subject_grades');
    }
};
