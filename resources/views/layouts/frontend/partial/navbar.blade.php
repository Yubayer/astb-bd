
  <style>
        .announce-text{
          text-align: center !important;
          font-size: 21px;
          margin: 0;
          padding: 0;
          height: 35px;
          line-height: 35px;
          font-weight: bold;
          color: indigo;
        }

        li.nav-item.active {
          border-bottom: 2px solid white;
        }
  </style>
  
  <div class="text-center announce-text">
    @if($settings)
      <marquee>{{ $settings->shop_name }}</marquee>
      @endif
  </div>

<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <a class="navbar-brand" href="{{ route('home') }}">ASTB-BD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        
    @if(Auth::check() && Auth::user()->role_id == 1)
      <li class="nav-item">
        <a class="nav-link text-uppercase" href="{{ route('admin.index') }}">Dashboard </a>
      </li>
    @endif


      <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
        <a class="nav-link text-uppercase" href="{{ route('home') }}">Home </a>
      </li>

      @foreach($collections as $collection)
        <li class="nav-item {{ (request()->is('collection/'.$collection->handle)) ? 'active' : '' }}">
            <a class="nav-link text-uppercase" href="{{ route('collection.index',['handle'=>$collection->handle]) }}">{{ $collection->name }}</a>
        </li>
      @endforeach

        @auth 
          <li class="nav-item">
              <a class="nav-link text-uppercase" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">Logout</a>
          </li>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        @else
          <li class="nav-item {{ (request()->is('login')) ? 'active' : '' }}">
              <a class="nav-link text-uppercase" href="{{ route('login') }}">Login</a>
          </li>
        @endif

        <li class="nav-item {{ (request()->is('cart')) ? 'active' : '' }}">
            <a class="nav-link text-uppercase" href="{{ route('cart.index') }}">Cart <i class="fa-solid fa-cart-shopping"></i></a>
        </li>

    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>