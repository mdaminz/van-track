@extends('admin.admin-base')

<base href="/public">

@section('body-content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Update Student</h5>
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
                    <h5 class="mb-0">Student Information</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ url('admin_edit_student', $students->id) }}" method="POST" class="row g-3 needs-validation"
                        novalidate="" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label" for="validationCustom01">Full Name</label>
                            <input value="{{ $students->full_name }}" name="full_name" class="form-control"
                                id="validationCustom01" type="text" required="" />
                            <div class="invalid-feedback">Enter full name.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom02">Date Of Birth</label>
                            <input value="{{ $students->date_of_birth }}" name="date_of_birth" class="form-control"
                                id="validationCustom02" type="date" required="" />
                            <div class="invalid-feedback">Enter date of birth.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom03">Relationship</label>
                            <select name="relationship" class="form-select" id="validationCustom03" required="">
                                <option selected="value={{ $students->relationship }}" selected>
                                    {{ $students->relationship }}</option>
                                <option value="Father">Father</option>
                                <option value="Mother">Mother</option>
                                <option value="Grandfather">Grandfather</option>
                                <option value="Grandmother">Grandmother</option>
                                <option value="Guardian">Guardian</option>
                                <option value="Sibling">Sibling</option>
                            </select>
                            <div class="invalid-feedback">Please select your relationship.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom05">Address</label>
                            <input value="{{ $students->address }}" name="address" class="form-control"
                                id="validationCustom05" type="text" required="" />
                            <div class="invalid-feedback">Enter an address.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom04">Emergency Contact</label>
                            <input value="{{ $students->emergency_contact }}" name="emergency_contact" class="form-control"
                                id="validationCustom04" type="text" required="" />
                            <div class="invalid-feedback">Enter an emergency contact.</div>
                        </div>
                        {{-- <div class="col-md-6">
                            <label class="form-label" for="validationCustom06">Profile Photo</label>
                            <input name="profile_photo" class="form-control" type="file" id="validationCustom06" />
                            <img style="height: 200px;" src="student/{{ $students->profile_photo }}" alt="">
                        </div> --}}
                        <div class="col-md-6">
                            <label class="form-label">RFID Tag</label>
                            <input value="{{ $students->rfid_tag }}" name="rfid_tag" class="form-control" type="text" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select" id="validationCustom07" required="">
                                <option selected="value={{ $students->status }}" selected>
                                    {{ $students->status }}</option>
                                <option value="Active">Active</option>
                                <option value="Nonactive">Nonactive</option>
                            </select>
                            <div class="invalid-feedback">Please select your relationship.</div>
                        </div>

                        <input value="{{ $students->user_id }}" name="user_id" class="form-control" type="text" hidden/>

                        <div class="col-12 mt-4">
                            <button class="btn btn-primary" type="submit">Update Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
