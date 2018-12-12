<aside class="side-nav py-3">
  <h4 class="text-white">name && logo</h4>
  <ul class="nav flex-column mt-3">
    @role('superadministrator')
      <li class="nav-item">
        <a class="nav-link font-weight-bold" href="{{ route('manage.dashboard') }}" class="text-white">
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link font-weight-bold" href="{{ route('orders.index') }}" class="text-white">
          Orders
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link font-weight-bold" href="#" class="text-white">Categoies</a>
      </li>
      <li class="nav-item">
        <a class="nav-link font-weight-bold" href="#" class="text-white">Tasks</a>
      </li>
      <li class="nav-item">
        <a class="nav-link font-weight-bold" href="{{ route('employees.index') }}" class="text-white">
          Employees
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link font-weight-bold" href="{{ route('customers.index') }}" class="text-white">
          Customers
        </a>
      </li>
      @endrole
      <li class="nav-item">
        <a class="nav-link font-weight-bold" href="#" class="text-white">
          nav can all mannagers access
        </a>
      </li>
  </ul>
</aside>