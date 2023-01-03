<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('test_requirement', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id');
            $table->foreignId('test_id')->onDelete('cascade');;
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('test_requirement');
    }
};
