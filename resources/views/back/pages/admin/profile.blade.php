@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Admin profile')
@section('content')
    <div class="row">

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
            <div class="pd-20 card-box height-100-p">
                <div class="profile-photo">

                    <a href="#" class="edit-avatar" data-toggle="modal" data-target="#profilePicture-modal" type="button">
                        <i class="fa fa-pencil"></i>
                    </a>
                    {{-- modal start --}}
                    <div class="modal fade" id="profilePicture-modal" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">
                                        Upload New Profile picture
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        ×
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                    <form action="{{ route('admin.profile-picture-update-handler') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Select a picture from your device</label>
                                            <input type="file" name="picture"
                                                class="form-control-file form-control height-auto">
                                            @error('picture')
                                                <div style="color: red">{{ $message }}</div><br>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal End --}}
                    @if ($admin->picture)
                    <img src="/uploads/admin-profile/{{ $admin->picture }}" alt="profile-picture" class="avatar-photo">
                    @else
                    <img src="/back/vendors/images/photo1.jpg" alt="profile-picture" class="avatar-photo">
                    @endif

                </div>
                <h5 class="text-center h5 mb-0">{{ $admin->name }}</h5>
                <p class="text-center text-muted font-14">
                    Username: {{ $admin->username }}
                </p>

            </div>
        </div>

        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
            <div class="card-box height-100-p overflow-hidden">
                @if (Session::get('fail'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('fail') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif

                @if (Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif

                <div class="profile-tab height-100-p">
                    <div class="tab height-100-p">
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#PersonalDetails" role="tab"
                                    aria-selected="true">Persoanl Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#UpdatePassword" role="tab"
                                    aria-selected="false">Update Password</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- PersonalDetails Tab start -->
                            <div class="tab-pane fade active show" id="PersonalDetails" role="tabpanel">
                                <div class="pd-20">
                                    {{-- <form action="{{ route('admin.profile-update', $admin->id) }}" method="POST"> --}}
                                    <form action="{{ route('admin.profile-update') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" value="{{ $admin->name }}"
                                                        placeholder="Your Name" class="form-control" required>
                                                    @error('name')
                                                        <div style="color: red">{{ $message }}</div><br>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" value="{{ $admin->email }}"
                                                        placeholder="Your Email" class="form-control" required>
                                                    @error('email')
                                                        <div style="color: red">{{ $message }}</div><br>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" name="username" value="{{ $admin->username }}"
                                                        placeholder="Your User Name" class="form-control" readonly
                                                        required>
                                                    @error('username')
                                                        <div style="color: red">{{ $message }}</div><br>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save Change</button>
                                    </form>

                                </div>
                            </div>
                            <!-- PersonalDetails Tab End -->
                            <!-- UpdatePassword Tab start -->
                            <div class="tab-pane fade" id="UpdatePassword" role="tabpanel">
                                <div class="pd-20 profile-task-wrap">
                                    {{-- <form action="{{ route('admin.password-update', $admin->id) }}" method="POST"> --}}
                                    <form action="{{ route('admin.password-update') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label>Old Password</label>
                                                    <input type="text" name="oldpassword" placeholder="Old Password"
                                                        class="form-control">
                                                    @error('oldpassword')
                                                        <div style="color: red">{{ $message }}</div><br>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label>New Password</label>
                                                    <input type="text" name="new_password" placeholder="New Password"
                                                        class="form-control">
                                                    @error('new_password')
                                                        <div style="color: red">{{ $message }}</div><br>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label>Confirm New Password</label>
                                                    <input type="text" name="new_password_confirmation"
                                                        placeholder="Confirm New Password" class="form-control">
                                                    @error('new_password_confirmation')
                                                        <div style="color: red">{{ $message }}</div><br>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Password</button>
                                    </form>
                                </div>
                            </div>
                            <!-- UpdatePassword Tab End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
