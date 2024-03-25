@extends('auth.master')
@section("content")
@section("title") {{ 'Register' }} @endsection
     
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
 
<form class="border shadow p-3 rounded" method="POST" action="{{ route('new_regist') }}"  style="width: 500px; background: #fff;  ">
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

    <h1 class="h3 mb-3 fw-normal" >Please Sign Up</h1>    

  <!-- Name -->
   <div class="mb-4 form-floating  input-group-lg">
   <!--  <label  class="visually-hidden">Username</label> -->   
        
            <!-- <x-input-label for="name" :value="__('Name')" /> -->
            <x-text-input id="name" class="form-control " type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

              <!-- Email Address -->
        <div class="mt-4 form-floating  input-group-lg">
           
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

            <!-- Password -->
        <div class="mt-4 form-floating  input-group-lg">
            <!-- <x-input-label for="password" :value="__('Password')" /> -->

            <x-text-input id="password" class="form-control "
                            type="password"
                            name="password"
                            required autocomplete="new-password"  placeholder="Passworrd"/>

            <x-input-error :messages="$errors->get('password')" class="mt-1 text-danger" />
        </div>
 
            <!-- Confirm Password -->
        <div class="mt-4 form-floating input-group-lg">
           <!--  <x-input-label for="password_confirmation" :value="__('Confirm Password')" /> -->

            <x-text-input id="password_confirmation" class="form-control"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"  placeholder="Confirm Password"/>

           <!--  <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /> -->
        </div>


    



<div class="form-group">
    <!--  <label  class="visually-hidden">Password</label> -->
    
    @if (Route::has('password.request'))
    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
       {{ __('Already registered?') }}
    </a>
    @endif
   </div>
        
     <button  class="w-100 btn btn-lg btn-primary" type="submit"> {{ __('Register') }}</button>

        

         <br/>
    <p class="mt-2 mb-2 text-muted">Design by EASoft, Contact: +233541021978</p>
    <p class="mt-2 mb-1 text-muted">&copy; 2023-2030</p>
  </form>
  </div>
</main>
@endsection
