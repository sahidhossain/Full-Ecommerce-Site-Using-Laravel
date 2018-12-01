@extends('admin_layout')
@section('admin_content')
@php session_start(); 
@endphp
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{url('/dashboard')}}">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add Sahid's Products	</a>
				</li>
			</ul>
			@include('admin.messege')
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Manufacture's Products</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/save_product')}}" method="post" enctype="multipart/form-data">
							@csrf
						  <fieldset>
				{{-- 			<div class="control-group">
							  <label class="control-label" for="typeahead">Auto complete </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
								<p class="help-block">Start typing to activate auto complete!</p>
							  </div>
							</div> --}}



					{{-- 		<div class="control-group">
							  <label class="control-label" for="date01">Date Picker</label>
							  <div class="controls">
								<input type="text" class="input-xlarge datepicker" id="date01" value="02/16/12">
							  </div>
							</div> --}}

						
							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " name="product_name">
							  </div>
							</div>

							@php
								$cate=DB::table('tbl_category')->where('publication_status',1)->get();
							@endphp
							<div class="control-group">
							<label for="selectError3" class="control-label">Product Category</label>
								<div class="controls">
									<select  id="selectError3" name="category_id">
										@foreach ($cate as $element)
											<option value="{{$element->category_id}}">{{$element->category_name}}</option>
										@endforeach
										
									</select>
								</div>
							</div>


							@php
							$manu=DB::table('tbl_manufacture')->where('publication_status',1)->get();
							@endphp
							<div class="control-group">
								<label for="selectError3" class="control-label">Manufacture name</label>
								<div class="controls">
									<select  id="selectError3" name="manufacture_id">
										@foreach ($manu as $element)
											<option value="{{$element->manufacture_id}}">{{$element->manufacture_name}}</option>
										@endforeach
										
									</select>
								</div>
							</div>


							<div class="control-group">
							  <label class="control-label" for="fileInput">Product Short Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_short_description" rows="3"></textarea>
							  </div>
							</div> 

							<div class="control-group">
							  <label class="control-label" for="fileInput">Product Long Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_long_description" rows="3"></textarea>
							  </div>
							</div>  

							<div class="control-group">
							  <label class="control-label" for="date01">Product Price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " name="product_price">
							  </div>
							</div>


							<div class="control-group">
							  <label class="control-label" for="fileInput">Product Image</label>
							  <div class="controls">
								<input type="file" class="input-file uniform_on" id="fileInput" name="product_image">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " name="product_size">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " name="product_color">
							  </div>
							</div>


							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value=1>
							  </div>
							</div>


							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
			@endsection