@extends('layouts.admin.admin_app')
@section('product_management')
    mm-active
@endsection
@section('product_active')
    active
@endsection
@section('admin_title')
    Create Product | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Update Product</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">All Products</a></li>
                            <li class="breadcrumb-item active">Update Product</li>
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
                        <form action="{{ route('admin.product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                           <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group mb-4">
                                            <label>Thumbnail Image  </label>
                                            <input type="file" class="form-control @error('thumbnail_image') is-invalid @enderror" name="thumbnail_image">
                                            @error('thumbnail_image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Gallery Image</label>
                                            <input type="file" multiple class="form-control @error('gallery_image') is-invalid @enderror" name="gallery_image[]">
                                            @error('gallery_image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Name <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $product->title }}">
                                            @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Slug <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $product->slug }}">
                                            @error('slug')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Meta Keywords (press enter for seperate tag)</label>
                                            <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords" value="{{ $product->meta_keywords }}">
                                            @error('meta_keywords')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Meta Title</label>
                                            <input type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value="{{ $product->meta_title }}">
                                            @error('meta_title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Meta Details</label>
                                            <textarea name="meta_details" class="form-control @error('meta_details') is-invalid @enderror" cols="30" rows="3">{{ $product->meta_details }}</textarea>
                                            @error('meta_details')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Short Details  <span class="text-danger">*</span>  </label>
                                            <textarea name="short_details" class="form-control @error('short_details') is-invalid @enderror" cols="30" rows="3">{{ $product->short_details }}</textarea>
                                            @error('short_details')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Long Details  <span class="text-danger">*</span> </label>
                                            <textarea name="long_details" id="editor" class="form-control @error('long_details') is-invalid @enderror" cols="30" rows="3">{{ $product->long_details }}</textarea>
                                            @error('long_details')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Status  <span class="text-danger">*</span> </label>
                                            <select name="status" class="form-select  @error('status') is-invalid @enderror">
                                                <option value="">select status</option>
                                                <option {{ $product->status == 'Active' ? 'selected':'' }} value="Active">Active</option>
                                                <option {{ $product->status == 'Deactive' ? 'selected':'' }} value="Deactive">Deactive</option>
                                            </select>
                                            @error('status')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group mb-4">
                                            <label>Stock  <span class="text-danger">*</span> </label>
                                            <input type="number" name="stock" class="form-control @error('stock') is-invalid  @enderror" value="{{ $product->stock }}">
                                            @error('stock')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <hr>
                                        <div class="form-group mb-4">
                                            <label>SKU  <span class="text-danger">*</span> </label>
                                            <input type="text" name="sku" class="form-control @error('sku') is-invalid  @enderror" value="{{ $product->sku }}">
                                            @error('sku')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <hr>
                                        <div class="form-group mb-4">
                                            <label>Previous Price </label>
                                            <input type="number" step="any" name="previous_price" class="form-control @error('previous_price') is-invalid  @enderror" value="{{ $product->previous_price }}">
                                            @error('previous_price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Current Price  <span class="text-danger">*</span> </label>
                                            <input type="number" step="any" name="current_price" class="form-control @error('current_price') is-invalid  @enderror" value="{{ $product->current_price }}">
                                            @error('current_price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <hr>
                                        <div class="form-group mb-4">
                                            <label>Brand  <span class="text-danger">*</span> </label>
                                            <select name="brand_id" data-trigger class="form-select  @error('brand_id') is-invalid @enderror">
                                                <option value="">select brand</option>
                                                @foreach ($brands as $brand)
                                                    <option {{ $product->brand_id == $brand->id? 'selected':'' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('brand_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Category  <span class="text-danger">*</span> </label>
                                            <select name="category_id" data-trigger class="form-select category  @error('category_id') is-invalid @enderror">
                                                <option value="">select category</option>
                                                @foreach ($categories as $category)
                                                    <option {{ $product->category_id == $category->id ? 'selected':'' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Category Sub Category  <span class="text-danger">*</span> </label>
                                            <select name="sub_category_id"  class="form-select sub-category  @error('sub_category_id') is-invalid @enderror">
                                                <option value="">select sub category</option>
                                                @foreach ($subCategories as $subCategory)
                                                    <option {{ $product->sub_category_id == $subCategory->id? 'selected':'' }} value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('sub_category_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>Category Child Category  <span class="text-danger">*</span> </label>
                                            <select name="child_category_id"  class="form-select child-category  @error('child_category_id') is-invalid @enderror">
                                                <option value="">select child category</option>
                                                @foreach ($childCategories as $childCategory)
                                                    <option {{ $product->child_category_id == $childCategory->id?'selected':'' }} value="{{ $childCategory->id }}">{{ $childCategory->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('child_category_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <hr>
                                        <div class="form-group mb-4">
                                            <label>select Tax  <span class="text-danger">*</span> </label>
                                            <select name="tax_id" class="form-select  @error('tax_id') is-invalid @enderror">
                                                <option value="">select tax</option>
                                                @foreach ($taxes as $tax)
                                                    <option {{ $product->tax_id == $tax->id ? 'selected':'' }} value="{{ $tax->id }}">{{ $tax->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('tax_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                           </div>
                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
        
    </div> <!-- container-fluid -->
</div>
@section('admin_js')

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        // The DOM element you wish to replace with Tagify
        var input = document.querySelector('input[name=meta_keywords]');

        // initialize Tagify on the above input node reference
        new Tagify(input)
    </script>
    @if (Session::has('product_updated_successfully'))
        <script>
                Toast.fire({
                    icon: 'success',
                    title: "{{ Session::get('product_updated_successfully') }}"
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
                    url: "{{ url('admin/product/get-sub-category')}}"+'/'+category_id,
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
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('change','.sub-category',function(){
                var category_id = document.getElementsByClassName("category")[0].value;
                
                var sub_category_id =$(this).val();
                console.log(category_id,sub_category_id);
                var op=" ";
                $.ajax({
                    type:'GET',
                    url: "{{ url('admin/product/get-child-category')}}"+'/'+sub_category_id,
                    success:function(data){
                        op+='<option value="">select child category</option>';
                            for(var i=0;i<data.length;i++){
                                op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                            }
                        $('.child-category').html(op); 
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