@extends('layouts.master')
@section('title')
	e-comerce
@endsection
@section('content')
@if($products->isEmpty())
	<h1 style="text-align: center;padding-top: 250px"><strong>Product Is Empty!!!</strong></h1>
@else
	<div style="padding-right: 40px;padding-left: 40px; padding-top: 20px">
	  <div class="col-12 col-sm-6 col-md-12">
	  		<div class="row">
	  			@foreach($products as $p)
					<div class="card m-1" style="width: 198px;">
						  <img class="card-img-top" src="{{asset ('img/'.$p->imagePath) }}" alt="Card image cap" style="height: 230; width: 200">
						  <div class="card-body">
						  	<div class="row">
							  	<div align="left" style="height: 50px">
							    	<p class="card-title" style="text-transform: capitalize;"><a href="{{URL::to('detail/'.$p->id)}}" style="color: black;">{{ $p->title }}</a></p>
							    </div>
						  	</div>
						    <div class="row">
							    <div align="left" style="padding-bottom: 6px">
							      	<div align="left">
							    		<p class="card-text"><strong style="color:#560081; ">Rp.{{ $p->price }}.000,00 </strong></p>
							    	</div>
							    </div>
						    </div>
						  	<div class="row">
						  		<div style="padding-right:px">
						  			<p>Terjual : {0}</p>
						  		</div>
						  	</div>
						  	<div class="row">
						  		<div style="padding-left: 150px">						  			
							    	<a href="{{ route ('product.getAddToCart', ['id' => $p->id])}}" style="color: #1F74E8;"><i class="fas fa-cart-plus fa-lg"></i></a>
						  		</div>
						  	</div>
						  </div>
						</div>
				@endforeach
			</div>
	  </div>
	</div>
</div>
@endif
@endsection
