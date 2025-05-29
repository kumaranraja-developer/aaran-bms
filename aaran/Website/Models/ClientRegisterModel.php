<?php

namespace Aaran\Website\Models;
use Aaran\BMS\Billing\Common\Database\Factories\CityFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRegisterModel extends Model
{
//    use HasFactory;


    protected $table = 'client_register'; // Ensure this is correct

    protected $guarded = [];

    public $timestamps = true;


    protected static function newFactory(): CityFactory
    {
        return new CityFactory();
    }
}
