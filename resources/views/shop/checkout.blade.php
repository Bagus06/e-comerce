@extends('layouts.master')
@section('title')
	e-comerce
@endsection
@section('content')
<br><br><br>
		@php
			$total = 0;
		@endphp
		@foreach($dat as $d)
		@php
			$total += $d->total;
		@endphp
			<div class="container">
			  <div class="row">
			    <div class="col-sm">
			    </div>
			    <div class="col-sm col-md-8">
			      	<div class="row">
						<div class="col-md-12">
							<ul class="list-group">
								<li class="row list-group-item">
									<table>
										<thead>
											<tr>
												<th style="width: 200px"></th>
												<th></th>
												<th style="width: 500px;"></th>
											</tr>
										</thead>
										<tbody>
											<tr style="height: 30px">
												<td>Product Name</td>
												<td>:</td>
												<td style="text-align: right;"><span>{{ $d->product->title }}</span></td>
											</tr>
											<tr style="height: 30px">
												<td>Qty</td>
												<td>:</td>
												<td style="text-align: right;"><span>{{ $d->jumlah }}</span></td>
											</tr>
											<tr style="height: 30px">
												<td>Price</td>
												<td>:</td>
												<td style="text-align: right;"><span>Rp.{{ $d->harga }}.000,00</span></td>
											</tr>
											<tr style="height: 30px">
												<td>Pay Method</td>
												<td>:</td>
												<td style="text-align: right;"><span>{{ $d->method->pay }}  ({{ $d->method->method }})</span></td>
											</tr>
											<tr style="height: 30px">
												<td>Subtotal</td>
												<td>:</td>
												<td style="text-align: right;"><span>Rp.{{ $d->total }}.000,00</span></td>
											</tr>
										</tbody>
									</table>
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
		@php
			$delivery = $d->curir->delivery;
			$all = $total + $delivery;
		@endphp
		{{-- <p>{{$d->token}}</p> --}}
		<div style="padding-top: 2px"></div>
		<div class="container">
			  	<div class="row">
			    	<div class="col-sm"></div>
			    	<div class="col-sm col-md-8">
			      		<div class="row">
							<div class="col-md-12">
								<ul class="list-group">
									<li class="row list-group-item">
										<table>
											<thead>
												<tr>
													<th style="width: 500px"></th>
													<th></th>
													<th style="width: 500px"></th>
												</tr>
											</thead>
											<tbody>		
											<tr style="height: 30px">
												<td>Delivery</td>
												<td></td>
												<td style="text-align: right;"><span>{{ $d->curir->curir }} -> Rp.{{ $d->curir->delivery }}.000,00</span></td>
											</tr>
											<tr style="height: 30px">
												<td>Subtotal</td>
												<td></td>
												<td style="text-align: right;"><span>Rp.{{$total}}.000,00</span></td>
											</tr>
											<tr>
												<td><strong>Total: Rp.{{$all}}.000,00</strong></td>
												<td></td>
												<td style="text-align: right;"></td>
											</tr>
											</tr>
												<tr>
													<td></td>
													<td></td>
													<td style="text-align: right;">
														<form action="{{URL::to('checkout/'.$d->token)}}" method="post">
															@csrf
															<input type="hidden" value="{{ $all }}" name="totalAll">
															<input type="hidden" value="{{ $d->token }}" name="token">
															<input type="hidden" value="{{ $d->method->pay }}  ({{ $d->method->method }})" name="method">
															<input type="hidden" value="{{ $d->curir->curir }}" name="curir">
															<input type="hidden" value="{{ $d->addres }}" name="addres">

															<button class="btn btn-danger"> <a href="{{URL::to('/cencelCheck/'.$d->token)}}" style="color: white; text-decoration: none; ">Cencel </a> </button>
															<button type="submit" class="btn btn-success">Go</button>
													</form>
												</td>
											</tr>
										</tbody>
									</table>
								</li>
							</ul>
						</div>
					</div>
    			</div>
    		<div class="col-sm">
    	</div>
  	</div>
</div>
@endsection