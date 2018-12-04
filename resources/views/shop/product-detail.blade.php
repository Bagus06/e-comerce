@extends('layouts.master')
@section('title')
	e-comerce
@endsection
@section('content')
	<div style="padding-left: 50px;padding-top: 30px;">
        <a href="{{ route('home') }}" style="text-decoration: none;color: #560081;"><i class="fas fa-arrow-left fa-2x"></i></a>
    </div>
	<div class="container" style="padding-top: 40px">
		<div class="card">
			<div class="container-fliud" style="padding-right: 40px;padding-right: 40px;padding-bottom: 40px;padding-left: 40px;padding-top: 40px;">
				<div class="wrapper row">
					<div class="preview col-md-4">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active"><img src="{{asset('img/'.$data[0]->imagePath)}}" style="width: 20rem;border: solid;"></div>
						</div>
						
					</div>
					<div class="details col-md-8">
						<h3 class="product-title" style="text-transform: capitalize;"><strong>{{$data[0]->title}}</strong></h3>
						<p class="product-description">{{$data[0]->description}}</p>
						<h4 class="price">current price: <span>Rp. {{$data[0]->price}}.000,00</span></h4>
						<div class="row rating" style="padding-left: 15px;padding-bottom: 8px">
							<span class="review-no">41 reviews</span>
							<span class="review-no" style="padding-left: 15px"> terjual</span>
						</div>
						<div class="action">
							<button class="add-to-cart btn btn-default" type="button"><a style="text-decoration: none; color: black;" href="{{ route ('product.getAddToCart', ['id' => $data[0]->id])}}">add to cart</a></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container" style="padding-top: 10px;padding-bottom: 40px">
		<div class="card">
			<div class="container-fliud" style="padding-right: 40px;padding-right: 40px;padding-bottom: 40px;padding-left: 40px;padding-top: 40px;">
				<div class="container" style="padding-top: 10px">
					<div class="card">
						<div class="container-fliud" style="padding-right: 40px;padding-bottom: 40px;padding-left: 40px;padding-top: 40px;">
							@if($chat->isEmpty())
								<div align="center">
									<h3><strong>No Comment</strong></h3>
								</div>
							@else
								@foreach($chat as $c)
									<div>
										<div class="row">
											<img src="{{asset('profil/'.$c->imagePath)}}" class="rounded-circle" style="width: 60px;height: 60px; border: outset;">
											<h2 style="padding-top: 12px;padding-left: 5px; text-transform: capitalize;">{{$c->user->name}}</h2>
										</div>
										<p>{{$c->chat}}</p>
									</div>
									<hr>
								@endforeach
							@endif
						</div>
					</div>
					<div style="padding-top: 6px">
						<div style="display: contents;" >
			            	<form class="input-group" action="{{route('comment')}}" method="post">
			            		@csrf
					              <input class="form-control" type="search" placeholder="Search" aria-label="Search" style="width: 200px" name="pesan">
					              <input type="hidden" value="{{$data[0]->id}}" name="id">
					              <span class="input-group-append">
					                  <button type="submit" class="btn btn-success" type="button"><i class="fas fa-paper-plane"></i> Send</button>
					              </span>
			            	</form>
				        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
