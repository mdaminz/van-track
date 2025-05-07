@extends('admin.admin-base')

<base href="/public">

@section('body-content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Update Rate</h5>
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
                    <h5 class="mb-0">Update Rate</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ url('edit_rate', $rate->id) }}" method="POST" class="row g-3 needs-validation"
                        novalidate="" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom02">District</label>
                            <select class="form-control" name="district" id="">
                                <option selected value="{{$rate->district}}">{{$rate->district}}</option>

                                <option value="Kelana Jaya">Kelana Jaya</option>
                                <option value="Sungai Way">Sungai Way</option>
                            </select>
                            <div class="invalid-feedback">Enter a District Name.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom01">School</label>
                            <select class="form-control" name="school_id" id="">
                                <option disabled="" value="{{$rate->school_id}}">{{$rate->school->name}}</option>
                                @foreach ($schools as $schools)
                                    <option value="{{$schools->id}}">{{$schools->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom03">Price</label>
                            <input value="{{$rate->price}}" name="price" class="form-control" id="validationCustom03"
                                type="number" required="" />
                            <div class="invalid-feedback">Enter a Price.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom04">Van</label>
                            <select class="form-control" name="van_id" id="">
                                <option selected value="{{$rate->van_id}}">{{$rate->van->license_plate}}</option>
                                @foreach ($vans as $vans)
                                    <option value="{{$vans->id}}">{{$vans->license_plate}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom05">Pickup Time (To school)</label>
                            <input value="{{$rate->start_time}}" name="start_time" class="form-control" id="validationCustom05" type="time" required="" />
                            <div class="invalid-feedback">Enter a Pickup Time (To school).</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom06">Pickup Time (Back home)</label>
                            <input value="{{$rate->end_time}}" name="end_time" class="form-control" id="validationCustom06" type="time" required="" />
                            <div class="invalid-feedback">Enter a Pickup Time (Back home).</div>
                        </div>

                        <div class="col-12 mt-4">
                            <button class="btn btn-primary" type="submit">Update Rate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="vendors/rater-js/index.js"></script>
@endsection