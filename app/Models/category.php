<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id'; // Add this line
  
    protected $fillable = ['name', 'status'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function workers()
    {
        return $this->hasMany(Worker::class);
    }

   
}
