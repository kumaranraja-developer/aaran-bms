<?php

namespace Aaran\Devops\Models;

use Aaran\Devops\Database\Factories\JobManagerFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobManager extends Model
{
    use HasFactory;

    protected $fillable = ['vname', 'active_id'];

    public function scopeActive(Builder $query, $status = '1'): Builder
    {
            return $query->where('active_id', $status);
    }

    public function scopeSearchByName(Builder $query, string $search): Builder
    {
            return $query->where('vname', 'like', "%$search%");
    }

    protected static function newFactory():  JobManagerFactory
    {
            return  JobManagerFactory::new();
    }
}
