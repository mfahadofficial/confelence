@extends('layouts.app')

@section('content')

@if ($errors->any())
        <div class="col-5 offset-2 alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form class = "col-5 offset-2" action="{{url('page')}}" method = "post" enctype="multipart/form-data">
@csrf
<h2>Create Page</h2>
<input type= "hidden" name = "space_id" id ="space_id" value = "{{ request()->space_id }}">
  <div class=" form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name= "name" id="name"  placeholder="Page Name">
  </div>

  <div class=" form-group">
    <label for="name">Content</label><br>
    <input type="file" class="" name= "content" id="content"  placeholder="Content">
  </div><br>

  <select class="form-select" name="category_id" id="category_id" aria-label="Default select example" >
  
  <option >Categories</option>
  @forelse ($categories as $category)
  <option value="{{$category->id}}" selected>{{$category->name}}</option>
  @empty
<option>No Space</option>
@endforelse
</select>

<br><br>


  <div class="form-group ">
  <button type="submit" class="btn btn-primary">Add</button>
</div>
</form>

@if ($message = Session::get('success'))
        <div class=" col-5 offset-2 alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

@endsection

