<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Worker extends Model
{
    protected $fillable = ['name', 'image', 'email', 'password', 'phn_number','category_id','service_id'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    
}