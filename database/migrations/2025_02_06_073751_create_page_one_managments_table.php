<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('page_one_managments', function (Blueprint $table) {
            $table->bigIncrements('ACCOUNT');
            $table->string('NAME');
            $table->string('WHS');
            $table->string('WH_ACCESS_TYPE');
            $table->string('KEYS');
            $table->string('KEYS_ACCESS_TYPE');
            $table->string('MENU');
            $table->string('GS_MENU');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('page_one_managments');
    }
};
