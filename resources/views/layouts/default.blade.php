<!doctype html>
<html lang="en">
    @include('partials.header')
    <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
    @include('partials.navbar')
    @include('partials.sidebar')
    @yield('contents')
    @include('partials.footer')
    </div>
    @include('partials.scripts')
    </body>
    <!--end::Body-->
</html>