@extends('layouts.master')
@section('title')
	e-comerce
@endsection
@section('content')
<br><br>
<h3 style="color: #FF5D00;"><strong>To Pay</strong></h3>
<hr>
	@if($dat->isEmpty())
		<div class="row">
			<div class="col-md-12">
				<h2 style="text-align: center;">No Item in To Pay!!</h2>
			</div>
		</div>
	@else
		@foreach($dat as $d)
			<div class="container">
			  <div class="row">
			    <div class="col-sm">
			    </div>
			    <div class="col-sm col-md-8">
			      	<div class="row">
						<div class="col-md-12">
							<ul class="list-group">
								<li class="row list-group-item">
									<div class="container">
									  <div class="row">
									    <div class="col-sm">
									    	<img src="{{ $d->product->imagePath }}" alt="..." class="img-thumbnail" style="width: 160px">
									    </div>
									    <div class="col-sm" align="left" style="padding-top: 8px;">
									    	<table>
									    		<thead>
									    			<tr>
									    				<th style="width: 70px"></th>
									    				<th style=""></th>
									    			</tr>
									    		</thead>
									    		<tbody>
									    			<tr>
									    				<td>
									    					Product
									    				</td>
									    				<td>: 
									    					<strong>{{ $d->product->title }}</strong>
									      					<span class="badge badge-primary">{{ $d->jumlah }}</span>
									    				</td>
									    			</tr>
									    			<tr>
									    				<td>Method</td>
									    				<td>: {{ $d->method->pay }} ({{ $d->method->method }})</td>
									    			</tr>
									    			<tr>
									    				<td>Curir</td>
									    				<td>: {{ $d->curir->curir }}</td>
									    			</tr>
									    			<tr>
									    				<td>Total</td>
									    				<td>: <strong>Rp.{{ $d->total }}.000,00</strong></td>
									    			</tr>
									    		</tbody>
									    	</table>
									    </div>
									    <div class="col-sm" align="right" style="padding-top: 20px">
											<button class="btn btn-danger"><a href="" style="color: white; text-decoration: none;">Cencel</a></button>
											<button class="btn btn-primary">Processd</button>
									    </div>
									  </div>
								</li>
							</ul>
						</div>
					</div>
			    </div>
			    <div class="col-sm">
			    </div>
			  </div>
			</div>
		@endforeach
	@endif
@endsection
@section('scripts')
@endsection