@php
    $layout = match (Auth::user()->usertype) {
        'admin' => 'admin.admin-base',
        'driver' => 'driver.driver-base',
        default => 'user.user-base',
    };
@endphp

@extends($layout)

<base href="/public">

@section('body-content')

    <div class="row">
        <div class="col-12">
            <div class="card mb-3 btn-reveal-trigger">
                <div class="card-header position-relative min-vh-25 mb-8">
                    <div class="cover-image">
                        <div class="bg-holder rounded-3 rounded-bottom-0"
                            style="background-image:url({{ asset('assets/img/generic/4.jpg') }});">
                        </div>

                        
                    </div>

                    <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
                        <div class="h-100 w-100 rounded-circle overflow-hidden position-relative">
                            <img src="{{$user->profile_photo_path}}" width="200" alt="Profile Photo" />

                            <form action="{{ url('update_profile_photo', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="profile_photo" class="d-none" id="profile-image"
                                    onchange="this.form.submit()" />
                                <label class="mb-0 overlay-icon d-flex flex-center" for="profile-image">
                                    <span class="bg-holder overlay overlay-0"></span>
                                    <span class="z-index-1 text-white text-center fs--1">
                                        <span class="fas fa-camera"></span>
                                        <span class="d-block">Update</span>
                                    </span>
                                </label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row g-0">
        <div class="col-lg-8 pe-lg-2">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Profile Settings</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ url('edit_profile', $user->id) }}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-lg-12">
                            <label class="form-label">Full Name</label>
                            <input name="name" class="form-control" type="text" value="{{ $user->name }}" />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Email Address</label>
                            <input name="email" class="form-control" type="text" value="{{ $user->email }}" />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Phone Number</label>
                            <input name="phone" class="form-control" type="text" value="{{ $user->phone }}" />
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label">Address</label>
                            <input name="address" class="form-control" type="text" value="{{ $user->address }}" />
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Update </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-lg-4 ps-lg-2">
            <div class="sticky-sidebar">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Change Password</h5>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{ url('edit_password', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <div class="mb-3">
                                <label class="form-label" for="old-password">Old Password</label>
                                <input class="form-control @error('old_password') is-invalid @enderror" id="old-password"
                                    type="password" name="old_password" required />
                                @error('old_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="new-password">New Password</label>
                                <input class="form-control @error('new_password') is-invalid @enderror" id="new-password"
                                    type="password" name="new_password" required />
                                @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="confirm-password">Confirm Password</label>
                                <input class="form-control @error('confirm_password') is-invalid @enderror"
                                    id="confirm-password" type="password" name="confirm_password" required />
                                @error('confirm_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-primary d-block w-100" type="submit">Update Password</button>
                        </form>
                    </div>
                </div>

                {{-- <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Danger Zone</h5>
                    </div>
                    <div class="card-body bg-light">
                        <h5 class="fs-0">Delete this account</h5>
                        <p class="fs--1">Once you delete a account, there is no going back. Please be certain.</p><a
                            class="btn btn-falcon-danger d-block" href="#!">Deactivate Account</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

@endsection