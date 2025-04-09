@extends('user.user-base')

@section('body-content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Create Feedback</h5>
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
                    <h5 class="mb-0">Add Feedback</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ 'add_feedback' }}" method="POST" class="row g-3 needs-validation" novalidate=""
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                          <label class="form-label" for="validationCustom01">Rating</label>
                          <select class="form-control" name="rating" id="">
                            <option value="5">5 Star</option>
                            <option value="4">4 Star</option>
                            <option value="3">3 Star</option>
                            <option value="2">2 Star</option>
                            <option value="1">1 Star</option>
                          </select>

                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="validationCustom02">Message</label>
                            <textarea class="form-control" name="message" id="" cols="30" rows="10"></textarea>
                            <div class="invalid-feedback">Enter a message.</div>
                        </div>
                        <div class="col-12 mt-4">
                            <button class="btn btn-primary" type="submit">Add Feedback</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="vendors/rater-js/index.js"></script>
@endsection
