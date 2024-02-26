<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('performances', function (Blueprint $table) {
            $table->string('tickets')->default(30);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('performances');
    }
};
