@php
  $layout = match (Auth::user()->usertype) {
    'admin' => 'admin.admin-base',
    'driver' => 'driver.driver-base',
    default => 'user.user-base',
  };
@endphp

@extends($layout)

@section("body-content")

  <div class="row g-0">
    <div class="col-lg-8 pe-lg-2">
    <div class="card mb-3">
      <div class="card-header bg-light overflow-hidden">
      <div class="d-flex align-items-center">
        <div class="avatar avatar-m">
        <img class="rounded-circle" src="{{Auth::user()->profile_photo_path}}" alt="" />

        </div>
        <div class="flex-1 ms-2">
        <h5 class="mb-0 fs-0">Create post</h5>
        </div>
      </div>
      </div>
      <div class="card-body p-0">
      <form action="{{ route('store_post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <textarea class="shadow-none form-control rounded-0 resize-none px-card border-y-0 border-200"
        placeholder="What do you want to talk about?" rows="4" name="post_content"></textarea>

        <div class="row g-0 justify-content-between mt-3 px-card pb-3">
        <div class="col">
          <!-- Hidden File Input -->
          <input type="file" name="post_image" id="post_image" class="d-none" onchange="previewImage(event)">

          <!-- Button to Trigger File Input -->
          <button type="button"
          class="btn btn-light btn-sm rounded-pill shadow-none d-inline-flex align-items-center fs--1 mb-0 me-1"
          onclick="document.getElementById('post_image').click();">
          <img class="cursor-pointer" src="../../assets/img/icons/spot-illustrations/image.svg" width="17"
            alt="" />
          <span class="ms-2 d-none d-md-inline-block">Image</span>
          </button>

          <!-- Image Preview -->
          <div id="image-preview" class="mt-2"></div>
        </div>

        <div class="col-auto">
          <button class="btn btn-primary btn-sm px-4 px-sm-5" type="submit">Post</button>
        </div>
        </div>
      </form>
      </div>
    </div>

    @foreach ($forum_data as $forum_data)
    <div class="card mb-3">
      <div class="card-header bg-light">
      <div class="row justify-content-between">
      <div class="col">
      <div class="d-flex">
        <div class="avatar avatar-2xl status-online">
        <img class="rounded-circle" src="{{ $forum_data->user->profile_photo_path }}" alt="" />

        </div>
        <div class="flex-1 align-self-center ms-2">
        <p class="mb-1 lh-1"><a href="profile_detail/{{$forum_data->user_id}}"
        class="fw-semi-bold">{{ $forum_data->user->name }}</a></p>
        <p class="mb-0 fs--1">{{ \Carbon\Carbon::parse($forum_data->created_at)->format('d M Y, h:i A') }}</p>
        </div>
      </div>
      </div>
      <div class="col-auto">
      {{-- <div class="dropdown font-sans-serif">
        <button class="btn btn-sm dropdown-toggle p-1 dropdown-caret-none" type="button" id="post-album-action"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
        class="fas fa-ellipsis-h fs--1"></span></button>
        <div class="dropdown-menu dropdown-menu-end py-3" aria-labelledby="post-album-action"><a
        class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Edit</a><a
        class="dropdown-item" href="#!">Report</a>
        <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Archive</a><a
        class="dropdown-item text-danger" href="#!">Delete </a>
        </div>
      </div> --}}
      </div>
      </div>
      </div>
      <div class="card-body overflow-hidden">
      <p>{!! nl2br(e($forum_data->post_content)) !!}</p>
      <img class="img-fluid rounded" src="{{ asset($forum_data->image) }}" alt="" />
      </div>
      <!-- <div class="card-footer bg-light pt-0">
    <div class="border-bottom border-200 fs--1 py-3"><a class="text-700" href="#!">345 Likes</a> &bull; <a class="text-700" href="#!">34 Comments</a>
    </div>
    <div class="row g-0 fw-semi-bold text-center py-2 fs--1">
    <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3" href="#!"><img src="../../assets/img/icons/spot-illustrations/like-active.png" width="20" alt="" /><span class="ms-1">Like</span></a></div>
    <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3" href="#!"><img src="../../assets/img/icons/spot-illustrations/comment-active.png" width="20" alt="" /><span class="ms-1">Comment</span></a></div>
    <div class="col-auto d-flex align-items-center"><a class="rounded-2 text-700 d-flex align-items-center" href="#!"><img src="../../assets/img/icons/spot-illustrations/share-inactive.png" width="20" alt="" /><span class="ms-1">Share</span></a></div>
    </div>
    <form class="d-flex align-items-center border-top border-200 pt-3">
    <div class="avatar avatar-xl">
    <img class="rounded-circle" src="../../assets/img/team/3.jpg" alt="" />

    </div>
    <input class="form-control rounded-pill ms-2 fs--1" type="text" placeholder="Write a comment..." />
    </form>
    <div class="d-flex mt-3">
    <div class="avatar avatar-xl">
    <img class="rounded-circle" src="../../assets/img/team/4.jpg" alt="" />

    </div>
    <div class="flex-1 ms-2 fs--1">
    <p class="mb-1 bg-200 rounded-3 p-2"><a class="fw-semi-bold" href="../../pages/user/profile.html">Rowan Atkinson</a> She starred as Jane Porter in The <a href="#!">@Legend of Tarzan (2016)</a>, Tanya Vanderpoel in Whiskey Tango Foxtrot (2016) and as DC comics villain Harley Quinn in Suicide Squad (2016), for which she was nominated for a Teen Choice Award, and many other awards.</p>
    <div class="px-2"><a href="#!">Like</a> &bull; <a href="#!">Reply</a> &bull; 23min </div>
    </div>
    </div>
    <div class="d-flex mt-3">
    <div class="avatar avatar-xl">
    <img class="rounded-circle" src="../../assets/img/team/3.jpg" alt="" />

    </div>
    <div class="flex-1 ms-2 fs--1">
    <p class="mb-1 bg-200 rounded-3 p-2"><a class="fw-semi-bold" href="../../pages/user/profile.html">Jessalyn Gilsig</a> Jessalyn Sarah Gilsig is a Canadian-American actress known for her roles in television series, e.g., as Lauren Davis in Boston Public, Gina Russo in Nip/Tuck, Terri Schuester in Glee, and as Siggy Haraldson on the History Channel series Vikings. 🏆</p>
    <div class="px-2"><a href="#!">Like</a> &bull; <a href="#!">Reply</a> &bull; 3hrs </div>
    </div>
    </div><a class="fs--1 text-700 d-inline-block mt-2" href="#!">Load more comments (2 of 34)</a>
    </div> -->
    </div>
  @endforeach



    </div>

    <div class="col-lg-4 ps-lg-2">

    <div class="card mb-3">
      <div class="card-header bg-light d-flex justify-content-between align-items-center">
      <h5 class="mb-0">All User</h5>
      </div>
      <div class="card-body">

      @foreach ($user_data as $user_data)

      <div class="d-flex">
      <div class="avatar avatar-3xl">
      <img class="rounded-circle"
        src="{{ $user_data->profile_photo_path ?? asset('homepage/img/no-profile-photo.jpg') }}"
        alt="User Profile Photo" />


      </div>
      <div class="flex-1 ms-2">
      <h6 class="mb-0"><a href="profile_detail/{{$user_data->id}}">{{$user_data->name}}</a></h6>
      <button class="btn btn-light btn-sm py-0 mt-1 border" type="button" style="pointer-events: none;">
        <span class="fas fa-user" data-fa-transform="shrink-5 left-2"></span>
        <span class="fs--1">{{ ucfirst($user_data->usertype) }}</span>
      </button>

      <div class="border-dashed-bottom my-3"></div>
      </div>
      </div>

    @endforeach

      </div>
    </div>

    </div>
  </div>



  <!-- JavaScript for Image Preview -->
  <script>
    function previewImage(event) {
    let imagePreview = document.getElementById('image-preview');
    let file = event.target.files[0];

    if (file) {
      let reader = new FileReader();
      reader.onload = function (e) {
      imagePreview.innerHTML = `<img src="${e.target.result}" alt="Selected Image" width="100" class="mt-2 rounded">`;
      };
      reader.readAsDataURL(file);
    }
    }
  </script>


@endsection