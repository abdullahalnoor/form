<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Forum</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
  @include('layouts.partials.navbar')

  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="list-group">
          <a href="#" class="list-group-item ">Active item</a>
          <a href="#" class="list-group-item list-group-item-action">Item</a>
        </div>
      </div>
      <div class="col-md-9">
        @yield('content')
      </div>
    </div>
  </div>

</body>

</html>