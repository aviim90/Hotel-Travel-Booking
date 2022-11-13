<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable=['name', 'season'];

    public function hotel(){
        return $this->hasMany(Hotel::class);
    }
}
