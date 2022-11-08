<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['id','name','status','parent_id'];

    public function keywords()
    {
        return $this->hasMany(Keywords::class);
    }

    public function blogs()
    {
        return $this->belongsToMany(Blogs::class);
    }

    public function childrens()
    {
        return $this->hasMany(Categories::class, 'parent_id', 'id');
    }
}
