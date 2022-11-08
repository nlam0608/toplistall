@extends('admin1.index')
@section('content-wed')

<div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Edit Category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{ route('categort.update',$category->id)}}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" name="name" value="{{$category->name}}" class="form-control" id="exampleInputEmail1" required placeholder="Enter name">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="custom-select">
              <option value="1" @if($category->status == 1 ) selected @endif>Active</option>
              <option value="0" @if($category->status == 0 ) selected @endif>Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label>Parent</label>
            <select class="custom-select" name="parent_id">
                <option value="0" @if($category->parent_id == 0 ) selected @endif>No parent</option>
                @foreach ($parents as $parent)
                    <option value="{{$parent->id}}" @if($parent->id ==  $category->parent_id) selected @endif>{{$parent->name}}</option>
                @endforeach
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