@php
$prefix=Request::route()->getprefix();
$route=Route::current()->getName();
@endphp
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class-->
    
    
    <li class="nav-item">
      <a href="#" class="nav-link">
        
        <p>
          Manage User
          <i class="fas fa-angle-left right"></i>
          
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="far fa-user nav-icon"></i>
            <p>Staff</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-user nav-icon"></i>
            <p>Student</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        
        <p>
          Manage Suppliers
          <i class="fas fa-angle-left right"></i>
          
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('suppliers.view')}}" class="nav-link {{($route=='suppliers.view')?'active':''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Suppliers</p>
          </a>
        </li>
        
      </ul>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        
        <p>
          Manage Customers
          <i class="fas fa-angle-left right"></i>
          
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('customers.view')}}" class="nav-link {{($route=='customers.view')?'active':''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>View customers</p>
          </a>
        </li>
        
      </ul>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        
        <p>
          Manage Units
          <i class="fas fa-angle-left right"></i>
          
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('units.view')}}" class="nav-link {{($route=='units.view')?'active':''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Units</p>
          </a>
        </li>
        
      </ul>
    </li>

    <li class="nav-item">
      <a href="#" class="nav-link">
        
        <p>
          Manage Categories
          <i class="fas fa-angle-left right"></i>
          
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('categories.view')}}" class="nav-link {{($route=='categories.view')?'active':''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Categories</p>
          </a>
        </li>
        
      </ul>
    </li>
    
    <li class="nav-item">
      <a href="#" class="nav-link">
        
        <p>
          Manage Products
          <i class="fas fa-angle-left right"></i>
          
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('products.view')}}" class="nav-link {{($route=='products.view')?'active':''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Products</p>
          </a>
        </li>
        
      </ul>
    </li>
    
    <li class="nav-item">
      <a href="#" class="nav-link">
        
        <p>
          Manage Purchases
          <i class="fas fa-angle-left right"></i>
          
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('purchases.view')}}" class="nav-link {{($route=='purchases.view')?'active':''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>View purchases</p>
          </a>
        </li>
        
      </ul>
    </li>
  </ul>
</nav>