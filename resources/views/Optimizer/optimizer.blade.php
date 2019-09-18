@extends('layouts.app')

@section('content')


@php
$wholeChicDemand = 0;
$wholeChicDemandUnit = 0;
$wholeChicPriceKg = 0;
$wholeChicWeightQty = 0;


$breastDemand = 0;
$breastDemandUnit = 0;
$breastPriceKg = 0;
$breastWeightQty = 0; 

$wingDemand = 0;
$wingDemandUnit = 0;
$wingPriceKg = 0;
$wingWeightQty = 0;


$drumDemand = 0;
$drumDemandUnit = 0;
$drumPriceKg = 0;
$drumWeightQty = 0;


$thighDemand = 0;
$thighDemandUnit = 0;
$thighPriceKg = 0;
$thighWeightQty = 0;



$fullDemand = 0;
$fullDemandUnit = 0;
$fullPriceKg = 0;
$fullWeightQty = 0;

$QtyBreast = 0;
$QtyDrum = 0;
$QtyWholeChic=0;
$QtyWing=0;
$QtyFull=0;
$QtyThigh=0;

$stock;
$stock_unit;

@endphp



@foreach($data as $data)


@if($data->pro_name =='Ayam Bulat')

@php
$wholeChicDemand = $data->pro_demand;
$wholeChicDemandUnit = $data->dem_unit;
$wholeChicPriceKg = $data->price_per_kg;
$wholeChicWeightQty = $data->weight_per_qty;

if($wholeChicDemandUnit == 'Kg')
{
	$QtyWholeChic = $wholeChicDemand/$wholeChicWeightQty;
	$QtyWholeChic = round($QtyWholeChic);
}
else
{
	$QtyWholeChic = round($wholeChicDemand);
}

$stock = $data->stock_qty;
$stock_unit = $data->stock_unit;

if($stock_unit == 'Kg')
{
	$stockQty = $stock/$wholeChicWeightQty;
	$stockQty = round($stockQty);
}
else
{
	$stockQty = round($stock);
}

@endphp



@elseif($data->pro_name =='Dada')


@php
$breastDemand = $data->pro_demand;
$breastDemandUnit = $data->dem_unit;
$breastPriceKg = $data->price_per_kg;
$breastWeightQty = $data->weight_per_qty;

if($breastDemandUnit == 'Kg')
{
	$QtyBreast = $breastDemand/$breastWeightQty;
	$QtyBreast = round($QtyBreast);
}
else
{
	$QtyBreast = round($breastDemand);
}



@endphp




@elseif($data->pro_name =='Kepak')

@php
$wingDemand = $data->pro_demand;
$wingDemandUnit = $data->dem_unit;
$wingPriceKg = $data->price_per_kg;
$wingWeightQty = $data->weight_per_qty;

if($wingDemandUnit == 'Kg')
{
	$QtyWing = $wingDemand/$wingWeightQty;
	$QtyWing = round($QtyWing);
}
else
{
	$QtyWing = round($wingDemand);
}


@endphp




@elseif($data->pro_name =='Drumstik')

@php
$drumDemand = $data->pro_demand;
$drumDemandUnit = $data->dem_unit;
$drumPriceKg = $data->price_per_kg;
$drumWeightQty = $data->weight_per_qty;

if($drumDemandUnit == 'Kg')
{
	$QtyDrum = $drumDemand/$drumWeightQty;
	$QtyDrum = round($QtyDrum);
}
else
{
	$QtyDrum = round($drumDemand);
}


@endphp




@elseif($data->pro_name =='Paha')

@php
$thighDemand = $data->pro_demand;
$thighDemandUnit = $data->dem_unit;
$thighPriceKg = $data->price_per_kg;
$thighWeightQty = $data->weight_per_qty;

if($thighDemandUnit == 'Kg')
{
	$QtyThigh = $thighDemand/$thighWeightQty;
	$QtyThigh = round($QtyThigh);
}
else
{
	$QtyThigh = round($thighDemand);
}


@endphp



@elseif($data->pro_name =='Peha Penuh')

@php
$fullDemand = $data->pro_demand;
$fullDemandUnit = $data->dem_unit;
$fullPriceKg = $data->price_per_kg;
$fullWeightQty = $data->weight_per_qty;

if($fullDemandUnit == 'Kg')
{
	$QtyFull = $fullDemand/$fullWeightQty;
	$QtyFull = round($QtyFull);
}
else
{
	$QtyFull = round($fullDemand);
}


@endphp




@endif


@endforeach


@php

class Cut
{
	public $CutName;
	public $sale;
}

$CutA = new Cut();
$CutA->CutName = 'A';
$CutA->sale = $wholeChicWeightQty*$wholeChicPriceKg;

$CutB = new Cut();
$CutB->CutName = 'B';
$CutB->sale = (2*(($wingWeightQty*$wingPriceKg)+($breastWeightQty*$breastPriceKg)+($drumWeightQty*$drumPriceKg)+($thighWeightQty*$thighPriceKg)));


