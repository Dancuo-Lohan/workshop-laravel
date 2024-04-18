<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    protected $fillable = [
        'name',
        'description',
        'slug',
        'status_tag_id',
        'task_tag_id',
    ];
    protected $guarded = [];
}
