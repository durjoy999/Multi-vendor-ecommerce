@extends('layouts.admin.admin_app')
@section('Frontend_active')
    mm-active
@endsection
@section('hero_product_active')
    active
@endsection
@section('admin_title')
    Hero Product Update | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Hero Product</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Hero Products</li>
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
                       <div class="row">
                           <div class="col-12">
                            @if (Session::has('hero_product_update_success'))
                                <div class="alert alert-success">
                                    {{ Session::get('hero_product_update_success') }}
                                </div>

                            @endif
                           </div>
                       </div>
                    <div class="row">
                        <div class="col-12">
                            @if ($heroProduct != '')
                                <form action="{{ route('admin.heroProduct.heroProduct.post',$heroProduct->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <h3> Hero Product Section</h3>
                                        <hr>
                                        <div class="col-12 mb-4 border">
                                            <div class="form-group">
                                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                                <br>
                                                @if ($heroProduct->image == 'default.png')
                                                <img class="rounded avatar-lg" style="width:100px; height:100px;" src="{{ asset('files/photo/hero_product') }}/{{ $heroProduct->image }}" alt="{{ $heroProduct->image }}">
                                                @else
                                                <img class="rounded avatar-lg" style="width:100px; height:100px;" src="{{ asset('files') }}/{{ $heroProduct->image }}" alt="{{ $heroProduct->image }}">
                                                @endif
                                            </div>


                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 mb-4">
                                            <div class="form-group">
                                                <label>Title<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('title') is-invalid @enderror"  value="{{ $heroProduct->title }}" name="title">
                                                @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 mb-4">
                                            <div class="form-group">
                                                <label>Price <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control @error('price') is-invalid @enderror" value="{{ $heroProduct->price }}" name="price">
                                                @error('price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 mb-4">
                                            <div class="form-group">
                                                <label>Product Link<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('product_link') is-invalid @enderror" value="{{ $heroProduct->product_link }}" name="product_link">
                                                @error('product_link')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12 mb-4">
                                            <div class="form-group">
                                                <label>Updated By<span class="text-danger">*</span></label>
                                                <input type="text" readonly class="form-control" value="{{ $heroProduct->edited_by != ''?$heroProduct->editedBy->name:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-md btn-primary" type="submit">Update</button>
                                </form>
                            @endif
                        </div>
                    </div>
                   </div>
               </div>
           </div>
       </div>

    </div> <!-- container-fluid -->
</div>
@section('admin_js')
    @if (Session::has('hero_products_update_success'))
        <script>
            Toast.fire({
                icon: 'success',
                title: 'Hero Products Update Successfully'
            })
        </script>
    @endif
    @if ($errors->any())
        <script>
            Toast.fire({
                icon: 'error',
                title: 'Something wrong, Please try again!!'
            })
        </script>
    @endif
@endsection
@endsection
