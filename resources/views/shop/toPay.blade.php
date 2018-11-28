@extends('layouts.master')
@section('title')
	e-comerce
@endsection
@section('content')
<br><br>
<h3 style="color: #560081;"><strong>To Pay</strong></h3>
<hr>
	@if($trans->isEmpty())
		<div class="row">
			<div class="col-md-12">
				<h2 style="text-align: center;">No Item in To Pay!!</h2>
			</div>
		</div>
	@else
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<table class="table table-bordered">
						<thead>
						  <tr>
						    <th style="width: 50px">No.</th>
						    <th style="width: 220px">Detail</th>
						    <th style="width: 400px">Total Transaksi</th>
						    <th>Action</th>
						  </tr>
						</thead>
						@php
							$no = 1
						@endphp
						@foreach($trans as $t)
						@php
							$nom = $no++
						@endphp
						  <tbody>
						    <tr>
						      <th>{{$nom}}</th>
						      <td>
						      	<h6>{{$t->curir}}</h6>
						      	<h6>{{$t->mthod}}</h6>
						      	<h6>{{$t->created_at}}</h6>
						      	<h6>{{$t->address}}</h6>
						      </td>
						      <td>
						      	<div class="row col-md-12">
						      		<div class="col-md-8"><strong>Rp.{{$t->total_all}}.000,00</strong></div>
						      		<div class="col-md-4"><a href="{{URL::to('detailPay/'.$t->token)}}" style="text-decoration: none;">View Detail</a></div>
					      	</div>
					      	</td>
					      	<td style="padding-left: 20px">
					      		<button class="btn btn-primary"><a href="" style="color: white; text-decoration: none;">Procesed</a></button>
					      		<button class="btn btn-danger"><a href="{{URL::to('cencelBuy/'.$t->id)}}" style="color: white; text-decoration: none;">Cencel</a></button>
					  	    </td>
					  	  </tr>
					  	</tbody>
					@endforeach
					</table>
				</div>
			</div>
	@endif
@endsection
@section('scripts')
@endsection