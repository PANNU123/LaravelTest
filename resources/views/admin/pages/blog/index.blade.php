@extends('admin.master')
@push('post_styles')
    <link href="{{asset('backend')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend')}}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endpush
@section('container')
    <div class="page-content">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>WriterZet</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Blog</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-end d-none d-sm-block">
                            <a href="javascript:void(0)" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modall" data-bs-target=".bs-example-modal-lg" id="createNewBlog">Add Blog</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="container-fluid">
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>SubCategory</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
        </div>
        @include('admin.pages.blog.create')
    </div>
    @push('post_scripts')
        <script src="{{asset('backend')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{asset('backend')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{asset('backend')}}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{asset('backend')}}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //category wise subcategory
                $(document).on('change','.category_id',function(){
                    var cat_id=$(this).val();
                    console.log(cat_id);
                    $.ajax({
                        type:'get',
                        url: "{{route('admin.blog.get.subcategory')}}",
                        data:{id:cat_id},
                        success:function(data){
                            if(data.length > 0){
                                $('select[name="subcategory_name"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="subcategory_name"]').append('<option value="'+ value.id +'">'+ value.subcategory_name +'</option>');
                                });
                            }else{
                                $('select[name="subcategory_name"]').html('<option value="0" disabled="true"  selected="true">Open this select menu</option>');
                            }
                        },
                        error:function(data){
                            console.log('Error:', data);
                        }
                    });
                });
                //data show in table
                var table = $('#datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{route('admin.blog')}}",
                    },
                    columns: [

                        {
                            data: 'Big_Image',
                            name: 'Big_Image'
                        },
                        {
                            data: 'Category',
                            name: 'Category'
                        },
                        {
                            data: 'SubCategory',
                            name: 'SubCategory'
                        },
                        {
                            data: 'Title',
                            name: 'Title'
                        },
                        {
                            data: 'Status',
                            name: 'Status'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false
                        }
                    ]
                });
                $('#createNewBlog').click(function () {
                    $('#saveBtn').html("create-Blog");
                    $('#category_id').val('');
                    $('#BlogForm').trigger("reset");
                    $('#modelHeading').html("Blog Add Form");
                    $('#ajaxModelBlog').modal('show');
                });
                //Edit Category............
                $('body').on('click', '.editBlog', function () {
                    var id = $(this).data('id');
                    var flagsUrl = '{{ asset(blog_image()) }}';
                    $.ajax({
                        method:"GET",
                        dataType:"json",
                        url:'/admin/blog/edit/'+id,
                        success:function(data){
                            console.log(data);
                            $('#blog_id').val(id);
                            $('#avatar_image_one_id').val(data.small_image);
                            $('#avatar_image_two_id').val(data.big_image);
                            $('#sub_cat_id').val(data.subcategory.id);

                            $('#category_id option').filter(':selected').text(data.category.category_name).val(data.category.id);

                            $('#subcategory_id option').filter(':selected').text(data.subcategory.subcategory_name).val(data.subcategory_id);


                            $('#title_id').val(data.title);

                            $('#Description').summernote('code', data.description);
                            $('#Metatag').val(data.metatag).css("height","200px");

                            $('#target1').attr('src', flagsUrl +'/'+ data.small_image).css({"width" :"120 px" , "height" : "80px"});
                            $('#target2').attr('src', flagsUrl +'/'+ data.big_image).css({"width" :"120 px" , "height" : "80px"});

                            if(data.breadcrumbs == 0){
                                $('#breadcrumbs').prop('checked',false);
                            }else{
                                $('#breadcrumbs').prop('checked',true);
                            }
                            if(data.dont_miss == 0){
                                $('#dont_miss').prop('checked',false);
                            }else{
                                $('#dont_miss').prop('checked',true);
                            }
                            if(data.popular_post == 0){
                                $('#popular_post').prop('checked',false);
                            }else{
                                $('#popular_post').prop('checked',true);
                            }
                            if(data.hot_post == 0){
                                $('#hot_post').prop('checked',false);
                            }else{
                                $('#hot_post').prop('checked',true);
                            }

                            $('#modelHeading').html("Edit Blog");
                            $('#saveBtn').html("Update-Blog");
                            $('#ajaxModelBlog').modal('show');
                        },
                        error:function (data){
                            console.log('Error:', data);
                            $('#saveBtn').html('Save Changes');
                        }
                    })
                });

                // add new blog ajax request
                $("#saveBtn").on('click',function (e){
                        e.preventDefault();
                        var formdata = new FormData(document.getElementById("BlogForm"));
                        $.ajax({
                            url: '{{ route('admin.blog.store') }}',
                            method: 'post',
                            data: formdata,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success:function (data){
                                if(data.success == true){
                                    toastr["success"]("Blog added successfully");
                                    $('#BlogForm').trigger("reset");
                                    $('#ajaxModelBlog').modal('hide');
                                    table.draw();

                                }else{
                                    toastr["error"]("Blog already exits");
                                    $('#BlogForm').trigger("reset");
                                    $('#ajaxModelBlog').modal('hide');
                                    table.draw();
                                }
                            },
                            error:function(data){
                                console.log('Error:', data);
                                $('#saveBtn').html('Save Changes');
                            }
                        });
                    });

                    ///delete category
                $(document).on('click', '.deleteBlog', function (e) {
                    e.preventDefault();
                    var id = $(this).data('id');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url:'/admin/blog/delete/'+id,
                                type: "GET",
                                dataType:"JSON",
                                success: function (data) {
                                    table.draw();
                                },
                            });
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            Swal.fire(
                                'Cancelled',
                                'Your file is safe :)',
                                'error'
                            )
                        }
                    })
                });
                // Category status Inactive
                $(document).on('click', '.inactiveBlog', function (e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    $.ajax({
                        url: "{{route('admin.blog.inactive')}}",
                        type: "GET",
                        dataType:"JSON",
                        data:{
                            blog_id:id,
                        },
                        success: function (data) {
                            if(data.success == true){
                                toastr["error"]("Blog Inactive");
                                table.draw();
                            }
                        },
                    });
                });
                // Category status Active
                $(document).on('click', '.activeBlog', function (e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    $.ajax({
                        url: "{{route('admin.blog.active')}}",
                        type: "GET",
                        dataType:"JSON",
                        data:{
                            blog_id:id,
                        },
                        success: function (data) {
                            if(data.success == true){
                                toastr["success"]("Blog active");
                                table.draw();
                            }
                        },
                    });
                });

                $(document).on('click', '.breadcrumbsBlog', function (e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    $.ajax({
                        url: "{{route('admin.blog.breadcrumbs')}}",
                        type: "GET",
                        dataType:"JSON",
                        data:{
                            blog_id:id,
                        },
                        success: function (data) {
                            if(data.success == true){
                                toastr["success"]("Breadcrumbs update = 1");
                                table.draw();
                            }else{
                                toastr["error"]("Breadcrumbs update = 0");
                                table.draw();
                            }
                        },
                    });
                });
                $(document).on('click', '.popularPostBlog', function (e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    $.ajax({
                        url: "{{route('admin.blog.popular.post')}}",
                        type: "GET",
                        dataType:"JSON",
                        data:{
                            blog_id:id,
                        },
                        success: function (data) {
                            if(data.success == true){
                                toastr["success"]("Breadcrumbs update = 1");
                                table.draw();
                            }else{
                                toastr["error"]("Breadcrumbs update = 0");
                                table.draw();
                            }
                        },
                    });
                });
                $(document).on('click', '.hotPostBlog', function (e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    $.ajax({
                        url: "{{route('admin.blog.hot.Post')}}",
                        type: "GET",
                        dataType:"JSON",
                        data:{
                            blog_id:id,
                        },
                        success: function (data) {
                            if(data.success == true){
                                toastr["success"]("Breadcrumbs update = 1");
                                table.draw();
                            }else{
                                toastr["error"]("Breadcrumbs update = 0");
                                table.draw();
                            }
                        },
                    });
                });
                $(document).on('click', '.dontMissBlog', function (e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    $.ajax({
                        url: "{{route('admin.blog.dont.miss')}}",
                        type: "GET",
                        dataType:"JSON",
                        data:{
                            blog_id:id,
                        },
                        success: function (data) {
                            if(data.success == true){
                                toastr["success"]("Breadcrumbs update = 1");
                                table.draw();
                            }else{
                                toastr["error"]("Breadcrumbs update = 0");
                                table.draw();
                            }
                        },
                    });
                });
            });
        </script>
    @endpush
@endsection
