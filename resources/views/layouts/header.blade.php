<!--header start-->

<!--<div class="hlc_topheader">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="hlc_topheader_textleft">
					<p><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> Opening Hours: 9.00 am - 11.00 pm </p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="hlc_topheader_textright">
					<p><i class="fa fa-volume-control-phone" aria-hidden="true"></i> Question? Call Us at +0141 272 9000 </p>

           <div class="col-lg-10 col-md-12 col-sm-12"> <img width="100" height="66" src="{{ asset('images/nhs.png') }}" alt=""> </div>

        </div>
      </div>
		</div>
  </div>
</div>-->

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
            <ul class="hs_menu collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              @if (Auth::guest())
                <li><a class="active">Login</a>
                  <ul>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                </li>
              @endif
              <li><a class="active" href="{{ url('/') }}">Home</a>

              </li>
              <li><a href="{{ url('/about') }}">About</a></li>
              <li><a>Clicical</a>
                <ul>
                  <li><a href="#">Sub</a></li>


                </ul>
              </li>
              <li><a>Profile</a>
                    <ul>
                      <li><a href="#">profile single</a></li>
                    </ul>
                  </li>

              </li>
              <li><a href="#">Play</a>

                  <ul>
                      <li><a href="/game1/index.html">Game1 Coloring Book</a></li>

                      <li><a href="/game2/index.html">Game2 Rock-Paper-Scissors</a></li>

                      <li><a href="/game3/index.html">Game3 </a></li>


                  </ul>
              </li>
              <li><a href="{{ url('/contact') }}">Contact</a></li>

              <li>
             @if (Auth::check())
                      <li><a href="{{ url('/home') }}">Admin Dashboard</a></li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
             @endif
              </li>
            </ul>
          </nav>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2">
          <div class="hs_social">

            <ul>
              <li><a href=""><i class="fa fa-facebook"></i></a></li>
              <li><a href=""><i class="fa fa-twitter"></i></a></li>
             <!--  <li><a href=""><i class="fa fa-google-plus"></i></a></li> -->
              <li><a href="" id="hs_search"><i class="fa fa-search"></i></a></li>
            </ul>

          </div>
          <div class="hs_search_box">
            <form class="form-inline" role="form">
              <div class="form-group has-success has-feedback">
                <input type="text" class="form-control" id="inputSuccess4" placeholder="Search">
                <span class="glyphicon glyphicon-search form-control-feedback"></span> </div>
            </form>

          </div>

          <!-- #logo -->
        </div>
    </div>
    <!-- .row -->
  </div>
  <!-- .container -->

</header>
<!--header end-->
