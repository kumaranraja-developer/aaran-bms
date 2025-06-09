<?php

namespace Aaran\Core\Tenant\Models;

use Aaran\Core\Tenant\Database\Factories\TenantFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Crypt;

class Tenant extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tenants';

    protected $fillable = [
        'b_name', 't_name', 'email', 'contact', 'phone',
        'db_name', 'db_host', 'db_port', 'db_user', 'db_pass',
        'software_id','remarks', 'active_id', 'migration_status'
    ];

    protected $casts = [
        'active_id' => 'boolean',
    ];

    public static function getIndustryCode()
    {
        return self::max('industry_code') + 1;
    }

    public function scopeActive(Builder $query, $status = '1'): Builder
    {
        return $query->where('active_id', $status);
    }

    public function scopeSearchByName(Builder $query, string $search): Builder
    {
        return $query->where('t_name', 'like', "%$search%");
    }

    /**
     * Relationship: A Tenant has many Users.
     */
    public function users()
    {
        return $this->hasMany(\Aaran\Core\User\Models\User::class);
    }

    /**
     * Define the factory for this model.
     */
    protected static function newFactory(): TenantFactory
    {
        return TenantFactory::new();
    }
}
