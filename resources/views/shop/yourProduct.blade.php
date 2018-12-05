@extends('layouts.master')
@section('title')
	e-comerce
@endsection
@section('content')
	@if(count($data)>0)
		<div class="col-md-12" style="padding-top: 20px;">
				<div class="row">
					<div class="col-md-3"></div>
					<div style="" class="row">
						<!-- Search form -->
						<div style="padding-right: 185px">
						<form class="form-inline my-2 my-lg-0">
					      <div class="input-group">
					        <input class="form-control" type="search" placeholder="Search" aria-label="Search" style="width: 230px">
					        <span class="input-group-append">
					            <button class="btn btn-success" type="button"><i class="fas fa-search"></i></button>
					        </span>
					      </div>
					    </form>
						</div>
						<div>
							<div class="btn-group">
							  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    Option
							  </button>
							<div style="padding-left: 5px"></div>
							  <div class="dropdown-menu">
							    <a class="dropdown-item" href="#">Short Up</a>
							    <a class="dropdown-item" href="#">Short Down</a>
							  </div>
							</div>
							<button class="btn btn-primary" data-toggle="modal" data-target="#myModalNorm">Add Product</button>
						</div>
					</div>
				</div>
			</div>
	@endif
	<div style="padding-right: 40px;padding-top: 20px">
		  	<div class="row col-md-12" style="padding-top: 10px">
		  		@if(count($data)>0)
		  		@foreach($data as $d)
		  		<div class="col-md-3"></div>
		  		<div style="padding-bottom: 5px">
					<li class="list-group-item">
						<table>
							<thead>
								<tr>
									<th style="width: 200px"></th>
									<th style="width: 150px"></th>
									<th style="width: 150px"></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><img src="{{asset('img/'.$d->imagePath)}}" alt="..." class="img-thumbnail" style="width: 160px"></td>
									<td>
										<div style="width: 150px">
											<strong>Product Name :</strong><br>
											<span class="label label-success" style="padding-left: 8px"> {{$d->title}}</span>
										</div>
										<div>
											<strong>Total Quantity :</strong><br>
											<span class="label label-success" style="padding-left: 8px">{{$d->qty}}</span>
										</div>
										<div>
											<strong>Harga :</strong><br>
											<span class="label label-success" style="padding-left: 8px">Rp.{{$d->price}}.000,00</span>
										</div>
									</td>
									<td>
									</td>
									<td>
										<a class="btn btn-primary" href="">Edit</a>
										<a class="btn btn-danger" href="">Delete</a>
									</td>
								</tr>
								<tr>
									<td colspan="4" style="width: 500px">
										<div style="padding-top: 10px">
											<strong>Description :</strong><br>
											<span class="label label-success" style="padding-left: 16px"> {{$d->description}}</span>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</li>
				</div>	
				@endforeach
				@else
				<div class="col-md-3"></div>
					<div class="col-md-6" style="padding-bottom: 300px">
						<h2 style="text-align: center;">You don't have a product yet!!</h2><br>
						<div style="padding-left: 150px; padding-right: 150px">
							<div class="card w-100" style="text-align: center;">
							  <div class="card-body">
							    <h5 class="card-title"><strong>GO Post Your Product</strong></h5>
							    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModalNorm">GO</a>
							  </div>
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>

	{{-- modal --}}
	<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" 
		     aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <!-- Modal Header -->
		            <div class="modal-header">
		                <h4 class="modal-title" id="myModalLabel" style="text-align: left;">
		                    Add Product
		                </h4>
		                <button type="button" class="close" 
		                   data-dismiss="modal">
		                       <span aria-hidden="true">&times;</span>
		                       <span class="sr-only">Close</span>
		                </button>
		            </div>
		            
		            <!-- Modal Body -->
		            <div class="modal-body">
		                <form role="form" action="{{route('postProduct')}}" method="post" enctype="multipart/form-data">
		                	@csrf
		                  <div class="form-group">
		                    <label for="title">Title</label>
		                      <input class="form-control" name="title" id="title"required>
		                  </div>
		                  <div class="form-row">
						    <div class="form-group col-md-3">
						      <label for="price">Price</label>
						      <input type="number" class="form-control" id="price" name="price" required>
						    </div>
						    <div class="form-group col-md-2">
						      <label for="qty">Qty</label>
						      <input type="number" class="form-control" id="qty" name="qty" required>
						    </div>
						    <div class="form-group col-md-7">
						      <label for="inputState">Type</label>
						      <select id="inputState" class="form-control" name="type" required>
						        <option selected>Choose...</option>
						        @foreach($type as $ty)
						        <option value="{{$ty->id}}">{{$ty->type}}</option>
						        @endforeach
						      </select>
						    </div>
						  </div>
						  <div class="form-group">
		                    <label for="validatedCustomFile">Choice Image</label>
		                      <input type="file" class="custom-file" name="img" id="validatedCustomFile" required>
		                  </div>
		                  <div class="form-group">
		                    <label for="des">Description</label>
							<textarea class="form-control" id="des" name="des" rows="3" required></textarea>
		                  </div>
		            </div>
		            <div class="modal-footer">
		                <button type="submit" class="btn btn-primary">
		                    Save
		                </button>
		            </div>
		        </div>
		    </div>
		</div>
		</form>
@endsection