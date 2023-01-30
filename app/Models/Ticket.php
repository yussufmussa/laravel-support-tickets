<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->belongsToMany(Category::class)
            ->withTimestamps();
    }

    public function label(){
        return $this->belongsToMany(Label::class)
        ->withTimestamps();
    }
}
