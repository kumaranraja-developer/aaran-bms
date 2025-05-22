<?php

namespace Aaran\Core\User\Models;

use Aaran\Core\User\Database\Factories\UserDetailFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = ['vname','email','dob','gender','marital_status','nationality','images','mobile_number','alter_mobile_number','residential_address','city','state','country','pin_code','professional_details','highest_qualification','occupation','company_name','industry_type','experience', 'active_id'];

    public function scopeActive(Builder $query, $status = '1'): Builder
    {
            return $query->where('active_id', $status);
    }

    public function scopeSearchByName(Builder $query, string $search): Builder
    {
            return $query->where('vname', 'like', "%$search%");
    }

    protected static function newFactory():  UserDetailFactory
    {
            return  UserDetailFactory::new();
    }
}
