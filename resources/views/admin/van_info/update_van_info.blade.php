@extends('admin.admin-base')

<base href="/public">

@section('body-content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Update Van</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-0">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Update Van Information</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{url('edit_van_info', $vans->id)}}" method="POST" class="row g-3 needs-validation" novalidate=""
                        enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom02">License Plate</label>
                            <input value="{{$vans->license_plate}}" name="license_plate" class="form-control" id="validationCustom02" type="text"
                                required="" />
                            <div class="invalid-feedback">Enter a License Plate.</div>
                        </div>


                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom03">Capacity</label>
                            <input value="{{$vans->capacity}}" name="capacity" class="form-control" id="validationCustom03" type="text" required="" />
                            <div class="invalid-feedback">Enter a Capacity.</div>
                        </div>


                        <div class="col-md-12">
                            <label class="form-label" for="validationCustom01">Driver Name</label>
                            <select class="form-control" name="user_id" id="">
                                <option selected value="{{$vans->user_id}}">{{$vans->user_id}}</option>
                                @foreach ($drivers as $drivers)
                                    <option value="{{$drivers->id}}">{{$drivers->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="col-md-6">
                            <label class="form-label" for="validationCustom04">Capacity</label>
                            <input name="capacity" class="form-control" id="validationCustom04" type="text" required="" />
                            <div class="invalid-feedback">Enter a Capacity.</div>
                        </div> --}}



                        <div class="col-12 mt-4">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection