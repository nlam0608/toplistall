@extends('admin1.index')
@section('content-wed')
<div class="card card-primary mt-3">
    <div class="card-header">
      <h3 class="card-title">Create Category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="{{ route('categort.store')}}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputName">Name</label>
          <input type="text" name="name" class="form-control" id="exampleInputName" required placeholder="Enter name">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="custom-select">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label>Parent</label>
            <select class="custom-select" name="parent_id">
                <option value="0">No parent</option>
                @foreach ($parents as $parent)
                    <option value="{{$parent->id}}">{{$parent->name}}</option>
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