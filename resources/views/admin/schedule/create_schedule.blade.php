@extends('admin.admin-base')

@section('body-content')
    <link href="vendors/flatpickr/flatpickr.min.css" rel="stylesheet" />


    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Add Schedule</h5>
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
                    <h5 class="mb-0">Schedule Information</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ 'add_schedule' }}" method="POST" class="row g-3 needs-validation" novalidate=""
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label" for="validationCustom01">Route Name</label>
                            <input name="route_name" class="form-control" id="validationCustom01" type="text"
                                required="" />
                            <div class="invalid-feedback">Enter Route Name.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom02">Start Location</label>
                            <input name="start_location" class="form-control" id="validationCustom02" type="text"
                                required="" />
                            <div class="invalid-feedback">Enter Start Location.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom03">End Location</label>
                            <input name="end_location" class="form-control" id="validationCustom03" type="text"
                                required="" />
                            <div class="invalid-feedback">Enter End Location.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom04">Start Time</label>
                            <input name="start_time" class="form-control datetimepicker" id="timepicker1 validationCustom04" type="text"
                            data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' required=""/>
                            <div class="invalid-feedback">Enter Start Time.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom05">End Time</label>
                            <input name="end_time" class="form-control datetimepicker" id="validationCustom05" type="text"
                                data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' required=""/>
                            <div class="invalid-feedback">Enter End Time.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom06">Price</label>
                            <input name="price" class="form-control" id="validationCustom06" type="text"
                                required="" />
                            <div class="invalid-feedback">Enter End Time.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Notes</label>
                            <input name="notes" class="form-control" type="text" required="" />
                        </div>

                        <div class="col-12 mt-4">
                            <button class="btn btn-primary" type="submit">Add Route</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="assets/js/flatpickr.js"></script>
@endsection
