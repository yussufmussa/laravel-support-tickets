<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function ticket(){
        return $this->belongsToMany(Category::class)
        ->withTimestamps();
    }
}
