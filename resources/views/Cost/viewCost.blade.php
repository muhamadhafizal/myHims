@extends('layouts.app')

@section('content')

    <h1>Cost</h1>   
 
<table class="blueTable"  >
	<thead>
<tr>
<td>ID</td>
<td>Cost Name</td>
<td>Price</td>

</tr>
</thead>

@foreach($cost as $cost)

<tr>
	<td>{{$cost->id}}</td>
	<td>{{$cost->cost_name}}</td>
	<td>{{$cost->cost}}</td>
	

</tr>

@endforeach
</table>







@endsection