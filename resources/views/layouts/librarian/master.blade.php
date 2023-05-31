<!doctype html>
<html lang="en">
  @include('layouts.header')
  <body>
      <div class="d-flex">
         <div class="bg-dark">
            @include('layouts.librarian.sidebar')
         </div>
         <div class="w-100">
            @include('layouts.librarian.topbar')
            @yield('content')
         </div>
      </div>
      @include('layouts.script')
      @yield('js-extra')
  </body>
</html>