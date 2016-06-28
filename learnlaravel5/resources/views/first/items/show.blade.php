@extends('layouts.app')

@section('content')

  <h1 style="text-align: center; margin-top: 50px;">{{ $item->firstname }}</h1>
  <hr>
  
  <div id="content" style="padding: 50px;">

	
    <ul>
      <li><strong>Email: </strong> {{ $item->email }}</li>
      <li><strong>Check Box: </strong> {{  $item->check_box }}</li>
      <li><a href="{{ URL('first/file/'.$item->id)}}" target="_blank"><strong>File </strong></a></li>
      <li><strong>Dropdown:</strong> {{ $item->dropdown}}</li>
    </ul>
  </div>
  <div>
    <center><a href="{{ URL('first/item/PDF/'.$item->id)}}">Generate PDF</a><center>
  </div>
@endsection

