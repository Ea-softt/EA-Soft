@extends('auth.master')
@section("content")
@section("title") {{ 'LogIn' }} @endsection
     
  <body class="text-center" style="background: linear-gradient(rgba(0,0,50,0.5),rgba(0,0,50,0.5)),
  
  url(assets/Login_icon.png);
    background-size: cover;
  background-position: center">
   <main class="form-signin">

    <x-auth-session-status class="mb-4" :status="session('status')" />
    @if (session('error'))
    <div class="alert" style="background-color: #e90909">
        {{ session('error') }}
    </div>
    @endif



  <div class=" container  d-flex justify-content-end align-items-center" style="max-width: 300px;
  float: none;
  margin: 5px auto;">  
 
<form class="border shadow p-3 rounded" method="POST" action="{{ route('login') }}"  style="width: 500px; background: #fff;  ">
    @csrf
    <img class="mb-4" src="{{ url('assets/Ea-Soft.ico') }}" alt="" width="100" height="100">
   <div>
   <?php

    if (isset($_SESSION['meg'])){
        echo "<div id='meg'></div>";
        unset($_SESSION['meg']);

    }
   ?>
    </div>

    <h1 class="h3 mb-3 fw-normal" >Please sign in</h1>    


   <div class="mb-4 form-floating  input-group-lg">
   <!--  <label  class="visually-hidden">Username</label> -->   
    <input  type="email"  id="email" name="email" class="form-control" alue="old('email')" placeholder="E-Mail" required autofocus autocomplete="username"   >   
    <x-input-error  :messages="$errors->get('email')" class="text-danger mt-2" />
</div>
  
   <div class="mb-4 form-floating  input-group-lg">
   <!--  <label  class="visually-hidden">Password</label> -->   
   <input type="password" id="password" name="password" class="form-control" placeholder="Password" required autocomplete="current-password" >
   <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div> 

<div class="block mt-4">
    <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
    </label>
  <br>
  
  <div class="form-group">
    <!--  <label  class="visually-hidden">Password</label> -->
    
    @if (Route::has('password.request'))
    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
        {{ __('Forgot your password?') }}
    </a>
    @endif
   </div> 
  <!--  <a class="registration" href=""> {{ __('Create New Account') }}</a> <br> -->
   
    <button  class="w-100 btn btn-lg btn-primary" type="submit"> {{ __('Log in') }}</button>
    
    <br/>
    <p class="mt-2 mb-2 text-muted">Design by EASoft, Contact: +233541021978</p>
    <p class="mt-2 mb-1 text-muted">&copy; 2023-2030</p>
  </form>
  </div>
</main>


    
  <!-- </body> -->
{{-- 
<script type="text/javascript">
    
     $(document).ready(function(){
    $('#preloader').fadeOut('fast', function() {
        $(this).remove();
      })
  })
  $('.datetimepicker').datetimepicker({
      format:'Y/m/d H:i',
      startDate: '+3d'
  })
  $('.select2').select2({
    placeholder:"Please select here",
    width: "100%"
  })
 

$('#meg').html('<div class="alert alert-danger">Check Password, ID and Username .</div>')
     
   </script> --}}

@endsection

