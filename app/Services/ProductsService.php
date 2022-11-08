<?php

namespace App\Services;

use App\Repository\ProductRepository;

class ProductsService {

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
 
    public function all($data)
    {   
        return $this->productRepository->listProduct($data);
    }

    public function getId($id)
    {
        return $this->productRepository->getId($id);
    }
    
    /**
     * funtion update end Create
     * $data = array
     * $id = integer or null
     */
    public function updateProduct($data, $id=null)
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
                'rating' => $data_result['rating'],
                'price' => $data_result['price'],
                'views' => $data_result['views'],
                'order' => $data_result['order'],
                'link_amazon' => $data_result['link_amazon'],
                'link_ebay' => $data_result['link_ebay'],
                'link_walmarl' => $data_result['link_walmarl'],
                'category_id' => $data_result['category_id'],
                'status' => $data_result['status'],
                'image' => $data_result['image'],
            ];
        } else {
            $data_result = [
                'title' => $data_result['title'],
                'content' => $data_result['content'],
                'rating' => $data_result['rating'],
                'price' => $data_result['price'],
                'views' => $data_result['views'],
                'order' => $data_result['order'],
                'link_amazon' => $data_result['link_amazon'],
                'link_ebay' => $data_result['link_ebay'],
                'link_walmarl' => $data_result['link_walmarl'],
                'category_id' => $data_result['category_id'],
                'status' => $data_result['status'],
                'image' => $data_result['imagesub'],
            ];
        }
        

        $upProduct = $this->productRepository->updateOrCreateProduct($data_result, $id);

        return $upProduct;
    }

    public function deleteProduct($id) 
    {
        return $this->productRepository->deleteProduct($id);
    }
}


