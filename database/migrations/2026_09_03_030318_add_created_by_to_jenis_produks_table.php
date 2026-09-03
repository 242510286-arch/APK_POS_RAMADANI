<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jenis_produks', function (Blueprint $table) {
            $table->string('created_by_name')->nullable();
            $table->string('created_by_email')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('jenis_produks', function (Blueprint $table) {
            $table->dropColumn([
                'created_by_name',
                'created_by_email',
            ]);
        });
    }
};
