@extends('layouts.app')

@section('content')
<div class="container mt-3 bg-white">
  <h2><b>Pages Attachments<b> </h2>
  <p>this all about Attachments</p>            
  <table class="table">
 
    <thead>
      <tr>
        <th>Files</th>
       
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

    @forelse ($attachments as $attachment)

      <tr>
        <td>{{ $attachment->filePath }}</td>
        <td> <a href="/attachment/downloadFile/{{$attachment->filePath }}"> <i class="fas fa-download"></i></a> </td>
      </tr>
      @empty


    </tbody>
  </table>
  <h3 class = "text-info">You have no Attachment</h3>
@endforelse
</div>


@endsection