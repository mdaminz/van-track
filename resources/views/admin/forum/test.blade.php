@section("body-content")
  <div class="row g-0">
    <div class="col-lg-8 pe-lg-2">
    <div class="card mb-3">
      <div class="card-header bg-light overflow-hidden">
      <div class="d-flex align-items-center">
        <div class="avatar avatar-m">
        <img class="rounded-circle" src="../../assets/img/team/1.jpg" alt="" />

        </div>
        <div class="flex-1 ms-2">
        <h5 class="mb-0 fs-0">Create post</h5>
        </div>
      </div>
      </div>
      <div class="card-body p-0">
      <form action="{{ route('store_post') }}" method="POST">
        @csrf
        <textarea class="shadow-none form-control rounded-0 resize-none px-card border-y-0 border-200"
        placeholder="What do you want to talk about?" rows="4" name="post_content"></textarea>
        <!-- <div class="d-flex align-items-center ps-card border border-200">
          <label class="text-nowrap mb-0 me-2" for="hash-tags"><span class="fas fa-plus me-1 fs--2"></span><span class="fw-medium fs--1">Add hashtag</span></label>
          <input class="form-control border-0 fs--1 shadow-none" id="hash-tags" type="text" placeholder="Help the right person to see" />
        </div> -->
        <div class="row g-0 justify-content-between mt-3 px-card pb-3">
        <div class="col">
          <button
          class="btn btn-light btn-sm rounded-pill shadow-none d-inline-flex align-items-center fs--1 mb-0 me-1"
          type="button"><img class="cursor-pointer" src="../../assets/img/icons/spot-illustrations/image.svg"
            width="17" alt="" /><span class="ms-2 d-none d-md-inline-block">Image</span></button>
          <!-- <button class="btn btn-light btn-sm rounded-pill shadow-none d-inline-flex align-items-center fs--1 me-1" type="button"><img class="cursor-pointer" src="../../assets/img/icons/spot-illustrations/calendar.svg" width="17" alt="" /><span class="ms-2 d-none d-md-inline-block">Event</span></button>
          <button class="btn btn-light btn-sm rounded-pill shadow-none d-inline-flex align-items-center fs--1 me-1" type="button"><img class="cursor-pointer" src="../../assets/img/icons/spot-illustrations/location.svg" width="17" alt="" /><span class="ms-2 d-none d-md-inline-block text-nowrap">Check in</span></button> -->
        </div>
        <div class="col-auto">
          <!-- <div class="dropdown d-inline-block me-1">
          <button class="btn btn-sm dropdown-toggle px-1" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-globe-americas"></span></button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#">Public</a><a class="dropdown-item" href="#">Private</a><a class="dropdown-item" href="#">Draft</a></div>
          </div> -->
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
        <img class="rounded-circle" src="../../assets/img/team/4.jpg" alt="" />

        </div>
        <div class="flex-1 align-self-center ms-2">
        <p class="mb-1 lh-1"><a class="fw-semi-bold"
        href="../../pages/user/profile.html">{{ $forum_data->user->name }}</a></p>
        <p class="mb-0 fs--1">{{ $forum_data->date }} &bull; {{ $forum_data->time }}</p>
        </div>
      </div>
      </div>
      <div class="col-auto">
      <div class="dropdown font-sans-serif">
        <button class="btn btn-sm dropdown-toggle p-1 dropdown-caret-none" type="button" id="post-album-action"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
        class="fas fa-ellipsis-h fs--1"></span></button>
        <div class="dropdown-menu dropdown-menu-end py-3" aria-labelledby="post-album-action"><a
        class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Edit</a><a
        class="dropdown-item" href="#!">Report</a>
        <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Archive</a><a
        class="dropdown-item text-danger" href="#!">Delete </a>
        </div>
      </div>
      </div>
      </div>
      </div>
      <div class="card-body overflow-hidden">
      <p>{{ $forum_data->post_content }}</p>
      <img class="img-fluid rounded" src="../../assets/img/generic/12.jpg" alt="" />
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
    <div class="card mb-3 mt-3 mt-lg-0">
      <div class="card-body fs--1">
      <div class="d-flex"><span class="fas fa-gift fs-0 text-warning"></span>
        <div class="flex-1 ms-2"><a class="fw-semi-bold" href="../../pages/user/profile.html">Emma Watson</a>'s
        Birthday is today</div>
      </div>
      </div>
    </div>
    <div class="card mb-3">
      <div class="card-header bg-light d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Add to your feed</h5><a class="fs--1" href="#!">See all</a>
      </div>
      <div class="card-body">
      <div class="d-flex">
        <div class="avatar avatar-3xl">
        <img class="rounded-circle" src="../../assets/img/team/13.jpg" alt="" />

        </div>
        <div class="flex-1 ms-2">
        <h6 class="mb-0"><a href="../../pages/user/profile.html">Katheryn Winnick</a></h6>
        <button class="btn btn-light btn-sm py-0 mt-1 border" type="button"><span class="fas fa-user-plus"
          data-fa-transform="shrink-5 left-2"></span><span class="fs--1">Follow</span></button>
        <div class="border-dashed-bottom my-3"></div>
        </div>
      </div>
      <div class="d-flex">
        <div class="avatar avatar-3xl">
        <img class="rounded-circle" src="../../assets/img/team/5.jpg" alt="" />

        </div>
        <div class="flex-1 ms-2">
        <h6 class="mb-0"><a href="../../pages/user/profile.html">Travis Fimmel</a></h6>
        <p class="fs--1 mb-0">5 mutual connections</p>
        <button class="btn btn-light btn-sm py-0 mt-1 border" type="button"><span class="fas fa-user-plus"
          data-fa-transform="shrink-5 left-2"></span><span class="fs--1">Follow</span></button>
        <div class="border-dashed-bottom my-3"></div>
        </div>
      </div>
      <div class="d-flex">
        <div class="avatar avatar-3xl">
        <img class="rounded-circle" src="../../assets/img/team/10.jpg" alt="" />

        </div>
        <div class="flex-1 ms-2">
        <h6 class="mb-0"><a href="../../pages/user/profile.html">Gustaf Skarsgård</a></h6>
        <p class="fs--1 mb-0">10 mutual connections</p>
        <button class="btn btn-light btn-sm py-0 mt-1 border" type="button"><span class="fas fa-user-plus"
          data-fa-transform="shrink-5 left-2"></span><span class="fs--1">Follow</span></button>
        <div class="border-dashed-bottom my-3"></div>
        </div>
      </div>
      <div class="d-flex">
        <div class="avatar avatar-3xl">
        <img class="rounded-circle" src="../../assets/img/team/8.jpg" alt="" />

        </div>
        <div class="flex-1 ms-2">
        <h6 class="mb-0"><a href="../../pages/user/profile.html">Clive Standen</a></h6>
        <p class="fs--1 mb-0">8 mutual connections</p>
        <button class="btn btn-light btn-sm py-0 mt-1 border" type="button"><span class="fas fa-user-plus"
          data-fa-transform="shrink-5 left-2"></span><span class="fs--1">Follow</span></button>
        <div class="border-dashed-bottom my-3"></div>
        </div>
      </div>
      <div class="d-flex">
        <div class="avatar avatar-3xl">
        <img class="rounded-circle" src="../../assets/img/team/15.jpg" alt="" />

        </div>
        <div class="flex-1 ms-2">
        <h6 class="mb-0"><a href="../../pages/user/profile.html">Jennie Jacques</a></h6>
        <button class="btn btn-light btn-sm py-0 mt-1 border" type="button"><span class="fas fa-user-plus"
          data-fa-transform="shrink-5 left-2"></span><span class="fs--1">Follow</span></button>
        <div class="border-dashed-bottom my-3"></div>
        </div>
      </div>
      <div class="d-flex">
        <div class="avatar avatar-3xl">
        <img class="rounded-circle" src="../../assets/img/team/6.jpg" alt="" />

        </div>
        <div class="flex-1 ms-2">
        <h6 class="mb-0"><a href="../../pages/user/profile.html">Isaac Hempstead</a></h6>
        <button class="btn btn-light btn-sm py-0 mt-1 border" type="button"><span class="fas fa-user-plus"
          data-fa-transform="shrink-5 left-2"></span><span class="fs--1">Follow</span></button>
        <div class="border-dashed-bottom my-3"></div>
        </div>
      </div>
      <div class="d-flex">
        <div class="avatar avatar-3xl">
        <img class="rounded-circle" src="../../assets/img/team/2.jpg" alt="" />

        </div>
        <div class="flex-1 ms-2">
        <h6 class="mb-0"><a href="../../pages/user/profile.html">Antony Hopkins</a></h6>
        <button class="btn btn-light btn-sm py-0 mt-1 border" type="button"><span class="fas fa-user-plus"
          data-fa-transform="shrink-5 left-2"></span><span class="fs--1">Follow</span></button>
        <div class="border-dashed-bottom my-3"></div>
        </div>
      </div>
      <div class="d-flex">
        <div class="avatar avatar-3xl">
        <img class="rounded-circle" src="../../assets/img/team/3.jpg" alt="" />

        </div>
        <div class="flex-1 ms-2">
        <h6 class="mb-0"><a href="../../pages/user/profile.html">Sophie Turner</a></h6>
        <button class="btn btn-light btn-sm py-0 mt-1 border" type="button"><span class="fas fa-user-plus"
          data-fa-transform="shrink-5 left-2"></span><span class="fs--1">Follow</span></button>
        </div>
      </div>
      </div>
    </div>
    <div class="card mb-3 mb-lg-0">
      <div class="card-header bg-light">
      <h5 class="mb-0">You may interested</h5>
      </div>
      <div class="card-body fs--1">
      <div class="d-flex btn-reveal-trigger">
        <div class="calendar"><span class="calendar-month">Feb</span><span class="calendar-day">21</span></div>
        <div class="flex-1 position-relative ps-3">
        <h6 class="fs-0 mb-0"><a href="../../app/events/event-detail.html">Newmarket Nights</a></h6>
        <p class="mb-1">Organized by <a href="#!" class="text-700">University of Oxford</a></p>
        <p class="text-1000 mb-0">Time: 6:00AM</p>
        <p class="text-1000 mb-0">Duration: 6:00AM - 5:00PM</p>Place: Cambridge Boat Club, Cambridge
        <div class="border-dashed-bottom my-3"></div>
        </div>
      </div>
      <div class="d-flex btn-reveal-trigger">
        <div class="calendar"><span class="calendar-month">Dec</span><span class="calendar-day">31</span></div>
        <div class="flex-1 position-relative ps-3">
        <h6 class="fs-0 mb-0"><a href="../../app/events/event-detail.html">31st Night Celebration</a></h6>
        <p class="mb-1">Organized by <a href="#!" class="text-700">Chamber Music Society</a></p>
        <p class="text-1000 mb-0">Time: 11:00PM</p>
        <p class="text-1000 mb-0">280 people interested</p>Place: Tavern on the Greend, New York
        <div class="border-dashed-bottom my-3"></div>
        </div>
      </div>
      <div class="d-flex btn-reveal-trigger">
        <div class="calendar"><span class="calendar-month">Dec</span><span class="calendar-day">16</span></div>
        <div class="flex-1 position-relative ps-3">
        <h6 class="fs-0 mb-0"><a href="../../app/events/event-detail.html">Folk Festival</a></h6>
        <p class="mb-1">Organized by <a href="#!" class="text-700">Harvard University</a></p>
        <p class="text-1000 mb-0">Time: 9:00AM</p>
        <p class="text-1000 mb-0">Location: Cambridge Masonic Hall Association</p>Place: Porter Square, North
        Cambridge
        </div>
      </div>
      </div>
      <div class="card-footer bg-light p-0 border-top"><a class="btn btn-link d-block w-100"
        href="../../app/events/event-list.html">All Events<span class="fas fa-chevron-right ms-1 fs--2"></span></a>
      </div>
    </div>
    </div>
  </div>

  </div>

@endsection