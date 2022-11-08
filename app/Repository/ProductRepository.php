<?php

namespace App\Repository;

use App\Models\Products;
use Faker\Core\Number;

class ProductRepository
{

    protected $productes;

    public function __construct(Products $productes)
    {
        $this->productes = $productes;
    }

    /**
     * get all data and search function
     * $data = array
     */
    public function listProduct($data)
    {
        $paginate = 10;

        $query = $this->productes->with('categories')->orderBy('id','DESC');

        if(isset($data['key']))
        {
            $query = $query->where('title','like','%'.$data['key'].'%');
        }
        // if(isset($data['key']))
        // {
        //     $query = $query->where('price','like','%'.$data['key'].'%');
        // }
        
        return $query->paginate($paginate);
    }

    /**
     * get data by id 
     * $id = int
     */
    public function getId($id)
    {
        return $this->productes->with('categories')->find($id);
    }
    
    /**
     *  function update or create 
     *  $data = array
     *  $id = int or null
     */
    public function updateOrCreateProduct($data, $id)
    {
        if(isset($id)){
            return $this->productes->find($id)->update($data);
        } else {
            return $this->productes->create($data);
        }
    }

    /**
     * delete data by id
     * $id = int
     */
    public function deleteProduct($id)
    {
        return $this->productes->destroy($id);
    }

}