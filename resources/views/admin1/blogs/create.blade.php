@extends('admin1.index')
@section('content-wed')
<div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Create Blog</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{ route('blog.store')}}" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputTitle">Title</label>
          <input type="text" name="title" class="form-control" id="exampleInputTitle" required placeholder="Enter name">
        </div>
        <div class="form-group">
          <label for="exampleInputContent">Content</label>
          <textarea name="content" class="my-editor form-control" id="my-editor" cols="30" rows="10" equired placeholder="Enter Content"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputDescription">Description</label>
          <input type="text" name="short_description" class="form-control" id="exampleInputDescription" required placeholder="Enter Description">
        </div>
        <div class="form-group">
          <label for="exampleInputSubcontent">Subcontent</label>
          <input type="text" name="subcontent" class="form-control" id="exampleInputSubcontent" required placeholder="Enter Subcontent">
        </div>
        <div class="form-group">
          <label for="exampleFormControlFile1">Image</label>
          <div class="holder p-3">
            <img id="imgPreview" src="#" alt="image" class="imgPreview"/>
          </div>
          <input type="file" name="image" id="photo" required="true" />
        </div>
        <div class="form-group">
          <label>Category</label>
          <select name="category_id" class="custom-select">
            @foreach($categories as $category) 
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
      </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="custom-select">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
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
  window.addEventListener('load', function() {
    CKEDITOR.replace( 'my-editor', options );
  })
</script>
@endpush