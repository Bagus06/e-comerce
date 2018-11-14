@extends('layouts.master')
@section('title')
	e-comerce
@endsection
@section('content')
<br><br><br>
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
												<td>Delivery</td>
												<td>:</td>
												<td style="text-align: right;"><span>{{ $d->curir->curir }} -> Rp.{{ $d->curir->delivery }}.000,00</span></td>
											</tr>
											<tr style="height: 30px">
												<td>Subtotal</td>
												<td>:</td>
												<td style="text-align: right;"><span>Rp.{{ $d->total }}.000,00</span></td>
											</tr>
										</tbody>
									</table>
										<hr>
									<table>
										<thead>
											<tr>
												<th style="width: 500px"></th>
												<th style="width: 500px"></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												@php
													$s = $d->total;
													$c = $d->curir->delivery;
													$total = $s += $c;
												@endphp
												<td><strong>Total: Rp.{!! $total !!}.000,00</strong></td>
												<td style="text-align: right;">
													<form action="{{URL::to('check/'.$d->id)}}" method="post">
														@csrf
														<input type="hidden" value="{{ $d->jumlah }}" name="jumlah">
														<input type="hidden" value="{{ $d->harga }}" name="price">
														<input type="hidden" value="{{ $total }}" name="total">
														<input type="hidden" value="{{ $d->addres }}" name="addres">
														<input type="hidden" value="{{ $d->note }}" name="note">
														<input type="hidden" value="{{ $d->user_id }}" name="user">
														<input type="hidden" value="{{ $d->product_id }}" name="id">
														<input type="hidden" value="{{ $d->curir_id }}" name="c_id">
														<input type="hidden" value="{{ $d->method_id }}" name="m_id">

														<button class="btn btn-danger"> <a href="" style="color: white; text-decoration: none; ">Cencel </a> </button>
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
		@endforeach
@endsection