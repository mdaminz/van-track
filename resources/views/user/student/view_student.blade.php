@extends(Auth::user()->usertype == 'admin' ? 'admin.admin-base' : 'user.user-base')


@section('body-content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);">
        </div>

        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Children Management</h3>
                    {{-- <p class="mb-0">Below is the list of all children associated with you in the system.
                    </p> --}}
                </div>
            </div>
        </div>
    </div>


    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                @foreach ($students as $student)
                    <div class="mb-4 col-md-6 col-lg-4">
                        <div class="border rounded-1 h-100 d-flex flex-column justify-content-between pb-3">
                            <div class="overflow-hidden">
                                <div class="position-relative rounded-top overflow-hidden">
                                    <a class="d-block" href="detail_student/{{$student->id}}">
                                        <img src="student/{{$student->profile_photo}}" alt=""
                                            style="height: 250px; width: 100%; object-fit: cover; object-position: center; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;"
                                            class="img-fluid" />
                                    </a>
                                </div>
                                <div class="p-3">
                                    <h5 class="fs-0">
                                        <a style="margin-right: 10px" class="text-dark"
                                            href="detail_student/{{$student->id}}">{{$student->full_name}}</a>
                                        @if ($student->status == "Active")
                                            <span class="badge rounded-pill badge-soft-success">Active</span>
                                        @endif
                                    </h5>
                                    <p class="fs--1 mb-3">
                                        {{$student->rfid_tag}}
                                    </p>
                                    {{-- <h5 class="fs-md-2 text-warning mb-0 d-flex align-items-center mb-3">
                                        $1050
                                    </h5> --}}
                                    <p class="fs--1 mb-1">
                                        Address: <strong>{{$student->address}}</strong>
                                    </p>
                                    <p class="fs--1 mb-1">
                                        School: <strong>{{$student->school->name}}</strong>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex flex-between-center px-3">
                                <div>
                                    
                                </div>
                                <div>
                                    <a class="btn btn-sm btn-falcon-default me-2"
                                        href="{{ url('update_student', $student->id) }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Edit"><span
                                            class="fas fa-user-edit"></span></a><a class="btn btn-sm btn-falcon-default" href="{{ url('delete_student', $student->id) }}"
                                        data-bs-toggle="Delete" data-bs-placement="top" title="Add to Cart"><span
                                            class="fas fa-trash"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection