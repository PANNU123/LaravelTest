<!doctype html>
<html lang="en">

@include('admin.includes.head')
<body>

<!-- Begin page -->
<div id="layout-wrapper">

    @include('admin.includes.header')

    @include('admin.includes.sidebar')

    <div class="main-content">
        <!-- End Page-content -->
        @yield('container')
        @include('admin.includes.footer')
    </div>
</div>
{{-- {!! Toastr::message() !!} --}}
</body>
@include('admin.includes.script')
</html>
