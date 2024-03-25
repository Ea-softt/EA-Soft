@extends('auth.master')
@section("content")
@section("title") {{ 'Forgot-Password' }} @endsection
     
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

<form class="border shadow p-3 rounded" method="POST" action="{{ route('password.confirm') }}"  style="width: 500px; background: #fff;  ">
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

    <h1 class="h3 mb-3 fw-normal" >Reset password?</h1> 

<div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>


        <!-- Password -->
        <div>
           <!--  <x-input-label for="password" :value="__('Password')" /> -->

            <x-text-input id="password" class="form-control "
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="Password " />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

         <div class="flex items-center justify-end mt-4">  


     <button  class="w-100 btn btn-lg btn-primary" type="submit"> {{ __('Confirm') }}</button>



    <br/>
    <p class="mt-2 mb-2 text-muted">Design by EASoft, Contact: +233541021978</p>
    <p class="mt-2 mb-1 text-muted">&copy; 2023-2030</p>
  </form>
  </div>
</main>
@endsection
