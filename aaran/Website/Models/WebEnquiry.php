<?php

namespace Aaran\Website\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebEnquiry extends Model
{
    use HasFactory;

    protected $table = 'web_enquiries';

    protected $guarded = [];
}
