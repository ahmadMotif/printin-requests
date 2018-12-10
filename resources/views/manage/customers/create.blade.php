@extends('manage.layouts.manageApp')
@section('content')
  <div class="row bg-dark text-light py-3 d-flex align-items-center">
    <div class="col">
      <h4>Create New Customer</h4>
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
          Create New customer
        </li>
      </ol>
    </nav>
  </div>
  {{-- breadCrumb --}}

  <div class="container p-5 text-center">
    <form class="form-signin" action="{{ route('customers.store') }}" method="POST">
      @csrf
      <h1 class="h3 mb-3 font-weight-normal">Create New Customer</h1>
      <label for="inputName" class="sr-only">Name</label>
      <input type="name" name="name" id="inputName" class="form-control my-3" placeholder="Name address" required autofocus>
      @if ($errors->has('name'))
        <span class="text-danger alert alert-danger">{{ $errors->first('name') }}</span>
      @endif

      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control my-3" placeholder="Email address" required>
      @if ($errors->has('email'))
        <span class="text-danger alert alert-danger">{{ $errors->first('email') }}</span>
      @endif

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control my-3" placeholder="Password" required>
      @if ($errors->has('password'))
        <span class="text-danger alert alert-danger">{{ $errors->first('password') }}</span>
      @endif

      <label for="inputConfirmed" class="sr-only">Confirm Password</label>
      <input type="password" name="password_confirmation" id="inputConfirmed" class="form-control my-3" placeholder="Password" required>

      <h5 class="mb-3">Chose Role/s To This Customer</h5>
      <div class="checkbox mb-3">
        @foreach ($roles as $role)
          <label class="mr-3">
            <input type="checkbox" name="roles[]" value="{{ $role->id }}"> {{ $role->display_name }}
          </label>
        @endforeach
        @if ($errors->has('roles'))
          <span class="text-danger alert alert-danger">{{ $errors->first('roles') }}</span>
        @endif
      </div>

      <button class="btn btn-lg btn-primary" type="submit">Create</button>
    </form>
  </div>
@endsection
