<?php

namespace App\Repository;

use App\Models\Authors;

class AuthorRepository
{

    protected $authors;

    public function __construct(Authors $authors)
    {
        $this->authors = $authors;
    }

    public function listAuthor()
    {
        $paginate = 15;
        return $this->authors->orderBy('id','DESC')->paginate($paginate);
    }

    public function findId($id)
    {
        return $this->authors->with('categories')->find($id);
    }

    // funtion update end Create
    public function updateOrCreateAthor($data, $id=null)
    {
        if(isset($id)){
            return $this->authors->find($id)->updateOrCreate($data);
        } else {
            return $this->authors->create($data);
        }
    }

    public function deleteAuthor($id)
    {
        return $this->authors->find($id)->delete();
    }

}