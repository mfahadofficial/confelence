@extends('layouts.app')

@section('content')
<div class="container mt-3 bg-white">
  <h2>Spaces</h2>
  <p>this all about Spaces</p>            
  <table class="table table-hover">
  <button type="button" class="btn btn-success" onclick="location.href='{{ url('space/create') }}'">Add New</button><br>
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Code</th>
        <th>Created By</th>
        <th>Category</th>
        <th>Created at</th>
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
      </tr>
      @empty


    </tbody>
  </table>
  <h3 class = "text-info">You have no Space</h3>
@endforelse
</div>


@endsection