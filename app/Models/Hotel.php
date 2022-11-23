<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable=['name', 'price', 'start','photo', 'end','country_id' ];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function scopefilterByCountry($query, $countryId){
        if($countryId){
            return $query->where('country_id', $countryId);
        }
        else{
            return $query;
        }

    }

    public function scopefindByName($query, $name){
        if($name){
            return $query->where('name','like', "%$name%");
        }
        else{
            return $query;
        }

    }
}
