<!doctype html>
<html lang="en">

@include('component.head')

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    @include('component.sidebar')
    <!--  Main wrapper -->
    <div class="body-wrapper">
        @include('component.header')
        @yield('content')
    </div>
  </div>
  @include('component.js')
</body>

</html>
