@extends('user.user-base')

@section('body-content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Report</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-0">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Send Report</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ 'add_report' }}" method="POST" class="row g-3 needs-validation" novalidate=""
                        enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-12">
                            <label class="form-label" for="validationCustom01">Report Type</label>
                            <select class="form-control" name="type" id="">
                                <option value="Lost RFID Tag">Lost RFID Tag</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="validationCustom02">Subject</label>
                            <input name="subject" class="form-control" id="validationCustom02" type="text"
                                required="" />
                            <div class="invalid-feedback">Enter a Subject.</div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="validationCustom02">Message</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                            <div class="invalid-feedback">Enter a message.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom05">Upload Image</label>
                            <input name="image" class="form-control" type="file" id="validationCustom05" />
                        </div>
                        <div class="col-12 mt-4">
                            <button class="btn btn-primary" type="submit">Send Report</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="vendors/rater-js/index.js"></script>
@endsection
