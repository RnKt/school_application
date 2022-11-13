<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('answer', function (Blueprint $table) {
            $table->id();
            $table->string('answer');
            $table->foreignId('question_id');
            $table->boolean('isTrue')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('answer');
    }
};
