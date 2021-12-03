@extends('layouts.app')

@section('content')
<div class="container mt-3 bg-white">
  <h2><b>Space:</b> <span class = "text-primary">{{ $space->name }}</span></h2>
  <p><b>View Attachments:</b> <a href="/attachmentList/{{$space->id }}"><i class="far fa-eye"></i></a></p>    
  <button type="button" class="btn btn-success" onclick="location.href='{{ url('page/create/' .$space->id) }}'">Add New Page</button><br> 
  
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Key</th>
        <th>Category</th>
        <th>Created By</th>
        <th>Category</th>
        <th>Created at</th>
        <th>Content</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

    @forelse ($pages as $page)

      <tr>
        <td>{{ $page->name }}</td>
        <td>{{ $page->key }}</td>
        <td>{{ $page->category->name }}</td>
        <td class = "text-danger">{{ $page->user->name }}</td>
        <td class = "text-danger">{{ $page->category->name }}</td>
        <td >{{ $page->created_at }}</td>
        <td><a href="/pageFiles/{{$page->content }}">pageFiles/{{$page->content }}</a></td>
        <td>
           <a href ="{{ route('page.show',[$page->id])}}"> <i class="far fa-eye"></i></a> 
           <a href ="{{ route('page.edit',[$page->id])}}"> <i class="far fa-edit">

           </td>
      </tr>
      @empty


</tbody>
</table>
<h3 class = "text-info">this Space has no page</h3>
@endforelse


    </tbody>
  </table>

</div>


@endsection