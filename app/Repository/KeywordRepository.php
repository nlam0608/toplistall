<?php

namespace App\Repository;

use App\Models\Keywords;

class KeywordRepository
{

    protected $keywords;

    public function __construct(Keywords $keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * get all data and search function
     * $data = array
     */
    public function listKeyword($data)
    {
        $paginate = 10;

        $query = $this->keywords->with('categories','authors')->orderBy('id','DESC');

        if(isset($data['key']))
        {
            $query = $query->where('title','like','%'.$data['key'].'%');
        }
        return $query->paginate($paginate);
    }

    /**
     * get data by id 
     * $id = int
     */
    public function getId($id)
    {
        return $this->keywords->with('categories')->find($id);
    }
    
    /**
     *  function update or create 
     *  $data = array
     *  $id = int or null
     */
    public function updateOrCreateKeyword($data, $id)
    {
        if(isset($id)){
            return $this->keywords->find($id)->update($data);
        } else {
            return $this->keywords->create($data);
        }
    }

    /**
     * delete data by id
     * $id = int
     */
    public function deleteKeyword($id)
    {
        return $this->keywords->destroy($id);
    }

}