@extends('layouts.frontend.frontend_app')
@section('frontend_content')
    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">My Account</li>
                        </ul>
                        <h1 class="title">Explore All Products</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="inner">
                        <div class="bradcrumb-thumb">
                            <img src="{{ asset('frontend_assets') }}/images/product/product-45.png" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->
    <!-- Start My Account Area  -->
    <div class="axil-dashboard-area axil-section-gap">
        <div class="container">
            <div class="axil-dashboard-warp">
                <div class="axil-dashboard-author">
                    <div class="media">
                        <div class="thumbnail">
                            @if (Auth::guard('web')->User()->image == 'default.png')

                            <img style="height: 70px;width:70px;" src="{{ asset('files/user/photo/profile') }}/{{ Auth::guard('web')->User()->image }}" alt="{{ Auth::guard('web')->User()->name }}">
                            @else
                            <img style="height: 70px;width:70px;" src="{{ asset('files') }}/{{ Auth::guard('web')->User()->image }}" alt="{{ Auth::guard('web')->User()->name }}">
                            @endif
                        </div>
                        <div class="media-body">
                            <h5 class="title mb-0">{{ Auth::guard('web')->User()->name }}</h5>
                            <span class="joining-date">Member Since {{ Auth::guard('web')->User()->created_at }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-md-4">
                        <aside class="axil-dashboard-aside">
                            <nav class="axil-dashboard-nav">
                                <div class="nav nav-tabs" role="tablist">
                                    <a class="nav-item nav-link active" data-bs-toggle="tab" href="{{ route('frontend.user.dashboard') }}" role="tab" aria-selected="true"><i class="fas fa-th-large"></i>Dashboard</a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-orders" role="tab" aria-selected="false"><i class="fas fa-shopping-basket"></i>Orders</a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-tickets" role="tab" aria-selected="false"><i class="fas fa-ticket"></i>Ticket</a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-downloads" role="tab" aria-selected="false"><i class="fas fa-file-download"></i>Downloads</a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-address" role="tab" aria-selected="false"><i class="fas fa-home"></i>Addresses</a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-account" role="tab" aria-selected="false"><i class="fas fa-user"></i>Account Details</a>
                                    <a class="nav-item nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                       <i class="fal fa-sign-out"></i> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </nav>
                        </aside>
                    </div>
                    <div class="col-xl-9 col-md-8">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel">
                                <div class="axil-dashboard-overview">
                                    <div class="welcome-text">Hello Annie (not <span>Annie?</span> <a href="sign-in.html">Log Out</a>)</div>
                                    <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                                <div class="axil-dashboard-order">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Order</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">#6523</th>
                                                    <td>September 10, 2020</td>
                                                    <td>Processing</td>
                                                    <td>$326.63 for 3 items</td>
                                                    <td><a href="#" class="axil-btn view-btn">View</a></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">#6523</th>
                                                    <td>September 10, 2020</td>
                                                    <td>On Hold</td>
                                                    <td>$326.63 for 3 items</td>
                                                    <td><a href="#" class="axil-btn view-btn">View</a></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">#6523</th>
                                                    <td>September 10, 2020</td>
                                                    <td>Processing</td>
                                                    <td>$326.63 for 3 items</td>
                                                    <td><a href="#" class="axil-btn view-btn">View</a></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">#6523</th>
                                                    <td>September 10, 2020</td>
                                                    <td>Processing</td>
                                                    <td>$326.63 for 3 items</td>
                                                    <td><a href="#" class="axil-btn view-btn">View</a></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">#6523</th>
                                                    <td>September 10, 2020</td>
                                                    <td>Processing</td>
                                                    <td>$326.63 for 3 items</td>
                                                    <td><a href="#" class="axil-btn view-btn">View</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-tickets" role="tabpanel">
                              <div class="d-flex flex-row-reverse bd-highlight">
                                <div class="p-2 bd-highlight">
                                    <div class="container">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="axil-btn btn-primary w-100 p-3 mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                     + Add new
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            <form action="{{ route('frontend.user.ticketReply') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                  <div class="form-group mb-4 mt-4">
                                                      <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                                      @error('image')
                                                          <div class="text-danger">{{ $message }}</div>
                                                      @enderror
                                                  </div>
                                                  <div class="form-group mb-4">
                                                      <label>Subject <span class="text-danger">*</span> </label>
                                                      <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}">
                                                      @error('subject')
                                                          <div class="text-danger">{{ $message }}</div>
                                                      @enderror
                                                  </div>
                                                  <div class="form-group mb-4">
                                                      <label>Massage <span class="text-danger">*</span> </label>
                                                      <input type="text" class="form-control @error('massage') is-invalid @enderror" name="massage" value="{{ old('massage') }}">
                                                      @error('massage')
                                                          <div class="text-danger">{{ $message }}</div>
                                                      @enderror
                                                  </div>
                                                  {{-- <button type="submit" class="btn btn-md btn-primary">Create</button> --}}

                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Create</button>
                                          </div>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                    </div>

                                </div>
                              </div>
                                <div class="axil-dashboard-order">

                                    <div class="table-responsive">

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Ticket Number</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 @forelse ($userMassages as $userMassage)
                                                <tr>
                                                    <th scope="row">{{$userMassage->ticket_number }}</th>
                                                    <td>
                                                        {{ date("g:i a", strtotime($userMassage->created_at )) }}
                                                        <br>
                                                        {{ date("j F Y", strtotime($userMassage->created_at )) }}
                                                    </td>
                                                    <td>{{ $userMassage->status }}</td>
                                                    <td>
                                                              <!-- Button trigger modal -->
                                                              <button type="button" class="axil-btn view-btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdropshow{{ $loop->iteration }}">
                                                                Show
                                                              </button>
                                                               <!-- Modal -->
                                                               <div class="modal fade" id="staticBackdropshow{{ $loop->iteration }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                  <div class="modal-content">
                                                                    <div class="modal-header">
                                                                      <h5 class="modal-title" id="staticBackdropshow{{ $loop->iteration }}Label">Ticket Details Show</h5>
                                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                      <div class="row">
                                                                         <div class="col-12">
                                                                             <div class="card">
                                                                                 <div class="card-body">
                                                                                   <table class="table table-bordered border-primary">
                                                                                     <thead>
                                                                                     </thead>
                                                                                     <tbody>
                                                                                        <tr>
                                                                                            <th>Image</th>
                                                                                            <th>
                                                                                                 @if ($userMassage->image == 'default.png')
                                                                                                     <img style="height: 80px;width:80px;" src="{{ asset('files/photo/userMassage') }}/{{ $userMassage->image }}" alt="image">
                                                                                                 @else
                                                                                                     <img style="height: 60px;width:60px;" class="img-rounded" src="{{ asset('files') }}/{{ $userMassage->image }}" alt="user Massage Image">
                                                                                                 @endif
                                                                                            </th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                         <th>Ticket Number</th>
                                                                                         <th>{{ $userMassage->ticket_number }}</th>
                                                                                        </tr>
                                                                                       <tr>
                                                                                         <th>Subject</th>
                                                                                         <th>{{ $userMassage->subject }}</th>
                                                                                       </tr>
                                                                                         <tr>
                                                                                         <th>Massage</th>
                                                                                         <th>{{ $userMassage->massage }}</th>
                                                                                       </tr>
                                                                                     </tbody>
                                                                                   </table>
                                                                                 </div>
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                             @if ( $userMassage->reply != ''?$userMassage->reply:'')
                                                             <!-- Button trigger modal -->
                                                               <button type="button" class="axil-btn view-btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropreplyshow{{ $loop->iteration }}">
                                                                Reply Show
                                                               </button>

                                                               <!-- Modal -->
                                                               <div class="modal fade" id="staticBackdropreplyshow{{ $loop->iteration }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                 <div class="modal-dialog">
                                                                   <div class="modal-content">
                                                                     <div class="modal-header">
                                                                       <h5 class="modal-title" id="staticBackdropreplyshow{{ $loop->iteration }}Label"></h5>
                                                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                     </div>
                                                                     <div class="modal-body">
                                                                        <table class="table table-bordered border-primary">
                                                                          <thead>

                                                                          </thead>
                                                                          <tbody>
                                                                            <tr>
                                                                              <th>Subject</th>
                                                                              <th>{{ $userMassage->subject }}</th>
                                                                            </tr>
                                                                            <tr>
                                                                              <th>Ticket Number</th>
                                                                              <th>{{ $userMassage->ticket_number }}</th>
                                                                            </tr>
                                                                              <tr>
                                                                              <th>Massage</th>
                                                                              <th>{{ $userMassage->massage }}</th>
                                                                            </tr>
                                                                              <tr>
                                                                              <th>Reply</th>
                                                                              <th>{{ $userMassage->reply ?? 'N/A'}}</th>
                                                                            </tr>
                                                                          </tbody>
                                                                        </table>
                                                                     </div>
                                                                   </div>
                                                                 </div>
                                                               </div>
                                                             @endif
                                                    </td>
                                                 </tr>
                                                 @empty
                                                <tr>
                                                    <td> No Ticket Found</td>
                                                </tr>
                                                 @endforelse
                                                 
                                            </tbody>
                                            
                                        </table>
                                        {{ $userMassages->links() }}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-downloads" role="tabpanel">
                                <div class="axil-dashboard-order">
                                    <p>You don't have any download</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-address" role="tabpanel">
                                <div class="axil-dashboard-address">
                                    <p class="notice-text">The following addresses will be used on the checkout page by default.</p>
                                    <div class="row row--30">
                                        <div class="col-lg-6">
                                            <div class="address-info mb--40">
                                                <div class="addrss-header d-flex align-items-center justify-content-between">
                                                    <h4 class="title mb-0">Shipping Address</h4>

                                                </div>
                                                @if ($shippingAddress == null)
                                                    <form action="{{ route('frontend.user.storeShippingAddress') }}" method="POST">
                                                        @csrf
                                                        <ul class="address-details">
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                                                    @error('name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email') }}">
                                                                    @error('email')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>Phone</label>
                                                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                                                                    @error('phone')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>Division</label>
                                                                    <select name="division_id" class="single-select @error('division_id') is-invalid @enderror">
                                                                        <option value="">select division</option>
                                                                        @foreach (divisions() as $division)
                                                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('division_id')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>District</label>
                                                                    <select name="district_id" class="single-select @error('district_id') is-invalid @enderror">
                                                                        <option value="">select district</option>
                                                                        @foreach (districts() as $district)
                                                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('district_id')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>

                                                            </li>
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>Thana</label>
                                                                    <select name="thana_id" class="single-select @error('thana_id') is-invalid @enderror">
                                                                        <option value="">select thana</option>
                                                                        @foreach (thanas() as $thana)
                                                                            <option value="{{ $thana->id }}">{{ $thana->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('thana_id')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>Address</label>
                                                                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="" cols="30" rows="1">{{ old('address') }}</textarea>
                                                                    @error('address')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </li>
                                                            <input type="submit" class="axil-btn" value="Add Address">
                                                        </ul>
                                                    </form>
                                                @else
                                                    <form action="{{ route('frontend.user.updateShippingAddress',$shippingAddress->id) }}" method="POST">
                                                        @csrf
                                                        <ul class="address-details">
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $shippingAddress != null?$shippingAddress->name:'' }}">
                                                                    @error('name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="email" class="form-control @error('name') is-invalid @enderror" name="email" value="{{ $shippingAddress != null?$shippingAddress->email:'' }}">
                                                                    @error('email')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>Phone</label>
                                                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $shippingAddress != null?$shippingAddress->phone:'' }}">
                                                                    @error('phone')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>Division</label>
                                                                    <select name="division_id" class="single-select @error('division_id') is-invalid @enderror">
                                                                        <option value="">select division</option>
                                                                        @foreach (divisions() as $division)
                                                                            <option {{ $shippingAddress->division_id == $division->id?'selected':'' }} value="{{ $division->id }}">{{ $division->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('division_id')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>District</label>
                                                                    <select name="district_id" class="single-select @error('district_id') is-invalid @enderror">
                                                                        <option value="">select division</option>
                                                                        @foreach (districts() as $district)
                                                                            <option {{ $shippingAddress->district_id == $district->id?'selected':'' }} value="{{ $district->id }}">{{ $district->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('district_id')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>Thana</label>
                                                                    <select name="thana_id" class="single-select @error('thana_id') is-invalid @enderror">
                                                                        <option value="">select division</option>
                                                                        @foreach (thanas() as $thana)
                                                                            <option {{ $shippingAddress->thana_id == $thana->id?'selected':'' }} value="{{ $thana->id }}">{{ $thana->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('thana_id')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="form-group">
                                                                    <label>Address</label>
                                                                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="" cols="30" rows="1">{{ $shippingAddress != null?$shippingAddress->address:'' }}</textarea>
                                                                    @error('address')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </li>
                                                            <input type="submit" class="axil-btn" value="Update">
                                                        </ul>
                                                    </form>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="address-info">
                                                <div class="addrss-header d-flex align-items-center justify-content-between">
                                                    <h4 class="title mb-0">Billing Address</h4>

                                                </div>
                                                @if ($billingAddress == null)
                                                <form action="{{ route('frontend.user.storeBillingAddress') }}" method="POST">
                                                    @csrf
                                                    <ul class="address-details">
                                                        <li>
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                                                @error('name')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email') }}">
                                                                @error('email')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <label>Phone</label>
                                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                                                                @error('phone')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <label>Division</label>
                                                                <select name="division_id" class="single-select @error('division_id') is-invalid @enderror">
                                                                    <option value="">select division</option>
                                                                    @foreach (divisions() as $division)
                                                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('division_id')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <label>District</label>
                                                                <select name="district_id" class="single-select @error('district_id') is-invalid @enderror">
                                                                    <option value="">select district</option>
                                                                    @foreach (districts() as $district)
                                                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('district_id')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <label>Thana</label>
                                                                <select name="thana_id" class="single-select @error('thana_id') is-invalid @enderror">
                                                                    <option value="">select thana</option>
                                                                    @foreach (thanas() as $thana)
                                                                        <option value="{{ $thana->id }}">{{ $thana->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('thana_id')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <label>Address</label>
                                                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="" cols="30" rows="1">{{ old('address') }}</textarea>
                                                                @error('address')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </li>
                                                        <input type="submit" class="axil-btn" value="Add Address">
                                                    </ul>
                                                </form>
                                            @else
                                                <form action="{{ route('frontend.user.updateBillingAddress',$billingAddress->id) }}" method="POST">
                                                    @csrf
                                                    <ul class="address-details">
                                                        <li>
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $billingAddress != null?$billingAddress->name:'' }}">
                                                                @error('name')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="email" class="form-control @error('name') is-invalid @enderror" name="email" value="{{ $billingAddress != null?$billingAddress->email:'' }}">
                                                                @error('email')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <label>Phone</label>
                                                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $billingAddress != null?$billingAddress->phone:'' }}">
                                                                @error('phone')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <label>Division</label>
                                                                <select name="division_id" class="single-select @error('division_id') is-invalid @enderror">
                                                                    <option value="">select division</option>
                                                                    @foreach (divisions() as $division)
                                                                        <option {{ $billingAddress->division_id == $division->id?'selected':'' }} value="{{ $division->id }}">{{ $division->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('division_id')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <label>District</label>
                                                                <select name="district_id" class="single-select @error('district_id') is-invalid @enderror">
                                                                    <option value="">select division</option>
                                                                    @foreach (districts() as $district)
                                                                        <option {{ $billingAddress->district_id == $district->id?'selected':'' }} value="{{ $district->id }}">{{ $district->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('district_id')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <label>Thana</label>
                                                                <select name="thana_id" class="single-select @error('thana_id') is-invalid @enderror">
                                                                    <option value="">select division</option>
                                                                    @foreach (thanas() as $thana)
                                                                        <option {{ $billingAddress->thana_id == $thana->id?'selected':'' }} value="{{ $thana->id }}">{{ $thana->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('thana_id')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <label>Address</label>
                                                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="" cols="30" rows="1">{{ $billingAddress != null?$billingAddress->address:'' }}</textarea>
                                                                @error('address')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </li>
                                                        <input type="submit" class="axil-btn" value="Update">
                                                    </ul>
                                                </form>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-account" role="tabpanel">
                                <div class="col-lg-9">
                                    <div class="axil-dashboard-account">
                                        <form class="account-details-form" method="POST" action="{{ route('frontend.user.profileUpdate') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Image</label>
                                                        <input type="file" class="form-control @error('name') is-invalid @enderror" name="image">
                                                        @error('image')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::guard('web')->User()->name }}">
                                                        @error('name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control  @error('username') is-invalid @enderror" name="username" value="{{ Auth::guard('web')->User()->username }}">
                                                        @error('username')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group mb--40">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ Auth::guard('web')->User()->email }}">
                                                        @error('email')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group mb--40">
                                                        <label>Phone</label>
                                                        <input type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::guard('web')->User()->phone }}">
                                                        @error('phone')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <h5 class="title">Password Change</h5>
                                                    <div class="form-group">
                                                        <label>Previous Password</label>
                                                        <input type="password" class="form-control @error('previous_password') is-invalid @enderror " name="previous_password">
                                                        @error('previous_password')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input type="password" class="form-control @error('password') is-invalid @enderror " name="password">
                                                        @error('password')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Confirm New Password</label>
                                                        <input type="password" class="form-control" name="password_confirmation">
                                                    </div>
                                                    <div class="form-group mb--0">
                                                        <input type="submit" class="axil-btn" value="Save Changes">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End My Account Area  -->
    <!-- Start Axil Newsletter Area  -->
    <div class="axil-newsletter-area axil-section-gap pt--0">
        <div class="container">
            <div class="etrade-newsletter-wrapper bg_image bg_image--5">
                <div class="newsletter-content">
                    <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>Newsletter</span>
                    <h2 class="title mb--40 mb_sm--30">Get weekly update</h2>
                    <div class="input-group newsletter-form">
                        <div class="position-relative newsletter-inner mb--15">
                            <input placeholder="example@gmail.com" type="text">
                        </div>
                        <button type="submit" class="axil-btn mb--15">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .container -->
    </div>
    <!-- End Axil Newsletter Area  -->
@section('frontend_js')
    @if (Session::has('shipping_address_add_successfully'))
        <script>
            Toast.fire({
                icon: 'success',
                title: "{{ Session::get('shipping_address_add_successfully') }}"
            })
        </script>
    @endif
    @if (Session::has('shipping_address_update_successfully'))
        <script>
            Toast.fire({
                icon: 'success',
                title: "{{ Session::get('shipping_address_update_successfully') }}"
            })
        </script>
    @endif
    @if (Session::has('billing_address_add_successfully'))
        <script>
            Toast.fire({
                icon: 'success',
                title: "{{ Session::get('billing_address_add_successfully') }}"
            })
        </script>
    @endif
    @if (Session::has('billing_address_update_successfully'))
        <script>
            Toast.fire({
                icon: 'success',
                title: "{{ Session::get('billing_address_update_successfully') }}"
            })
        </script>
    @endif
    @if (Session::has('profile_updated_successfully'))
        <script>
            Toast.fire({
                icon: 'success',
                title: "{{ Session::get('profile_updated_successfully') }}"
            })
        </script>
    @endif
    @if (Session::has('previous_password_does_not_match'))
        <script>
            Toast.fire({
                icon: 'error',
                title: "{{ Session::get('previous_password_does_not_match') }}"
            })
        </script>
    @endif
    @if ($errors->any())
        <script>
            Toast.fire({
                icon: 'error',
                title: 'Something Went Wrong try again.'
            })
        </script>
    @endif
        @if (Session::has('send_success'))
        <script>
            Toast.fire({
                icon: 'success',
                title: "{{ Session::get('send_success') }}"
            })
        </script>
    @endif
@endsection
@endsection
