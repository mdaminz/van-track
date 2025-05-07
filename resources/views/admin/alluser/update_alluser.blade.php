@extends('admin.admin-base')

<base href="/public">

@section('body-content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Update User</h5>
                </div>
                {{-- <div class="col-auto">
                    <button class="btn btn-falcon-default btn-sm me-2" role="button">Add</button>
                </div> --}}
            </div>
        </div>
    </div>
    {{-- <div class="card cover-image mb-3"><img class="card-img-top" src="../../assets/img/generic/13.jpg" alt="" />
        <input class="d-none" id="upload-cover-image" type="file" />
        <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change
                cover photo</span></label>
    </div> --}}
    <div class="row g-0">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">User Information</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ url('edit_alluser', $alluser_data->id) }}" method="POST"
                        class="row g-3 needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom01">Full Name</label>
                            <input value="{{ $alluser_data->name }}" name="name" class="form-control"
                                id="validationCustom01" type="text" required="" />
                            <div class="invalid-feedback">Enter full name.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom02">Email</label>
                            <input value="{{ $alluser_data->email }}" name="email" class="form-control"
                                id="validationCustom02" type="text" required="" />
                            <div class="invalid-feedback">Enter an email.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom05">Phone Number</label>
                            <input value="{{ $alluser_data->phone }}" name="phone" class="form-control"
                                id="validationCustom05" type="text" required="" />
                            <div class="invalid-feedback">Enter a Phone Number.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom04">Address</label>
                            <input value="{{ $alluser_data->address }}" name="address" class="form-control"
                                id="validationCustom04" type="text" required="" />
                            <div class="invalid-feedback">Enter an address.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom08">User Type</label>
                            <select name="usertype" class="form-select" id="validationCustom08" required="">
                                @if ($alluser_data->usertype == 'admin')
                                    <option selected="admin" value="admin" selected>
                                        Driver
                                    </option>
                                @elseif ($alluser_data->usertype == 'driver')
                                    <option selected="driver" value="driver" selected>
                                        Driver
                                    </option>
                                @elseif ($alluser_data->usertype == 'user')
                                    <option selected="user" value="user" selected>
                                        Parent
                                    </option>
                                @endif
                                <option value="admin">Admin</option>
                                <option value="driver">Driver</option>
                                <option value="user">Parent</option>
                            </select>
                            <div class="invalid-feedback">Select an usertype.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select" id="validationCustom07" required="">
                                <option selected="value={{ $alluser_data->status }}" selected>
                                    {{ $alluser_data->status }}
                                </option>
                                <option value="Active">Active</option>
                                <option value="Nonactive">Inactive</option>
                            </select>
                            <div class="invalid-feedback">Please select a status.</div>
                        </div>


                        <div class="col-12 mt-4">
                            <button class="btn btn-primary" type="submit">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection