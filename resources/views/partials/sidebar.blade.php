@section('sideNav')
<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
      <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
          <use xlink:href="assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
          <use xlink:href="{{asset('assets/brand/coreui.svg#signet')}}"></use>
        </svg>
      </div>
      <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('dashboard')}}">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="{{asset('node_modules/@coreui/icons/sprites/free.svg#cil-speedometer')}}"></use>
            </svg> Dashboard</a></li>
        <li class="c-sidebar-nav-title">General Settings</li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('user-index')}}">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="{{asset('node_modules/@coreui/icons/sprites/free.svg#cil-user')}}"></use>
            </svg> Users</a></li>
          <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('product-index')}}">
                  <svg class="c-sidebar-nav-icon">
                      <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-pencil"></use>
                  </svg> Product</a></li>


            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('category-index')}}">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-pencil"></use>
            </svg> Category</a></li>
{{--        Group Name --}}
          <li class="c-sidebar-nav-title">Components</li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-user"></use>
            </svg> Users</a>
          <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/breadcrumb.html"><span class="c-sidebar-nav-icon"></span> Breadcrumb</a></li>
          </ul>
        </li>

      </ul>
      <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>
    @endsection
