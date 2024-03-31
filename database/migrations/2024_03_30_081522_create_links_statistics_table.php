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
        Schema::create('links_statistics', function (Blueprint $table) {
            $table->id();
	        $table->unsignedBigInteger('link_id');
	        $table->unsignedBigInteger('statistic_id');

			$table->foreign('link_id')
				->references('id')
				->on('links')
				->cascadeOnDelete();
			$table->foreign('statistic_id')
				->references('id')
				->on('statistics')
				->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links_statistics');
    }
};
