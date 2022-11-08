@extends('admin1.index')
@section('content-wed')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-9">
          <h1 class="m-0">Keyword list</h1>
        </div><!-- /.col -->
        <div class="col-sm-2">
          <a href="{{ route('keyword.create')}}">
            <button type="button" class="btn btn-success">Create</button>
          </a>
        </div>
        <div class="col-md-8 offset-md-2 mt-3">
          <form method="get" >
            @csrf
            <div class="input-group">
                <input type="search" name="key" value="{{ request('key') }}" class="form-control form-control-lg" placeholder="Type your keywords here">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-lg btn-default">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                      </svg>
                    </button>
                </div>
            </div>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th>Category</th>
        <th scope="col">Image</th>
        <th scope="col">Category</th>
        <th scope="col">Content</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($keywords as $key => $keyword)
        <tr>
          <td >{{$key + 1}}</td>
          <td class="text-title">{{$keyword->title}}</td>
          <td>{{$keyword->authors[0]->name}}</td>
          <td>{{$keyword->status == 1 ? 'active' : 'inactive'}}</td>
          <td class="text-image"><img class="image" src="{{ asset('images/'.$keyword->image) }}" alt=""> </td>
          <td>{{$keyword->categories[0]->name}}</td>
          <td class="text-slug">{!! Str::limit($keyword->content, 20, ' ...') !!}</td>
          <td>
              <a href="{{ route('keyword.edit', ['id' => $keyword->id, 'slug' => $keyword->slug])}}">
                <button type="button" class="btn btn-warning">Edit</button>
              </a>
              <a href="{{ route('keyword.delete', $keyword->id)}}" onclick="return myFunction();">
                <button type="button" class="btn btn-danger">Delete</button>
              </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="d-flex">
    {!! $keywords->links() !!}
  </div>
@endsection