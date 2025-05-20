<?php

namespace Aaran\Devops\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activities extends Model
{

    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
