@extends('manage.layouts.manageApp')
@section('content')
<div class="dashboard">
  <div class="row mx-0">
    <div class="col-2 bg-dark text-light py-5 text-center sidebar">
      @include('manage.partials.navs.sideNav')
    </div>
    {{-- Nav SideBar --}}
    <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
        <h1>content</h1>
      </div>
    </div>
    {{-- Main Dashboard Content --}}
    </div>
</div>
{{-- Dashbord Container --}}

@endsection