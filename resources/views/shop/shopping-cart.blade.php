@extends('layouts.master')
@section('title')
	e-comerce
@endsection
@section('content')
<br><br><br>
	@if(Session::has('cart'))
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<ul class="list-group">
					@foreach($product as $p)
						<li class="list-group-item">
							<span class="badge badge-pill badge-light">{{ $p['qty'] }}</span>
							<strong>{{ $p['item']['title'] }}</strong>
							<span class="label label-success">{{ $p['price'] }}</span>
							<div class="btn-group">
								<button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Action <span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="">Reduce By1</a></li>
									<li><a href="">Reduce All</a></li>
								</ul>
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<strong>Total : {{ $totalPrice }}</strong>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<button type="button" class="btn btn-success">Checkout</button>
			</div>
		</div>
	@else
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<h2>No Item in Cart!!</h2>
			</div>
		</div>
	@endif
@endsection