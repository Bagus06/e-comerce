@extends('layouts.master')
@section('title')
	e-comerce
@endsection
@section('content')
<div style="padding-right: 40px;padding-left: 40px;">
	<div id="carouselExampleIndicators" class="carousel slide col-md-offset-0" style="padding-top: 20px" data-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img class="d-block w-100" src="{{asset('/img/SLIDE1.jpg')}}" style=" height: 500px;" alt="First slide">
	      <div class="carousel-caption d-none d-md-block">
		    <h5>lorem</h5>
		    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, ipsa, laudantium repudiandae magnam deserunt libero mollitia ea. Officia obcaecati optio harum, atque deserunt vel, maiores, culpa enim, itaque non dolores.</p>
		  </div>
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="{{asset('/img/SLIDE2.jpg')}}" style=" height: 500px;" alt="Second slide">
	      <div class="carousel-caption d-none d-md-block">
		    <h5>lorem</h5>
		    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem cumque aliquam at? Quam error minus aperiam praesentium, atque voluptatem sequi officia doloremque perferendis est, facere, odit veniam magnam omnis eaque.</p>
		  </div>
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="{{asset('img/slide3.jpg')}}" style=" height: 500px;" alt="Third slide">
	      <div class="carousel-caption d-none d-md-block">
		    <h5>lorem</h5>
		    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, consequuntur? Sapiente tenetur et autem ipsam! Deserunt doloremque beatae iste eligendi repudiandae magnam tempore quis. Laboriosam, voluptatibus pariatur hic totam! Ducimus.</p>
		  </div>
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
	<br>
	<div>
		<h3 style="color: #FF5D00;"><strong>Kategori</strong></h3>
		<hr color="#FF5D00">
	</div>
	<div class="container col-md-12" style="padding-top: 5px">
	  <div class="row">
	    <div class="col-sm" style="text-align: center;">
	    	<div class="card m-5" style="width: 15rem;">
				<img class="card-img-top" src="{{asset('img/elektronik.jpg')}}" style="width:100; height:250px; " alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">Electronik</h5>
						<div class="row">
							<div class="col">
								<div align="center">
									<a href="" class="btn btn-primary">More</a>
								</div>
							</div>
						</div>
				</div>
			</div>
	    </div>
	    <div class="col-sm" style="text-align: center;">
		<div class="card m-5" style="width: 15rem;">
			<img class="card-img-top" src="{{asset('img/clotes.jpg')}}" style="width:100; height:180; " alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title">Cloth</h5>
				<div class="row">
					<div class="col">
						<div align="center">
							<a href="" class="btn btn-primary">More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	    </div>
	    <div class="col-sm" style="text-align: center;">
	    	<div class="card m-5" style="width: 15rem;">
			 	<img class="card-img-top" src="{{asset('img/bayi.jpg')}}" style="width:100; height:180; " alt="Card image cap">
				<div class="card-body">
				    <h5 class="card-title">Baby Acessories</h5>
				    <div class="row">
					    <div class="col">
						    <div align="center">
						    	<a href="" class="btn btn-primary">More</a>
						    </div>
					    </div>
				    </div>
				</div>
			</div>
	    </div>
	  </div>
	</div>
	<br>
	<div>
		<h3 style="color: #FF5D00;"><strong>Brand</strong></h3>
		<hr color="#FF5D00">
	</div>
	<div class="container col-md-12" style="padding-top: 5px">
	  <div class="row">
	    <div class="col-sm" style="text-align: center;">
	    	<div class="row col-md-12">
			    <div class="" style="padding-right: 48px;padding-left: 48px">
			     	<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Xiaomi_logo.svg/1024px-Xiaomi_logo.svg.png" style="width:100px; height:100px; " alt="Card image cap" class="rounded-circle"><br>
			     	<a href="" style="color: black;"><strong>XIAOMI</strong></a>
			    </div>
			    <div class="" style="padding-right: 48px;padding-left: 48px">
			     	<img src="https://thegreatergroup.com/wp-content/uploads/samsung-logo.jpeg" style="width:100px; height:100px; " alt="Card image cap" class="rounded-circle"><br>
			     	<a href="" style="color: black;"><strong>SAMSUNG</strong></a>
			    </div>
			    <div class="" style="padding-right: 48px;padding-left: 48px">
			     	<img src="https://images-na.ssl-images-amazon.com/images/I/6196HMYUtVL._SX425_.jpg" style="width:100px; height:100px; " alt="Card image cap" class="rounded-circle"><br>
			     	<a href="" style="color: black;"><strong>Sprime</strong></a>
			    </div>
			    <div class="" style="padding-right: 48px;padding-left: 48px">
			     	<img src="https://upload.wikimedia.org/wikipedia/de/5/50/Adidas_klassisches_logo.svg" style="width:100px; height:100px; " alt="Card image cap" class="rounded-circle"><br>
			     	<a href="" style="color: black;"><strong>ADIDAS</strong></a>
			    </div>
			    <div class="" style="padding-right: 48px;padding-left: 48px">
			     	<img src="https://pbs.twimg.com/profile_images/641165449409880064/Z_q8SfLC_400x400.jpg" style="width:100px; height:100px; " alt="Card image cap" class="rounded-circle"><br>
			     	<a href="" style="color: black;"><strong>Cussons</strong></a>
			    </div>
			    <div class="" style="padding-right: 48px;padding-left: 48px">
			     	<img src="http://www.creteplus.gr/assets/pages/130bc-nikelogo.jpg" style="width:100px; height:100px; " alt="Card image cap" class="rounded-circle"><br>
			     	<a href="" style="color: black;"><strong>NIKE</strong></a>
			    </div>
		    </div>
	    </div>
	  </div>
	</div>
	<div>
	</div>
	<div>
		<br>
		<h3 style="color: #FF5D00;"><strong>Recomend</strong></h3>
		<hr color="#FF5D00">
		  <div class="col-12 col-sm-6 col-md-12">
		  		<div class="row">
		  			@foreach($products as $p)
						<div class="card m-1" style="width: 15rem;">
						  <img class="card-img-top" src="{{ $p->imagePath }}/100px180/" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">{{ $p->title }}</h5>
						    <div class="row">
							    <div class="col">
							      	<div align="left">
							    		<p class="card-text"><strong>Rp.{{ $p->price }}.000,00 </strong></p>
							    	</div>
							    </div><br>
							    <div class="col">
								    <div align="right">
								    	<a href="{{ route ('product.getAddToCart', ['id' => $p->id])}}" class="btn btn-primary">Add Cart</a>
								    </div>
							    </div>
						    </div>
						  </div>
						</div>
					@endforeach
				</div>
		  </div>
	</div>
  <br>
  <div>
	<hr color="#FF5D00">
  	<div class="container">
	  <div class="row">
	    <div class="col-sm" align="center">
	      One of three columns
	    </div>
	    <div class="col-sm" align="center">
	      One of three columns
	    </div>
	    <div class="col-sm" align="center">
	      One of three columns
	    </div>
	  </div>
	</div>
  </div>

@endsection