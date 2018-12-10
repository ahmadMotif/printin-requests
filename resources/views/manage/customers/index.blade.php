@extends('manage.layouts.manageApp')
@section('content')
  <div class="row bg-dark text-light py-3 d-flex align-items-center">
    <div class="col">
      <h4>The Customers</h4>
    </div>
    <div class="col">
      <a href="{{ route('customers.create') }}" class="btn btn-outline-primary float-right">Add New</a>
    </div>
  </div>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('manage.dashboard') }}">dashboard</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        Customers
      </li>
    </ol>
  </nav>
  {{-- Breadcrumb --}}
  <div class="container-fluid my-5">
  <table class="table table-bordered table-responsive-md table-striped table-hover text-center">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Category</th>
          <th scope="col">Date Created</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($customers as $customer)
          <tr>
            <th scope="row">{{ $customer->id }}</th>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>
              @forelse ($customer->roles as $category)
                {{ $category->name }}
              @empty
                <p>This user has not been assigned any Category yet</p>
              @endforelse
            </td>
            <td>{{ $customer->created_at->toFormattedDateString() }}</td>
            <td>
              <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-rounded btn-sm my-0">
                Edit
              </a>
              <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-success btn-rounded btn-sm my-0">
                View
              </a>
              <a href="" class="btn btn-danger btn-rounded btn-sm my-0">Remove</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection