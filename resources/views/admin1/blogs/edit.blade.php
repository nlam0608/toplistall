@extends('admin1.index')
@section('content-wed')

<div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Edit Blog</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{ route('blog.update',$blog->id)}}" enctype="multipart/form-data">
      @method('POST')
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputTitle">Title</label>
          <input type="text" value="{{$blog->title}}" name="title" class="form-control" id="exampleInputTitle" required placeholder="Enter name">
        </div>
        <div class="form-group">
          <label for="exampleInputContent">Content</label>
          <textarea name="content"  class="my-editor form-control" id="my-editor" cols="30" rows="10" equired placeholder="Enter Content">{{$blog->content}}</textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputDescription">Description</label>
          <input type="text" value="{{$blog->short_description}}" name="short_description" class="form-control" id="exampleInputDescription" required placeholder="Enter Description">
        </div>
        <div class="form-group">
          <label for="exampleInputSubcontent">Subcontent</label>
          <input type="text" value="{{$blog->subcontent}}" name="subcontent" class="form-control" id="exampleInputSubcontent" required placeholder="Enter Subcontent">
        </div>
        <div class="form-group">
          <div class="form-group">
            <label for="exampleFormControlFile1">Image</label>
            <div class="holder r-3">
              <img id="imgPreview" src="{{ asset('images/'.$blog->image) }}" alt="pic" />
            </div>
            <input type="file" value="{{$blog->image}}" name="image" class="form-control-file" id="photo">
            <input type="text" value="{{$blog->image}}" name="imagesub" class="form-control-file" id="photo" style="display: none;">
          </div>
        </div>
        <div class="form-group">
          <label>Category</label>
          <select name="category_id" class="custom-select">
            @foreach($blog->categories as $category)
            <option value="{{$blog->category_id}}">{{$category->name}}</option>
            @endforeach
            @foreach($categories as $category) 
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="custom-select">
              <option value="1" @if($blog->status == 1 ) selected @endif>Active</option>
              <option value="0" @if($blog->status == 0 ) selected @endif>Inactive</option>
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

{{-- librari --}}

@push('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script>
<script>
  window.onload = function(e) {
    CKEDITOR.replace( 'my-editor', options);
  };
</script>
@endpush