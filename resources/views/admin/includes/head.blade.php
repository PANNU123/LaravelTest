<head>


    <meta charset="utf-8" />

    <title>Dashboard | Morvin - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend')}}/assets/images/favicon.ico">
    {{-- <link href="{{ asset('backend/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link rel="stylesheet" href="{{asset('backend/assets/libs/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/libs/select2/css/select2-bootstrap.min.css')}}">
    <!-- plugin css -->
    <link href="{{asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

{{--toastr link--}}
    <link rel="stylesheet" href="{{asset('backend/assets/css/admin/toastr.min.css')}}">

    <script src="{{asset('backend/assets/js/admin/toastr.jquary.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/admin/toastr.min.js')}}"></script>

{{--    summernote--}}

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    @stack('post_styles')
</head>
