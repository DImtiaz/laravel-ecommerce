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
						<h2><i class="halflings-icon user"></i><span class="break"></span>slider</h2>
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
								  <th>Slider ID</th>
								  <th>Slider Text 1</th>
								  <th>Slider Text 2</th>
								  <th>Slider Image</th>
								  <th>Status</th>
								  <th>Action</th>
								  
							  </tr>
						  </thead>
						  @foreach ($all_slider as $v_slider) 
						  <tbody>
							<tr>
								<td>{{$v_slider->slider_id}}</td>
								<td>{{$v_slider->slider_text1}}</td>
								<td>{{$v_slider->slider_text2}}</td>
								
								<td class="center">
									<img src="{{$v_slider->slider_image}}" alt="" style="width: 100px;height: 60px;">
								</td>
								
								<td class="center">
									@if($v_slider->publication_status==1)
									<span class="label label-success"><!-- {{$v_slider->publication_status}} -->Active</span>
									@else
									<span class="label label-danger"><!-- {{$v_slider->publication_status}} -->Inactive</span>
									@endif
								</td>
								<td class="center d-inline text-center1">
									@if($v_slider->publication_status==1)
									<a class="btn f11 btn-danger" href="{{URL::to('/inactive_slider/'.$v_slider->slider_id)}}">
										<!-- <i class="halflings-icon white thumbs-down"></i> --> Inactive 
									</a>
									@else
									<a class="btn f11 btn-success" href="{{URL::to('/active_slider/'.$v_slider->slider_id)}}">
										<!-- <i class="halflings-icon white thumbs-up"></i>  --> Active
									</a>
									@endif
									
									<a class="btn f11 btn-danger" href="{{URL::to('/delete_slider/'.$v_slider->slider_id)}}" id="delete">
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