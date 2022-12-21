<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | @yield('title')</title>

    <!-- Preloader -->
    @include('admin.includes.styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        @include('admin.includes.preloader')

        <!-- Navbar -->
        @include('admin.includes.navbar')

        <!-- Main Sidebar Container -->
        @include('admin.includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @include('admin.includes.content')

        <!-- Footer -->
        @include('admin.includes.footer')

        <!-- Control Sidebar -->
        @include('admin.includes.sidebar_control')
    </div>
    <!-- Scripts -->
    @include('admin.includes.scripts')
</body>

</html>
