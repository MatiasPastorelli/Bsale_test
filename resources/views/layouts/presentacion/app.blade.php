<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Webartinfo">
      <meta name="author" content="Webartinfo">
      @yield('meta')

      <title>@yield('title')</title>

      <link rel="icon" type="image/png" href="img/favicon.png">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/icons/css/materialdesignicons.min.css') }}" media="all" rel="stylesheet" type="text/css" />

      <link href="{{ asset('css/style.css') }}" rel="stylesheet">

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      @toastr_css
      @yield('css')
   </head>
   <body>

      @yield('content')


      <!-- vista del carrito de compras -->
      <div id="app">
         @include('carritoMenu.navbar')
      </div>

      @yield('modals')

      @jquery
      @toastr_js
      @toastr_render
      @yield('scripts')
   </body>
</html>
