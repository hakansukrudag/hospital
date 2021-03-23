@extends('layouts.app')

@section('content')

<div class="container">


  <div class="row">

    <!--Login Form start-->
    <div class="col-lg-6 col-md-5 col-sm-12">
      <h4 class="hs_heading" id="hs_appointment_form_link">Login</h4>
      <div class="hs_appointment_form_div"> <img src="{{ asset('images/appointment_form.jpg') }}" width="512" height="365" alt="" />
        <div class="hs_appointment_form">
          <form  action="{{ route('login') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-lg-6 col-md-7 col-sm-6">

                <div class="form-group">
                  <input type="text"  id="email" name="email" class="form-control input-lg" placeholder="User Name ( required )" required>
                    @error('email')
                        <small style="color:red;">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                  <input type="text" id="slider_password" name="password" class="form-control input-lg"  placeholder="Password (required)" required>
                    @error('password')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 col-sm-3">
                <button type="submit" id="slider_book_apo" class="btn btn-default">Submit</button>
              </div>
              <div class="col-lg-8 col-md-8 col-sm-8">
                <p> If you forget your password, you can request to reset your password</p>
              </div>
              <div class="col-lg-3 col-md-4 col-sm-3">
                  @if (Route::has('password.request'))
                      <a type="button" id="slider_book_reset" href="{{ route('password.request') }}" class="btn btn-default">Forget Password</a>
                  @endif
              </div>
            </div>
            <p id="appointment_err"></p>
          </form>
        </div>
      </div>
    </div>
    <div class="hs_margin_60"></div>
</div>











{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Login') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('login') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-8 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Login') }}--}}
{{--                                </button>--}}

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
