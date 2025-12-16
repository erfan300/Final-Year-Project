<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

@include('partials.header')

<main>
  @yield('content')
</main>

@include('partials.footer')

</body>
</html>
