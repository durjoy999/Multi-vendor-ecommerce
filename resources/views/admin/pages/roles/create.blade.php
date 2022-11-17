@extends('layouts.admin.admin_app')
@section('admin_active')
    mm-active
@endsection
@section('admin_roles_active')
    active
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Create Role</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                            <li class="breadcrumb-item active">Create Role</li>
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
                             {{-- @if(Session::has('role_and_permission_assign_success'))
                                 <div class="alert alert-success">
                                    {{ Session::get('role_and_permission_assign_success') }}
                                 </div>
                             @endif --}}
                          <form action="{{ route('admin.roles.store') }}" method="POST">
                              @csrf
                              <div class="row">
                                  <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Role Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                  </div>
                                  <div class="col-6">
                                    <div class="form-group">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-select  @error('name') is-invalid @enderror"">
                                            <option value="">select status</option>
                                            <option  value="Active" {{ (old("status") == 'Active' ? "selected":"") }}>Active</option>
                                            <option  value="Deactive" {{ (old("status") == 'Deactive' ? "selected":"") }}>Deactive</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                  </div>
                              </div>

                              
                             <h5 class="mb-4 mt-4"> Assign Permissions</h5>
                            

                            @foreach ($data['permission_groups'] as $group)
                                <div class="row">  
                                    @foreach ($data['permissions'] as $permission)
                                            @if ($permission->group_name == $group->name)
                                            <div class="col-3">
                                                <div class="form-group mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="permissions[]" type="checkbox" id="formCheck{{ $permission->id }}" value="{{ $permission->id }}">
                                                        <label class="form-check-label" for="formCheck{{ $permission->id }}">
                                                            {{ $permission->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>       
                                            @endif
                                        @endforeach
                                    <hr>
                                </div>
                            @endforeach

                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                              
                          </form>
                            
                         </div>
                         <!-- end row -->
 
                       
                         <!-- end table responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>
@section('admin_js')
    @if (Session::has('role_and_permission_assign_success'))
    <script>
            Toast.fire({
                icon: 'success',
                title: 'Roles and Permissions Created Successfully'
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