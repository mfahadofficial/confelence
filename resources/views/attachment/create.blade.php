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

<form class = "col-5 offset-2" action="{{url('attachment')}}" method = "post" enctype="multipart/form-data">
@csrf
<h2>Create Attachment</h2>
<input type= "hidden" name = "page_id" id ="page_id" value = "{{ request()->page_id }}">
<input type= "hidden" name = "space_id" id ="space_id" value = "{{$Space_id}}">

  <div class=" form-group">
    <label for="name">Attachment</label><br>
    <input type="file" class="" name= "filePath" id="filePath"  placeholder="Attachment">
  </div><br>






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

