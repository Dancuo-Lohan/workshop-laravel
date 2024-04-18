<?php

use App\Models\TaskTag;
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
        if (!Schema::hasTable('task_tags')) {
            Schema::create('task_tags', function (Blueprint $table) {
                $table->id();
                $table->string('label');
                $table->timestamps();
            });
        }
        
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignIdFor(TaskTag::class)->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeignIdFor(TaskTag::class);
        });
        Schema::dropIfExists('task_tags');
    }
};
