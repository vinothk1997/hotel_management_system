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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_type_id');
            $table->string('room_no');
            $table->string('no_of_beds');
            $table->string('no_of_bathrooms');
            $table->string('width');
            $table->string('length');
            $table->string('no_of_chairs');
            $table->string('no_of_tables');
            $table->string('is_occupied');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
