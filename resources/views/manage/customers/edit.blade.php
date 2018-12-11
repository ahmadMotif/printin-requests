@extends('manage.layouts.manageApp')
@section('content')
  <div class="row bg-dark text-light py-3 d-flex align-items-center">
    <div class="col">
      <h4>Edite ({{ $customer->name }})</h4>
    </div>
  </div>

  <div class="container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('manage.dashboard') }}">dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('customers.index') }}">Customers</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          {{ $customer->name }}
        </li>
      </ol>
    </nav>
  </div>
  {{-- breadCrumb --}}

  <div class="container p-5 text-center">
    <form class="form-signin" action="{{ route('customers.update', $customer->id) }}" method="POST">
      {{method_field('PUT')}}
      @csrf
      <h1 class="h3 mb-3 font-weight-normal">Edit  ({{ $customer->name }})</h1>
      <label for="inputName" class="sr-only">Name</label>
      <input type="name" name="name" id="inputName" class="form-control my-3" placeholder="Name address" value="{{ $customer->name }}" required autofocus>
      @if ($errors->has('name'))
        <span class="text-danger alert alert-danger">{{ $errors->first('name') }}</span>
      @endif

      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control my-3" placeholder="Email address" value="{{ $customer->email }}" required>
      @if ($errors->has('email'))
        <span class="text-danger alert alert-danger">{{ $errors->first('email') }}</span>
      @endif

      {{-- <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control my-3" placeholder="Password" value="{{ $customer->password }}" required>
      @if ($errors->has('password'))
        <span class="text-danger alert alert-danger">{{ $errors->first('password') }}</span>
      @endif --}}
      {{-- <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
        <label class="form-check-label" for="exampleRadios1">
          Change Password
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
        <label class="form-check-label" for="exampleRadios2">
          Keep Password
        </label>
      </div>
    </div> --}}
      {{-- Password Chose --}}
      <button class="btn btn-lg btn-primary" type="submit">Update</button>
    </form>
  </div>
@endsection
