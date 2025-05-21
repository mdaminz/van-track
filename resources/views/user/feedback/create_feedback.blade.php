@extends('user.user-base')

@section('body-content')
    <style>
        .rating-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        #full-stars-example {

            /* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
            .rating-group {
                display: inline-flex;
            }

            /* make hover effect work properly in IE */
            .rating__icon {
                pointer-events: none;
            }

            /* hide radio inputs */
            .rating__input {
                position: absolute !important;
                left: -9999px !important;
            }

            /* set icon padding and size */
            .rating__label {
                cursor: pointer;
                padding: 0 0.1em;
                font-size: 2rem;
            }

            /* set default star color */
            .rating__icon--star {
                color: orange;
            }

            /* set color of none icon when unchecked */
            .rating__icon--none {
                color: #eee;
            }

            /* if none icon is checked, make it red */
            .rating__input--none:checked+.rating__label .rating__icon--none {
                color: red;
            }

            /* if any input is checked, make its following siblings grey */
            .rating__input:checked~.rating__label .rating__icon--star {
                color: #ddd;
            }

            /* make all stars orange on rating group hover */
            .rating-group:hover .rating__label .rating__icon--star {
                color: orange;
            }

            /* make hovered input's following siblings grey on hover */
            .rating__input:hover~.rating__label .rating__icon--star {
                color: #ddd;
            }

            /* make none icon grey on rating group hover */
            .rating-group:hover .rating__input--none:not(:hover)+.rating__label .rating__icon--none {
                color: #eee;
            }

            /* make none icon red on hover */
            .rating__input--none:hover+.rating__label .rating__icon--none {
                color: red;
            }
        }

        #half-stars-example {

            /* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
            .rating-group {
                display: inline-flex;
            }

            /* make hover effect work properly in IE */
            .rating__icon {
                pointer-events: none;
            }

            /* hide radio inputs */
            .rating__input {
                position: absolute !important;
                left: -9999px !important;
            }

            /* set icon padding and size */
            .rating__label {
                cursor: pointer;
                /* if you change the left/right padding, update the margin-right property of .rating__label--half as well. */
                padding: 0 0.1em;
                font-size: 2rem;
            }

            /* add padding and positioning to half star labels */
            .rating__label--half {
                padding-right: 0;
                margin-right: -0.6em;
                z-index: 2;
            }

            /* set default star color */
            .rating__icon--star {
                color: orange;
            }

            /* set color of none icon when unchecked */
            .rating__icon--none {
                color: #eee;
            }

            /* if none icon is checked, make it red */
            .rating__input--none:checked+.rating__label .rating__icon--none {
                color: red;
            }

            /* if any input is checked, make its following siblings grey */
            .rating__input:checked~.rating__label .rating__icon--star {
                color: #ddd;
            }

            /* make all stars orange on rating group hover */
            .rating-group:hover .rating__label .rating__icon--star,
            .rating-group:hover .rating__label--half .rating__icon--star {
                color: orange;
            }

            /* make hovered input's following siblings grey on hover */
            .rating__input:hover~.rating__label .rating__icon--star,
            .rating__input:hover~.rating__label--half .rating__icon--star {
                color: #ddd;
            }

            /* make none icon grey on rating group hover */
            .rating-group:hover .rating__input--none:not(:hover)+.rating__label .rating__icon--none {
                color: #eee;
            }

            /* make none icon red on hover */
            .rating__input--none:hover+.rating__label .rating__icon--none {
                color: red;
            }
        }

        #full-stars-example-two {

            /* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
            .rating-group {
                display: inline-flex;
            }

            /* make hover effect work properly in IE */
            .rating__icon {
                pointer-events: none;
            }

            /* hide radio inputs */
            .rating__input {
                position: absolute !important;
                left: -9999px !important;
            }

            /* hide 'none' input from screenreaders */
            .rating__input--none {
                display: none
            }

            /* set icon padding and size */
            .rating__label {
                cursor: pointer;
                padding: 0 0.1em;
                font-size: 2rem;
            }

            /* set default star color */
            .rating__icon--star {
                color: orange;
            }

            /* if any input is checked, make its following siblings grey */
            .rating__input:checked~.rating__label .rating__icon--star {
                color: #ddd;
            }

            /* make all stars orange on rating group hover */
            .rating-group:hover .rating__label .rating__icon--star {
                color: orange;
            }

            /* make hovered input's following siblings grey on hover */
            .rating__input:hover~.rating__label .rating__icon--star {
                color: #ddd;
            }


        }
    </style>

    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Create Feedback</h5>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="card cover-image mb-3"><img class="card-img-top" src="../../assets/img/generic/13.jpg" alt="" />
        <input class="d-none" id="upload-cover-image" type="file" />
        <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change
                cover photo</span></label>
    </div> --}}
    <div class="row g-0">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Add Feedback</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ 'add_feedback' }}" method="POST" class="row g-3 needs-validation" novalidate=""
                        enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="col-md-12">
                            <label class="form-label" for="validationCustom01">Rating</label>
                            <select class="form-control" name="rating" id="">
                                <option value="5">5 Star</option>
                                <option value="4">4 Star</option>
                                <option value="3">3 Star</option>
                                <option value="2">2 Star</option>
                                <option value="1">1 Star</option>
                            </select>

                        </div> --}}

                        <div class="rating-wrapper" id="full-stars-example-two">
                            <div class="rating-group">
                                <input disabled checked class="rating__input rating__input--none" name="rating"
                                    id="rating3-none" value="0" type="radio">
                                <label aria-label="1 star" class="rating__label" for="rating3-1"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rating" id="rating3-1" value="1" type="radio">
                                <label aria-label="2 stars" class="rating__label" for="rating3-2"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rating" id="rating3-2" value="2" type="radio">
                                <label aria-label="3 stars" class="rating__label" for="rating3-3"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rating" id="rating3-3" value="3" type="radio">
                                <label aria-label="4 stars" class="rating__label" for="rating3-4"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rating" id="rating3-4" value="4" type="radio">
                                <label aria-label="5 stars" class="rating__label" for="rating3-5"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rating" id="rating3-5" value="5" type="radio">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="validationCustom02">Message</label>
                            <textarea class="form-control" name="message" id="" cols="30" rows="10"></textarea>
                            <div class="invalid-feedback">Enter a message.</div>
                        </div>
                        <div class="col-12 mt-4">
                            <button class="btn btn-primary" type="submit">Add Feedback</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection