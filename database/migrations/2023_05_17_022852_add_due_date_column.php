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
        Schema::table('todolists', function (Blueprint $table) {
            $table-> date('due_date')-> after('description');
            $table-> integer('updated_by')->unsigned()->nullable()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->$table->dropColumn('due_date');
        $table->$table->dropColumn('updated_by');
    }
};
