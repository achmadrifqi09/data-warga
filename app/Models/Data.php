<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    // protected $fillabel = ['name', 'nik', 'address', 'religion_id', 'gender_id','place_of_birth', 'date_of_birth', 'status_id', 'proffesion', 'state_id'];
    protected $guarded = ['id'];


    public function religion(){
        return $this->belongsTo(Religion::class, 'religion_id');
    }

    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function neighbourhood(){
        return $this->belongsTo(Neighbourhood::class);
    }
}
