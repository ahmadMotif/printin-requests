@extends('manage.layouts.manageApp')
@section('content')
  <div class="row bg-dark text-light py-3 d-flex align-items-center">
    <div class="col">
      <h4>The Employees</h4>
    </div>
    <div class="col">
      <button type="button" class="btn btn-outline-primary float-right">Add New</button>
    </div>
  </div>

  <div class="container">
  <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td colspan="2">Larry the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection