@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>

			<p class="text-success alert-success">
						<?php
						$message = Session::get('message');

						if ($message) {
							echo $message;
							Session::put('message' , null);
						}
						


					?>
					</p>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>product</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>product ID</th>
								  <th>product Name</th>
								  <th>product Description</th>
								  <th>Product Image</th>
								  <th>Product Price</th>
								  <th>Category</th>
								  <th>Manufacture</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  @foreach ($all_product_info as $v_product) 
						  <tbody>
							<tr>
								<td>{{$v_product->product_id}}</td>
								<td class="center">{{$v_product->product_name}}</td>
								<td class="center mw-350">{{$v_product->product_short_description}}</td>
								
								<td class="center">
									<img src="{{$v_product->product_image}}" alt="" style="width: 80px;height: 80px;">
								</td>
								<td class="center">
									{{$v_product->product_price}}
								</td>
								<td class="center">
									{{$v_product->category_name}}
								</td>
								<td class="center">
									{{$v_product->manufacture_name}}
								</td>
								<td class="center">
									@if($v_product->publication_status==1)
									<span class="label label-success"><!-- {{$v_product->publication_status}} -->Active</span>
									@else
									<span class="label label-danger"><!-- {{$v_product->publication_status}} -->Inactive</span>
									@endif
								</td>
								<td class="center d-inline text-center1">
									@if($v_product->publication_status==1)
									<a class="btn f11 btn-danger" href="{{URL::to('/inactive_product/'.$v_product->product_id)}}">
										<!-- <i class="halflings-icon white thumbs-down"></i> --> Inactive 
									</a>
									@else
									<a class="btn f11 btn-success" href="{{URL::to('/active_product/'.$v_product->product_id)}}">
										<!-- <i class="halflings-icon white thumbs-up"></i>  --> Active
									</a>
									@endif
									<a class="btn f11 btn-info" href="{{URL::to('/edit_product/'.$v_product->product_id)}}">
										<!-- <i class="halflings-icon white edit"></i> -->  Edit
									</a>
									<a class="btn f11 btn-danger" href="{{URL::to('/delete_product/'.$v_product->product_id)}}" id="delete">
										<!-- <i class="halflings-icon white trash"></i>  --> Delete
									</a>
								</td>
							</tr>
						  </tbody>
						@endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->



@endsection