<?php

namespace App\Services;

use App\Repository\CategoryRepository;

class CategoriesService {

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * all $data to $request
     */

    public function all()
    {
        
        return $this->categoryRepository->listCategory();
    }

    public function children($data)
    {
        return $this->categoryRepository->childrenCategory($data);
    }

    public function listParent()
    {
        return $this->categoryRepository->listParentCategory();
    }

    public function getId($id)
    {
        return $this->categoryRepository->findId($id);
    }
    
    /**
     * funtion update end Create
     * $data = array
     * $id = integer or null
     */
    public function updateCategory($data ,$id=null)
    {
        $data = [
            'name' => $data['name'],
            'status' => $data['status'],
            'parent_id' => $data['parent_id'],
        ];
        return $this->categoryRepository->updateCategory($data, $id);
    }

    public function deleteCategory($id) 
    {
        return $this->categoryRepository->deleteCategory($id);
    }
}


