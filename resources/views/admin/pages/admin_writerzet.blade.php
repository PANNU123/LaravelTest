@extends('admin.master')
@section('container')
    <div class="page-content">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Dashboard</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">WriterZet</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="container-fluid">
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-4">Products of the Month</h4>
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Product</th>

                                            <th>Customer</th>
                                            <th>Price</th>
                                            <th>Invoice</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>#2356</td>
                                            <td><img src="{{asset('backend')}}/assets/images/product/img-7.png" width="42" class="me-3" alt="">Green Chair</td>
                                            <td>Kenneth Gittens</td>
                                            <td>$200.00</td>
                                            <td>42</td>
                                            <td><span
                                                    class="badge badge-pill badge-soft-primary font-size-13">Pending</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
@endsection
@push('post_scripts')
    <script>
        toastr["success"]("Welcome to Dashboard");
    </script>
@endpush
