<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('code', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignId('applicant_id')->onDelete('cascade');;
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('code');
    }
};
