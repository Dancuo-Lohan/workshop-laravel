<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function statut(): BelongsTo
    {
        return $this->belongsTo(StatusTag::class);
    }

    public function tag(): BelongsTo
    {
        return $this->belongsTo(TaskTag::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function projectManagers(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function developers(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
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
