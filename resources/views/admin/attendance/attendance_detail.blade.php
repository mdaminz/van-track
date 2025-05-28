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
            <h3>Attendance Detail - Monthly View</h3>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor">Attendance Details for {{ $student->full_name }}</h5>
                </div>
            </div>
        </div>
        <div class="card-body bg-light">
            <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel">
                    <div class="accordion" id="attendanceAccordion">
                        @forelse ($groupedAttendance as $date => $records)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-{{ $loop->index }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="false"
                                        aria-controls="collapse-{{ $loop->index }}">
                                        {{ \Carbon\Carbon::parse($date)->format('l, d M Y') }}
                                    </button>
                                </h2>
                                <div id="collapse-{{ $loop->index }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading-{{ $loop->index }}" data-bs-parent="#attendanceAccordion">
                                    <div class="accordion-body">
                                        @foreach ($records as $entry)
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="me-2">
                                                    @if ($entry->status == 'In')
                                                        <span style="width: 40px"
                                                            class="badge rounded-pill badge-soft-success">In</span>
                                                    @else
                                                        <span style="width: 40px"
                                                            class="badge rounded-pill badge-soft-secondary">Out</span>
                                                    @endif
                                                </div>
                                                {{-- <div>
                                                    {{ \Carbon\Carbon::parse($entry->created_at)->format('h:i A') }} – RFID:
                                                    <strong>{{ $entry->rfid_tag ?? 'N/A' }}</strong>
                                                </div> --}}
                                                <div>
                                                    {{ \Carbon\Carbon::parse($entry->created_at)->format('h:i A') }}, &nbsp; {{$entry->student->school->name}}
                                                    
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info">No attendance records available.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- <div class="card">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor">Example</h5>
                    <p class="mb-0 mt-2">Using the card component, you can extend the default collapse behavior to create an
                        accordion. To properly achieve the accordion style, be sure to use <code> .accordion </code> as a
                        wrapper.</p>
                </div>
            </div>
        </div>
        <div class="card-body bg-light">
            <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel"
                    aria-labelledby="tab-dom-ec557d89-a32e-4e39-89cf-58a62664929f"
                    id="dom-ec557d89-a32e-4e39-89cf-58a62664929f">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">How long do
                                    payouts take?</button>
                            </h2>
                            <div class="accordion-collapse collapse show" id="collapse1" aria-labelledby="heading1"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">Once you’re set up, payouts arrive in your bank account on a
                                    2-day rolling basis. Or you can opt to receive payouts weekly or monthly.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">How do
                                    refunds work?</button>
                            </h2>
                            <div class="accordion-collapse collapse" id="collapse2" aria-labelledby="heading2"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">You can issue either partial or full refunds. There are no fees
                                    to refund a charge, but the fees from the original charge are not returned.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3">How much do
                                    disputes costs?</button>
                            </h2>
                            <div class="accordion-collapse collapse" id="collapse3" aria-labelledby="heading3"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">Disputed payments (also known as chargebacks) incur a $15.00
                                    fee. If the customer’s bank resolves the dispute in your favor, the fee is fully
                                    refunded.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapse4">Is there a
                                    fee to use Apple Pay or Google Pay?</button>
                            </h2>
                            <div class="accordion-collapse collapse" id="collapse4" aria-labelledby="heading4"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">There are no additional fees for using our mobile SDKs or to
                                    accept payments using consumer wallets like Apple Pay or Google Pay.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

@endsection