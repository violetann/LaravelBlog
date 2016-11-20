<!DOCTYPE html>
<html lang="en">
  <head>
      @include('partials/_head')
  </head>

  <body class="body">
      @include('partials/_nav')

    <div class="container">
        <div class="row row-offcanvas row-offcanvas-right">
            @include('partials._messages')
            @yield('content')
        </div>  
        @include('partials/_footer')
    </div>  

    @include('partials/_javascript')
    @yield('scripts')
  </body>
</html>