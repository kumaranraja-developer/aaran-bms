<?php

namespace Aaran\Devops\Models;

use Aaran\Devops\Database\Factories\TaskCommendsFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskComments extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeActive(Builder $query, $status = '1'): Builder
    {
            return $query->where('active_id', $status);
    }

    public function scopeSearchByName(Builder $query, string $search): Builder
    {
            return $query->where('title', 'like', "%$search%");
    }

    public function task(): BelongsTo{
        return $this->belongsTo(Task::class);
    }

}
