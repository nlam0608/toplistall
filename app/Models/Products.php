<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['id','title','content','image','rating','price','status','views','order','category_id','link_amazon','link_ebay','link_walmarl'];

    public function keywords()
    {
        return $this->belongsToMany(Keywords::class, 'product_keyword', 'product_id', 'keyword_id');
    }

    public function categories()
    {
        return $this->hasMany(Categories::class, 'id' ,'category_id');
    }
}
