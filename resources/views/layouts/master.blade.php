<!doctype html>
<html lang="en">
  @include('layouts.header')
  <body>
      @include('components.guest-navbar')
      @yield('content')
      @include('layouts.script')
  </body>
</html>