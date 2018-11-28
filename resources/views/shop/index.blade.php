@extends('layouts.master')
@section('title')
	e-comerce
@endsection
@section('content')
	<div style="padding-right: 40px;padding-left: 40px; padding-top: 20px">
	  <div class="col-12 col-sm-6 col-md-12">
	  		<div class="row">
	  			@foreach($products as $p)
					<div class="card m-1" style="width: 198px;">
					  <img class="card-img-top" src="{{ asset ('img/'.$p->imagePath)}}" alt="{{$p->imagePath}}">
					  <div class="card-body">
					  	<div style="height: 40px">
					    	<p class="card-title"><a href="" style="text-decoration: none; color: black;">{{ $p->title }}</a></p>
					  	</div>
					    <div class="row">
						    <div class="col">
						      	<div align="left" style="padding-bottom: 6px">
						    		<p class="card-text">Rp.{{ $p->price }}.000,00</p>
						    	</div>
						    </div><br>
						    <div class="col">
							    <div align="right">
							    	<a href="{{ route ('product.getAddToCart', ['id' => $p->id])}}" class="btn btn-primary">Add Cart</a>
							    </div>
						    </div>
					    </div>
					  </div>
					</div>
				@endforeach
			</div>
	  </div>
	</div>
	<div class="modal fade" id="myModalNorm1" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <!-- Modal Header -->
	            <div class="modal-header">
	                <h4 class="modal-title" id="myModalLabel" style="text-align: left;">
	                    <i class="fas fa-info-circle fa-lg" style="color: red;"></i> Warning
	                </h4>
	            </div>
	            
	            <!-- Modal Body -->
	            <div class="modal-body">
	                <h6 align="center">Are you sure want to Delete?</h6>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">
						OK
	                </button>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
