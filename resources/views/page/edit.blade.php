@extends('layouts.app')

@section('content')
    
    
<div class="container">
        <div class="row">
            <div class="col-md-7 offset-3 mt-4">
                <div class="card-body">

                    <form method=”POST” action="">
                        @csrf

                        <div class=" form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value ="{{$page->name}}" name= "name" id="name"  placeholder="Page Name">
                        </div>

                        <div class=" form-group">

                        <select class="form-select" name="category_id" id="category_id" aria-label="Default select example" >
  
                            <option >Categories</option>
                            @forelse ($categories as $category)
                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                            @empty
                            <option>No Space</option>
                            @endforelse
                            </select><br><br>

                        <div class="form-group">
                        <label for="description">Description:</label>
                            <textarea class="form-control" value ="{{$page->description}}" name="description" id="summernote"></textarea>
                        </div>
                        <button type=”submit” class="btn btn-danger btn-block">Update</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    @endsection
