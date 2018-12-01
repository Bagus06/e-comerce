<div class="container col-md-12 fixed-top" style="background-color: #510079; height: 30px">
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm" style="text-align: center; padding-top: 4px">
      <a href="{{URL::to('/')}}" class="p-2" style="color:white;">Home</a>
      <a href="{{route('e')}}" class="p-2" style="color:white;">Electronik</a>
      <a href="{{route('c')}}" class="p-2" style="color:white;">Cloth</a>
      <a href="{{route('b')}}" class="p-2" style="color:white;">Baby Accesories</a>
      <a href="{{URL::to('/shop')}}" class="p-2" style="color:white;">All</a>
    </div>
    <div class="col-sm" style="text-align: right; padding-bottom: 6px">
      <a class="nav-link" href=" {{ route ('product.shoppingCart')}} "><i class="fas fa-shopping-cart fa-2px" style="color: white;"><span class="badge badge-pill badge-danger" style=""> {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }} </span> <span class="sr-only">(current)</span></i></a>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #560081;padding-top: 35px">
  <a class="navbar-brand" href="#" style="color:white;"><img src="{{asset('logo/logo1.png')}}" alt="logo" style="width: 35px"></i> My-BAG</a>
  <div class="container">
    {{-- <div class="row col-md-12"> --}}
      {{-- <div class="col-sm col-md-2"> --}}
      {{-- </div> --}}
      {{-- <div class="col-sm col-md-8 text-center"> --}}
        <div style="display: contents;" >
            <div class="input-group" style=" margin-left: 25%; margin-right: 25%;">
              <input class="form-control" type="search" placeholder="Search" aria-label="Search">
              <span class="input-group-append">
                  <button class="btn btn-success" type="button"><i class="fas fa-search"></i></button>
              </span>
            </div>
        </div>
      {{-- </div> --}}
      {{-- <div class="col-sm col-md-2"> --}}
      {{-- </div> --}}
    {{-- </div> --}}
  </div>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

    </ul>
      <div class="navbar-nav nav-item active">
        
      </div>
      <div style="">
        <div class="navbar-nav nav-item dropdown" style="">
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
              <li class="nav-item dropdown" style="width: max-content;">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <i class="far fa-user-circle" style="color: white;"></i> <strong style="color: white;">{{ Auth::user()->name }}</strong> <span class="caret"></span>
                </a>
                  <div class="pull-left" style="position: relative;right: 10px;">
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('memberProfil') }}">
                            <i class="fas fa-cogs"></i> Profil
                        </a>
                        <a class="dropdown-item" href="{{route('yourProduct') }}">
                            <i class="fas fa-shopping-bag"></i> Yor Product
                        </a>
                        <a class="dropdown-item" href="{{ route('toPay') }}">
                             <i class="fas fa-money-bill"></i> Transaction
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
                  </div>
                </li>
            @endguest
          </div>
      </div>
      </div>
  </div>
</nav>