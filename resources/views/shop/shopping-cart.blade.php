@extends('layouts.master')
@section('title')
	e-comerce
@endsection
@section('content')

<br>
<br>
 	<h3 style="color: #560081;"><strong>Cart</strong></h3>
<hr>
	@if(session::has('cart'))
	@if(count($product)>0)
		<div class="row col-md-12" style="padding-bottom: 100px">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<ul class="list-group">
					@foreach($product as $p)
					<div>
						<li class="list-group-item">
						<div class="text-right">
							<div class="custom-control custom-checkbox" style="position: absolute; display: inline-flex; padding: unset;">
							  <input @if($p['check']) checked="true" @endif type="checkbox" class="custom-control-input" name="check[]" id="customCheck{{$p['item']['id']}}" value="{{$p['item']['id']}}" onclick="location.href='{{URL::to('cartCheck/'.$p['item']['id'])}}'">
							  <label class="custom-control-label" for="customCheck{{$p['item']['id']}}"></label>
							</div>
						</div>	
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
									<td><img src="{{asset('img/'.$p['item']['imagePath'])}}" alt="..." class="img-thumbnail" style="width: 160px"></td>
									<td>
										<strong>{{ $p['item']['title'] }}</strong><br>
										<span class="label label-success">Rp.{{ $p['price'] }}.000,00</span>
									</td>
									<td>
										@php
											$val = "";
											$cek = $p['qty'];
											if ($cek <= 1) {
												$val = "disabled";
											}else{
												$val = "enabled";
											}
										@endphp
										<div class="center">
									      </p><div class="input-group">
									          <span class="input-group-btn">
									              <button type="button" class="btn btn-danger btnright" onclick="location.href='{{route('reduceOne', ['id' => $p['item']['id']])}}'" {{$val}}>
									                <i class="fas fa-minus"></i>
									              </button>
									          </span>
									          <input type="text" name="qty{{$p['item']['id']}}" class="form-control input-number col-md-4" style="text-align: center;" value="{{ $p['qty'] }}" min="1" max="100" id="qty{{$p['item']['id']}}">
									          <span class="input-group-btn">
									              <button type="button" class="btn btn-success btnleft" onclick="location.href='{{route('addOne', ['id' => $p['item']['id']])}}'">
									                  <i class="fas fa-plus"></i>
									              </button>
									          </span>
									      </div>
									</td>
									<td>
										<a class="btn btn-danger" onclick="deletep('{{$p['item']['id']}}')" href="#">Delete</a>
									</td>
								</tr>
							</tbody>
						</table>

						</li>
					</div>
					@endforeach
					<li class="list-group-item">
						<div style="padding-left: 20px; padding-bottom: 20px;">
							<div class="" style="">
								<div class="text-right">
									<strong>Total : Rp.{{ $totalPrice }}.000,00</strong>
									<hr>
									<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalNorm">
									    Checkout
									</button>
								</div>
							</div>
						</div>
						<!-- Modal -->
					</li>
				</ul>
			</div>
		</div>
		<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" 
		     aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <!-- Modal Header -->
		            <div class="modal-header">
		                <h4 class="modal-title" id="myModalLabel" style="text-align: left;">
		                    Checkout
		                </h4>
		                <button type="button" class="close" 
		                   data-dismiss="modal">
		                       <span aria-hidden="true">&times;</span>
		                       <span class="sr-only">Close</span>
		                </button>
		            </div>
		            
		            <!-- Modal Body -->
		            <div class="modal-body">
		                
		                <form role="form" action="{{route('postCheck')}}" method="post">
		                	@csrf
		                	<div class="form-group">
		                    <label for="prov">Province</label>
		                      <select name="prov" id="prov" class="form-control" required>
		                      	<option>Select Provice</option>
		                      	@foreach($response as $m)
		                      		<option value="{{ $m->province_id }}">{{ $m->province }}</option>
		                      	@endforeach
		                      </select>
		                  	</div>
		                  	<div class="form-group">
		                    <label for="city">City</label>
		                      <select name="city" id="city" class="form-control" required>
		                      	<option>Select City</option>
		                      	@foreach($responses as $c)
		                      		<option value="{{ $c->city_id }}">{{ $c->city_name }}</option>
		                      	@endforeach
		                      </select>
		                  	</div>
		                  	<div class="form-group">
		                    <label for="pay">Method to Pay</label>
		                      <select name="pay" id="pay" class="form-control" required>
		                      	<option>Select Method</option>
		                      	@foreach($method as $m)
		                      		<option value="{{ $m->id }}">{{ $m->method }} -> {{ $m->pay }}</option>
		                      	@endforeach
		                      </select>
		                  	</div>
		                  	<div class="form-group">
		                    <label for="curir">Curir</label>
		                      <select name="curir" id="curir" class="form-control" required>
		                      	<option>Select Curir</option>
		                      	<option value="jne">JNE</option>
		                      	<option value="pos">POS</option>
		                      	<option value="tiki">TIKI</option>
		                      </select>
		                  	</div>
		                  <div class="form-group">
		                    <label for="address">Address</label>
		                      <textarea class="form-control" name="address" id="address" cols="30" rows="3" required></textarea>
		                  </div>
		                  <div class="form-group">
		                    <label for="note">Note</label>
		                      <textarea class="form-control" name="note" id="note" cols="30" rows="3" required></textarea>
		                  </div>
		            <!-- Modal Footer -->
		            <div class="modal-footer">
		                <button type="button" class="btn btn-default" data-dismiss="modal">
							Cencel
		                </button>
		                <button type="submit" class="btn btn-primary">
		                    Procesd
		                </button>
		            </div>
		        </div>
		    </div>
		</div>
		</form>
	@else
		<div class="row" style="padding-bottom: 300px">
			<div class="col-md-12">
				<h2 style="text-align: center;">No Item in Cart!!</h2>
			</div>
		</div>
	@endif
	@else
		<div class="row"  style="padding-bottom: 300px">
			<div class="col-md-12">
				<h2 style="text-align: center;">No Item in Cart!!</h2>
			</div>
		</div>
	@endif
@endsection
@section('scripts')
<script type="text/javascript">
		function tes(){
			alert('hhh');
		}

		function deletep(idx) {
			swal({
			  title: 'Are you sure?',
			  text: "",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.value) {
			  	location.href = '/delete/'+idx;
			  }
			});
		}

	</script>
@endsection