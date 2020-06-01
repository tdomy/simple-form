<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ secure_asset('/css/inquiry.css') }}" rel="stylesheet">.
    <title>Simple Form - @yield('title')</title>
    @section('script')
    @show
  </head>
  <body>
    <div class="container">
      @yield('content')
    </div>
  </body>
</html>
