<?php

namespace Aaran\Devops\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{

    protected $guarded = [];

    protected $table = 'tasks';

    public function scopeActive(Builder $query, $status = '1'): Builder
    {
        return $query->where('active_id', $status);
    }

//    public function scopeSearchByName(Builder $query, string $search): Builder
//    {
//        return $query->where('vname', 'like', "%$search%");
//    }
    public function activities()
    {
        return $this->hasMany(Activities::class);
    }

    // Helper to get latest activity
    public function latestActivity()
    {
        return $this->hasOne(Activities::class)->latestOfMany();
    }
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

//    public function TaskImage(): HasMany
//    {
//        return $this->hasMany(TaskImage::class);
//    }
//

}
