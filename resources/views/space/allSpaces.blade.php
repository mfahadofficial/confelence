@extends('layouts.app')

@section('content')

<nav class="navbar  navbar-expand-md    shadow-sm"
style="margin-top: 32px;
    height: 75px;
    background-color: #b8b894!important;
     position: sticky!important;" >
            <div class="container">
                <a class="navbar-brand" style="color:white;" href="{{ url('/') }}">
                    Space Directory
                </a>
                
</div>
        </nav>

<div id="mySidebar" class="sidebar" style="width: 250px; margin-top: 130px !important" >
  
  
 
  <a href="{{route('space.home')}}">All Spaces</a>
  <a href="{{route('space.siteSpaces')}}">Site Spaces</a>
  <a href="{{route('space.personalSpaces')}}">Personal Spaces</a>
  <a href="{{route('space.archivedSpaces')}}">Archived Spaces</a>

  <br><li class = "sideBarHead">
    CATEGORIES
  </li>
  @forelse ($categories as $category)
  <a href="">{{ $category->name }}</a>
  @empty

<a href="#">No CAtegory</a>
@endforelse


</div>


<div class="container mt-3 bg-white offset-3 col-7" style="    margin-top: 80px !important;">
  <h2>All Spaces</h2>
  <!-- <p><b>All Attachments:</b> <a href="/attachment"><i class="far fa-eye"></i></a></p>             -->
  <table class="table">
  <!-- <button type="button" class="btn btn-success" onclick="location.href='{{ url('space/create') }}'">Add New</button><br> -->
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Category</th>
        <th></th>

      </tr>
    </thead>
    <tbody>

    @forelse ($spaces as $space)

      <tr>
        <td style= " color:#E4701D;">{{ $space->name }}</td>

        <td >{{ $space->description }}</td>
        <td style= " color:#E4701D;">{{ $space->category->name }}  </td>

        <td> <a href = "space/{{ $space->id }}"> <i class="far fa-eye"></i></a> </td>
      </tr>
      @empty


    </tbody>
  </table>
  <h3 class = "text-info">You have no Space</h3>
@endforelse
</div>


@endsection