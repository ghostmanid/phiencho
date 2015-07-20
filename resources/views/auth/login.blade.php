<!-- resources/views/auth/login.blade.php -->
@extends('home')
@section('title', 'StatusCanTho.Com - Tuyen dung, viec lam Can Tho')
@section('content')
<div class="card">
   <div class="card-content">
   <form method="POST" action="{{url('/')}}/auth/login">
    {!! csrf_field() !!}
        <div class="input-field">
        <input type="email" name="email" value="{{ old('email') }}">
        <label> Email </label>
    </div>
    <div class="input-field">
       <input type="password" name="password" id="password">
        <label>Password</label>
    </div>
    <div class="switch">
    <label>
      Off
      <input type="checkbox">
      <span class="lever"></span>
      On
    </label>
    </div>
    <div class="input-field">
        <button type="submit" class='btn'>Login</button>
    </div>
    </form>
  </div>
    
</div>

@stop