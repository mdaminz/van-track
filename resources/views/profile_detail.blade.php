@php
  $layout = match (Auth::user()->usertype) {
    'admin' => 'admin.admin-base',
    'driver' => 'driver.driver-base',
    default => 'user.user-base',
  };
@endphp

@extends($layout)

<base href="/public">

@section("body-content")

  <div class="card mb-3">
    <div class="card-header position-relative min-vh-25 mb-7">
    <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(../../assets/img/generic/4.jpg);">
    </div>
    <div class="avatar avatar-5xl avatar-profile">
      <img class="rounded-circle img-thumbnail shadow-sm" src="{{ $users->profile_photo_path }}" width="200" alt="" />
    </div>
    </div>
    <div class="card-body">
    <div class="row">
      <div class="col-lg-8">
      <h4 class="mb-1">
        {{ $users->name }}
        <span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified">
        <small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small>
        </span>
      </h4>
      <h5 class="fs-0 fw-normal">{{ $users->email }}</h5>
      <p class="text-500">{{ $users->phone }}</p>
      </div>
    </div>
    </div>
  </div>

  <div class="row g-0">
    <div class="col-lg-8 pe-lg-2">
    <div class="card mb-3">
      <div class="card-header">
      <h5 class="mb-0">Information</h5>
      </div>
      <div class="card-body bg-light">
      <form action="" method="POST" class="row g-3">
        <div class="col-lg-6">
        <label class="form-label">User Type</label>
        <input name="name" class="form-control" type="text" value="{{$users->usertype}}" disabled />
        </div>
        <div class="col-lg-6 mb-0">
        <label class="form-label">Status</label>
        <input name="email" class="form-control" type="text" value="{{$users->status}}" disabled />
        </div>
        
      </form>
      </div>
    </div>


    </div>

    <div class="col-lg-4 ps-lg-2">
    <div class="sticky-sidebar">

      {{-- Guardian Card --}}
      <div class="card mb-3">
      <div class="card-header bg-light">
        <h5 class="mb-0">Information</h5>
      </div>
      <div class="card-body fs--1">
        <div class="d-flex">
        <a href="#!">
          <img class="img-fluid" src="homepage/img/pin.png" alt="" width="56" />
        </a>
        <div class="flex-1 position-relative ps-3">
          <h6 class="fs-0 mb-0">
          {{$users->name}}
          
          </h6>
          <p class="mb-1">{{$users->address}}</p>
          <p class="text-1000 mb-0">
          <a href="">{{$users->email}}</a> 
          </p>
          <p class="text-1000 mb-0">{{$users->phone}}</p>
        </div>
        </div>
      </div>
      </div>


    </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header bg-light">
    <div class="row align-items-center">
      <div class="col">
      <h5 class="mb-0" id="followers">Children
        <span class="d-none d-sm-inline-block">({{ $count_students }})</span>
      </h5>
      </div>
      <div class="col text-end">
      {{-- <a class="font-sans-serif" href="../../app/social/followers.html">All Members</a> --}}
      </div>
    </div>
    </div>

    <div class="card-body bg-light px-1 py-0">
    <div class="row g-0 text-center fs--1">
      @foreach ($students as $students)
      <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
      <div class="bg-white dark__bg-1100 p-3 h-100">
      <a href="../../pages/user/profile.html">
      <img src="student/{{ $students->profile_photo }}" alt="{{ $students->full_name }}"
        class="rounded-circle mb-3 shadow-sm" width="100" height="100" style="object-fit: cover;" />
      </a>
      <h6 class="mb-1">
      <a href="#">{{ $students->full_name }}</a>
      </h6>
      <p class="fs--2 mb-1">
      <a class="text-700" href="#!">{{ $students->school->name }}</a>
      </p>
      </div>
      </div>
    @endforeach
    </div>
    </div>
  </div>


@endsection