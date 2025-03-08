@extends('admin.admin-base')

@section('body-content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Add Student</h5>
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
                    <h5 class="mb-0">Add Student</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ 'add_student' }}" method="POST" class="row g-3 needs-validation" novalidate=""
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label" for="validationCustom01">Full Name</label>
                            <input name="full_name" class="form-control" id="validationCustom01" type="text"
                                required="" />
                            <div class="invalid-feedback">Enter full name.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom02">Date Of Birth</label>
                            <input name="date_of_birth" class="form-control" id="validationCustom02" type="date"
                                required="" />
                            <div class="invalid-feedback">Enter date of birth.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom03">Status</label>
                            <select name="relationship" class="form-select" id="validationCustom03" required="">
                                <option selected="" disabled="" value="">Choose...</option>
                                <option value="Active">Active</option>
                                <option value="Non Active">Non Active</option>
                            </select>
                            <div class="invalid-feedback">Please select your relationship.</div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="validationCustom05">Address</label>
                            <input name="address" class="form-control" id="validationCustom05" type="text"
                                required="" />
                            <div class="invalid-feedback">Enter an address.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom04">Emergency Contact</label>
                            <input name="emergency_contact" class="form-control" id="validationCustom04" type="text"
                                required="" />
                            <div class="invalid-feedback">Enter an emergency contact.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom06">Profile Photo</label>
                            <input name="profile_photo" class="form-control" type="file" id="validationCustom06" />
                        </div>
                        <div class="col-12 mt-4">
                            <button class="btn btn-primary" type="submit">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
