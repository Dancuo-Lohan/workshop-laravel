<?php

use App\Models\Task as Task;
use App\Models\User;
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
        if (!Schema::hasTable('tasks')) {
            Schema::create('tasks', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug');
                $table->string('description');
                $table->timestamps();
            });
        }

        
        if (!Schema::hasTable('task_user')) {
            Schema::create('task_user', function (Blueprint $table) {
                $table->foreignIdFor(Task::class)->constrained()->cascadeOnDelete();
                $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
                $table->primary(['task_id', 'user_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
