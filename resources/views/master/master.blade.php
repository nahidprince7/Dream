<!DOCTYPE html>
<html lang="en">
<head>
    @include('master.head-master')
    @yield('head')

    @yield('guest-css')

    <title>@yield('title')</title>
</head>
  <body class="c-app">

    @include('partials.sidebar')
    @yield('sideNav')
    <div class="c-wrapper c-fixed-components">
    @include('partials.topbar')
    @yield('topNavbar')
      <div class="c-body">
        <main class="c-main">
         @yield('content')
        </main>
        <footer class="c-footer">
         @include('master.footer-master')
         @yield('footer')
        </footer>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    @include('master.main-js')
    @yield('main-js')
    <!-- page js -->
    @yield('guest-js')
  </body>
</html>
