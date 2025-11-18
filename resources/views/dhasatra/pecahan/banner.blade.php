<div id="heroSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
    <div class="carousel-inner">

        @foreach($banner as $index => $item)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <div class="hero_banner home-4 position-relative">
                <div class="container">
                    <div class="row align-items-center justify-content-between g-4">
                        <div class="col-xl-6 col-lg-6 col-md-12">

                            <div class="hero-caption mb-2">
                                <h1 class="big-header-capt text-dark mb-0">{{ $item->keterangan }}</h1>
                            </div>

                            <div class="d-block mt-2">
                                <div class="d-flex align-items-center justify-content-start flex-wrap gap-3">
                                    <div class="join-buttons">
                                        <a href="#" class="btn btn-main rounded-pill">Enrolled Today Now</a>
                                    </div>
                                    <div class="join-buttons d-flex align-items-center justify-content-start gap-2">
                                        <a id="play-video" class="video-play-button" 
                                           href="https://www.youtube.com/embed/hXAdt5w3sPQ" 
                                           data-bs-toggle="modal" 
                                           data-bs-target="#savoybeachhotel"><span></span></a>
                                        <a href="https://www.youtube.com/embed/hXAdt5w3sPQ" 
                                           id="play-video" 
                                           class="fw-semibold" 
                                           data-bs-toggle="modal" 
                                           data-bs-target="#savoybeachhotel">How It Works?</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-5 col-lg-6 col-md-12">
                            <div class="hero-image d-block d-lg-none">
                                <img src="{{ asset('assets/images/men.png') }}" class="img-fluid" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="position-absolute end-0 bottom-0 d-lg-block d-none">
                    <img src="{{ asset($item->path_gambar) }}" class="img-fluid" width="700" alt="Image">
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
