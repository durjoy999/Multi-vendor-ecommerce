@extends('layouts.admin.admin_app')
@section('product_management')
    mm-active
@endsection
@section('product_active')
    active
@endsection
@section('admin_title')
    All Products | E-commerce
@endsection
@section('admin_css_link')  
        <link rel="stylesheet" href="{{ asset('admin_assets') }}/css/sweetalert2.min.css">
@endsection
@section('admin_js_link') 
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">All Product</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Product</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <a href="{{ route('admin.product.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New Product</a>
                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-check">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;" class="align-middle">
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="checkAll">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th class="align-middle">Action</th>
                                        <th class="align-middle">SKU</th>
                                        <th class="align-middle">Brand</th>
                                        <th class="align-middle">Category</th>
                                        <th class="align-middle">Title</th>
                                        <th class="align-middle">Price</th>
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle">Created by</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="#" method="POST">
                                        @csrf
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    <div class="form-check font-size-16">
                                                        <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                        <label class="form-check-label" for="orderidcheck01"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-3">
                                                        @if (Auth::guard('admin')->user()->can('product.all') || Auth::guard('admin')->user()->can('product.delete') || Auth::guard('admin')->user()->can('product.edit'))
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">Options<i class="mdi mdi-chevron-down"></i></button>
                                                        <div class="dropdown-menu dropdownmenu-success" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 38.5px, 0px);">
                                                            @if (Auth::guard('admin')->user()->can('product.all'))
                                                                <a class="dropdown-item" href="{{ route('admin.product.show',$product->id) }}"> <i class="fas fa-eye me-2"></i> Show</a>
                                                            @endif
                                                            @if (Auth::guard('admin')->user()->can('product.all'))
                                                                <a class="dropdown-item" href="{{ route('admin.productSpecification.index',$product->id) }}"> <i class="fas fa-eye me-2"></i> Specifications</a>
                                                            @endif
                                                            @if (Auth::guard('admin')->user()->can('product.edit'))
                                                                <a class="dropdown-item" href="{{ route('admin.product.edit',$product->id) }}"> <i class="fas fa-edit me-2"></i>edit</a>
                                                            @endif
                                                            @if (Auth::guard('admin')->user()->can('product.delete'))
                                                                <button type="button" class="dropdown-item  waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal{{ $product->id }}"><i class="fas fa-trash-alt me-2"></i>Delete</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                                        
                                                    </div>
                                                </td>
                                                        <!-- sample modal content -->
                                                    <div id="myModal{{ $product->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-bs-scroll="true" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="myModalLabel">Are You Sure???</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <strong> <span class="text-danger">{{ $product->title }}</span> is deleting. You Can't Receover data after delete.</strong>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cancel</button>
                                                                    <a href="{{ route('admin.product.destroy',$product->id) }}" class="btn btn-primary waves-effect waves-light">Delete</a>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                <td><a href="javascript: void(0);" class="text-body fw-bold">{{ $product->sku }}</a> </td>
                                                <td>{{ $product->brand->name }}</td>
                                                <td>{{ $product->category->name }}</td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ $product->current_price }}</td>
                                                <td>
                                                    @if (Auth::guard('admin')->user()->can('product.edit'))
                                                        <div class="btn-group">
                                                            <button type="button" class="btn {{ $product->status == $product->isActive() ? 'btn-success':'btn-danger' }} btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">{{ $product->status }} <i class="mdi mdi-chevron-down"></i></button>
                                                            <div class="dropdown-menu dropdownmenu-success" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 38.5px, 0px);">
                                                                @if ($product->status == $product->isActive())
                                                                <a class="dropdown-item" href="{{ route('admin.product.statusUpdate',$product->id) }}">Deactive</a>
                                                                @else
                                                                <a class="dropdown-item" href="{{ route('admin.product.statusUpdate',$product->id) }}">Active</a>
                                                                    
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ $product->createdBy->name }}</td>
                                               
                                              
                                            </tr>
                                        @endforeach
                                    </form>
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination pagination-rounded justify-content-end mb-2">

                            {{ $products->links() }}
                            {{-- <li class="page-item disabled">
                                <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                    <i class="mdi mdi-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                    <i class="mdi mdi-chevron-right"></i>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
@section('admin_js')
    @if (Session::has('someting_wrong'))
        <script>
                Toast.fire({
                    icon: 'error',
                    title: "{{ Session::get('someting_wrong') }}"
                })
        </script>
    @endif
    @if (Session::has('please_delete_everything_all_relatedted_resource_first'))
        <script>
                Toast.fire({
                    icon: 'error',
                    title: "{{ Session::get('please_delete_everything_all_relatedted_resource_first') }}"
                })
        </script>
    @endif
    @if (Session::has('status_updated_successfully'))
        <script>
                Toast.fire({
                    icon: 'success',
                    title: "{{ Session::get('status_updated_successfully') }}"
                })
        </script>
    @endif
    @if (Session::has('brand_deleted_successfully'))
        <script>
                Toast.fire({
                    icon: 'success',
                    title: "{{ Session::get('brand_deleted_successfully') }}"
                })
        </script>
    @endif
@endsection
@endsection
