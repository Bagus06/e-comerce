
<div class="container col-md-12 fixed-top" style="background-color: #E65400;">
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm" style="text-align: center; padding-top: 8px">
      <a href="{{URL::to('/')}}" class="p-2" style="color:white;">Home</a>
      <a href="" class="p-2" style="color:white;">Electronik</a>
      <a href="" class="p-2" style="color:white;">Cloth</a>
      <a href="" class="p-2" style="color:white;">Baby Accesories</a>
      <a href="{{URL::to('/shop')}}" class="p-2" style="color:white;">All</a>
    </div>
    <div class="col-sm" style="text-align: right;">
      <a class="nav-link" href=" {{ route ('product.shoppingCart')}} "><i class="fas fa-shopping-cart fa-2px" style="color: white;"><span class="badge badge-pill badge-danger"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }} </span> <span class="sr-only">(current)</span></i></a>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FF5D00;padding-top: 50px">
  <a class="navbar-brand" href="#" style="color:white;">My-BAG</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

    </ul>
      <div class="navbar-nav nav-item active">
        
      </div>
      <div class="navbar-nav nav-item dropdown">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" style="color:white;" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" style="color:white;" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="far fa-user-circle" style="color: white;"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        <i class="fas fa-cogs"></i> Profil
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        <i class="fas fa-shopping-bag"></i> Yor Product
                                    </a>
                                    <a class="dropdown-item" href="{{ route('toPay') }}">
                                         <i class="fas fa-money-bill"></i> To Pay
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt fa-2px"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
        </div>
      </div>
  </div>
</nav>