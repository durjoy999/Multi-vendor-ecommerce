@extends('layouts.admin.admin_app')
@section('category_management')
    mm-active
@endsection
@section('childcategory_active')
    active
@endsection
@section('admin_title')
    All Child Category | E-commerce
@endsection
@section('admin_css_link')
     <!-- choices css -->
     <link href="{{ asset('admin_assets') }}/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('admin_js_link')
        <!-- choices js -->
        <script src="{{ asset('admin_assets') }}/libs/choices.js/public/assets/scripts/choices.min.js"></script>
          <!-- init js -->
          <script src="{{ asset('admin_assets') }}/js/pages/form-advanced.init.js"></script>
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Create Child Category</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.childCategory.index') }}">All Categories</a></li>
                            <li class="breadcrumb-item active">Create Child Category</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.childCategory.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group mb-4">
                                <label>Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Category</label>
                                <select id="choices-single-default" data-trigger name="category_id" class="form-control category  @error('category_id') is-invalid @enderror">
                                    <option value="">select category</option>
                                    @foreach ($categories as $category)
                                        <option {{ $category->id == old('category_id') ? 'selected':'' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Sub Category</label>
                                <select name="sub_category_id" class="form-control sub-category  @error('sub_category_id') is-invalid @enderror">
                                    <option value="">select sub category</option>
                                   
                                </select>
                                @error('sub_category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Name <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Serial <span class="text-danger">*</span> </label>
                                <input type="number" class="form-control @error('serial') is-invalid @enderror" name="serial" value="{{ old('serial') }}">
                                @error('serial')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Slug <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}">
                                @error('slug')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Meta Keywords (press enter for seperate tag)</label>
                                <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords" value="{{ old('meta_keywords') }}">
                                @error('meta_keywords')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Meta Title</label>
                                <input type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value="{{ old('meta_title') }}">
                                @error('meta_title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Meta Details</label>
                                <textarea name="meta_details" class="form-control @error('meta_details') is-invalid @enderror" cols="30" rows="3">{{ old('meta_details') }}</textarea>
                                @error('meta_details')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Status</label>
                                <select name="status" class="form-select  @error('status') is-invalid @enderror">
                                    <option value="Active">Active</option>
                                    <option value="Deactive">Deactive</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">Create</button>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
        
    </div> <!-- container-fluid -->
</div>
@section('admin_js')
    <script>
        // The DOM element you wish to replace with Tagify
        var input = document.querySelector('input[name=meta_keywords]');

        // initialize Tagify on the above input node reference
        new Tagify(input)
    </script>
    @if (Session::has('child_category_created_successfully'))
        <script>
                Toast.fire({
                    icon: 'success',
                    title: "{{ Session::get('child_category_created_successfully') }}"
                })
        </script>
    @endif

    <script type="text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('change','.category',function(){

                var category_id =$(this).val();
                console.log(category_id);
                var op=" ";
                $.ajax({
                    type:'GET',
                    url: "{{ url('admin/child-category/subcategory')}}"+'/'+category_id,
                    success:function(data){
                        op+='<option value="">select sub category</option>';
                            for(var i=0;i<data.length;i++){
                                op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                            }
                        $('.sub-category').html(op); 
                        console.log(data);
                    
                    },
                    error:function(){

                    }
                });
            });
        });
    </script>
@endsection
@endsection