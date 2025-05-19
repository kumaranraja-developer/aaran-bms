<?php

namespace Aaran\Devops\Models;

use Aaran\Devops\Database\Factories\JobImagesFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobImages extends Model
{
    use HasFactory;

    protected $fillable = ['model','model_id','image_id','path', 'active_id'];

    public function scopeActive(Builder $query, $status = '1'): Builder
    {
            return $query->where('active_id', $status);
    }

    public function scopeSearchByName(Builder $query, string $search): Builder
    {
            return $query->where('model', 'like', "%$search%");
    }

    protected static function newFactory():  JobImagesFactory
    {
            return  JobImagesFactory::new();
    }
}
