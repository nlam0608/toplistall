<?php

namespace App\Http\Controllers;

use App\Services\AuthorsService;
use App\Services\CategoriesService;
use App\Services\KeywordsService;
use Illuminate\Http\Request;

class KeywordController extends Controller
{

    protected $keywordservice;

    public function __construct(KeywordsService $keywordservice, CategoriesService $categoriesService, AuthorsService $authorsService)
    {
        $this->keywordservice = $keywordservice;
        $this->categoriesService = $categoriesService;
        $this->authorsService = $authorsService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords = $this->keywordservice->all($request);
        return view('admin1/keywords/index',compact('keywords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoriesService->all();
        $authors =$this->authorsService->all();
        return view('admin1/keywords/create',compact('categories','authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->keywordservice->updateKeyword($request);
        return redirect()->route('keyword.index');
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
        $keyword = $this->keywordservice->getId($id);
        $categories = $this->categoriesService->all();
        $authors = $this->authorsService->all();
        return view('admin1/keywords/edit', compact('keyword','categories','authors'));
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
        $this->keywordservice->updateKeyword($request, $id);
        return redirect()->route('keyword.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->keywordservice->deleteKeyword($id);
        return redirect()->route('keyword.index');
    }
}
