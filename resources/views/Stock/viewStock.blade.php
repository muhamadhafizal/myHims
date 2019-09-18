@extends('layouts.app')

@section('content')

    <h1>Stock</h1>   
 
<table class="blueTable"  >
	<thead>
<tr>
<td>ID</td>
<td>Name</td>
<td>Quantity</td>
<td>Unit</td>
<td>Price per kg</td>
<td>Weight per Quantity</td>
</tr>
</thead>

@foreach($stock as $stock)

<tr>
	<td>{{$stock->id}}</td>
	<td>{{$stock->stock_name}}</td>
	<td>{{$stock->stock_qty}}</td>
	<td>{{$stock->stock_unit}}</td>
	<td>{{$stock->price_per_kg}}</td>
	<td>{{$stock->weight_per_qty}}</td>
</tr>

@endforeach
</table>







@endsection