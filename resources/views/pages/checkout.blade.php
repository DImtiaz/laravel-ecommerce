@extends('layout')
@section('content')<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			

			<div class="register-req">
				<p>Please Provide Details Below</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form action="{{URL::to('save_shipping_info')}}" method="post">
									{{csrf_field()}}
									<input type="text" placeholder="Email*" name="email">
									<input type="text" placeholder="Full Name *" name="full_name">
									<input type="text" placeholder="Address *" name="address">
									<input type="text" placeholder="Phone Number *" name="phone_number">
									<input type="text" placeholder="City *" name="city">
									<button type="submit" class="btn btn-default cart">Submit</button>
								</form>
							</div>
							
						</div>
					</div>
										
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

		
			
		</div>
	</section>



@endsection