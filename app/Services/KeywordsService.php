<?php

namespace App\Services;

use App\Repository\KeywordRepository;
use Illuminate\Support\Str;

class KeywordsService {

    public function __construct(KeywordRepository $keywordRepository)
    {
        $this->keywordRepository = $keywordRepository;
    }

    public function all($data)
    {   
        return $this->keywordRepository->listKeyword($data);
    }

    public function getId($id)
    {
        return $this->keywordRepository->getId($id);
    }
    
    /**
     * funtion update end Create
     * $data = array
     * $id = integer or null
     */
    public function updateKeyword($data, $id=null)
    {
        $data_result = $data->toArray();
        // upload file to image
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
                'author_id' => $data_result['author_id'],
                'meta_title' => $data_result['meta_title'],
                'meta_description' => $data_result['meta_description'],
                'slug' => Str::slug($data_result['title'], '-'),
                'category_id' => $data_result['category_id'],
                'status' => $data_result['status'],
                'image' => $data_result['image'],
            ];
        } else {
            $data_result = [
                'title' => $data_result['title'],
                'content' => $data_result['content'],
                'author_id' => $data_result['author_id'],
                'meta_title' => $data_result['meta_title'],
                'meta_description' => $data_result['meta_description'],
                'slug' => Str::slug($data_result['title'], '-'),
                'category_id' => $data_result['category_id'],
                'status' => $data_result['status'],
                'image' => $data_result['imagesub'],
            ];
        }
        

        $upkeyword = $this->keywordRepository->updateOrCreateKeyword($data_result, $id);

        return $upkeyword;
    }

    public function deleteKeyword($id) 
    {
        return $this->keywordRepository->deleteKeyword($id);
    }
}


