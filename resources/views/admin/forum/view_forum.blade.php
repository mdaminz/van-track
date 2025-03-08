@extends(
    Auth::user()->usertype == 'admin' ? 'admin.admin-base' : 
    (Auth::user()->usertype == 'driver' ? 'driver.driver-base' : 'user.user-base')
)


@section('body-content')
    <div class="content">

        <div class="card card-chat overflow-hidden">
            <div class="card-body d-flex p-0 h-100">
                <div class="chat-sidebar">
                    <div class="contacts-list scrollbar-overlay">
                        <div class="nav nav-tabs border-0 flex-column" role="tablist" aria-orientation="vertical">
                            <div class="hover-actions-trigger chat-contact nav-item" role="tab" id="chat-link-1"
                                data-bs-toggle="tab" data-bs-target="#chat-1" aria-controls="chat-1" aria-selected="false">
                                
                                
                                <div class="d-flex p-3">
                                    <div class="avatar avatar-xl">
                                        <div class="rounded-circle overflow-hidden h-100 d-flex">
                                            <div class="w-50 border-end"><img src="../assets/img/team/1.jpg"
                                                    alt="" /></div>
                                            <div class="w-50 d-flex flex-column"><img class="h-50 border-bottom"
                                                    src="../assets/img/team/2.jpg" alt="" /><img class="h-50"
                                                    src="../assets/img/team/3.jpg" alt="" /></div>
                                        </div>
                                    </div>

                                    <div class="flex-1 chat-contact-body ms-2 d-md-none d-lg-block">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-0 chat-contact-title">Van A</h6><span
                                                class="message-time fs--2">Sun</span>
                                        </div>
                                        <div class="min-w-0">
                                            <div class="chat-contact-content pe-3">Bucky: <a href="#!"
                                                    class="text-primary">@Emma</a> What do you think about the plan?
                                            </div>
                                            <div class="position-absolute bottom-0 end-0 hover-hide"><span
                                                    class="fas fa-check text-success"
                                                    data-fa-transform="shrink-5 down-4"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <form class="contacts-search-wrapper">
                        <div class="form-group mb-0 position-relative d-md-none d-lg-block w-100 h-100">
                            <input class="form-control form-control-sm chat-contacts-search border-0 h-100" type="text"
                                placeholder="Search contacts ..." /><span
                                class="fas fa-search contacts-search-icon"></span>
                        </div>
                        <button class="btn btn-sm btn-transparent d-none d-md-inline-block d-lg-none"><span
                                class="fas fa-search fs--1"></span></button>
                    </form>
                </div>

                <div class="tab-content card-chat-content">

                    <div class="tab-pane card-chat-pane" id="chat-1" role="tabpanel"
                        aria-labelledby="chat-link-1">
                        <div class="chat-content-header">
                            <div class="row flex-between-center">
                                <div class="col-6 col-sm-8 d-flex align-items-center"><a
                                        class="pe-3 text-700 d-md-none contacts-list-show" href="#!">
                                        <div class="fas fa-chevron-left"></div>
                                    </a>
                                    <div class="min-w-0">
                                        <h5 class="mb-0 text-truncate fs-0">Van A</h5>
                                        <div class="fs--2 text-400">Active 7h ago
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="1"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Call"><span
                                            class="fas fa-phone"></span></button>
                                    <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="1"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Start a Video Call"><span class="fas fa-video"></span></button>
                                    <button class="btn btn-sm btn-falcon-primary btn-info" type="button"
                                        data-index="1" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Conversation Information"><span class="fas fa-info"></span></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="chat-content-body" style="display: inherit;">
                            <div class="conversation-info" data-index="1">
                                <div class="h-100 overflow-auto scrollbar">
                                    <div class="d-flex position-relative align-items-center p-3 border-bottom">
                                        <div class="avatar avatar-xl">
                                            <div class="rounded-circle overflow-hidden h-100 d-flex">
                                                <div class="w-50 border-end"><img src="../assets/img/team/1.jpg"
                                                        alt="" /></div>
                                                <div class="w-50 d-flex flex-column"><img class="h-50 border-bottom"
                                                        src="../assets/img/team/2.jpg" alt="" /><img
                                                        class="h-50" src="../assets/img/team/3.jpg"
                                                        alt="" /></div>
                                            </div>
                                        </div>
                                        <div class="flex-1 ms-2 d-flex flex-between-center">
                                            <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700"
                                                    href="../pages/user/profile.html">Avengers</a></h6>
                                            <div class="dropdown z-index-1">
                                                <button
                                                    class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none me-n3"
                                                    type="button" id="profile-dropdown-1" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"><span
                                                        class="fas fa-cog"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2"
                                                    aria-labelledby="profile-dropdown-1"><a class="dropdown-item"
                                                        href="#!">Mute</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item"
                                                        href="#!">Archive</a><a class="dropdown-item text-danger"
                                                        href="#!">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-3 pt-2">
                                        <div class="nav flex-column font-sans-serif fw-medium"><a
                                                class="nav-link d-flex align-items-center py-1 px-0 text-600"
                                                href="#!"><span class="conversation-info-icon"><span
                                                        class="fas fa-search me-1"
                                                        data-fa-transform="shrink-1 down-3"></span></span>Search in
                                                Conversation</a><a
                                                class="nav-link d-flex align-items-center py-1 px-0 text-600"
                                                href="#!"><span class="conversation-info-icon"><span
                                                        class="fas fa-pencil-alt me-1"
                                                        data-fa-transform="shrink-1"></span></span>Edit Nicknames</a><a
                                                class="nav-link d-flex align-items-center py-1 px-0 text-600"
                                                href="#!"><span class="conversation-info-icon"><span
                                                        class="fas fa-palette me-1"
                                                        data-fa-transform="shrink-1"></span></span><span>Change
                                                    Color</span></a><a
                                                class="nav-link d-flex align-items-center py-1 px-0 text-600"
                                                href="#!"><span class="conversation-info-icon"><span
                                                        class="fas fa-thumbs-up me-1"
                                                        data-fa-transform="shrink-1"></span></span>Change Emoji</a><a
                                                class="nav-link d-flex align-items-center py-1 px-0 text-600"
                                                href="#!"><span class="conversation-info-icon"><span
                                                        class="fas fa-bell me-1"
                                                        data-fa-transform="shrink-1"></span></span>Notifications</a></div>
                                    </div>
                                    <hr class="my-2" />
                                    <div class="px-3" id="others-info-1">
                                        <div class="title" id="member-title-1"><a
                                                class="btn btn-link btn-accordion hover-text-decoration-none dropdown-indicator"
                                                href="#members-1" data-bs-toggle="collapse" aria-expanded="false"
                                                aria-controls="members-1">Members</a></div>
                                        <div class="collapse" id="members-1" aria-labelledby="member-title-1"
                                            data-parent="#others-info-1">
                                            <div class="d-flex align-items-center py-2 hover-actions-trigger">
                                                <div class="avatar avatar-xl status-online">
                                                    <img class="rounded-circle" src="../assets/img/team/2.jpg"
                                                        alt="" />

                                                </div>
                                                <div class="flex-1 ms-2 d-flex justify-content-between">
                                                    <div>
                                                        <h6 class="mb-0"><a class="text-700"
                                                                href="../pages/user/profile.html">Antony Hopkins</a></h6>
                                                        <div class="fs--2 text-400">Admin</div>
                                                    </div>
                                                    <div
                                                        class="dropdown hover-actions position-relative dropdown-active-trigger z-index-1">
                                                        <button
                                                            class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none"
                                                            type="button" id="user-settings-dropdown-0"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><span
                                                                class="fas fa-ellipsis-h"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-end py-2 border"
                                                            aria-labelledby="user-settings-dropdown-0"><a
                                                                class="dropdown-item" href="#!">Message</a><a
                                                                class="dropdown-item" href="#!">View Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center py-2 hover-actions-trigger">
                                                <div class="avatar avatar-xl">
                                                    <img class="rounded-circle" src="../assets/img/team/1.jpg"
                                                        alt="" />

                                                </div>
                                                <div class="flex-1 ms-2 d-flex justify-content-between">
                                                    <div>
                                                        <h6 class="mb-0"><a class="text-700"
                                                                href="../pages/user/profile.html">Emma Watson</a></h6>
                                                        <div class="fs--2 text-400">Member</div>
                                                    </div>
                                                    <div
                                                        class="dropdown hover-actions position-relative dropdown-active-trigger z-index-1">
                                                        <button
                                                            class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none"
                                                            type="button" id="user-settings-dropdown-1"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><span
                                                                class="fas fa-ellipsis-h"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-end py-2 border"
                                                            aria-labelledby="user-settings-dropdown-1"><a
                                                                class="dropdown-item" href="#!">Message</a><a
                                                                class="dropdown-item" href="#!">View Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center py-2 hover-actions-trigger">
                                                <div class="avatar avatar-xl status-online">
                                                    <img class="rounded-circle" src="../assets/img/team/3.jpg"
                                                        alt="" />

                                                </div>
                                                <div class="flex-1 ms-2 d-flex justify-content-between">
                                                    <div>
                                                        <h6 class="mb-0"><a class="text-700"
                                                                href="../pages/user/profile.html">Anna Karinina</a></h6>
                                                        <div class="fs--2 text-400">Member</div>
                                                    </div>
                                                    <div
                                                        class="dropdown hover-actions position-relative dropdown-active-trigger z-index-1">
                                                        <button
                                                            class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none"
                                                            type="button" id="user-settings-dropdown-2"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><span
                                                                class="fas fa-ellipsis-h"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-end py-2 border"
                                                            aria-labelledby="user-settings-dropdown-2"><a
                                                                class="dropdown-item" href="#!">Message</a><a
                                                                class="dropdown-item" href="#!">View Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center py-2 hover-actions-trigger">
                                                <div class="avatar avatar-xl status-online">
                                                    <img class="rounded-circle" src="../assets/img/team/4.jpg"
                                                        alt="" />

                                                </div>
                                                <div class="flex-1 ms-2 d-flex justify-content-between">
                                                    <div>
                                                        <h6 class="mb-0"><a class="text-700"
                                                                href="../pages/user/profile.html">John Lee</a></h6>
                                                        <div class="fs--2 text-400">Member</div>
                                                    </div>
                                                    <div
                                                        class="dropdown hover-actions position-relative dropdown-active-trigger z-index-1">
                                                        <button
                                                            class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none"
                                                            type="button" id="user-settings-dropdown-3"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><span
                                                                class="fas fa-ellipsis-h"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-end py-2 border"
                                                            aria-labelledby="user-settings-dropdown-3"><a
                                                                class="dropdown-item" href="#!">Message</a><a
                                                                class="dropdown-item" href="#!">View Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center py-2 hover-actions-trigger">
                                                <div class="avatar avatar-xl">
                                                    <img class="rounded-circle" src="../assets/img/team/5.jpg"
                                                        alt="" />

                                                </div>
                                                <div class="flex-1 ms-2 d-flex justify-content-between">
                                                    <div>
                                                        <h6 class="mb-0"><a class="text-700"
                                                                href="../pages/user/profile.html">Bucky Robert</a></h6>
                                                        <div class="fs--2 text-400">Member</div>
                                                    </div>
                                                    <div
                                                        class="dropdown hover-actions position-relative dropdown-active-trigger z-index-1">
                                                        <button
                                                            class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none"
                                                            type="button" id="user-settings-dropdown-4"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><span
                                                                class="fas fa-ellipsis-h"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-end py-2 border"
                                                            aria-labelledby="user-settings-dropdown-4"><a
                                                                class="dropdown-item" href="#!">Message</a><a
                                                                class="dropdown-item" href="#!">View Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="title" id="shared-media-title-1"><a
                                                class="btn btn-link btn-accordion hover-text-decoration-none dropdown-indicator"
                                                href="#shared-media-1" data-bs-toggle="collapse" aria-expanded="false"
                                                aria-controls="shared-media-1">Shared media</a></div>
                                        <div class="collapse" id="shared-media-1"
                                            aria-labelledby="shared-media-title-1" data-parent="#others-info-1">
                                            <div class="row mx-n1">
                                                <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/1.jpg"
                                                        data-gallery="images-1"><img class="img-fluid rounded-1 mb-2"
                                                            src="../assets/img/chat/1.jpg" alt="" /></a></div>
                                                <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/2.jpg"
                                                        data-gallery="images-1"><img class="img-fluid rounded-1 mb-2"
                                                            src="../assets/img/chat/2.jpg" alt="" /></a></div>
                                                <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/3.jpg"
                                                        data-gallery="images-1"><img class="img-fluid rounded-1 mb-2"
                                                            src="../assets/img/chat/3.jpg" alt="" /></a></div>
                                                <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/4.jpg"
                                                        data-gallery="images-1"><img class="img-fluid rounded-1 mb-2"
                                                            src="../assets/img/chat/4.jpg" alt="" /></a></div>
                                                <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/5.jpg"
                                                        data-gallery="images-1"><img class="img-fluid rounded-1 mb-2"
                                                            src="../assets/img/chat/5.jpg" alt="" /></a></div>
                                                <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/6.jpg"
                                                        data-gallery="images-1"><img class="img-fluid rounded-1 mb-2"
                                                            src="../assets/img/chat/6.jpg" alt="" /></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-content-scroll-area scrollbar">
                                <div class="d-flex position-relative p-3 border-bottom mb-3 align-items-center">
                                    <div class="avatar avatar-2xl me-3">
                                        <div class="rounded-circle overflow-hidden h-100 d-flex">
                                            <div class="w-50 border-end"><img src="../assets/img/team/1.jpg"
                                                    alt="" /></div>
                                            <div class="w-50 d-flex flex-column"><img class="h-50 border-bottom"
                                                    src="../assets/img/team/2.jpg" alt="" /><img
                                                    class="h-50" src="../assets/img/team/3.jpg" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700"
                                                href="../pages/user/profile.html">Avengers</a></h6>
                                        <p class="mb-0">You are a member of Avengers. Say hi to start conversation to
                                            the group.
                                        </p>
                                    </div>
                                </div>
                                <div class="text-center fs--2 text-500"><span>May 5, 2019, 11:54 am</span></div>
                                <div class="d-flex p-3">
                                    <div class="avatar avatar-l me-2">
                                        <img class="rounded-circle" src="../assets/img/team/13.jpg" alt="" />

                                    </div>
                                    <div class="flex-1">
                                        <div class="w-xxl-75">
                                            <div class="hover-actions-trigger d-flex align-items-center">
                                                <div class="chat-message bg-200 p-2 rounded-2">In an organisation stature,
                                                    this is a must. Besides, we need to quickly establish all other
                                                    professional appearances, e.g. having a website where members’ profile
                                                    will be displayed along with other organisational information. Providing
                                                    services to existing members is more important than attracting new
                                                    members at this moment, in my opinion.</div>
                                                <ul
                                                    class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Forward"><span class="fas fa-share"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Archive"><span class="fas fa-archive"></span></a>
                                                    </li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit"><span class="fas fa-edit"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Remove"><span class="fas fa-trash-alt"></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="text-400 fs--2"><span
                                                    class="fw-semi-bold me-2">Anna</span><span>11:54 am</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex p-3">
                                    <div class="flex-1 d-flex justify-content-end">
                                        <div class="w-100 w-xxl-75">
                                            <div class="hover-actions-trigger d-flex flex-end-center">
                                                <ul
                                                    class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Forward"><span class="fas fa-share"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Archive"><span class="fas fa-archive"></span></a>
                                                    </li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit"><span class="fas fa-edit"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Remove"><span class="fas fa-trash-alt"></span></a>
                                                    </li>
                                                </ul>
                                                <div class="bg-primary text-white p-2 rounded-2 chat-message light">Your
                                                    are right 👍
                                                </div>
                                            </div>
                                            <div class="text-400 fs--2 text-end">11:54 am<span
                                                    class="fas fa-check ms-2 text-success"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex p-3">
                                    <div class="avatar avatar-l me-2">
                                        <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />

                                    </div>
                                    <div class="flex-1">
                                        <div class="w-xxl-75">
                                            <div class="hover-actions-trigger d-flex align-items-center">
                                                <div class="chat-message bg-200 p-2 rounded-2">We should divide the tasks
                                                    among all other members.</div>
                                                <ul
                                                    class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Forward"><span class="fas fa-share"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Archive"><span class="fas fa-archive"></span></a>
                                                    </li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit"><span class="fas fa-edit"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Remove"><span class="fas fa-trash-alt"></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="text-400 fs--2"><span
                                                    class="fw-semi-bold me-2">Antony</span><span>11:54 am</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex p-3">
                                    <div class="avatar avatar-l me-2">
                                        <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />

                                    </div>
                                    <div class="flex-1">
                                        <div class="w-xxl-75">
                                            <div class="hover-actions-trigger d-flex align-items-center">
                                                <div class="chat-message bg-200 p-2 rounded-2">I will make a list of all
                                                    the tasks.</div>
                                                <ul
                                                    class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Forward"><span class="fas fa-share"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Archive"><span class="fas fa-archive"></span></a>
                                                    </li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit"><span class="fas fa-edit"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Remove"><span class="fas fa-trash-alt"></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="text-400 fs--2"><span
                                                    class="fw-semi-bold me-2">John</span><span>11:54 am</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center fs--2 text-500"><span>May 7, 2019, 11:54 am</span></div>
                                <div class="d-flex p-3">
                                    <div class="flex-1 d-flex justify-content-end">
                                        <div class="w-100 w-xxl-75">
                                            <div class="hover-actions-trigger d-flex flex-end-center">
                                                <ul
                                                    class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Forward"><span class="fas fa-share"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Archive"><span class="fas fa-archive"></span></a>
                                                    </li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit"><span class="fas fa-edit"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Remove"><span class="fas fa-trash-alt"></span></a>
                                                    </li>
                                                </ul>
                                                <div class="bg-primary text-white p-2 rounded-2 chat-message light">I can
                                                    help you to do this.
                                                </div>
                                            </div>
                                            <div class="text-400 fs--2 text-end">11:54 am<span
                                                    class="fas fa-check ms-2 text-success"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex p-3">
                                    <div class="avatar avatar-l me-2">
                                        <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />

                                    </div>
                                    <div class="flex-1">
                                        <div class="w-xxl-75">
                                            <div class="hover-actions-trigger d-flex align-items-center">
                                                <div class="chat-message bg-200 p-2 rounded-2">It will be a great
                                                    opportunity if I can contribute to this task 😊</div>
                                                <ul
                                                    class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Forward"><span class="fas fa-share"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Archive"><span class="fas fa-archive"></span></a>
                                                    </li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit"><span class="fas fa-edit"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Remove"><span class="fas fa-trash-alt"></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="text-400 fs--2"><span
                                                    class="fw-semi-bold me-2">Emma</span><span>11:54 am</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex p-3">
                                    <div class="avatar avatar-l me-2">
                                        <img class="rounded-circle" src="../assets/img/team/5.jpg" alt="" />

                                    </div>
                                    <div class="flex-1">
                                        <div class="w-xxl-75">
                                            <div class="hover-actions-trigger d-flex align-items-center">
                                                <div class="chat-message bg-200 p-2 rounded-2">Wow, it will be great!
                                                </div>
                                                <ul
                                                    class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Forward"><span class="fas fa-share"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Archive"><span class="fas fa-archive"></span></a>
                                                    </li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit"><span class="fas fa-edit"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Remove"><span class="fas fa-trash-alt"></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="text-400 fs--2"><span
                                                    class="fw-semi-bold me-2">Bucky</span><span>11:54 am</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex p-3">
                                    <div class="avatar avatar-l me-2">
                                        <img class="rounded-circle" src="../assets/img/team/5.jpg" alt="" />

                                    </div>
                                    <div class="flex-1">
                                        <div class="w-xxl-75">
                                            <div class="hover-actions-trigger d-flex align-items-center">
                                                <div class="chat-message bg-200 p-2 rounded-2"><a href="#!"
                                                        class="text-primary">@Emma</a> What do you think about the plan?
                                                </div>
                                                <ul
                                                    class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Forward"><span class="fas fa-share"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Archive"><span class="fas fa-archive"></span></a>
                                                    </li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit"><span class="fas fa-edit"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Remove"><span class="fas fa-trash-alt"></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="text-400 fs--2"><span
                                                    class="fw-semi-bold me-2">Bucky</span><span>11:54 am</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane card-chat-pane" id="chat-2" role="tabpanel"
                        aria-labelledby="chat-link-2">
                        <div class="chat-content-header">
                            <div class="row flex-between-center">
                                <div class="col-6 col-sm-8 d-flex align-items-center"><a
                                        class="pe-3 text-700 d-md-none contacts-list-show" href="#!">
                                        <div class="fas fa-chevron-left"></div>
                                    </a>
                                    <div class="min-w-0">
                                        <h5 class="mb-0 text-truncate fs-0">Emma Watson</h5>
                                        <div class="fs--2 text-400">Active 7h ago
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="2"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Call"><span
                                            class="fas fa-phone"></span></button>
                                    <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="2"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Start a Video Call"><span class="fas fa-video"></span></button>
                                    <button class="btn btn-sm btn-falcon-primary btn-info" type="button"
                                        data-index="2" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Conversation Information"><span class="fas fa-info"></span></button>
                                </div>
                            </div>
                        </div>
                        <div class="chat-content-body" style="display: inherit;">
                            <div class="conversation-info" data-index="2">
                                <div class="h-100 overflow-auto scrollbar">
                                    <div class="d-flex position-relative align-items-center p-3 border-bottom">
                                        <div class="avatar avatar-xl">
                                            <img class="rounded-circle" src="../assets/img/team/1.jpg"
                                                alt="" />

                                        </div>
                                        <div class="flex-1 ms-2 d-flex flex-between-center">
                                            <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700"
                                                    href="../pages/user/profile.html">Emma Watson</a></h6>
                                            <div class="dropdown z-index-1">
                                                <button
                                                    class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none me-n3"
                                                    type="button" id="profile-dropdown-2" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"><span
                                                        class="fas fa-cog"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2"
                                                    aria-labelledby="profile-dropdown-2"><a class="dropdown-item"
                                                        href="#!">Mute</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item"
                                                        href="#!">Archive</a><a class="dropdown-item text-danger"
                                                        href="#!">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-3 pt-2">
                                        <div class="nav flex-column font-sans-serif fw-medium"><a
                                                class="nav-link d-flex align-items-center py-1 px-0 text-600"
                                                href="#!"><span class="conversation-info-icon"><span
                                                        class="fas fa-search me-1"
                                                        data-fa-transform="shrink-1 down-3"></span></span>Search in
                                                Conversation</a><a
                                                class="nav-link d-flex align-items-center py-1 px-0 text-600"
                                                href="#!"><span class="conversation-info-icon"><span
                                                        class="fas fa-pencil-alt me-1"
                                                        data-fa-transform="shrink-1"></span></span>Edit Nicknames</a><a
                                                class="nav-link d-flex align-items-center py-1 px-0 text-600"
                                                href="#!"><span class="conversation-info-icon"><span
                                                        class="fas fa-palette me-1"
                                                        data-fa-transform="shrink-1"></span></span><span>Change
                                                    Color</span></a><a
                                                class="nav-link d-flex align-items-center py-1 px-0 text-600"
                                                href="#!"><span class="conversation-info-icon"><span
                                                        class="fas fa-thumbs-up me-1"
                                                        data-fa-transform="shrink-1"></span></span>Change Emoji</a><a
                                                class="nav-link d-flex align-items-center py-1 px-0 text-600"
                                                href="#!"><span class="conversation-info-icon"><span
                                                        class="fas fa-bell me-1"
                                                        data-fa-transform="shrink-1"></span></span>Notifications</a></div>
                                    </div>
                                    <hr class="my-2" />
                                    <div class="px-3" id="others-info-2">
                                        <div class="title" id="shared-media-title-2"><a
                                                class="btn btn-link btn-accordion hover-text-decoration-none dropdown-indicator"
                                                href="#shared-media-2" data-bs-toggle="collapse" aria-expanded="false"
                                                aria-controls="shared-media-2">Shared media</a></div>
                                        <div class="collapse" id="shared-media-2"
                                            aria-labelledby="shared-media-title-2" data-parent="#others-info-2">
                                            <div class="row mx-n1">
                                                <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/1.jpg"
                                                        data-gallery="images-1"><img class="img-fluid rounded-1 mb-2"
                                                            src="../assets/img/chat/1.jpg" alt="" /></a></div>
                                                <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/2.jpg"
                                                        data-gallery="images-1"><img class="img-fluid rounded-1 mb-2"
                                                            src="../assets/img/chat/2.jpg" alt="" /></a></div>
                                                <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/3.jpg"
                                                        data-gallery="images-1"><img class="img-fluid rounded-1 mb-2"
                                                            src="../assets/img/chat/3.jpg" alt="" /></a></div>
                                                <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/4.jpg"
                                                        data-gallery="images-1"><img class="img-fluid rounded-1 mb-2"
                                                            src="../assets/img/chat/4.jpg" alt="" /></a></div>
                                                <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/5.jpg"
                                                        data-gallery="images-1"><img class="img-fluid rounded-1 mb-2"
                                                            src="../assets/img/chat/5.jpg" alt="" /></a></div>
                                                <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/6.jpg"
                                                        data-gallery="images-1"><img class="img-fluid rounded-1 mb-2"
                                                            src="../assets/img/chat/6.jpg" alt="" /></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-content-scroll-area scrollbar">
                                <div class="d-flex position-relative p-3 border-bottom mb-3 align-items-center">
                                    <div class="avatar avatar-2xl me-3">
                                        <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />

                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700"
                                                href="../pages/user/profile.html">Emma Watson</a></h6>
                                        <p class="mb-0">You friends with Emma Watson. Say hi to start the conversation
                                        </p>
                                    </div>
                                </div>
                                <div class="text-center fs--2 text-500"><span>May 5, 2019, 11:54 am</span></div>
                                <div class="d-flex p-3">
                                    <div class="flex-1 d-flex justify-content-end">
                                        <div class="w-100 w-xxl-75">
                                            <div class="hover-actions-trigger d-flex flex-end-center">
                                                <ul
                                                    class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Forward"><span class="fas fa-share"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Archive"><span class="fas fa-archive"></span></a>
                                                    </li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit"><span class="fas fa-edit"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Remove"><span class="fas fa-trash-alt"></span></a>
                                                    </li>
                                                </ul>
                                                <div class="bg-primary text-white p-2 rounded-2 chat-message light">Hello
                                                </div>
                                            </div>
                                            <div class="text-400 fs--2 text-end">11:54 am<span
                                                    class="fas fa-check ms-2 text-success"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex p-3">
                                    <div class="flex-1 d-flex justify-content-end">
                                        <div class="w-100 w-xxl-75">
                                            <div class="hover-actions-trigger d-flex flex-end-center">
                                                <ul
                                                    class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Forward"><span class="fas fa-share"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Archive"><span class="fas fa-archive"></span></a>
                                                    </li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit"><span class="fas fa-edit"></span></a></li>
                                                    <li class="list-inline-item"><a class="chat-option" href="#!"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Remove"><span class="fas fa-trash-alt"></span></a>
                                                    </li>
                                                </ul>
                                                <div class="bg-primary text-white p-2 rounded-2 chat-message light">🙂
                                                </div>
                                            </div>
                                            <div class="text-400 fs--2 text-end">11:54 am<span
                                                    class="fas fa-check ms-2 text-success"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <form class="chat-editor-area">
                        <input class="d-none" type="file" id="chat-file-upload" />
                        <label class="mb-0 p-1 chat-file-upload cursor-pointer" for="chat-file-upload"><span
                                class="fas fa-paperclip"></span></label>
                        <div class="btn btn-link p-0 emoji-icon" data-emoji-button="data-emoji-button"><span
                                class="far fa-laugh-beam"></span></div>
                        <div class="emojiarea-editor outline-none scrollbar" contenteditable="true"></div>
                        <button class="btn btn-sm btn-send" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
