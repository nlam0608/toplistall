<?php

namespace App\Services;

use App\Repository\AuthorRepository;

class AuthorsService {

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function all()
    {   
        return $this->authorRepository->listAuthor();
    }

    public function getId($id)
    {
        return $this->authorRepository->findId($id);
    }
    
    // funtion update end Create
    public function updateAuthor($data, $id=null)
    {
        $data_result = $data->toArray();
        
        if($data->file('image')){
            $file= $data->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images'), $filename);
            $data_result['image']= $filename;
        }
        
        $data_result = [
            'title' => $data_result['title'],
            'content' => $data_result['content'],
            'short_description' => $data_result['short_description'],
            'subcontent' => $data_result['subcontent'],
            'slug' => $data_result['slug'],
            'category_id' => $data_result['category_id'],
            'status' => $data_result['status'],
            'image' => $data_result['image'],
        ];

        $upauthor = $this->authorRepository->updateOrCreateAthor($data_result, $id);

        return $upauthor;
    }
    
    public function deleteAuthor($id) 
    {
        return $this->authorRepository->deleteAuthor($id);
    }
    
}


