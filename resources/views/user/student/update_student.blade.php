@extends('user.user-base')

<base href="/public">

@section('body-content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Update Child</h5>
                </div>
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
                    <h5 class="mb-0">Update Child</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ url('edit_student', $student_data->id) }}" method="POST"
                        class="row g-3 needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label" for="validationCustom01">Full Name</label>
                            <input value="{{ $student_data->full_name }}" name="full_name" class="form-control"
                                id="validationCustom01" type="text" required="" />
                            <div class="invalid-feedback">Enter full name.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom02">Date Of Birth</label>
                            <input value="{{ $student_data->date_of_birth }}" name="date_of_birth" class="form-control"
                                id="validationCustom02" type="date" required="" />
                            <div class="invalid-feedback">Enter date of birth.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom03">Relationship</label>
                            <select name="relationship" class="form-select" id="validationCustom03" required="">
                                <option value="{{ $student_data->relationship }}" selected>
                                    {{ $student_data->relationship }}
                                </option>
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
                            <label class="form-label" for="validationCustom06">Profile Photo</label>
                            <input name="profile_photo" class="form-control" type="file" id="validationCustom06" />
                            <img style="height: 200px;" src="student/{{ $student_data->profile_photo }}" alt="">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom04">Emergency Contact</label>
                            <input value="{{ $student_data->emergency_contact }}" name="emergency_contact"
                                class="form-control" id="validationCustom04" type="text" required="" />
                            <div class="invalid-feedback">Enter an emergency contact.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom05">Address</label>
                            <input value="{{ $student_data->address }}" name="address" class="form-control"
                                id="validationCustom05" type="text" required="" />
                            <div class="invalid-feedback">Enter an address.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom07">Postcode</label>
                            <input value="{{ $student_data->postcode }}" name="postcode" class="form-control"
                                id="validationCustom07" type="text" required="" />
                            <div class="invalid-feedback">Enter a postcode.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom04">School</label>
                            <select name="school_id" class="form-select" id="validationCustom04" required="">
                                <option value="{{$student_data->school->id}}" selected>
                                    {{$student_data->school->name}}
                                </option>
                                @foreach ($rate->unique('school_id') as $rate)
                                    <option value="{{$rate->school->id}}">{{$rate->school->name}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please select a school.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom08">House Area</label>
                            <select name="district" class="form-select" id="validationCustom08" required="">
                                <option disabled="" value="{{ $student_data->district }}">
                                    {{ $student_data->district }}
                                </option>
                                @foreach ($rates->unique('district') as $rates)
                                    <option value="{{$rates->district}}">{{$rates->district}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please select your relationship.</div>
                        </div>

                        <div class="col-12 mt-4">
                            <button class="btn btn-primary" type="submit">Update Child</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection