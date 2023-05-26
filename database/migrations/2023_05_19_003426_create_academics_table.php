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
        Schema::create('academics', function (Blueprint $table) {
            $table->id();

            $table->string('category', '100');
            $table->string('name', '255');
            $table->string('fileupload', '255');
            $table->bigInteger('applicant_id')->nullable()->unsigned();
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academics');
    }
};
