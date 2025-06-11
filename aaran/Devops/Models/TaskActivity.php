<?php

namespace Aaran\Devops\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaskActivity extends Model
{
    protected $guarded = [];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function taskActivityReplies(): HasMany
    {
        return $this->hasMany(TaskActivityReply::class);
    }
}
