@extends('layouts.admin.admin_app')
@section('category_management')
    mm-active
@endsection
@section('category_active')
    active
@endsection
@section('admin_title')
    All Cateogry | E-commerce
@endsection
@section('admin_css_link')
       <!-- DataTables -->
       <link href="{{ asset('admin_assets') }}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
       <!-- Responsive datatable examples -->
       <link href="{{ asset('admin_assets') }}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('admin_assets') }}/css/sweetalert2.min.css">
@endsection
@section('admin_js_link')
    <!-- Required datatable js -->
    <script src="{{ asset('admin_assets') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin_assets') }}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('admin_assets') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('admin_assets') }}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- init js -->
    <script src="{{ asset('admin_assets') }}/js/pages/datatable-pages.init.js"></script>
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Product Specifications</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">All Products</a></li>
                            <li class="breadcrumb-item active">All Specifications</li>
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
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="mb-3">
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

                                    <div>
                                        @if (Auth::guard('admin')->User()->can('productSpecification.create'))
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-primary btn-sm"><i class="bx bx-plus me-1"></i> Add New</a>
                                            <!-- sample modal content -->
                                            <div id="createModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-bs-scroll="true" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('admin.productSpecification.store') }}" method="POST">
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel">Add new Specification</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Specification Name <span class="text-danger">*</span> </label>
                                                                    <input type="hidden" name="product_id" value="{{ $productId }}">
                                                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                                                    @error('name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Specification Description <span class="text-danger">*</span> </label>
                                                                    <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                                                                    @error('description')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </form>
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- end row -->
                         <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="table-responsive mb-4">
                                    <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>S\N</th>
                                            <th>Specification Name</th>
                                            <th>Specification Details</th>
                                            <th>Created By</th>
                                            <th>Updated By</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($productSpecifications as $productSpecification)
                                               <tr>
                                                   <td>{{ $loop->iteration }}</td>
                                                   <td>{{ $productSpecification->name }}</td>
                                                   <td>{{ $productSpecification->description }}</td>
                                                   <td>{{ $productSpecification->createdBy->name }}</td>
                                                   <td>{{ $productSpecification->edited_by != '' ? $productSpecification->editedBy->name:'' }}</td>
                                                   
                                                   <td>
                                                       @if (Auth::guard('admin')->user()->can('productSpecification.edit') || Auth::guard('admin')->user()->can('productSpecification.delete'))
                                                           <div class="btn-group">
                                                               <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">Options<i class="mdi mdi-chevron-down"></i></button>
                                                               <div class="dropdown-menu dropdownmenu-success" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 38.5px, 0px);">
                                                                  
                                                                   @if (Auth::guard('admin')->user()->can('productSpecification.edit'))
                                                                       <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal{{ $productSpecification->id }}" href="javascript:void(0)"> <i class="fas fa-edit me-2"></i>edit</a>
                                                                   @endif
                                                                   @if (Auth::guard('admin')->user()->can('productSpecification.delete'))
                                                                       <button type="button" class="dropdown-item  waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal{{ $productSpecification->id }}"><i class="fas fa-trash-alt me-2"></i>Delete</button>
                                                                   @endif
                                                               </div>
                                                           </div>
                                                       @endif
                                                   </td>
                                                    <!-- sample modal content -->
                                                    <div id="myModal{{ $productSpecification->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-bs-scroll="true" aria-hidden="true" style="display: none;">
                                                       <div class="modal-dialog">
                                                           <div class="modal-content">
                                                               <div class="modal-header">
                                                                   <h5 class="modal-title" id="myModalLabel">Are You Sure???</h5>
                                                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                               </div>
                                                               <div class="modal-body">
                                                                   <strong> <span class="text-danger">{{ $productSpecification->name }}</span> is deleting. You Can't Receover data after delete.</strong>
                                                               </div>
                                                               <div class="modal-footer">
                                                                   <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cancel</button>
                                                                   <a href="{{ route('admin.productSpecification.destroy',$productSpecification->id) }}" class="btn btn-primary waves-effect waves-light">Delete</a>
                                                               </div>
                                                           </div><!-- /.modal-content -->
                                                       </div><!-- /.modal-dialog -->
                                                   </div><!-- /.modal -->
                                                    <!-- sample modal content -->
                                                    <div id="editModal{{ $productSpecification->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-bs-scroll="true" aria-hidden="true" style="display: none;">
                                                       <div class="modal-dialog">
                                                        <form action="{{ route('admin.productSpecification.update',$productSpecification->id) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="myModalLabel">Add new Specification</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>Specification Name <span class="text-danger">*</span> </label>
                                                                        <input type="hidden" name="product_id" value="{{ $productId }}">
                                                                        <input type="text" name="name" class="form-control" value="{{  $productSpecification->name  }}">
                                                                        @error('name')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Specification Description <span class="text-danger">*</span> </label>
                                                                        <input type="text" name="description" class="form-control" value="{{ $productSpecification->description }}">
                                                                        @error('description')
                                                                            <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </form>
                                                       </div><!-- /.modal-dialog -->
                                                   </div><!-- /.modal -->
                                               </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- end table -->
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
@section('admin_js')
    @if (Session::has('product_specification_added_successfully'))
        <script>
                Toast.fire({
                    icon: 'success',
                    title: "{{ Session::get('product_specification_added_successfully') }}"
                })
        </script>
    @endif
    @if (Session::has('product_specification_update_successfully'))
        <script>
                Toast.fire({
                    icon: 'success',
                    title: "{{ Session::get('product_specification_update_successfully') }}"
                })
        </script>
    @endif
    @if (Session::has('product_specification_delete_successfully'))
        <script>
                Toast.fire({
                    icon: 'success',
                    title: "{{ Session::get('product_specification_delete_successfully') }}"
                })
        </script>
    @endif
@endsection
@endsection
