@extends('layouts.app')

@section('content')

<div id="mySidebar" class="sidebar" style="width: 250px;" >
  
  <li class = "sideBarHead">SPACES   <span> <button class = "allSpace"><a href = "#" style= "color:#E4701D">ALL</a> </button></span></li>
  @forelse ($spaces as $space)
  <a href="space/{{ $space->id }}"><i class="fas fa-satellite-dish" style= "color:#E4701D"></i> {{ $space->name }}</a>

  @empty

  <a href="#">No Space</a>
@endforelse
</div>


<div class="container mt-3 bg-white offset-3" style="    margin-top: 80px !important;">
  <h2>All Spaces</h2>
  <p><b>All Attachments:</b> <a href="/attachment"><i class="far fa-eye"></i></a></p>            
  <table class="table">
  <button type="button" class="btn btn-success" onclick="location.href='{{ url('space/create') }}'">Add New</button><br>
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Code</th>
        <th>Created By</th>
        <th>Category</th>
        <th>Created at</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

    @forelse ($spaces as $space)

      <tr>
        <td>{{ $space->name }}</td>
        <td>{{ $space->itemCode }}</td>
        <td>{{ $space->description }}</td>
        <td class = "text-primary">{{ $space->user->name }}</td>
        <td class = "text-primary">{{ $space->category->name }}</td>
        <td >{{ $space->created_at }}</td>
        <td> <a href = "space/{{ $space->id }}"> <i class="far fa-eye"></i></a> </td>
      </tr>
      @empty


    </tbody>
  </table>
  <h3 class = "text-info">You have no Space</h3>
@endforelse
</div>


@endsection