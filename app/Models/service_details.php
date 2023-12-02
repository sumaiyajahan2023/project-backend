<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'service_name',
        'image',
        'description',
        'our_plan',
        
    ];
    protected $table = 'service_details';
    
}
