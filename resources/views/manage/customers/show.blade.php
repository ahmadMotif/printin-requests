@extends('manage.layouts.manageApp')
@section('content')
  <div class="row bg-dark text-light py-3 d-flex align-items-center">
    <div class="col">
      <h4>{{ $customer->name }}</h4>
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

  <div class="container-fluid py-5">
    <ul class="list-group">
      <li class="list-group-item">name: {{ $customer->name }}</li>
      <li class="list-group-item">email: {{ $customer->email }}</li>
      <li class="list-group-item">password: {{ $customer->password }}</li>
      <li class="list-group-item">Created At: {{ $customer->created_at }}</li>
      <li class="list-group-item">In Category:
        @forelse ($customer->roles as $category)
          <strong>{{ $category->display_name }}</strong>
          ({{ $category->description }})
        @empty
          <p>This user has not been assigned any Ctegory yet</p>
        @endforelse
      </li>
    </ul>
  </div>
@endsection