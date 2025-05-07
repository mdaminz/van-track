@php
    $layout = match (Auth::user()->usertype) {
        'admin' => 'admin.admin-base',
        'driver' => 'driver.driver-base',
        default => 'user.user-base',
    };
@endphp

@extends($layout)


@section('body-content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);">
        </div>

        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Bill Management</h3>
                    <p class="mb-0">Below is the list of all students currently registered by thier parent in the system.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3" id="table-student"
        data-list='{"valueNames":["name", "no", "rfid", "contact", "address", "status"],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Unpaid Bills</h5>
                </div>
                
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar">

                <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="sort" style="min-width: 3rem;" data-sort="no">No</th>
                            <th class="sort" style="min-width: 10rem;" data-sort="name">Student Name</th>
                            <th class="sort" style="min-width: 5rem;" data-sort="name">School</th>
                            <th class="sort" style="min-width: 5rem;" data-sort="name">Address</th>
                            <th class="sort" style="min-width: 5rem;" data-sort="rfid">Amount</th>

                            <th class="sort" style="min-width: 5rem;" data-sort="address">Due</th>
                            <th class="sort" style="min-width: 5rem;" data-sort="status">Status</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-student">
                        @php
                            $number = 1;
                        @endphp
                        @foreach ($unpaidBills as $unpaidBills)
                            <tr class="btn-reveal-trigger">

                                <td class="no align-middle">VNTRK{{ $unpaidBills->id }}</td>
                                <td class="name align-middle">{{ $unpaidBills->student->full_name }}</td>
                                <td class="name align-middle">{{ $unpaidBills->student->school->name }}</td>
                                <td class="name align-middle">{{ $unpaidBills->student->address }}</td>
                                <td class="rifd align-middle">RM {{ $unpaidBills->amount }}</td>

                                </td>
                                <td class="address align-middle">{{ $unpaidBills->due_date}}
                                </td>
                                @if ($unpaidBills->status == 'Paid')
                                    <td class="align-middle"><span
                                            class="badge badge rounded-pill d-block py-2 badge-soft-success">Paid<span
                                                class="fas fa-check" data-fa-transform="shrink-2"></span></span>
                                    </td>
                                @else
                                    <td class="align-middle"><span
                                            class="badge badge rounded-pill d-block p-2 badge-soft-secondary">{{$unpaidBills->status}}<span
                                                class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>
                                @endif
                                </td>
                                <td class="align-middle text-end">
                                    <div class="dropdown font-sans-serif position-static">
                                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button"
                                            id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport"
                                            aria-haspopup="true" aria-expanded="false"><span
                                                class="fas fa-ellipsis-h fs--1"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                            aria-labelledby="order-dropdown-0">
                                            <div class="bg-white py-2">
                                                {{-- <a class="dropdown-item"
                                                    href="{{ url('pay_bill', $unpaidBills->id) }}">Pay</a> --}}

                                                <a href="#" class="dropdown-item pay-btn" data-id="{{ $unpaidBills->id }}"
                                                    data-bs-toggle="modal" data-bs-target="#error-modal">
                                                    Pay
                                                </a>

                                                {{-- <a class="dropdown-item" href="">Verify</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="">Delete</a> --}}

                                            </div>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#error-modal">Launch
                demo
                modal</button> --}}
            <div class="d-flex align-items-center justify-content-center">
                <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous"
                    data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                <ul class="pagination mb-0"></ul>
                <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next"
                    data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
            </div>
        </div>
    </div>
    <div class="card mb-3" id="table-student"
        data-list='{"valueNames":["name", "no", "rfid", "contact", "address", "status"],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Pending Bills</h5>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar">

                <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="sort" style="min-width: 3rem;" data-sort="no">No</th>
                            <th class="sort" style="min-width: 10rem;" data-sort="name">Student Name</th>
                            <th class="sort" style="min-width: 5rem;" data-sort="name">School</th>
                            <th class="sort" style="min-width: 5rem;" data-sort="name">Address</th>
                            <th class="sort" style="min-width: 5rem;" data-sort="rfid">Amount</th>

                            <th class="sort" style="min-width: 5rem;" data-sort="address">Due</th>
                            <th class="sort" style="min-width: 5rem;" data-sort="status">Status</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-student">
                        @php
                            $number = 1;
                        @endphp
                        @foreach ($pendingBills as $pendingBills)
                            <tr class="btn-reveal-trigger">

                                <td class="no align-middle">VNTRK{{ $pendingBills->id }}</td>
                                <td class="name align-middle">{{ $pendingBills->student->full_name }}</td>
                                <td class="name align-middle">{{ $pendingBills->student->school->name }}</td>
                                <td class="name align-middle">{{ $pendingBills->student->address }}</td>
                                <td class="rifd align-middle">RM {{ $pendingBills->amount }}</td>

                                </td>
                                <td class="address align-middle">{{ $pendingBills->due_date}}
                                </td>
                                @if ($pendingBills->status == 'Paid')
                                    <td class="align-middle"><span
                                            class="badge badge rounded-pill d-block py-2 badge-soft-success">Paid<span
                                                class="fas fa-check" data-fa-transform="shrink-2"></span></span>
                                    </td>
                                @else
                                    <td class="align-middle"><span
                                            class="badge badge rounded-pill d-block p-2 badge-soft-secondary">{{$pendingBills->status}}<span
                                                class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>
                                @endif
                                </td>
                                {{-- <td class="align-middle text-end">
                                    <div class="dropdown font-sans-serif position-static">
                                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button"
                                            id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport"
                                            aria-haspopup="true" aria-expanded="false"><span
                                                class="fas fa-ellipsis-h fs--1"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                            aria-labelledby="order-dropdown-0">
                                            <div class="bg-white py-2">
                                                <a class="dropdown-item"
                                                    href="{{ url('pay_bill', $unpaidBills->id) }}">Pay</a>

                                                <a href="#" class="dropdown-item pay-btn" data-id="{{ $unpaidBills->id }}"
                                                    data-bs-toggle="modal" data-bs-target="#error-modal">
                                                    Pay
                                                </a>

                                                <a class="dropdown-item" href="">Verify</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="">Delete</a>

                                            </div>
                                        </div>

                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#error-modal">Launch
                demo
                modal</button> --}}
            <div class="d-flex align-items-center justify-content-center">
                <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous"
                    data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                <ul class="pagination mb-0"></ul>
                <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next"
                    data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
            </div>
        </div>
    </div>
    <div class="card mb-3" id="table-student"
        data-list='{"valueNames":["name", "no", "rfid", "contact", "address", "status"],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Paid Bills</h5>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar">

                <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                    <thead class="bg-200 text-900">
                        <tr>
                            <th class="sort" style="min-width: 3rem;" data-sort="no">No</th>
                            <th class="sort" style="min-width: 10rem;" data-sort="name">Student Name</th>
                            <th class="sort" style="min-width: 5rem;" data-sort="name">School</th>
                            <th class="sort" style="min-width: 5rem;" data-sort="name">Address</th>
                            <th class="sort" style="min-width: 5rem;" data-sort="rfid">Amount</th>

                            <th class="sort" style="min-width: 5rem;" data-sort="address">Due</th>
                            <th class="sort" style="min-width: 5rem;" data-sort="status">Status</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-student">
                        @php
                            $number = 1;
                        @endphp
                        @foreach ($paidBills as $paidBills)
                            <tr class="btn-reveal-trigger">

                                <td class="no align-middle">VNTRK{{ $paidBills->id }}</td>
                                <td class="name align-middle">{{ $paidBills->student->full_name }}</td>
                                <td class="name align-middle">{{ $paidBills->student->school->name }}</td>
                                <td class="name align-middle">{{ $paidBills->student->address }}</td>
                                <td class="rifd align-middle">RM {{ $paidBills->amount }}</td>

                                </td>
                                <td class="address align-middle">{{ $paidBills->due_date}}
                                </td>
                                @if ($paidBills->status == 'Paid')
                                    <td class="align-middle"><span
                                            class="badge badge rounded-pill d-block py-2 badge-soft-success">Paid<span
                                                class="fas fa-check" data-fa-transform="shrink-2"></span></span>
                                    </td>
                                @else
                                    <td class="align-middle"><span
                                            class="badge badge rounded-pill d-block p-2 badge-soft-secondary">{{$paidBills->status}}<span
                                                class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>
                                @endif
                                </td>
                                <td class="align-middle text-end">
                                    <div class="dropdown font-sans-serif position-static">
                                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button"
                                            id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport"
                                            aria-haspopup="true" aria-expanded="false"><span
                                                class="fas fa-ellipsis-h fs--1"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                            aria-labelledby="order-dropdown-0">
                                            <div class="bg-white py-2">
                                                <a class="dropdown-item"
                                                    href="{{ url('bill_receipt', $paidBills->id) }}">Receipt</a>

                                                {{-- <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="">Delete</a> --}}

                                            </div>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex align-items-center justify-content-center">
                <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous"
                    data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                <ul class="pagination mb-0"></ul>
                <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next"
                    data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
            <div class="modal-content position-relative">
                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="rounded-top-lg py-3 ps-4 bg-light">
                        <h4 class="mb-1" id="modalExampleDemoLabel">Pay For VNTRK<span id="bill-id"></span></h4>

                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body p-4">
                        <form action="{{ route('bill.uploadReceipt') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="bill_id" id="input-bill-id">

                            <div class="text-center mb-3">
                                <label class="col-form-label fw-semibold">QR Code:</label>
                                <br>
                                <img src="homepage/img/qr-code.jpg" alt="QR Code" class="img-fluid rounded shadow-sm"
                                    style="max-width: 200px;">
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label fw-semibold">Upload Attachment:</label>
                                <input class="form-control" type="file" name="receipt" required>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" type="submit">Send to Verify</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let payButtons = document.querySelectorAll('.pay-btn');

            payButtons.forEach(button => {
                button.addEventListener("click", function () {
                    let billId = this.getAttribute("data-id");
                    document.getElementById("bill-id").textContent = billId;
                    document.getElementById("input-bill-id").value = billId;
                });
            });
        });

    </script>

@endsection