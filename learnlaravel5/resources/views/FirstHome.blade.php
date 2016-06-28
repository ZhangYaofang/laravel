@extends('layouts.app')



@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">

        <table class="table">

	<thead>
          <tr>
            <th>Firstname</th>
            <th>Email</th>
          </tr>
        </thead>
	<tbody>
          @foreach ($items as $item)
            <tr>
              <td><a href="{{ URL('first/items/'.$item->id)}}"> {{ $item->firstname }}</td>
              <td>{{ $item->email }}</td>
	    <tr>
          @endforeach
	 </tbody>
	</table>
	
        </div>
      </div>
    </div>
  </div>
</div>
<div">
   <center><a href="{{ URL('first/items/create') }}" class="btn btn-primary btn-lg" role="button" >
      Add an item
   </a></center>
</div>
@endsection

