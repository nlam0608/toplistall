@extends('admin1.index')
@section('content-wed')

<div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Create Keyword</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{ route('keyword.store')}}" enctype="multipart/form-data">
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
          <label for="exampleInputMetaDescription">Meta Description</label>
          <input type="text" name="meta_description" class="form-control" id="exampleInputMetaDescription" required placeholder="Enter MetaDescription">
        </div>
        <div class="form-group">
          <label for="exampleInputMetaTitle">Meta Title</label>
          <input type="text" name="meta_title" class="form-control" id="exampleInputMetaTitle" required placeholder="Enter Meta Title">
        </div>
        <div class="form-group">
          <label for="exampleInputTitle">Author</label>
          <select name="author_id" class="custom-select">
            @foreach($authors as $author) 
            <option value="{{$author->id}}">{{$author->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <div class="form-group">
            <label for="exampleFormControlFile1">Image</label>
            <div class="holder">
              <img id="imgPreview" src="#" alt="pic" />
            </div>
            <input type="file" name="image" id="photo" required="true" />
          </div>
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

@push('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<script>
  window.onload = function(e) {
    CKEDITOR.replace( 'my-editor' );
  };
</script>
@endpush