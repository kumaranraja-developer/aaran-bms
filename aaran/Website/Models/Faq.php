<?php

namespace Aaran\Website\Models;

use Aaran\Website\Database\Factories\FaqFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;


    protected $table = 'faqs'; // Ensure this is correct

    protected $guarded = [];

    public $timestamps = false;


    #[Scope]
    protected function searchByName(Builder $query, string $search): Builder
    {
        return $query->where('questions', 'like', "%$search%");
    }

    protected static function newFactory(): FaqFactory
    {
        return new FaqFactory();
    }
}

