<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keywords extends Model
{
    use HasFactory;
    protected $table = 'keywords';
    protected $primaryKey = 'id';
    protected $fillable = ['id','author_id','meta_title','meta_description','slug','title','content','image','category_id','status'];
    
    public function productes()
    {
        return $this->belongsToMany(Productes::class, 'product_keyword', 'product_id', 'keyword_id');
    }

    public function categories()
    {
        return $this->hasMany(Categories::class, 'id' ,'category_id');
    }

    public function authors()
    {
        return $this->hasMany(Authors::class, 'id' ,'author_id');
    }

   
}
