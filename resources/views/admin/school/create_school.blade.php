@extends('admin.admin-base')

@section('body-content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Add School</h5>
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
                    <h5 class="mb-0">School Information</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ 'add_school' }}" method="POST" class="row g-3 needs-validation" novalidate=""
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label" for="validationCustom01">School Name</label>
                            <input name="name" class="form-control" id="validationCustom01" type="text" required="" />
                            <div class="invalid-feedback">Enter School Name.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom02">First Address</label>
                            <input name="first_address" class="form-control" id="validationCustom02" type="text" required="" />
                            <div class="invalid-feedback">Enter First Address.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom03">Second Address</label>
                            <input name="second_address" class="form-control" id="validationCustom03" type="text" required="" />
                            <div class="invalid-feedback">Enter Second Address.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom04">School Type</label>
                            <select name="type" class="form-select" id="validationCustom04" required="">
                                <option selected="" disabled="" value="">Choose...</option>
                                <option value="first">Primary School</option>
                                <option value="second">Secondary School</option>
                            </select>
                            <div class="invalid-feedback">Please select a school type.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom05">Upload Image</label>
                            <input name="image" class="form-control" type="file" id="validationCustom05" />
                        </div>
                        <div class="col-12 mt-4">
                            <button class="btn btn-primary" type="submit">Add School</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
