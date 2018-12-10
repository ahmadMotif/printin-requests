@extends('manage.layouts.manageApp')
@section('content')
  <div class="row bg-dark text-light py-3 d-flex align-items-center">
    <div class="col">
      <h4>{{ $employee->name }}</h4>
    </div>
  </div>

  <div class="container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('manage.dashboard') }}">dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('employees.index') }}">Employees</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          {{ $employee->name }}
        </li>
      </ol>
    </nav>
  </div>
  {{-- breadCrumb --}}

  <div class="container-fluid py-5">
    <ul class="list-group">
      <li class="list-group-item">name: {{ $employee->name }}</li>
      <li class="list-group-item">email: {{ $employee->email }}</li>
      <li class="list-group-item">password: {{ $employee->password }}</li>
      <li class="list-group-item">Created At: {{ $employee->created_at }}</li>
    </ul>
  </div>
@endsection