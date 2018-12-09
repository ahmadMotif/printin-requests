@extends('manage.layouts.manageApp')
@section('content')
  <div class="row bg-dark text-light py-3 d-flex align-items-center">
    <div class="col">
      <h4>The Employees</h4>
    </div>
    <div class="col">
      <a href="{{ route('employees.create') }}" class="btn btn-outline-primary float-right">Add New</a>
    </div>
  </div>

  <div class="container-fluid my-5">
  <table class="table table-bordered table-responsive-md table-striped table-hover text-center">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th>Date created</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($employees as $employee)
          <tr>
            <th scope="row">{{ $employee->id }}</th>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->created_at->toFormattedDateString() }}</td>
            <td>
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-rounded btn-sm my-0">
                    Edit
                  </a>
                  <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-success btn-rounded btn-sm my-0">
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