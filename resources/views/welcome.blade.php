<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <title>Admin| @yield('title')</title> --}}

    <!-- Preloader -->
    @include('Admin.Includes.styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        @include('Admin.Includes.preloader')

        <!-- Main Sidebar Container -->
        @include('Admin.Includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @include('Admin.Includes.content')

        <!-- Footer -->
        @include('Admin.Includes.footer')

        <!-- Control Sidebar -->
        @include('Admin.Includes.sidebar_control')
    </div>
    <!-- Scripts -->
    @include('Admin.Includes.scripts')
</body>

</html>
