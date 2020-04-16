@extends('layout2')
@section('content')

<section id="cart_items">
		<div class="">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php 

					$contents = Cart::content();
					
				 ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						@foreach($contents as $v_content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{$v_content->options->image}}" alt="" class="img-responsive" style="height: 100px;"></a>
							</td>
							<td class="cart_description">
								<h5><a href="">{{$v_content->name}}</a></h5>
							</td>
							<td class="cart_price">
								<p>Tk. {{$v_content->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update_cart')}}" method="post">
										{{csrf_field()}}
									<input class="cart_quantity_input" type="number" name="quantity" value="{{$v_content->qty}}" autocomplete="off" size="2">
									<input type="hidden" name="rowId" value="{{$v_content->rowId}}">&nbsp; 
									<input type="submit" name="submit" value="Update" class="btn btn-sm btn-success">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$v_content->total}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete_from_cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<a href="{{URL::to('/')}}">
	<button class="btn btn-default cart">Continue Shopping</button></a>

	
	<section id="do_action">
		<div class="">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					
				</div>
				<div class="col-sm-12">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{Cart::subtotal()}} Tk</span></li>
							<li>Tax <span>{{Cart::tax()}}</span></li>
							<li>Shipping Cost <span>50.00 Tk</span></li>
							<li>Total <span>{{Cart::total()}} Tk</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<?php $customer_id = Session::get('customer_id'); ?>
							<?php if($customer_id != NULL){ ?>
							<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Check Out</a>
							<?php } else{ ?>
							<a class="btn btn-default check_out" href="{{URL::to('/customer_login_check')}}">Check Out</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->


@endsection