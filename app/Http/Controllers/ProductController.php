<?php

namespace App\Http\Controllers;

use App\Services\CategoriesService;
use App\Services\ProductsService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $productesService;

    public function __construct(ProductsService $productesService, CategoriesService $categoriesService)
    {
        $this->productesService = $productesService;
        $this->categoriesService = $categoriesService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productes = $this->productesService->all($request);
        // dd($productes);
        return view('admin1/productes/index',compact('productes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoriesService->all();
        return view('admin1/productes/create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->productesService->updateProduct($request);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productesService->getId($id);
        $categories = $this->categoriesService->all();
        return view('admin1/productes/edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->productesService->updateProduct($request, $id);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productesService->deleteProduct($id);
        return redirect()->route('product.index');
    }
}
