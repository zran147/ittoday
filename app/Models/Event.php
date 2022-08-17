<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $with = ['registrant'];
    public function registrant()
    {
        return $this->hasMany(RegistrantEvent::class,'event_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
