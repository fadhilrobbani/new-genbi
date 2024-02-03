<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? "Dashboard | GenBIpedia" }}</title>
  @include('adminlte.layouts.header')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('adminlte.layouts.navbar')
  @include('adminlte.layouts.sidebar')

  @yield('content')

  @include('adminlte.layouts.footer')
  @stack('custome_js')

</body>
</html>