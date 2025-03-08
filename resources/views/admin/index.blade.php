@extends('admin.admin-base')

@section('body-content')
    <div class="row g-0">
        <div class="col-md-6 col-xxl-3 mb-3 pe-md-2">
            <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2 d-flex align-items-center">Weekly Sales<span class="ms-1 text-400"
                            data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Calculated according to last week's sales"><span class="far fa-question-circle"
                                data-fa-transform="shrink-1"></span></span></h6>
                </div>
                <div class="card-body d-flex flex-column justify-content-end">
                    <div class="row">
                        <div class="col">
                            <p class="font-sans-serif lh-1 mb-1 fs-4">$47K</p><span
                                class="badge badge-soft-success rounded-pill fs--2">+3.5%</span>
                        </div>
                        <div class="col-auto ps-0">
                            <div class="echart-bar-weekly-sales h-100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3 mb-3 ps-md-2 pe-xxl-2">
            <div class="card h-md-100">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2">Total Order</h6>
                </div>
                <div class="card-body d-flex flex-column justify-content-end">
                    <div class="row justify-content-between">
                        <div class="col-auto align-self-end">
                            <div class="fs-4 fw-normal font-sans-serif text-700 lh-1 mb-1">58.4K</div><span
                                class="badge rounded-pill fs--2 bg-200 text-primary"><span
                                    class="fas fa-caret-up me-1"></span>13.6%</span>
                        </div>
                        <div class="col-auto ps-0 mt-n4">
                            <div class="echart-default-total-order"
                                data-echarts='{"tooltip":{"trigger":"axis","formatter":"{b0} : {c0}"},"xAxis":{"data":["Week 4","Week 5","week 6","week 7"]},"series":[{"type":"line","data":[20,40,100,120],"smooth":true,"lineStyle":{"width":3}}],"grid":{"bottom":"2%","top":"2%","right":"10px","left":"10px"}}'
                                data-echart-responsive="true"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xxl-3 mb-3 pe-md-2 ps-xxl-2">
            <div class="card h-md-100">
                <div class="card-body">
                    <div class="row h-100 justify-content-between g-0">
                        <div class="col-5 col-sm-6 col-xxl pe-2">
                            <h6 class="mt-1">Market Share</h6>
                            <div class="fs--2 mt-3">
                                <div class="d-flex flex-between-center mb-1">
                                    <div class="d-flex align-items-center"><span class="dot bg-primary"></span><span
                                            class="fw-semi-bold">samsung</span></div>
                                    <div class="d-xxl-none">33%</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                    <div class="d-flex align-items-center"><span class="dot bg-info"></span><span
                                            class="fw-semi-bold">Huawei</span></div>
                                    <div class="d-xxl-none">29%</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                    <div class="d-flex align-items-center"><span class="dot bg-300"></span><span
                                            class="fw-semi-bold">Huawei</span></div>
                                    <div class="d-xxl-none">20%</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto position-relative">
                            <div class="echart-market-share"></div>
                            <div class="position-absolute top-50 start-50 translate-middle text-dark fs-2">26M</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3 mb-3 ps-md-2">
            <div class="card h-md-100">
                <div class="card-header d-flex flex-between-center pb-0">
                    <h6 class="mb-0">Weather</h6>
                    <div class="dropdown font-sans-serif btn-reveal-trigger">
                        <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                            type="button" id="dropdown-weather-update" data-bs-toggle="dropdown" data-boundary="viewport"
                            aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-weather-update">
                            <a class="dropdown-item" href="#!">View</a><a class="dropdown-item"
                                href="#!">Export</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                href="#!">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="row g-0 h-100 align-items-center">
                        <div class="col">
                            <div class="d-flex align-items-center"><img class="me-3"
                                    src="assets/img/icons/weather-icon.png" alt="" height="60" />
                                <div>
                                    <h6 class="mb-2">New York City</h6>
                                    <div class="fs--2 fw-semi-bold">
                                        <div class="text-warning">Sunny</div>Precipitation: 50%
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-center ps-2">
                            <div class="fs-4 fw-normal font-sans-serif text-primary mb-1 lh-1">31&deg;</div>
                            <div class="fs--1 text-800">32&deg; / 25&deg;</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-xxl-8">
            <div class="card overflow-hidden h-100">
                <div class="card-body p-0 management-calendar">
                    <div class="row g-3">
                        <div class="col-md-7">
                            <div class="p-card">
                                <div class="d-flex justify-content-between">
                                    <div class="order-md-1">
                                        <button class="btn btn-sm border me-1 shadow-sm" type="button" data-event="prev"
                                            data-bs-toggle="tooltip" title="Previous"><span
                                                class="fas fa-chevron-left"></span></button>
                                        <button class="btn btn-sm text-secondary border px-sm-4 shadow-sm" type="button"
                                            data-event="today">Today</button>
                                        <button class="btn btn-sm border ms-1 shadow-sm" type="button" data-event="next"
                                            data-bs-toggle="tooltip" title="Next"><span
                                                class="fas fa-chevron-right"></span></button>
                                    </div>
                                    <button class="btn btn-sm text-primary border order-md-0" type="button"
                                        data-bs-toggle="modal" data-bs-target="#addEventModal"> <span
                                            class="fas fa-plus me-2"></span>New Schedule</button>
                                </div>
                            </div>
                            <div class="calendar-outline px-3" id="managementAppCalendar"
                                data-calendar-option='{"title":"management-calendar-title","day":"management-calendar-day","events":"management-calendar-events"}'>
                            </div>
                        </div>
                        <div class="col-md-5 bg-light pt-3">
                            <div class="px-3">
                                <h4 class="mb-0 fs-0 fs-sm-1 fs-lg-2" id="management-calendar-title"></h4>
                                <p class="text-500 mb-0" id="management-calendar-day"></p>
                                <ul class="list-unstyled mt-3 scrollbar management-calendar-events"
                                    id="management-calendar-events"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4">
            <div class="card h-100">
                <div class="card-header">
                    <h6 class="mb-0">To Do List</h6>
                </div>
                <div class="card-body p-0 scrollbar to-do-list-body-height">
                    <div
                        class="d-flex justify-content-between border-top hover-actions-trigger btn-reveal-trigger px-card border-200 todo-list-item">
                        <div class="form-check mb-0 d-flex align-items-center">
                            <input
                                class="form-check-input rounded-circle form-check-line-through p-2 form-check-input-primary"
                                type="checkbox" id="checkbox-todo-0" />
                            <label class="form-check-label mb-0 p-3" for="checkbox-todo-0">Design a facebook ad</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="hover-actions">
                                <button class="btn btn-light icon-item rounded-3 me-2 fs--2 icon-item-sm"><span
                                        class="fas fa-clock"></span></button>
                                <button class="btn btn-light icon-item rounded-3 me-2 fs--2 icon-item-sm"><span
                                        class="fas fa-user-plus"> </span></button>
                            </div>
                            <div class="dropdown font-sans-serif btn-reveal-trigger">
                                <button
                                    class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none"
                                    type="button" id="management-to-do-list-0" data-bs-toggle="dropdown"
                                    data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                        class="fas fa-ellipsis-h fs--2"></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-2"
                                    aria-labelledby="management-to-do-list-0"><a class="dropdown-item"
                                        href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                        href="#!">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-top hover-actions-trigger btn-reveal-trigger px-card border-200 todo-list-item">
                        <div class="form-check mb-0 d-flex align-items-center">
                            <input
                                class="form-check-input rounded-circle form-check-line-through p-2 form-check-input-secondary"
                                type="checkbox" id="checkbox-todo-1" />
                            <label class="form-check-label mb-0 p-3" for="checkbox-todo-1">Analyze Data</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="hover-actions">
                                <button class="btn btn-light icon-item rounded-3 me-2 fs--2 icon-item-sm"><span
                                        class="fas fa-clock"></span></button>
                                <button class="btn btn-light icon-item rounded-3 me-2 fs--2 icon-item-sm"><span
                                        class="fas fa-user-plus"> </span></button>
                            </div>
                            <div class="dropdown font-sans-serif btn-reveal-trigger">
                                <button
                                    class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none"
                                    type="button" id="management-to-do-list-1" data-bs-toggle="dropdown"
                                    data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                        class="fas fa-ellipsis-h fs--2"></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-2"
                                    aria-labelledby="management-to-do-list-1"><a class="dropdown-item"
                                        href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                        href="#!">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-top hover-actions-trigger btn-reveal-trigger px-card border-200 todo-list-item">
                        <div class="form-check mb-0 d-flex align-items-center">
                            <input
                                class="form-check-input rounded-circle form-check-line-through p-2 form-check-input-success"
                                type="checkbox" id="checkbox-todo-2" />
                            <label class="form-check-label mb-0 p-3" for="checkbox-todo-2">Youtube campaign</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="hover-actions">
                                <button class="btn btn-light icon-item rounded-3 me-2 fs--2 icon-item-sm"><span
                                        class="fas fa-clock"></span></button>
                                <button class="btn btn-light icon-item rounded-3 me-2 fs--2 icon-item-sm"><span
                                        class="fas fa-user-plus"> </span></button>
                            </div>
                            <div class="dropdown font-sans-serif btn-reveal-trigger">
                                <button
                                    class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none"
                                    type="button" id="management-to-do-list-2" data-bs-toggle="dropdown"
                                    data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                        class="fas fa-ellipsis-h fs--2"></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-2"
                                    aria-labelledby="management-to-do-list-2"><a class="dropdown-item"
                                        href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                        href="#!">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-top hover-actions-trigger btn-reveal-trigger px-card border-200 todo-list-item">
                        <div class="form-check mb-0 d-flex align-items-center">
                            <input
                                class="form-check-input rounded-circle form-check-line-through p-2 form-check-input-warning"
                                type="checkbox" id="checkbox-todo-3" />
                            <label class="form-check-label mb-0 p-3" for="checkbox-todo-3">Assign 10 employee</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="hover-actions">
                                <button class="btn btn-light icon-item rounded-3 me-2 fs--2 icon-item-sm"><span
                                        class="fas fa-clock"></span></button>
                                <button class="btn btn-light icon-item rounded-3 me-2 fs--2 icon-item-sm"><span
                                        class="fas fa-user-plus"> </span></button>
                            </div>
                            <div class="dropdown font-sans-serif btn-reveal-trigger">
                                <button
                                    class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none"
                                    type="button" id="management-to-do-list-3" data-bs-toggle="dropdown"
                                    data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                        class="fas fa-ellipsis-h fs--2"></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-2"
                                    aria-labelledby="management-to-do-list-3"><a class="dropdown-item"
                                        href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                        href="#!">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-top hover-actions-trigger btn-reveal-trigger px-card border-200 todo-list-item">
                        <div class="form-check mb-0 d-flex align-items-center">
                            <input
                                class="form-check-input rounded-circle form-check-line-through p-2 form-check-input-danger"
                                type="checkbox" id="checkbox-todo-4" />
                            <label class="form-check-label mb-0 p-3" for="checkbox-todo-4">Meeting at 12</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="hover-actions">
                                <button class="btn btn-light icon-item rounded-3 me-2 fs--2 icon-item-sm"><span
                                        class="fas fa-clock"></span></button>
                                <button class="btn btn-light icon-item rounded-3 me-2 fs--2 icon-item-sm"><span
                                        class="fas fa-user-plus"> </span></button>
                            </div>
                            <div class="dropdown font-sans-serif btn-reveal-trigger">
                                <button
                                    class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none"
                                    type="button" id="management-to-do-list-4" data-bs-toggle="dropdown"
                                    data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                        class="fas fa-ellipsis-h fs--2"></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-2"
                                    aria-labelledby="management-to-do-list-4"><a class="dropdown-item"
                                        href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                        href="#!">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-top hover-actions-trigger btn-reveal-trigger px-card border-200 todo-list-item border-bottom">
                        <div class="form-check mb-0 d-flex align-items-center">
                            <input
                                class="form-check-input rounded-circle form-check-line-through p-2 form-check-input-info"
                                type="checkbox" id="checkbox-todo-5" />
                            <label class="form-check-label mb-0 p-3" for="checkbox-todo-5">Meeting at 10</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="hover-actions">
                                <button class="btn btn-light icon-item rounded-3 me-2 fs--2 icon-item-sm"><span
                                        class="fas fa-clock"></span></button>
                                <button class="btn btn-light icon-item rounded-3 me-2 fs--2 icon-item-sm"><span
                                        class="fas fa-user-plus"> </span></button>
                            </div>
                            <div class="dropdown font-sans-serif btn-reveal-trigger">
                                <button
                                    class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal-sm transition-none"
                                    type="button" id="management-to-do-list-5" data-bs-toggle="dropdown"
                                    data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                        class="fas fa-ellipsis-h fs--2"></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-2"
                                    aria-labelledby="management-to-do-list-5"><a class="dropdown-item"
                                        href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                        href="#!">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light p-0"><a class="btn btn-sm btn-link d-block py-2" href="#!"><span
                            class="fas fa-plus me-1 fs--2"></span>Add New Task</a></div>
            </div>
        </div>
    </div>

    <script></script>
@endsection
