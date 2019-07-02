@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/login.css')}} " >
@endsection

@section('content')

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="{{asset('images/sandvik-logo.png')}}" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form role="form" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}
      <input type="text" class="fadeIn second"  id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Correo electronico">
      @if ($errors->has('email'))
          <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
      <input type="password" class="fadeIn third" placeholder="Contraseña"  id="password" name="password" required>
      @if ($errors->has('password'))
          <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif
      <input type="submit" class="fadeIn fourth" value="Inicar sesión">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <!--<a class="underlineHover" href="#">Forgot Password?</a>-->
    </div>

  </div>
</div>



@endsection
