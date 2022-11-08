<?php

namespace App\Repository;

use App\Models\Categories;

class CategoryRepository
{

    protected $categories;

    public function __construct(Categories $categories)
    {
        $this->categories = $categories;
    }

    public function listCategory()
    {
        return $this->categories->all();
    }

    public function listParentCategory()
    {
        return $this->categories->where('parent_id','=','0')->get();
    }

    public function findId($id)
    {
        return $this->categories->find($id);
    }

    /**
     *  function update or create 
     *  $data = array
     *  $id = int or null
     */
    public function updateCategory($data, $id)
    {
        if(isset($id)){
            return $this->categories->find($id)->update($data);
        } else {
            return $this->categories->create($data);
        }
        
    }

    public function deleteCategory($id)
    {
        return $this->categories->destroy($id);
    }

    public function childrenCategory($data)
    {
        $query = $this->categories->with('childrens')->where('parent_id', 0)->get();

        if(isset($data['key']))
        {
            $query = $query->where('name', $data['key']);    
        }
        return $query;
    }
}