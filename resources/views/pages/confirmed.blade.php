@extends('layout')
@section('content')
<div class="container text-center">
		<div class="content-404">
			<h1><b>Thanks!</b> Your Order Has Been Placed</h1>
			<br><br>
			<div class="row">
				<div class="col-md-8">
					<p>Order Summary</p>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Item Name</th>
								<th>Unit Price</th>
								<th>Quantity</th>
								<th>Total</th>
							</tr>
						</thead>
						<?php 

							$contents = Cart::content();
					
						 ?>
						<tbody>
							@foreach($contents as $v_content)
							<tr class="text-left">
								<td>{{$v_content->name}}</td>
								<td>Tk. {{$v_content->price}}</td>
								<td>{{$v_content->qty}}</td>
								<td>Tk. {{$v_content->total}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<p>Payment Summary</p>
					<table class="table table-bordered">
						<tr>
							<td>Sub Total</td>
							<td>VAT</td>
							<td>Delivery Charge</td>
							<td>Total</td>
						</tr>
						<tr>
							<td>{{Cart::subtotal()}} Tk</td>
							<td>{{Cart::tax()}} Tk</td>
							<td>50 Tk</td>
							<td><?php echo str_replace(",","",Cart::total()) + 50; ?> Tk</td>
						</tr>
					</table>
				</div>
				<div class="col-md-4 text-left">
					<p>Deliver To:</p>
					@foreach($shipping_details as $s)
					<p>{{$s->full_name}}</p>
					<p>{{$s->address}}</p>
					<p>{{$s->city}}</p>
					<p>Contact No. {{$s->phone_number}}</p>
					
					@endforeach
				</div>
			</div>
			<p>We will contact you shortly</p>
			<h2><a href="{{URL::to('/customer_logout')}}">Continue To The Site</a></h2>
		</div>
	</div>  
	
@endsection