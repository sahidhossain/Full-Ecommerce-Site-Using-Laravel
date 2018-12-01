@extends('admin_layout');
@section('admin_content');
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{url('/dashboard')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>
			@include('admin.messege')
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
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
								  <th>Category Id</th>
								  <th>Category Name</th>
								  <th>Category Desctiption</th>
								  <th>Category Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						@foreach ($info as $manufacture)
							<tr>
								
								<td>{{$manufacture->manufacture_id}}</td>
								<td class="center">{{$manufacture->manufacture_name}}</td>
								<td class="center">{{$manufacture->manufacture_description}}</td>
								@if($manufacture->publication_status==1)
								<td class="center">
									<span class="label label-success">Active</span>
								</td>
								@else
								<td class="center">
									<span class="label label-danger">unactive</span>
								</td>
								@endif
								<td class="center">
									@if($manufacture->publication_status==1)
									<a class="btn btn-danger" href="{{URL::to('/unactive_manufacture/'.$manufacture->manufacture_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-success" href="{{URL::to('/active_manufacture/'.$manufacture->manufacture_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif
									<a class="btn btn-info" href="{{URL::to('/edit_manufacture/'.$manufacture->manufacture_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" id="delete" href="{{URL::to('/delete_manufacture/'.$manufacture->manufacture_id)}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>

							</tr>
				    	@endforeach
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
	 





@endsection