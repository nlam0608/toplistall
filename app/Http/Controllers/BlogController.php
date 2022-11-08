<?php

namespace App\Http\Controllers;

use App\Services\BlogsService;
use App\Services\CategoriesService;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    protected $blogsService;
    protected $categoriesService;

    public function __construct(BlogsService $blogsService, CategoriesService $categoriesService)
    {
        $this->blogsService = $blogsService;
        $this->categoriesService = $categoriesService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blogs = $this->blogsService->all($request);
        return view('admin1/blogs/index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoriesService->all();
        return view('admin1/blogs/create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->blogsService->updateBlog($request);
        return redirect()->route('blog.index');
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
        $blog = $this->blogsService->getId($id);
        $categories = $this->categoriesService->all();
        return view('admin1/blogs/edit', compact('blog','categories'));
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
        $this->blogsService->updateBlog($request, $id);
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->blogsService->deleteBlog($id);
        return redirect()->route('blog.index');
    }
}
