@extends('layouts.admin.admin_app')
@section('Frontend_active')
    mm-active
@endsection
@section('slider_active')
    active
@endsection
@section('admin_title')
    All Slider | E-commerce
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
                    <h4 class="mb-sm-0 font-size-18">All Slider</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Slider</li>
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
                                    <h5 class="card-title">Total Sliders <span class="text-muted fw-normal ms-2">({{ $sliders->count() }})</span></h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

                                    <div>
                                        @if (Auth::guard('admin')->User()->can('slider.create'))
                                            <a href="{{ route('admin.slider.create') }}" class="btn btn-primary btn-sm"><i class="bx bx-plus me-1"></i> Add New</a>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                         <!-- end row -->
                         <div class="table-responsive mb-4">
                             <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                 <thead>
                                 <tr>
                                     <th>S\N</th>
                                     <th>Image</th>
                                     <th>Title</th>
                                     <th>SubTitle</th>
                                     <th>status</th>
                                     <th>Created By</th>
                                     <th>Updated By</th>
                                     <th>Actions</th>
                                 </tr>
                                 </thead>
                                 <tbody>
                                     @foreach($sliders as $slider)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img style="height: 80px;width:80px;" src="{{ asset('files') }}/{{ $slider->image }}" alt="image">
                                            </td>
                                            <td>{{ \Illuminate\Support\Str::limit($slider->title , 20, $end='...') }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($slider->sub_title , 20, $end='...') }}</td>
                                            <td>
                                                @if (Auth::guard('admin')->user()->can('slider.edit'))
                                                <div class="btn-group">
                                                    <button type="button" class="btn {{ $slider->status == $slider->isActive() ? 'btn-success':'btn-danger' }} btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">{{ $slider->status }} <i class="mdi mdi-chevron-down"></i></button>
                                                    <div class="dropdown-menu dropdownmenu-success" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 38.5px, 0px);">
                                                        @if ($slider->status == $slider->isActive())
                                                        <a class="dropdown-item" href="{{ route('admin.slider.statusUpdate',$slider->id) }}">Deactive</a>
                                                        @else
                                                        <a class="dropdown-item" href="{{ route('admin.slider.statusUpdate',$slider->id) }}">Active</a>
                                                        @endif
                                                    </div>
                                                </div>
                                                @endif
                                            </td>
                                            <td>{{ $slider->createdBy->name }}</td>
                                            <td>{{ $slider->edited_by != ''?$slider->editedBy->name:'' }}</td>
                                            <td>
                                                @if (Auth::guard('admin')->user()->can('slider.all') || Auth::guard('admin')->user()->can('slider.delete'))
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">Options<i class="mdi mdi-chevron-down"></i></button>
                                                        <div class="dropdown-menu dropdownmenu-success" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 38.5px, 0px);">
                                                            @if (Auth::guard('admin')->user()->can('slider.all'))
                                                                <a class="dropdown-item" href="{{ route('admin.slider.show',$slider->id) }}"> <i class="fas fa-eye me-2"></i> Show</a>
                                                            @endif
                                                            @if (Auth::guard('admin')->user()->can('slider.edit'))
                                                                <a class="dropdown-item" href="{{ route('admin.slider.edit',$slider->id) }}"> <i class="fas fa-edit me-2"></i>edit</a>
                                                            @endif
                                                            @if (Auth::guard('admin')->user()->can('slider.delete'))
                                                                <button type="button" class="dropdown-item  waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal{{ $slider->id }}"><i class="fas fa-trash-alt me-2"></i>Delete</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                             <!-- sample modal content -->
                                             <div id="myModal{{ $slider->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" data-bs-scroll="true" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Are You Sure???</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <strong> <span class="text-danger">{{ $slider->title }}</span> is deleting. You Can't Receover data after delete.</strong>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cancel</button>
                                                            <a href="{{ route('admin.slider.destroy',$slider->id) }}" class="btn btn-primary waves-effect waves-light">Delete</a>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                             <!-- end table -->
                         </div>
                         <!-- end table responsive -->
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
    @if (Session::has('category_deleted_successfully'))
        <script>
                Toast.fire({
                    icon: 'success',
                    title: "{{ Session::get('category_deleted_successfully') }}"
                })
        </script>
    @endif
@endsection
@endsection
