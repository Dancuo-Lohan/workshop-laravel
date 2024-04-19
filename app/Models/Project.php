<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function projectManagers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'project_user', 'project_id', 'user_id')
        ->whereHas('role', function ($query) {
            $query->where('name', 'project-manager');
        });
    }

    public function developers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'project_user', 'project_id', 'user_id')
        ->whereHas('role', function ($query) {
            $query->where('name', 'developer');
        });
    }


    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    protected $fillable = [
        'title',
        'description',
        'slug',
        'client_id'
    ];
    protected $guarded = [];
}
