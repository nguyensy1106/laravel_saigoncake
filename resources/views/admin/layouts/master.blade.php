<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cake Sài Gòn ~ Dashboard ~ Admin</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @INCLUDE('admin.layouts.css')

  @INCLUDE('admin.layouts.header')

  @INCLUDE('admin.layouts.slider')

  @yield('content')

  @INCLUDE('admin.layouts.js') 
</div>
<!-- ./wrapper -->


</body>
</html>
