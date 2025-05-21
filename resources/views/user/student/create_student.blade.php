@extends('user.user-base')

@section('body-content')

    <style>
        .upload-box {
            border: 2px dashed #d5d9de;
            border-radius: 8px;
            padding: 1.75rem 1rem;
            cursor: pointer;
            background-color: #fff;
            transition: all .15s;
        }

        .upload-box:hover {
            background-color: #f8f9fa;
            border-color: #84a8ff;
        }

        .object-fit-cover {
            object-fit: cover;
        }
    </style>


    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Register Child</h5>
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
    <div class="col-lg-12 col-xl-12 col-xxl- h-100">

        <div class="card theme-wizard h-100">
            <div class="card-header bg-light pt-3 pb-2">
                <ul class="nav justify-content-between nav-wizard">
                    <li class="nav-item"><a class="nav-link active fw-semi-bold" href="#bootstrap-wizard-validation-tab1"
                            data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span
                                class="nav-item-circle-parent"><span class="nav-item-circle"><span
                                        class="fas fa-user"></span></span></span><span
                                class="d-none d-md-block mt-1 fs--1">Child Information</span></a></li>
                    <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab2"
                            data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span
                                class="nav-item-circle-parent"><span class="nav-item-circle"><span
                                        class="fas fa-dollar-sign"></span></span></span><span
                                class="d-none d-md-block mt-1 fs--1">Address & Billing</span></a></li>
                    <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab4"
                            data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span
                                class="nav-item-circle-parent"><span class="nav-item-circle"><span
                                        class="fas fa-thumbs-up"></span></span></span><span
                                class="d-none d-md-block mt-1 fs--1">Comfirm</span></a></li>
                </ul>
            </div>
            <div class="card-body py-4" id="wizard-controller">
                <div class="tab-content">
                    <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel"
                        aria-labelledby="bootstrap-wizard-validation-tab1" id="bootstrap-wizard-validation-tab1">

                        <form method="POST" action="{{ route('add_student') }}" enctype="multipart/form-data"
                            class="needs-validation" novalidate="novalidate">
                            @csrf
                            <div class="row align-items-center g-3 mb-4">

                                {{-- ---------- Left: circular preview ---------- --}}
                                <div class="col-md-auto text-center">
                                    <div id="preview-container" class="rounded-circle overflow-hidden border shadow-sm"
                                        style="width: 100px; height: 100px; background:#e0edff; margin-right: 15px;">
                                        {{-- default avatar --}}
                                        <img id="image_preview" src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                                            alt="preview" class="w-100 h-100 object-fit-cover">
                                    </div>
                                </div>

                                {{-- ---------- Right: dashed upload box (entire box is a <label>) ---------- --}}
                                    <div class="col-md">
                                        <label for="profile_photo" {{-- turning the whole box into a clickable label --}}
                                            class="upload-box w-100 h-100 mb-0"> {{-- custom class below --}}
                                            <div class="text-center">
                                                <i class="fas fa-cloud-upload-alt fa-lg mb-2 text-secondary"></i>
                                                <h6 class="fw-semibold mb-1 text-secondary">Upload a profile picture</h6>
                                                <p class="small text-muted mb-0">
                                                    Upload a 300x300&nbsp;jpg/png image <br>max&nbsp;size&nbsp;400&nbsp;KB
                                                </p>
                                            </div>
                                        </label>

                                        {{-- actual hidden file input --}}
                                        <input type="file" name="profile_photo" id="profile_photo" accept="image/*"
                                            onchange="previewImage(event)" class="d-none">
                                    </div>

                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="bootstrap-wizard-validation-wizard-name">Full Name</label>
                                <input class="form-control" type="text" name="full_name" placeholder="Muhammad Ali"
                                    id="bootstrap-wizard-validation-wizard-name" required />
                                <div class="invalid-feedback">You must add name</div>
                            </div>

                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bootstrap-wizard-validation-wizard-password">Date of
                                            Bitrh</label>
                                        <input class="form-control" type="date" name="date_of_birth" placeholder="Password"
                                            required="required" id="bootstrap-wizard-validation-wizard-password"
                                            data-wizard-validate-password="true" />
                                        <div class="invalid-feedback">Please select date of birth</div>
                                    </div>
                                </div>
                                {{-- <div class="mb-3">
                                    <label class="form-label" for="bootstrap-wizard-validation-card-name">photo</label>
                                    <input class="form-control" placeholder="Postcode" name="profile_photo" type="file"
                                        id="bootstrap-wizard-validation-card-name" />
                                </div> --}}
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label"
                                            for="bootstrap-wizard-validation-wizard-confirm-password">Relationship</label>

                                        {{-- <input class="form-control" type="text" name="relationship"
                                            placeholder="Confirm Password" required="required"
                                            id="bootstrap-wizard-validation-wizard-confirm-password"
                                            data-wizard-validate-confirm-password="true" /> --}}

                                        <select name="relationship" class="form-select"
                                            id="bootstrap-wizard-validation-wizard-confirm-password" required="required"
                                            data-wizard-validate-confirm-password="true">
                                            <option selected="" disabled="" value="">Choose...</option>
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Grandfather">Grandfather</option>
                                            <option value="Grandmother">Grandmother</option>
                                            <option value="Guardian">Guardian</option>
                                            <option value="Sibling">Sibling</option>
                                        </select>
                                        <div class="invalid-feedback">Please select relationship</div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="bootstrap-wizard-validation-wizard-name">Emergency
                                    Contact</label>
                                <input class="form-control" type="text" name="emergency_contact"
                                    placeholder="Emergency ontact" id="bootstrap-wizard-validation-wizard-name" required />
                                <div class="invalid-feedback">You must add emergency contact</div>
                            </div>

                            <div class="mb-3">
                                <input class="form-control" type="email" name="" placeholder="Emergency Contact"
                                    pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$" required="required"
                                    id="bootstrap-wizard-validation-wizard-email" data-wizard-validate-email="true"
                                    value="amin@gmail.com" hidden />
                                <div class="invalid-feedback">You must add email</div>
                            </div>

                            {{-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="terms" required="required"
                                    checked="checked" id="bootstrap-wizard-validation-wizard-checkbox" />
                                <label class="form-check-label" for="bootstrap-wizard-validation-wizard-checkbox">I accept
                                    the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label>
                            </div> --}}

                    </div>
                    <div class="tab-pane px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab2"
                        id="bootstrap-wizard-validation-tab2">

                        <div class="row g-2">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="bootstrap-wizard-validation-card-number">Address</label>
                                    <input class="form-control" placeholder="Address" type="text" name="address"
                                        id="bootstrap-wizard-validation-card-number" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="bootstrap-wizard-validation-card-name">Postcode</label>
                                    <input class="form-control" placeholder="Postcode" name="postcode" type="text"
                                        id="bootstrap-wizard-validation-card-name" />
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="validationCustom04">School</label>
                                    <select name="school_id" class="form-select" id="select_school" required>
                                        <option selected disabled value="">Choose...</option>
                                        @foreach ($rates->unique('school_id') as $rate)
                                            <option value="{{ $rate->school->id }}">{{ $rate->school->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="validationCustom08">House Area</label>
                                    <select name="district" class="form-select" id="select_district" required>
                                        <option selected disabled value="">Choose...</option>
                                        @foreach ($rates->unique('district') as $rate)
                                            <option value="{{ $rate->district }}">{{ $rate->district }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price: <span id="rate_price"></span></label>
                                {{-- <p id="rate_price" class="fw-semibold text-primary">Please select school and house area
                                </p> --}}
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane text-center px-sm-3 px-md-5" role="tabpanel"
                        aria-labelledby="bootstrap-wizard-validation-tab4" id="bootstrap-wizard-validation-tab4">
                        <div class="wizard-lottie-wrapper">
                            <div class="lottie wizard-lottie mx-auto my-3"
                                data-options='{"path":"../../assets/img/animated-icons/celebration.json"}'></div>
                        </div>
                        <h4 class="mb-1">Your child’s profile is all set!</h4>
                        <p>Just sit tight and wait for your RFID card to arrive.</p>
                        <p>Click the button below to confirm.</p>
                        <button class="btn btn-primary px-5 my-3" type="submit">Comfirm</button>
                    </div>
                </div>
                </form>
            </div>
            <div class="card-footer bg-light">
                <div class="px-sm-3 px-md-5">
                    <ul class="pager wizard list-inline mb-0">
                        <li class="previous">
                            <button class="btn btn-link ps-0" type="button"><span class="fas fa-chevron-left me-2"
                                    data-fa-transform="shrink-3"></span>Prev</button>
                        </li>
                        <li class="next">
                            <button class="btn btn-primary px-5 px-sm-6" type="submit">Next<span
                                    class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3"> </span></button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const imgTag = document.getElementById('image_preview');
            if (file) {
                const reader = new FileReader();
                reader.onload = e => imgTag.src = e.target.result;
                reader.readAsDataURL(file);
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const schoolSelect = document.getElementById('select_school');
            const districtSelect = document.getElementById('select_district');
            const priceDisplay = document.getElementById('rate_price');

            function fetchPrice() {
                const schoolId = schoolSelect.value;
                const district = districtSelect.value;

                if (schoolId && district) {
                    fetch(`/get-price?school_id=${schoolId}&district=${district}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.price !== null) {
                                priceDisplay.textContent = `RM ${parseFloat(data.price).toFixed(2)}`;
                            } else {
                                priceDisplay.textContent = 'No rate found for selected combination';
                            }
                        })
                        .catch(error => {
                            priceDisplay.textContent = 'Error fetching price';
                            console.error(error);
                        });
                } else {
                    priceDisplay.textContent = 'Please select school and house area';
                }
            }

            schoolSelect.addEventListener('change', fetchPrice);
            districtSelect.addEventListener('change', fetchPrice);
        });
    </script>





@endsection