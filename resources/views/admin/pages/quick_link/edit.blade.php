@extends('layouts.admin.admin_app')
@section('Frontend_active')
    mm-active
@endsection
@section('quicklinks_active')
    active
@endsection
@section('admin_title')
    All Quick Update | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Update Quick Link</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.quickLink.index') }}">All Quick Links</a></li>
                            <li class="breadcrumb-item active">Update Quick Link</li>
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
                        <form action="{{ route('admin.quickLink.update',$quicklink->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label>title <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $quicklink->title }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label>Slug <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $quicklink->slug }}">
                                @error('slug')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           <div class="form-group mb-4">
                               <label>Long Details  <span class="text-danger">*</span> </label>
                               <textarea name="details" id="editor" class="form-control @error('details') is-invalid @enderror" cols="30" rows="3" >{{ $quicklink->details }}</textarea>
                               @error('details')
                                   <div class="text-danger">{{ $message }}</div>
                               @enderror
                           </div>
                            <div class="form-group mb-4">
                               <label for="status">Status <span class="text-danger">*</span></label>
                               <select name="status" id="status" class="form-select @error('name') is-invalid @enderror"">
                                   <option value="">select status</option>
                                   <option  value="Active" {{ ($quicklink->status == 'Active' ? "selected":"") }}>Active</option>
                                   <option  value="Deactive" {{ ($quicklink->status == 'Deactive' ? "selected":"") }}>Deactive</option>
                               </select>
                               @error('status')
                                   <span class="text-danger">{{ $message }}</span>
                               @enderror
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
    @if (Session::has('quick_link_update_success'))
        <script>
                Toast.fire({
                    icon: 'success',
                    title: "{{ Session::get('quick_link_update_success') }}"
                })
        </script>
    @endif
@endsection
@endsection
