<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Stock;
use App\Cost;
use App\Product;
class ChicController extends Controller
{
    ////////////////		StockController			////////////////



	////////////////////////////
	public function createStock()
	{
		return view('Stock.createStock');
	}


	////////////////////////////////////////////
	public function storeStock(Request $request)
	{
		$request->validate([
            // 'id'=>'required',
			'stock_name'=>'required',
			'stock_qty'=>'required',
			'stock_unit'=>'required',
			'price_per_kg'=>'required',
			'weight_per_qty'=>'required'
		]);

		$stock = new Stock([
			'stock_name'=>$request->get('stock_name'),
			'stock_qty'=>$request->get('stock_qty'),
			'stock_unit'=>$request->get('stock_unit'),
			'price_per_kg'=>$request->get('price_per_kg'),
			'weight_per_qty'=>$request->get('weight_per_qty')
		]);

		$stock->save();
		return redirect('/home')->with('success','Stock Saved!');
	}


	//////////////////////////
	public function showStock()
	{		
		$stock = Stock::all();

		return view('Stock.viewStock', compact('stock'));

	}


    ////////////////		CostController			////////////////

	public function createCost()
	{
		$stock = Stock::all();
		return view('Cost.createCost', compact('stock'));
	}


	public function storeCost(Request $request)
	{
		$request->validate([
			'cost_name'=>'required',
			'cost'=>'required',
			'stock_id'=>'required'
		]);


		$cost = new Cost([
			'cost_name'=>$request->get('cost_name'),
			'cost'=>$request->get('cost'),
			'stock_id'=>$request->get('stock_id')

		]);

		$cost->save();
		return redirect('/home')->with('success', 'Cost Saved!');

	}

	public function showCost()
	{
		$cost = Cost::all();
		return view('Cost.viewCost', compact('cost'));
	}


	////////////////		ProductController		////////////////


	public function createProduct()
	{	
		$stock = Stock::all();
		$product = Product::all();
		return view('Product.createProduct', compact('stock', 'product'));
	}

	public function storeProduct(request $request)
	{
		$request->validate([
			'pro_name'=>'required',
			'pro_demand'=>'required',
			'dem_unit'=>'required',
			'price_per_kg'=>'required',
			'weight_per_qty'=>'required',
			'stock_id'=>'required'
		]);


		$product = new Product([
			'pro_name'=>$request->get('pro_name'),
			'pro_demand'=>$request->get('pro_demand'),
			'dem_unit'=>$request->get('dem_unit'),
			'price_per_kg'=>$request->get('price_per_kg'),
			'weight_per_qty'=>$request->get('weight_per_qty'),
			'stock_id'=>$request->get('stock_id')
		]);

		$product->save();
		return view('/home')->with('success', 'Product Saved!');
	}

	public function showProduct()
	{
		$product = Product::all();
		return view('Product.viewProduct', compact('product'));
	}



	//Optimizer
	public function optimizer()
	{	
		

		$data = DB::table('product')
		->join('stock', 'stock.id', '=', 'product.stock_id')	
		->select('product.pro_name','product.pro_demand', 'product.dem_unit', 'product.price_per_kg', 'product.weight_per_qty', 'stock.stock_qty', 'stock.stock_unit')
		->get();

		$cost = DB::table('cost')
		->join('stock','stock.id','=','cost.stock_id')
		->select('cost_name','cost','stock_id')
		->get();

		



		return view('Optimizer.optimizer')->with (compact('data','cost'));

		
	}


}
