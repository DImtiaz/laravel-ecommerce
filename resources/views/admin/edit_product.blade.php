@extends('admin_layout')

@section('admin_content')


 <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add product</a>
				</li>
			</ul>

			<div class="row">
				<div class="col-md-12 text-center">
					<p class="text-success alert-success">
						<?php
						$message = Session::get('message');

						if ($message) {
							echo $message;
							Session::put('message' , null);
						}
						


					?>
					</p>
				</div>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit product</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="{{url('/update_product',$product_info->product_id)}}" enctype="multipart/form-data">
							{{ csrf_field() }}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_name" value="{{$product_info->product_name}}">
							  </div>
							</div>
							 <div class="control-group">
								<label class="control-label" for="selectError3">Product Category</label>
								<div class="controls">
								  <select id="selectError3" name="category_id" required>
								  	<option value="">Select Category</option>
									<?php 
                                $all_published_category = DB::table('tbl_category')
                                                        ->where('publication_status',1)
                                                        ->get();
                                foreach($all_published_category as $v_category){

                                ?>
									<option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
								<?php } ?>
								  </select>
								</div>
							  </div>

							   <div class="control-group">
								<label class="control-label" for="selectError3">Manufacture Name</label>
								<div class="controls">
								  <select id="selectError3" name="manufacture_id" required>
								  	<option value="">Select Manufacture</option>
									<?php 
                                $all_published_manufacture = DB::table('tbl_manufacture')
                                                        ->where('publication_status',1)
                                                        ->get();
                                foreach($all_published_manufacture as $v_manufacture){

                                ?>
									<option value="{{$v_manufacture->manufacture_id}}">{{$v_manufacture->manufacture_name}}</option>
								<?php } ?>
								  </select>
								</div>
							  </div>
      
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">product short Description</label>
							  <div class="controls">
								<textarea class="" name="product_short_description" rows="3">{{$product_info->product_short_description}}</textarea>
							  </div>
							</div>
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">product long Description</label>
							  <div class="controls">
								<textarea class="" name="product_long_description" rows="3">{{$product_info->product_long_description}}</textarea>
							  </div>
							</div>
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">product price</label>
							  <div class="controls">
								<textarea class="" name="product_price" rows="3">{{$product_info->product_price}}</textarea>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Product Image</label>
							  <div class="controls">
							  	<img src="{{URL::to($product_info->product_image)}}" alt="image" style="width:80px;height:80px;">
								<input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
							  </div>
							</div> 
							
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">product size</label>
							  <div class="controls">
								<textarea class="" name="product_size" rows="3">{{$product_info->product_size}}</textarea>
							  </div>
							</div>
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">product color</label>
							  <div class="controls">
								<textarea class="" name="product_color" rows="3">{{$product_info->product_color}}</textarea>
							  </div>
							</div>
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" checked="" value="1">
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->






@endsection