$CutC = new Cut();
$CutC->CutName = 'C';
$CutC->sale=(2*(($wingWeightQty*$wingPriceKg)+($breastWeightQty*$breastPriceKg)+($fullWeightQty*$fullPriceKg)));

$CutD = new Cut();
$CutD->CutName = 'D';
$CutD->sale=(2*($wingWeightQty*$wingPriceKg))+(2*($breastWeightQty*$breastPriceKg))+($drumWeightQty*$drumPriceKg)+($thighWeightQty*$thighPriceKg)+($fullWeightQty*$fullPriceKg);


$Cuts = array($CutA, $CutB, $CutC, $CutD);


@endphp


@php

function sort_objects_by_total($a, $b) {
if($a->sale == $b->sale){ return 0 ; }
return ($a->sale > $b->sale) ? -1 : 1;
}

usort($Cuts, 'sort_objects_by_total');

@endphp



@php

$numChicWing = $QtyWing/2;
$numChicBreast = $QtyBreast/2;
$numChicDrum = $QtyDrum/2;
$numChicThigh = $QtyThigh/2;
$numChicFull = $QtyFull/2;



class selectCutB
{
	public $name;
	public $num;
}

class selectCutC
{
	public $name;
	public $num;
}

class selectCutD
{
	public $name;
	public $num;
}



$wing = new selectCutB();
$wing->name = 'Wing';
$wing->num = $numChicWing;


$breast = new selectCutB();
$breast->name = 'Breast';
$breast->num = $numChicBreast;

$drum = new selectCutB();
$drum->name = 'Drum';
$drum->num = $numChicDrum;


$thigh = new selectCutB();
$thigh->name = 'Thigh';
$thigh->num = $numChicThigh;

$selectCutsB = array($wing, $breast, $drum, $thigh);



$wing = new selectCutC();
$wing->name = 'Wing';
$wing->num = $numChicWing;

$breast = new selectCutC();
$breast->name = 'Breast';
$breast->num = $numChicBreast;


$full = new selectCutC();
$full->name = 'Full';
$full->num = $numChicFull;

$selectCutsC = array($wing, $breast, $full);



$wing = new selectCutD();
$wing->name = 'Wing';
$wing->num = $numChicWing;


$breast = new selectCutD();
$breast->name = 'Breast';
$breast->num = $numChicBreast;

$drum = new selectCutD();
$drum->name = 'Drum';
$drum->num = $numChicDrum;


$thigh = new selectCutD();
$thigh->name = 'Thigh';
$thigh->num = $numChicThigh;

$full = new selectCutD();
$full->name = 'Full';
$full->num = $numChicFull;

$selectCutsD = array($wing, $breast, $drum, $thigh, $full);


$lessdemandWholeChic;
$greatdemandWholeChic;
$lessdemandWing;
$greatdemandWing;
$lessdemandBreast;
$greatdemandBreast;
$lessdemandThigh;
$greatdemandThigh;
$lessdemandDrum;
$greatdemandDrum;


class optimizer
{
	public $cutType;
	public $profit;
}

foreach($Cuts as $Cut)
{
	if($Cut->CutName == 'A')
	{
		$opA = new optimizer();
		$opA->cutType = 'A';
		$opA->profit = $Cut->sale * $QtyWholeChic;
        echo (" Cut Type :");
		echo($opA->cutType);
		echo "<br>";
		echo ("Sale :");
		echo($Cut->sale);
		echo "<br>";
		echo ("Profit :");
		echo($opA->profit);


	}

	else if($Cut->CutName == 'B')
	{
		$opB = new optimizer();
		$opB->cutType = 'B';

		function sort_objects_by_numB($a, $b) {
		if($a->num == $b->num){ return 0 ; }
		return ($a->num < $b->num) ? -1 : 1;
		}

	usort($selectCutsB, 'sort_objects_by_numB');

	$limitB = $selectCutsB{0}->num;
	echo("This is Cut B");
	echo "<br>";
	echo("Product : ");
	echo($selectCutsB{0}->name);
	echo "<br>";
	echo("Limit : ");
	echo($limitB);
	echo "<br>";
	

	}

	else if($Cut->CutName == 'C')
	{
		$opC = new optimizer();
		$opC->cutType = 'C';

		function sort_objects_by_numC($a, $b) {
		if($a->num == $b->num){ return 0 ; }
		return ($a->num < $b->num) ? -1 : 1;
		}

		usort($selectCutsC, 'sort_objects_by_numC');

		foreach($selectCutsC as $select)
	{
		$limitC = $select->num;
		break;
	}

    echo(" Limit C : ");
	echo($limitC);
	}

	else if($Cut->CutName == 'D')
	{
		$opD = new optimizer();
		$opD->cutType = 'D';

		function sort_objects_by_numD($a, $b) {
		if($a->num == $b->num){ return 0 ; }
		return ($a->num < $b->num) ? -1 : 1;
		}

		usort($selectCutsD, 'sort_objects_by_numD');

		foreach($selectCutsD as $select)
	{
		$limitD = $select->num;
		break;
	}

	echo(" Limit D: ");
	echo($limitD);

	}

}

@endphp


@endsection