@extends('layouts.app')

@section('content')
<div class="container mt-3 bg-white">
  <h2><b>Page:<b> <span class = "text-primary">{{ $page->name }}<span></h2>
  <p><b>Content:<b> <a href="/pageFiles/{{$page->content }}">pageFiles/{{ $page->content }}</a></p>    
  <button type="button" class="btn btn-success" onclick="location.href='{{ url('attachment/create/' .$page->id) }}'">Add New Attachment</button><br> 
  
  <table class="table">
    <thead>
      <tr>
        <th>File</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>

    @forelse ($attachments as $attachment)

      <tr>

        <td><a href="/attachments/{{$attachment->filePath }}">attachments/{{$attachment->filePath }}</a></td>
        <td> <a href="/attachment/downloadFile/{{$attachment->filePath }}"> <i class="fas fa-download"></i></a> </td>
        
      </tr>
      @empty


</tbody>
</table>
<h3 class = "text-info">This Page has no Attachment</h3>
@endforelse


    </tbody>
  </table>

</div>


@endsection