<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function projectManagers(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->where('role_id', Role::where('name', 'project-manager')->first()->id);
    }

    public function developers(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->where('role_id', Role::where('name', 'developer')->first()->id);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function status_tag(): BelongsTo
    {
        return $this->belongsTo(StatusTag::class);
    }

    public function task_tag(): BelongsTo
    {
        return $this->belongsTo(TaskTag::class);
    }

    protected $fillable = [
        'name',
        'description',
        'slug',
        'project_id',
        'status_tag_id',
        'task_tag_id',
    ];
    protected $guarded = [];
}
