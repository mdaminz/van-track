@php
  $layout = match (Auth::user()->usertype) {
    'admin' => 'admin.admin-base',
    'driver' => 'driver.driver-base',
    default => 'user.user-base',
  };
@endphp

@extends($layout)

<base href="/public">

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
                    <h5 class="mb-0">Update Report</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ url('edit_report', $report_data->id) }}" method="POST" class="row g-3 needs-validation"
                        novalidate="" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-12">
                            <label class="form-label" for="validationCustom01">Status</label>
                            <select class="form-control" name="status" id="">
                                <option value="{{$report_data->status}}">{{$report_data->status}}</option> selected
                                <option value="Resolved">Resolved</option>
                                <option value="Unresolved">Unresolved</option>
                            </select>
                        </div>

                        <input name="resolved_at" type="text" hidden>

                        <div class="col-md-12">
                            <label class="form-label" for="validationCustom02">Remarks</label>
                            <textarea class="form-control" name="remarks" id="" cols="30"
                                rows="10">{{$report_data->remarks}}</textarea>
                            <div class="invalid-feedback">Enter a remarks.</div>
                        </div>

                        <div class="col-12 mt-4">
                            <button class="btn btn-primary" type="submit">Update Report</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="vendors/rater-js/index.js"></script>
@endsection