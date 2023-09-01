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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id');
            $table->bigInteger('vehicle_id');
            $table->bigInteger('practice_number')->uniqid();
            $table->string('rent_type'); //vacation rent, work rent
            $table->dateTime('start_date_rent');
            $table->dateTime('end_date_rent');
            $table->float('cost');
            // $table->string('description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
