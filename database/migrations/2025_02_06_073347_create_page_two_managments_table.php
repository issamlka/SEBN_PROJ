<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('page_two_managments', function (Blueprint $table) {
            $table->bigIncrements('ACCOUNT');
            $table->string('NAME');
            $table->string('MENU');
            $table->string('GS_MENU');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_two_managments');
    }
};
