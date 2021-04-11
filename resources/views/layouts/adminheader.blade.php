<!--header start-->

<header id="hs_header">
  <div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12">
          <div id="hs_logo" > <a href="{{ url('/') }}"> <img src="{{ asset('images/logom.svg') }}" alt=""> </a> </div>
          <!-- #logo -->
        </div>
        <div class="col-lg-8 col-md-8 col-sm-10">
          <button type="button" class="hs_nav_toggle navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Menu<i class="fa fa-bars"></i></button>
          <nav>

                 <a style="color: aliceblue;" href="{{ url('/') }}">Home | </a>

                  @if (Auth::check())
                      <a style="color: aliceblue;" href="{{ url('/home') }}">Admin Dashboard |</a>
                      <a style="color: aliceblue;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                      @endif



            <ul class="hs_menu collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              @if (Auth::guest())
                <li><a style="color: aliceblue;" class="active">Login |</a>
                  <ul>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                </li>
              @endif

                </ul>


          </nav>
        </div>

  </div>
  <!-- .container -->

</header>
<!--header end-->
