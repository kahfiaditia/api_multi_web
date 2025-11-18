<div class="hero_banner home-7 position-relative border-bottom">
    <div class="container">
        <div class="row align-items-center justify-content-between g-4">
            <div class="col-xl-6 col-lg-6 col-md-12">

                <div class="d-block mb-3">
                    <div
                        class="d-inline-flex align-items-center justify-content-start bg-white rounded-pill border py-1 px-2 pe-3 gap-2">
                        <div class="new label bg-green rounded-pill">New</div>
                        <div class="capstion">
                            <span class="text-dark">{{ $about->nama }}</span>
                        </div>
                    </div>
                </div>
                <h1 class="big-header-capt fw-bold text-dark mb-0">Firma Hukum</h1>
                <p>
                   {!! $about->area  !!}
                </p>
               




                <div class="d-block mt-2">
                    <div class="d-flex align-items-center justify-content-start gap-3">
                        <a href="#" class="btn btn-main px-4">Join For Free</a>
                        <a href="#" class="btn btn-outline-dark ">Browse Our Courses</a>
                    </div>
                </div>

            </div>

            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="hero-image position-relative ps-xl-5">
                    <div class="position-absolute bottom-25 start-0 ms-n8 end-0 d-flex flex-column align-items-start">
                        <div class="bg-white rounded-pill py-2 px-3 shadow-sm mb-2 d-inline-block animate-leftright">
                            <span class="text-green me-1"><i class="bi bi-book-half"></i></span>
                            <span class="text-dark fw-medium">200+ Programes</span>
                        </div>
                        <div class="bg-white rounded-pill py-2 px-3 shadow-sm mb-2 d-inline-block animate-leftright">
                            <span class="text-info me-1"><i class="bi bi-people"></i></span>
                            <span class="text-dark fw-medium">80+ Expert Instructors</span>
                        </div>
                        <div class="bg-white rounded-pill py-2 px-3 shadow-sm mb-2 d-inline-block animate-leftright">
                            <span class="text-red me-1"><i class="bi bi-shield-fill-check"></i></span>
                            <span class="text-dark fw-medium">Certified Learning</span>
                        </div>
                    </div>
                    <img src="{{ asset($about->path_sambutan) }}" class="img-fluid">
                    <div class="bg-white rounded-4 p-3 pe-4 position-absolute end-0 bottom-0 shadow-sm animate-bounce">
                        <div class="text-dark fw-bold fs-4 m-0">75k+</div>
                        <div class="text-gray-500">Students Enrolled with us</div>
                        <div class="avatar-group mt-3">
                            <span class="avatar-single">
                                <img alt="avatar" src="https://placehold.co/500x500"
                                    class="img-fluid border thumb-sm circle">
                            </span>
                            <span class="avatar-single">
                                <img alt="avatar" src="https://placehold.co/500x500"
                                    class="img-fluid border thumb-sm circle">
                            </span>
                            <span class="avatar-single">
                                <img alt="avatar" src="https://placehold.co/500x500"
                                    class="img-fluid border thumb-sm circle">
                            </span>
                            <span class="avatar-single">
                                <img alt="avatar" src="https://placehold.co/500x500"
                                    class="img-fluid border thumb-sm circle">
                            </span>
                            <span class="avatar-single">
                                <img alt="avatar" src="https://placehold.co/500x500"
                                    class="img-fluid border thumb-sm circle">
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
