@extends('layout')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<h3>Available Payment Option : Cash on Delivery</h3>
			

		</div>
	</div>
	<div class="col-md-6">
		<div class="total_area">
			<ul>
				<li>Sub Total <span>{{Cart::subtotal()}} Tk</span></li>
				<li>Eco Tax <span>{{Cart::tax()}}</span></li>
				<li>Shipping Cost <span>Free</span></li>
				<li>Total <span>{{Cart::total()}}</span></li>
			</ul>
				
		</div>
	</div>
	<div class="col-md-6">
		<h4>Ship to: </h4>
		<?php foreach($shipping_details as $result){ ?>
			<ul class="list-unstyled">
				<!-- <li>Name: </li> -->
				<li><?php echo $result->full_name; ?></li>
				<li><?php echo $result->address; ?></li>
				<li><?php echo $result->city; ?></li>
				<li>Contact No. <?php echo $result->phone_number; ?></li>
			</ul>
		<?php } ?>
		<a href="{{URL::to('/confirmed')}}">
		<button class="btn btn-success btn-lg">Confirm Order</button></a>
	</div>
</div>



@endsection