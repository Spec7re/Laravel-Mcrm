<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    public $timestamps = false;

    protected $fillable = [
      'name'
    ];

    public function employees()
    {
        return $this->hasMany(Occupation::class);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class,'company_occupations');
    }
}
