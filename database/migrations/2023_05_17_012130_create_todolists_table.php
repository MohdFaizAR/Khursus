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
        Schema::create('todolists', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title', 255)->nullable()->default('text'); // shortcut colstring
            $table->text('description'); // shortcut coltext
            $table->integer('status')->unsigned()->nullable()->default(1); // default(1) 1 for yes 0 for no
            $table->bigInteger('user_id')->unsigned(); //
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // hubungan dengan table lain (relationship) --> table user

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todolists');
    }
};
