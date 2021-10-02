<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Document</title>
</head>

<body>
  <div class="navbar mb-4 bg-success" style="width: 100vw; height: 55px;"></div>
  <div class="container">
    @yield('content')
  </div>
  <script>
    window.CSRF_TOKEN = '{{ csrf_token() }}';
  </script>
  @yield('script')
</body>

</html>