@extends('layouts.auth.app')

@section('content')
  <form class="kt-form" method="POST" action="{{ route('login') }}" novalidate="novalidate">
    @csrf

    <div class="form-group">
      <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="off" required autofocus>

      @if ($errors->has('email'))
        <div class="invalid-feedback">
          <strong>{{ $errors->first('email') }}</strong>
        </div>
      @endif
    </div>

    <div class="form-group">
      <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" placeholder="Password" name="password" value="{{ old('password') }}" autocomplete="off" required>

      @if ($errors->has('password'))
        <div class="invalid-feedback">
          <strong>{{ $errors->first('password') }}</strong>
        </div>
      @endif
    </div>

    <br/>

    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
      &nbsp;
      <label class="form-check-label" for="remember">
        {{ "Remember Me" }}
      </label>
    </div>

    <br/>

    <!--begin::Action-->
    <div class="kt-login__actions">
      {{-- <a href="{{ route('password.request') }}" class="kt-link kt-login__link-forgot">
        Forgot Your Password ?
      </a> --}}

      <button type="submit" class="btn btn-primary btn-elevate kt-login__btn-primary">Sign In</button>
    </div>

  </form>
  <br/><br/>
  <div>
    {{ base64_decode('wqkgMjAxOSBNdWguTXV6aGF3aXIgQW1yaSAoMTUyMTAwKSB8IEFuZGkgTnVybmFqaWhhdGluIE5pc3dhICgxNTIwODgpIA==') }}
  </div>
@endsection
