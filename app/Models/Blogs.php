<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $fillable = ['id','title','content','short_description','subcontent','image','category_id','status','slug'];

    public function categories()
    {
        return $this->hasMany(Categories::class, 'id' ,'category_id');
    }

    // public function sluggable()
    // {
    //     return [
    //         'slug' => [s
    //             'source' => 'title'
    //         ]
    //     ];
    // }
}
