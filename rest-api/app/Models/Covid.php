<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Covid extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name',
        'phone',
        'addres',
        'status',
        'in_date_at',
        'out_date_at',
    ];
}
 