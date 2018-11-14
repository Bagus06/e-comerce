@extends('layouts.master')
@section('title')
	e-comerce
@endsection
@section('content')
<br><br>
<h3 style="color: #FF5D00;"><strong>Cart</strong></h3>
<hr>
	@if(Session::has('cart'))
		<div class="row col-md-12">
			<div class="col-md-6">
				<ul class="list-group">
					@foreach($product as $p)
						<li class="list-group-item">
						<table>
							<thead>
								<tr>
									<th style="width: 200px"></th>
									<th style="width: 100px"></th>
									<th style="width: 150px"></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><img src="{{$p['item']['imagePath']}}" alt="..." class="img-thumbnail" style="width: 160px"></td>
									<td>
										<strong>{{ $p['item']['title'] }}</strong>
										<span class="badge badge-info">{{ $p['qty'] }}</span>
									</td>
									<td><span class="label label-success">Rp.{{ $p['price'] }}.000,00</span></td>
									<td>
										<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
									    <div class="dropdown-menu">
									      <a class="dropdown-item" href="#">Reduce By One</a>
									      <a class="dropdown-item" href="#">Reduce All</a>
									    </div>
									</td>
								</tr>
							</tbody>
						</table>

						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div style="padding-left: 20px">
			<div class="row">
				<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
					<strong>Total : Rp.{{ $totalPrice }}.000,00</strong>
				</div>
			</div>
			<hr>
			<div class="row" style="padding-left: 10px">
				<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalNorm">
				    Checkout
				</button>
			</div>
		</div>

		<!-- Modal -->
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
		                
		                <form role="form" action="{{route('checkout')}}" method="post">
		                	@csrf
		                  <div class="form-group">
		                    <label for="address">Address</label>
		                      <textarea class="form-control" name="address" id="address" cols="30" rows="3" required></textarea>
		                  </div>
		                  <div class="form-group">
		                    <label for="note">Note</label>
		                      <textarea class="form-control" name="note" id="note" cols="30" rows="3" required></textarea>
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
		                    <label for="delivery">Delivery</label>
		                      <select name="delivery" id="delivery" class="form-control" required>
		                      	<option>Select Pelivery</option>
		                      	@foreach($del as $d)
		                      		<option value="{{ $d->id }}">{{ $d->curir }} -> Rp. {{$d->delivery}}.000,00</option>
		                      	@endforeach
		                      </select>
		                  </div>
		            </div>
		            <input type="hidden" value="{{ $p['qty'] }}" name="qty">
		            <input type="hidden" value="{{ $p['item']['price'] }}" name="price">
		            <input type="hidden" value="{{ $totalPrice }}" name="total">
		            <input type="hidden" value="{{ $p['item']['id'] }}" name="id">
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
		<div class="row">
			<div class="col-md-12">
				<h2 style="text-align: center;">No Item in Cart!!</h2>
			</div>
		</div>
	@endif
@endsection