<?php

namespace App\Services;

use App\Repository\BlogRepository;
use Illuminate\Support\Str;


class BlogsService {

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * all $data to $request
     */

    public function all($data)
    {   
        return $this->blogRepository->listBlog($data);
    }

    public function getId($id)
    {
        return $this->blogRepository->findId($id);
    }

    /**
     * funtion update end Create
     * $data = array
     * $id = integer or null
     */
    public function updateBlog($data, $id=null)
    {
        $data_result = $data->toArray();
        
        if($data->file('image')){
            $file= $data->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images'), $filename);
            $data_result['image']= $filename;
        }
        
        if(isset($data_result['image'])){
            $data_result = [
                'title' => $data_result['title'],
                'content' => $data_result['content'],
                'short_description' => $data_result['short_description'],
                'subcontent' => $data_result['subcontent'],
                'slug' => Str::slug($data_result['title'], '-'),
                'category_id' => $data_result['category_id'],
                'status' => $data_result['status'],
                'image' => $data_result['image'],
            ];
        } else {
            $data_result = [
                'title' => $data_result['title'],
                'content' => $data_result['content'],
                'short_description' => $data_result['short_description'],
                'subcontent' => $data_result['subcontent'],
                'slug' => Str::slug($data_result['title'], '-'),
                'category_id' => $data_result['category_id'],
                'status' => $data_result['status'],
                'image' => $data_result['imagesub'],
            ];
        }
        

        $upBlog = $this->blogRepository->updateOrCreateBlog($data_result, $id);

        return $upBlog;
    }
    
    public function deleteBlog($id) 
    {
        return $this->blogRepository->deleteBlog($id);
    }
    
   
}


