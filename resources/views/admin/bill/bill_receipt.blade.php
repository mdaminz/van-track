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

    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            .card,
            .card * {
                visibility: visible;
            }

            .card {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }

            button {
                display: none !important;
            }
        }
    </style>

    <div class="card mb-3">
        <div class="card-body">
            <div class="row justify-content-between align-items-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Invoice #VNTRK{{$bill->id}}</h5>
                </div>
                <div class="col-auto">
                    <button onclick="window.print()" class="btn btn-falcon-default btn-sm me-1 mb-2 mb-sm-0"
                        type="button"><span class="fas fa-arrow-down me-1"> </span>Download (.pdf)</button>


                    @if ($bill->status == 'Paid' && $bill->receipt)
                        <a href="{{ asset('storage/' . $bill->receipt) }}" class="btn btn-falcon-success btn-sm mb-2 mb-sm-0"
                            download>
                            <span class="fas fa-dollar-sign me-1"></span>Payment Receipt
                        </a>
                    @endif

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
                    <p class="fs--1">{{$bill->user->email}}<br />{{$bill->user->phone}}</p>

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
                                    <th class="text-sm-end">Invoice Number:</th>
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
                                {{-- <tr>
                                    <th class="text-sm-end">Remarks:</th>
                                    <td>{{$bill->remarks}}</td>
                                </tr> --}}

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

        @if (!empty($bill->remarks))
            <div class="card-footer bg-light">
                <p class="fs--1 mb-0"><strong>Remarks: </strong>{{$bill->remarks}}</p>
            </div>
        @else
            <div class="card-footer bg-light">
                <p class="fs--1 mb-0"><strong>Notes: </strong>We really appreciate your business and if there’s anything else we
                    can do, please let us know!</p>
            </div>
        @endif
    </div>
@endsection