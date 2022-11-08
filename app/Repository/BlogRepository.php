<?php

namespace App\Repository;

use App\Models\Blogs;

class BlogRepository
{

    protected $blogs;

    public function __construct(Blogs $blogs)
    {
        $this->blogs = $blogs;
    }

    /**
     * get all data and search function
     * $data = array
     */
    public function listBlog($data)
    {
        $paginate = 10;

        $query = $this->blogs->with('categories')->orderBy('id','DESC');

        if(isset($data['key']))
        {
            $query = $query->where('title','like','%'.$data['key'].'%');
        }
        return  $query->paginate($paginate)->fragment('blogs');
    }

    /**
     * get data by id 
     * $id = int
     */
    public function findId($id)
    {
        return $this->blogs->with('categories')->find($id);
    }

    /**
     *  function update or create 
     *  $data = array
     *  $id = int or null
     */
    public function updateOrCreateBlog($data, $id)
    {
        if(isset($id)){
            return $this->blogs->find($id)->update($data);
        } else {
            return $this->blogs->create($data);
        }
    }

    /**
     * delete data by id
     * $id = int
     */
    public function deleteBlog($id)
    {
        return $this->blogs->destroy($id);
    }

}