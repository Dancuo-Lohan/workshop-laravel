<?php

use App\Models\StatusTag;
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
        if (!Schema::hasTable('status_tags')) {
            Schema::create('status_tags', function (Blueprint $table) {
                $table->id();
                $table->string('label');
                $table->timestamps();
            });
        }
        
        Schema::table('task', function (Blueprint $table) {
            $table->foreignIdFor(StatusTag::class)->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('task', function (Blueprint $table) {
            $table->dropForeignIdFor(StatusTag::class);
        });
        Schema::dropIfExists('status_tags');
    }
};
