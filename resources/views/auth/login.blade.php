@extends('layouts.login')

@section('content')
<section id="wrapper" class="login-register login-sidebar"  style="background-image:url(/dashboard/assets/images/background/login-register.jpg);">
  <div class="login-box card">
    <div class="card-body no-border">
      <form class="form-horizontal form-material text-center" id="loginform" method="POST" action="{{ route('login') }}">
        @csrf
        <a href="javascript:void(0)" class="text-center db"><img src="/dashboard/assets/images/logo-icon.png" alt="Home" /><br/><img src="/dashboard/assets/images/logo-text.png" alt="Home" /></a>
        <h3 class="box-title m-t-40 m-b-0">{{ __('Login') }}</h3><small>Masukkan Email dan Kata Sandi</small>
        <div class="form-group m-t-40">
          <div class="col-xs-12">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="checkbox-signup"> {{ __('Remember Me') }}</label>
            </div>
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> {{ __('Lupa Password?') }}</a> </div>
            @endif
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{ __('Login') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
