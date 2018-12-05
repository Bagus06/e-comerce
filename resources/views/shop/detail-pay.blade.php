@extends('layouts.master')
@section('title')
	e-comerce
@endsection
@section('content')
<br><br>
<h3 style="color: #FF5D00;"><strong>Detail Pay</strong></h3>
<hr>
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
									    <div class="col-md-3">
									    	<img src="{{asset ('img/'.$d->product->imagePath) }}" alt="..." class="img-thumbnail" style="width: 160px">
									    </div>
									    <div class="col-m-7" align="left" style="padding-top: 8px;">
									    	<table>
									    		<thead>
									    			<tr>
									    				<th style="width: 70px"></th>
									    				<th></th>
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
									    				<td>: {{ $d->curir }}</td>
									    			</tr>
									    			<tr>
									    				<td>Total</td>
									    				<td>: <strong>Rp.{{ $d->total }}.000,00</strong></td>
									    			</tr>
									    		</tbody>
									    	</table>
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
@endsection