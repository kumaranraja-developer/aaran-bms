<?php

namespace Aaran\Devops\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskActivityReply extends Model
{
    protected $guarded = [];

    public function taskActivity(): BelongsTo
    {
        return $this->belongsTo(TaskActivity::class);
    }
}
