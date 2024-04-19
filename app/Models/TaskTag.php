<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class TaskTag extends Model
{
    use HasFactory;
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
    protected $fillable = [
        'label'
    ];
}
