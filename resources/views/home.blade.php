@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="padding: 0">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                   <!--  <div class="row">
                        <div class="col-lg-6"><a href="" class="btn btn-primary">Create New Stock</a></div>
                        <div class="col-lg-6"><a href="" class="btn btn-primary">View Stock</a></div>
                    </div><br><br>
                    <div class="row">
                        <div class="col-lg-6"><a href="" class="btn btn-primary">Create New Cost</a></div>
                        <div class="col-lg-6"><a href="" class="btn btn-primary">View Cost</a></div>
                    </div><br><br>
                    <div class="row">
                        <div class="col-lg-6"><a href="" class="btn btn-primary">Create New Product</a></div>
                        <div class="col-lg-6"><a href="" class="btn btn-primary">View Product</a></div>
                    </div> -->

                    <div>
                        <div>
                            <a href="{{route('createStock')}}"><button class="btn btn-primary" style="width: 150px">create new stock</button></a>
                            <a href="{{route('viewStock')}}"><button class="btn btn-primary" style="float: right; width: 150px">view stock</button></a>
                        </div>
                        <br>
                        <div>
                            <a href="{{route('createCost')}}"><button class="btn btn-primary" style="width: 150px">create new cost</button></a>
                            <a href="{{route('viewCost')}}"><button class="btn btn-primary" style="float: right;width: 150px">view cost</button></a>
                        </div>
                        <br>
                        <div>
                            <a href="{{route('createProduct')}}"><button class="btn btn-primary" style="width: 150px">create new product</button></a>
                            <a href="{{route('viewProduct')}}"><button class="btn btn-primary" style="float: right;width: 150px">view product</button></a>
                        </div>
                    </div>
                    <br>
                    <div style="text-align: center">
                        <a href="{{route('optimizer')}}"><button class="btn btn-primary" >Get Optimum Profit</button></a>
                    </div>




<!--                     <table class="table">
                        <tr style="border: none">
                            <td style="text-align: center; border: none">
                                <div><a href="" class="btn btn-primary">Create New Stock</a></div>
                            </td>
                            <td style="text-align: center; border: none">
                                <div><a href="" class="btn btn-primary">View Stock</a></div>
                            </td>
                        </tr>
                        <tr style="border: none">
                            <td style="text-align: center; border: none">
                                <div><a href="" class="btn btn-primary">Create New Cost</a></div>
                            </td>
                            <td style="text-align: center; border: none">
                                <div><a href="" class="btn btn-primary">View Cost</a></div>
                            </td>
                        </tr>
                        <tr style="border: none">
                            <td style="text-align: center; border: none">
                                <div><a href="" class="btn btn-primary">Create New Product</a></div>
                            </td>
                            <td style="text-align: center; border: none">
                                <div><a href="" class="btn btn-primary">View Product</a></div>
                            </td>
                        </tr>
                    </table> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
