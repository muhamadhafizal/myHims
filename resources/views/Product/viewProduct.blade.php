@extends('layouts.app')

@section('content')

    <h1>Product</h1>   
 
<table class="blueTable"  >
	<thead>
<tr>
<td>ID</td>
<td>Product Name</td>
<td>Demand</td>
<td>Unit</td>
<td>Price per kg</td>
<td>Weight per Quantity</td>
</tr>
</thead>

@foreach($product as $product)

<tr>
	<td>{{$product->id}}</td>
	<td>{{$product->pro_name}}</td>
	<td>{{$product->pro_demand}}</td>
	<td>{{$product->dem_unit}}</td>
	<td>{{$product->price_per_kg}}</td>
	<td>{{$product->weight_per_qty}}</td>
</tr>

@endforeach
</table>







@endsection