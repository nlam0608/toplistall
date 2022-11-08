@extends('admin1.index')
@section('content-wed')

<div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Edit Product</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{ route('product.update', $product->id)}}" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputTitle">Title</label>
          <input type="text" value="{{$product->title}}" name="title" class="form-control" id="exampleInputTitle" required placeholder="Enter name">
        </div>
        <div class="form-group">
          <label for="exampleInputContent">Content</label>
          <textarea name="content" class="my-editor form-control" id="my-editor" cols="30" rows="10" equired placeholder="Enter Content">{{$product->content}}</textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputDescription">Rating</label>
          <input type="number" value="{{$product->rating}}" name="rating" class="form-control" id="exampleInputDescription" required placeholder="Enter Description">
        </div>
        <div class="form-group">
          <label for="exampleInputSubcontent">Prive</label>
          <input type="text" value="{{$product->price}}" name="price" class="form-control" id="exampleInputSubcontent" required placeholder="Enter Subcontent">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Views</label>
          <input type="text" value="{{$product->views}}" name="views" class="form-control" id="exampleInputEmail1" required placeholder="Enter name">
        </div>
        <div class="form-group">
          <label for="exampleInputTitle">Order</label>
          <input type="number" value="{{$product->order}}" name="order" class="form-control" id="exampleInputTitle" required placeholder="Enter name">
        </div>
        <div class="form-group">
          <label for="exampleInputContent">Lick amazon</label>
          <input type="text" value="{{$product->link_amazon}}" name="link_amazon" class="form-control" id="exampleInputContent" required placeholder="Enter Content">
        </div>
        <div class="form-group">
          <label for="exampleInputDescription">Link ebay</label>
          <input type="text" value="{{$product->link_ebay}}" name="link_ebay" class="form-control" id="exampleInputDescription" required placeholder="Enter Description">
        </div>
        <div class="form-group">
          <label for="exampleInputSubcontent">Link walmarl</label>
          <input type="text" value="{{$product->link_walmarl}}" name="link_walmarl" class="form-control" id="exampleInputSubcontent" required placeholder="Enter Subcontent">
        </div>
        <div class="form-group">
          <div class="form-group">
            <label for="exampleFormControlFile1">Image</label>
            <div class="holder">
              <img id="imgPreview" src="{{ asset('images/'.$product->image) }}" alt="pic" />
            </div>
            <input type="file" value="{{$product->image}}" name="image" class="form-control-file" id="photo">
            <input type="text" value="{{$product->image}}" name="imagesub" class="form-control-file" id="photo" style="display: none;">
            {{-- <input type="file" value="{{$product->image}}" name="image" class="form-control-file" id="exampleFormControlFile1">
            <input type="text" value="{{$product->image}}" name="imagesub" class="form-control-file" id="exampleFormControlFile1" style="display: none;"> --}}
          </div>
        </div>
        <div class="form-group">
          <label>Category</label>
          <select  name="category_id" class="custom-select">
            <option value="{{$product->category_id}}">{{$product->categories[0]->name}}</option>
            @foreach($categories as $category) 
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
      </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="custom-select">
              <option value="1" @if($product->status == 1 ) selected @endif>Active</option>
              <option value="0" @if($product->status == 0 ) selected @endif>Inactive</option>
            </select>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
</div>

@endsection

s