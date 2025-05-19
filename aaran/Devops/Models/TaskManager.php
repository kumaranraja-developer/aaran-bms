<?php

namespace Aaran\Devops\Models;

use Aaran\Devops\Database\Factories\TaskManagerFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskManager extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'start_time', 'due_time', 'assigned', 'job_id', 'priority', 'status', 'active_id'];

    public function scopeActive(Builder $query, $status = '1'): Builder
    {
            return $query->where('active_id', $status);
    }

    public function scopeSearchByName(Builder $query, string $search): Builder
    {
            return $query->where('title', 'like', "%$search%");
//            return $query->where('assigned', 'like', "%$search%");
//            return $query->where('job_id', 'like', "%$search%");
    }

    protected static function newFactory():  TaskManagerFactory
    {
            return  TaskManagerFactory::new();
    }
}
