<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimCompetition extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['competition'];
    public function competition()
    {
        return $this->belongsTo(Competition::class,'competition_id');
    }
    public function registranttimcompetition()
    {
        return $this->belongsTo(User::class, 'registrant_id');
    }
    public function adminveriftimcompetition()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
    public function membertimcompetition()
    {
        return $this->hasMany(RegistrantCompetition::class, 'tim_id');
    }
}
