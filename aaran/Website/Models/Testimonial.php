<?php

namespace Aaran\Website\Models;

use Aaran\Website\Database\Factories\TestimonialFactory;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;


    protected $table = 'testimonials'; // Ensure this is correct

    protected $guarded = [];

//    public $timestamps = false;


    public function scopeActive(Builder $query, $status = '1'): Builder
    {
        return $query->where('active_id', $status);
    }

    public function scopeSearchByName(Builder $query, string $search): Builder
    {
        return $query->where('vname', 'like', "%$search%");
    }

    protected static function newFactory(): TestimonialFactory
    {
        return new TestimonialFactory();
    }
}
