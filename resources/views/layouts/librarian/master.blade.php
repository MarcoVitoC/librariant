<!doctype html>
<html lang="en">
  @include('layouts.header')
  <body>
      <div class="d-flex">
         @include('layouts.librarian.sidebar')
         <div class="w-100">
            @include('layouts.librarian.topbar')
            @yield('content')
         </div>
      </div>
      @include('layouts.script')
      @yield('js-extra')
  </body>
</html>