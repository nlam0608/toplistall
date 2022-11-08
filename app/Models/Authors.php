<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Authors extends Authenticatable
{
    use HasFactory;
    protected $table = 'authors';
    protected $primaryKey = 'id';
    protected $fillable = ['id','name','image','information','email','password','status'];

    public function keywords()
    {
        return $this->hasMany(Keywords::class);
    }
}
