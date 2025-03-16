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
        Schema::table('pagseguro_transactions', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['user_id']);

            $table->bigInteger('product_id')->change();
            $table->bigInteger('user_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pagseguro_transactions', function (Blueprint $table) {
            $table->foreignId('product_id')->change()->constrained('products');
            $table->foreignId('user_id')->change()->constrained('users');
        });
    }
};
