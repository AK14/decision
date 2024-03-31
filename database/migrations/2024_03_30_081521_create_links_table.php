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
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
			$table->unsignedBigInteger('user_id');
			$table->string('link', 500);
			$table->string('short_link', 30);
			$table->string('name', 255)->nullable();

			$table->foreign('user_id')
				->references('id')
				->on('users')
				->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
