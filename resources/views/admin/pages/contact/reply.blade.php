@extends('layouts.admin.admin_app')
@section('Frontend_active')
    mm-active
@endsection
@section('contact_active')
    active
@endsection
@section('admin_title')
    Contact Reply | E-commerce
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Contact Details</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashbaord</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.contact.index') }}">All Contacts</a></li>
                            <li class="breadcrumb-item active">Reply Contact</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Reply Contact </h4>
                    </div>
                    <div class="col-lg-6 col-"></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="card">
                                    <!-- end card header -->
                                    <div class="card-body">
                                        <div>
                                            <form method="post" action="{{ route('admin.contact.store') }}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $contact->id }}">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Email </label>
                                                    <input type="text" class="form-control" name="contact_email" value="{{ $contact->email }}">
                                                </div>
                                                 <div class="form-group mb-3">
                                                    <label class="form-label">Subject </label>
                                                    <input type="text" class="form-control" name="subject" value="{{ old('subject') }}">
                                                    @error('subject')
                                                    <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Reply</label>
                                                    <textarea name="reply" class="form-control">{{ old('reply') }}</textarea>
                                                    @error('reply')
                                                    <span class="text text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">All Reply</h4>
                    </div>
                    <div class="card-body m-auto">
                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row"><strong> Time </strong></th>
                                        <td>
                                           {{ date("g:i a", strtotime($contact->updated_at ?? 'N/A' )) }}
                                              <br>
                                           {{ date("j F Y", strtotime($contact->updated_at ?? 'N/A' )) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Subject </strong></th>
                                        <td>{{ $contact->subject ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 300px;"> <strong>Email </strong></th>
                                        <td>{{ $contact->email ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong> Reply </strong></th>
                                        <td>{{ $contact->reply ?? 'N/A' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@section('admin_js')
    <script>
        // The DOM element you wish to replace with Tagify
        var input = document.querySelector('input[name=meta_keywords]');

        // initialize Tagify on the above input node reference
        new Tagify(input)
    </script>
    @if (Session::has('contact_email_send_success'))
        <script>
                Toast.fire({
                    icon: 'success',
                    title: "{{ Session::get('contact_email_send_success') }}"
                })
        </script>
    @endif
    @if (Session::has('already_submit_reply'))
        <script>
                Toast.fire({
                    icon: 'error',
                    title: "{{ Session::get('already_submit_reply') }}"
                })
        </script>
    @endif
@endsection
@endsection
