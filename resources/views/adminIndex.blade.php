@extends('layouts.main') 
@section('content') 
@if (Session::get('admin') == NULL)
<form method="post" action="/admin" class="admin-form-login"> {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password"> </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 
@else

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item"> <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Users</a> </li>
  <li class="nav-item"> <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Product</a> </li>
  <li class="nav-item"> <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Cart</a> </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"> @if ($errors->insertUser->first('password') != NULL)
    <div class="alert alert-danger" role="alert"> {{ $errors->insertUser->first('password') }} </div> @endif @if (session()->has('error'))
    <div class="alert alert-success"> {{ session('error') }} </div> @endif @include('adminTabs.users') </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">  @include('adminTabs.product') </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"> @include('adminTabs.cart') </div>
</div> 
@endif 
@endsection