<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrantEvent extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['event','user'];
    public function event()
    {
        return $this->hasMany(Event::class,'id');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'id');
    }
}
