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
            <div class="row justify-content-between align-items-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Invoice #VNTRK{{$bill->id}}</h5>
                </div>
                <div class="col-auto">
                    {{-- <button class="btn btn-falcon-default btn-sm me-1 mb-2 mb-sm-0" type="button"><span
                            class="fas fa-arrow-down me-1"> </span>Download (.pdf)</button>
                    <button class="btn btn-falcon-default btn-sm me-1 mb-2 mb-sm-0" type="button"><span
                            class="fas fa-print me-1"> </span>Print</button> --}}
                    <button class="btn btn-falcon-success btn-sm mb-2 mb-sm-0" type="button"><span
                            class="fas fa-dollar-sign me-1"></span>Receive Payment</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="row align-items-center text-center mb-3">
                <div class="col-sm-6 text-sm-start"><img src="homepage\img\web-icon.png" alt="invoice" width="150" /></div>
                <div class="col text-sm-end mt-3 mt-sm-0">
                    <h2 class="mb-3">Invoice</h2>
                    <h5>Vantrack Sdn Bhd</h5>
                    <p class="fs--1 mb-0">16 Jalan SS9/3, Petaling Jaya<br />Selangor</p>
                </div>
                <div class="col-12">
                    <hr />
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="text-500">Invoice to</h6>
                    <h5>{{$bill->user->name}}</h5>
                    <p class="fs--1">{{$bill->user->address}}<br /></p>
                    <p class="fs--1"><a href="">{{$bill->user->email}}</a><br /><a href="">{{$bill->user->phone}}</a></p>
                </div>
                <div class="col-sm-auto ms-auto">
                    <div class="table-responsive">
                        <table class="table table-sm table-borderless fs--1">
                            <tbody>
                                <tr>
                                    <th class="text-sm-end">Invoice No:</th>
                                    <td>{{$bill->id}}</td>
                                </tr>
                                <tr>
                                    <th class="text-sm-end">Order Number:</th>
                                    <td>VNTRK{{$bill->id}}</td>
                                </tr>
                                <tr>
                                    <th class="text-sm-end">Invoice Date:</th>
                                    <td>2018-09-25</td>
                                </tr>
                                <tr>
                                    <th class="text-sm-end">Payment Status:</th>
                                    <td>{{$bill->status}}</td>
                                </tr>

                                @if ($bill->status == 'Paid')
                                    <tr class="alert-success fw-bold">
                                        <th class="text-sm-end">Amount:</th>
                                        <td>RM {{$bill->amount}}</td>
                                    </tr>
                                @else
                                    <tr class="alert-danger fw-bold">
                                        <th class="text-sm-end">Amount Due:</th>
                                        <td>RM {{$bill->amount}}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="table-responsive scrollbar mt-4 fs--1">
                <table class="table table-striped border-bottom">
                    <thead class="light">
                        <tr class="bg-primary text-white dark__bg-1000">
                            <th class="border-0">Service</th>
                            <th class="border-0 text-center">Quantity</th>
                            <th class="border-0 text-end">Rate</th>
                            <th class="border-0 text-end">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle">
                                <h6 class="mb-0 text-nowrap">{{$bill->student->full_name}}</h6>
                                <h6 class="mb-0 text-nowrap">{{$bill->student->district}} -></h6>
                                <p class="mb-0">{{$bill->student->school->name}}</p>
                            </td>
                            <td class="align-middle text-center">1</td>
                            <td class="align-middle text-end">{{$bill->amount}}</td>
                            <td class="align-middle text-end">{{$bill->amount}}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="row justify-content-end">
                <div class="col-auto">
                    <table class="table table-sm table-borderless fs--1 text-end">

                        <tr class="border-top">
                            <th class="text-900">Total:</th>
                            <td class="fw-semi-bold">{{$bill->amount}}</td>
                        </tr>
                        <tr class="border-top border-top-2 fw-bolder text-900">
                            <th>Amount Due:</th>
                            <td>{{$bill->amount}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="row g-0">
        <div class="col-lg-8 pe-lg-2 mb-3">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-0">Payment Proof</h5>
                </div>
                <div class="card-body bg-light">
                    <div class="d-flex justify-content-center">
                        @php
                            $extension = pathinfo($bill->receipt, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array($extension, ['jpg', 'jpeg', 'png']))

                            <a href="{{ asset('storage/' . $bill->receipt) }}" data-gallery="gallery-2">
                                <img class="img-fluid rounded" src="{{ asset('storage/' . $bill->receipt) }}"
                                    alt="Payment Proof" width="500" />
                            </a>
                        @elseif($extension === 'pdf')
                            <iframe src="{{ asset('storage/' . $bill->receipt) }}" width="100%" height="600px"
                                style="border: none;">
                                This browser does not support PDFs. Please download the PDF to view it:
                                <a href="{{ asset('storage/' . $bill->receipt) }}">Download PDF</a>
                            </iframe>
                        @else
                            <p class="text-danger">Unsupported file format.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>



        <div class="col-lg-4 ps-lg-2 mb-3">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-0">Verify</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ url('edit_status', $bill->id) }}" method="POST" class="row g-3 needs-validation"
                        novalidate="" enctype="multipart/form-data">
                        @csrf
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <select name="status" class="form-select mb-3" aria-label="Default select example">
                            <option selected="{{$bill->status}}">{{$bill->status}}</option>
                            <option value="Unpaid">Unpaid</option>
                            <option value="Paid">Paid</option>
                        </select>

                        <div class="d-flex justify-content-between fs--1 mb-1">
                            <p class="mb-0">Due in</p><span>{{$bill->due_date}}</span>
                        </div>
                        <hr />
                        <h5 style="margin: 0;" class="d-flex justify-content-between"><span>Paid
                                Amount</span><span>{{$bill->amount}}</span>
                        </h5>
                        <p style="margin: 0;" class="fs--1 text-600"> Please make sure to double-check the payment details
                            and ensure it is
                            made to
                            the official VanTrack bank account.</p>
                        <button class="btn btn-primary d-block w-100" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection