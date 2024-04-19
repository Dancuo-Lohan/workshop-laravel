<?php

use App\Models\Project;
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
        if (!Schema::hasTable('projects')) {
            Schema::create('projects', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->longText('description');
                $table->string('slug')->unique();
                $table->timestamps();
            });
        }

        
        if (!Schema::hasTable('project_user')) {
            Schema::create('project_user', function (Blueprint $table) {
                $table->foreignIdFor(Project::class)->constrained()->cascadeOnDelete();
                $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
                $table->primary(['project_id', 'user_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_user');
        Schema::dropIfExists('projects');
    }
};
