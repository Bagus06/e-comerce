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
		{{-- @php
			$delivery = $d->curir->delivery;
			$all = $total + $delivery;
		@endphp --}}
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
												<td style="text-align: left;">
													<div class="form-group">
								                    <label for="curir">Curir</label>
								                      <select name="curir" id="curir" class="form-control" required>
								                      	<option>Select Curir</option>
								                      	@foreach($responses as $res)
								                      		<option value="{{$res->cost[0]->value}}">{{$res->service}}/{{$res->cost[0]->etd}}Hari (Rp.{{$res->cost[0]->value}}.00)</option>
								                      	@endforeach
								                      </select>
								                  	</div>
												</td>
											</tr>
											<tr style="height: 30px">
												<td>Delivery</td>
												<td></td>
												<td style="text-align: right;">Rp. <span id="deliv"></span>.000,00</td>
											</tr>
											<tr style="height: 30px">
												<td>Subtotal</td>
												<td></td>
												<td style="text-align: right;"><span>Rp.{{$total}}.000,00</span></td>
											</tr>
											<tr>
												<td><strong>Total: Rp. <span id="total"></span></strong></td>
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
															<input type="hidden" value="" id="delivery" name="delivery">
															<input type="hidden" value="" id="totals" name="totalAll">
															<input type="hidden" value="{{$d->token}}" name="token">
															<input type="hidden" value="{{$d->method_id}}" name="method">
															<input type="hidden" value="{{$d->curir}}" name="curir">
															<input type="hidden" value="{{$d->addres}}" name="address">

															
															<a onclick="cencel('{{$d->token}}')" class="btn btn-danger" style="color: white; text-decoration: none; ">Cencel</a>
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
@section('scripts')
	<script type="text/javascript">
		$('#curir').change(function() {
			var value = $(this).val();
			var Rp = value/1000;
			var total = Rp + {{$total}};
			$('#delivery').val(Rp);
			$('#totals').val(total);
			$('#deliv').html(Rp);
			$('#total').html(total + '.000,00');
		});
		function tes(){
			alert('hhh');
		}

		function cencel(idx) {
			swal({
			  title: 'Are you sure?',
			  text: "",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes'
			}).then((result) => {
			  if (result.value) {
			  	location.href = '/cencelCheck/'+idx;
			  }
			});
		}

	</script>
@endsection