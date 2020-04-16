@extends('admin_layout')
@section('admin_content')
<div class="row-fluid sortable">	
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-bordered">
							  <thead>
								  <tr>
									  <th>Customer Name</th>
									  <th>Contact Number</th>
									                                           
								  </tr>
							  </thead>   
							  <tbody>
								<tr>
									<td>{{$order_by_id[0]->customer_full_name}}</td> 
									<td>{{$order_by_id[0]->phone_number}}</td>                                 
								</tr>
								<tr>
									                                  
								</tr>
								
								
								                                   
							  </tbody>
						 </table>  
						     
					</div>
				</div><!--/span-->
				
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-bordered">
							  <thead>
								  <tr>
									  <th>Name</th>
									  <th>Address</th>
									  <th>Contact No.</th>
								  </tr>
							  </thead>   
							  <tbody>
								<tr>
									<td>{{$order_by_id[0]->full_name}}</td>
									<td>{{$order_by_id[0]->address}}, {{$order_by_id[0]->city}}</td>
									<td>{{$order_by_id[0]->phone_number}}</td>                                     
								</tr>
								
								
							                                  
							  </tbody>
						 </table>  
						    
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			
			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
									  <th>Product ID</th>
									  <th>Product Name</th>
									  <th>Price</th>
									  <th>Quantity</th>                                          
									  <th>Sub Total</th>                                          
								  </tr>
							  </thead>   
							  <tbody>
							  	@foreach($order_by_id as $v_order)
								<tr>
									 <td>{{$v_order->product_id}}</td>                                    
									 <td>{{$v_order->product_name}}</td>                                  
									 <td>{{$v_order->product_price}}</td>                                 
									 <td>{{$v_order->product_sales_quantity}}</td>                  
									 <td>{{$v_order->product_price*$v_order->product_sales_quantity}}</td>                  
								</tr>
								@endforeach
							  </tbody>
							  <tfoot>
							  	<tr>
							  		<td colspan="4">Total Including VAT: </td>
							  		<td> {{$v_order->order_total}}/=</td>
							  	</tr>
							  </tfoot>
						 </table>  
						      
					</div>
				</div><!--/span-->
			</div><!--/row-->






@endsection