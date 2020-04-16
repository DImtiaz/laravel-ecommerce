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
							<p>Deliver To:</p>
							<div class="form-one">
								<form action="{{URL::to('save_shipping_info')}}" method="post">
									{{csrf_field()}}
									<input type="text" placeholder="Address line 1" name="address_line1" required="">
									<input type="text" placeholder="Address line 2" name="address_line2" required="">
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