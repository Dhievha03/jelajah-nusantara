@extends('user._layouts.auth')
@section('title', 'Register')
@section('css')
    <style>
      .text-danger{
        color: #dc3545;
        font-size: 11px;
      }
    </style>
@endsection
@section('content')
<div class="container">
  <div class="login">
    <form action="{{ route('user.register.store') }}" method="POST">
      @csrf
      <h1>Get started.</h1>
      <hr />
      <label for="name">Name</label>
      <input type="text" placeholder="your name" name="name"/>
      @error('name')
        <div class="text-danger">*{{ $message }}</div>
      @enderror

      <label for="Email">Email</label>
      <input type="text" placeholder="example@gmail.com" name="email"/>
      @error('email')
        <div class="text-danger">*{{ $message }}</div>
      @enderror

      <label for="password">Password</label>
      <input type="password" placeholder="password" name="password"/>
      @error('password')
        <div class="text-danger">*{{ $message }}</div>
      @enderror

      <button type="submit">Sign Up</button>

      <div class="signin">
        <p>Or sign up with</p>
        <a href="https://google.com" title="google" class="google-icon"> <i class="fa-brands fa-google"> </i> </a>
        <p>Already have an account? <br>
          <a href="{{ route('user.login') }}" title="page sign in" class="sign-icon"> Sign in </a></p>
      </div>
    </form>
  </div>
  <div class="right">
    <img src="{{ asset('user/img/bg-1.jpg') }}" alt="" />
  </div>
</div> 
@endsection
