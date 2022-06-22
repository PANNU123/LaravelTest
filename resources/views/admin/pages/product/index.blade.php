@extends('admin.master')
@push('post_styles')
    <link href="{{asset('backend')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend')}}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend')}}/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
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
                            <a href="javascript:void(0)" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modall" data-bs-target=".bs-example-modal-lg" id="createNewPRoduct">Add Product</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="container-fluid">
            <div class="page-content-wrapper">

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="mb-4">
                                        <input class="form-control" type="text" name="title" id="title" placeholder="Title">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="mb-4">
                                        <input class="form-control" type="number" name="priceFrom" id="priceFrom" placeholder="Price From">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="mb-4">
                                        <input class="form-control" type="number" name="priceTo" id="priceTo" placeholder="Price To">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="mb-4">
                                        <input class="form-control" type="date" name="srcDate" id="srcDate" placeholder="Title">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="mb-4">
                                        <a href="javascript:void(0)" class="btn btn-success waves-effect waves-light" data-bs-toggle="modall" data-bs-target=".bs-example-modal-lg" id="srcResult">Search</a>
                                        <a href="javascript:void(0)" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modall" data-bs-target=".bs-example-modal-lg" id="resetResult">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Variant</th>
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
        @include('admin.pages.product.create')
    </div>
    @push('post_scripts')
        <script src="{{asset('backend')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{asset('backend')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{asset('backend')}}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{asset('backend')}}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="{{asset('backend')}}/assets/libs/dropzone/min/dropzone.min.js"></script>
        <script>

            $(document).ready(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $("#select2-example-tags").select2({
                    placeholder: "Enter Feature Tag",
                    allowClear: true,
                    tags: true,
                    tokenSeparators: [',']
                });

                $("#select2-example-tags-two").select2({
                    placeholder: "Enter Feature Tag",
                    allowClear: true,
                    tags: true,
                    tokenSeparators: [',']
                });


                //data show in table
                function load_date(title='',priceFrom='',priceTo='',date=''){
                    // let title = $("#title").val();
                    var table = $('#datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{route('admin.product')}}",
                        data:{
                            title:title,
                            priceFrom:priceFrom,
                            priceTo:priceTo,
                            date:date
                        }
                    },
                    columns: [

                        {
                            data: 'Title',
                            name: 'Title'
                        },
                        {
                            data: 'Description',
                            name: 'Description'
                        },
                        {
                            data: 'Variant',
                            name: 'Variant'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false
                        }
                    ]
                });
                }
                load_date();
                $('#srcResult').on('click',function () {
                    // $('#datatable').DataTable().destroy();
                    $('#datatable').DataTable().clear().destroy();
                    let title =$("#title").val();
                    let priceFrom =$("#priceFrom").val();
                    let priceTo =$("#priceTo").val();
                    let date =$("#srcDate").val();
                    load_date(title,priceFrom,priceTo,date);

                });
                $('#resetResult').on('click',function () {
                    // $('#datatable').DataTable().destroy();

                    let title =$("#title").val('');
                    let priceFrom =$("#priceFrom").val('');
                    let priceTo =$("#priceTo").val('');
                    let date =$("#srcDate").val('');
                    $('#datatable').DataTable().clear().destroy();
                    load_date();

                });
                $('#createNewPRoduct').click(function () {
                    $('#saveBtn').html("create-Blog");
                    $('#ProductForm').trigger("reset");
                    $('#modelHeading').html("Blog Add Form");
                    $('#ajaxModelProduct').modal('show');
                });

                //Edit Category............
                $('body').on('click', '.editBlog', function () {
                    var id = $(this).data('id');
                    var flagsUrl = '{{ asset(product_image()) }}';
                    $.ajax({
                        method:"GET",
                        dataType:"json",
                        url:'/admin/product/edit/'+id,
                        success:function(data){
                            console.log(data);
                            $('#id').val(id);

                                $('#hidden_image_id').val(data.images.thumbnail);



                            $('#title').val(data.title);
                            $('#sku').val(data.sku);
                            $('#description').val(data.description);
                            $('#price').val(data.price);
                            $('#qty').val(data.qty);

                            $('#variant_one option').filter(':selected').text('color').val(1);
                            $('#variant_two option').filter(':selected').text('size').val(2);

                            // $('#tags option').filter(':selected').text(data.product_variants.variant).val(data.subcategory_id);

                            $('#target1').attr('src', flagsUrl +'/'+ data.images.thumbnail).css({"width" :"120 px" , "height" : "80px"});

                            $('#modelHeading').html("Edit Blog");
                            $('#saveBtn').html("Update-Blog");
                            $('#ajaxModelProduct').modal('show');
                        },
                        error:function (data){
                            console.log('Error:', data);
                            $('#saveBtn').html('Save Changes');
                        }
                    })
                });

                $("#saveBtn").on('click',function (e){
                        e.preventDefault();
                        var formdata = new FormData(document.getElementById("ProductForm"));
                        $.ajax({
                            url: '{{ route('admin.product.store') }}',
                            method: 'post',
                            data: formdata,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success:function (data){
                                if(data.success == true){
                                    toastr["success"]("Blog added successfully");
                                    $('#ProductForm').trigger("reset");
                                    $('#ajaxModelProduct').modal('hide');
                                    table.draw();

                                }else{
                                    toastr["error"]("Blog already exits");
                                    $('#ProductForm').trigger("reset");
                                    $('#ajaxModelProduct').modal('hide');
                                    table.draw();
                                }
                            },
                            error:function(data){
                                console.log('Error:', data);
                                $('#saveBtn').html('Save Changes');
                            }
                        });
                    });


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
                                url:'/admin/product/delete/'+id,
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

                $('.putImage1').on('change', function () {
                    var src = this;
                    var target = document.getElementById('target1');
                    target.style.width = '120px';
                    target.style.height = '80px';
                    target.style.marginTop='10px';
                    var reader = new FileReader();
                    reader.onload = function (e) {
                $('#target1').attr('src', e.target.result);
                }
                reader.readAsDataURL(src.files[0]);
            });
        });
        </script>
    @endpush
@endsection
