@extends('manage.layouts.manageApp')
@section('content')
  <div class="row bg-dark text-light py-3 d-flex align-items-center">
    <div class="col">
      <h4>The orders</h4>
    </div>
    <div class="col">
      <a href="{{ route('orders.create') }}" class="btn btn-outline-primary float-right">Add New</a>
    </div>
  </div>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('manage.dashboard') }}">dashboard</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        orders
      </li>
    </ol>
  </nav>
  {{-- Breadcrumb --}}
  <div class="container-fluid my-5">
  <table class="table table-bordered table-responsive-md table-striped table-hover text-center">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Book Title</th>
          <th scope="col">Book Author</th>
          {{-- <th scope="col">slug</th> --}}
          <th scope="col">Description</th>
          <th scope="col">Date Created</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $order)
          <tr>
            <th scope="row">{{ $order->id }}</th>
            <td>{{ $order->book_title }}</td>
            <td>{{ $order->user->name }}</td>
            {{-- <td>{{ $order->slug }}</td> --}}
            <td>{{ $order->description }}</td>
            {{-- <td>
              @forelse ($order->roles as $category)
                {{ $category->name }}
              @empty
                <p>This user has not been assigned any Category yet</p>
              @endforelse
            </td> --}}
            <td>{{ $order->created_at->toFormattedDateString() }}</td>
            <td>
              <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary btn-rounded btn-sm my-0">
                Edit
              </a>
              <a href="{{ route('orders.show', $order->id) }}" class="btn btn-success btn-rounded btn-sm my-0">
                View
              </a>
              <a href="{{ route('orders.destroy', $order->id) }}" class="btn btn-danger btn-rounded btn-sm my-0">
                Remove
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection