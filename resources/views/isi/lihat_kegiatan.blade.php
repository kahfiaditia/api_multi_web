@extends('depan.utama')
@section('contentx')

    <section class="blog-details">
        <div class="container">
            <div class="row">

                <!--Start Blog Details Content-->
                <div class="col-xl-8">
                    <div class="blog-details__content">
                        <div class="blog-details__content-img1">
                            <img src="{{ asset('assets/images/blog/'. $isi->gambar1) }}" alt="">
                        </div>

                        <div class="blog-details__content-text1">
                            <h2>{{ $isi->judul }}</h2>
                            <p class="text1">{!! $isi->isi !!}</p>
                            </p>
                            
                        </div>

                        <div class="blog-details__content-text2">
                            <p>Aliquam eros justo, posuere loborti viverra laoreet matti ullamcorper posuere vive
                                rra .Aliquam eros justo, posuere lobortis, viverra laoreet augue mattis fermentu m
                                ul amcorper viverra laoreet.</p>
                            <div class="author-text">
                                <h3>Jhone Alex</h3>
                            </div>
                            <div class="quote-icon">
                                <span class="icon-quote"></span>
                            </div>
                        </div>

                        <div class="blog-details__content-text3">
                            {{-- <p>Web designing looking of any website is the first impression on visitors .Web design
                                in a powerful way of just not an only professions, however, in a passion for our We
                                have Company. We have in a powerful way of just not an only professions
                            </p> --}}


                            <div class="blog-details__content-tag-social">
                                <div class="blog-details__content-tag">
                                    <div class="title">
                                        <h3>Keyword:</h3>
                                    </div>
                                    <ul>
                                        <li><a href="#">Interiour</a></li>
                                        <li><a href="#">Roof</a></li>
                                        <li><a href="#">Graphics</a></li>
                                    </ul>
                                </div>
                                <div class="blog-details__content-social">
                                    <div class="social-links">
                                        <a href="#"><span class="icon-facebook-app-symbol"></span></a>
                                        <a href="#"><span class="icon-linkedin"></span></a>
                                        <a href="#"><span class="icon-instagram"></span></a>
                                        <a href="#"><span class="icon-twitter"></span></a>
                                    </div>
                                </div>
                            </div>
                            <ul class="blog-details__next-previous">
                                <li>
                                    <a href="#">
                                        <span class="icon-right-arrow"></span>
                                        Previous post
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Next post
                                        <span class="icon-right-arrow1 two"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <!--End Blog Details Content-->

                <!--Start Sidebar-->
                <div class="col-xl-4">
                    <div class="sidebar">
                        

                        <div class="sidebar__single sidebar__category">
                            <div class="sidebar__title-box">
                                <div class="sidebar__title-icon">
                                    <img src="assets/images/icon/sidebar-title-icon.png" alt="">
                                </div>
                                <h3 class="sidebar__title">Category </h3>
                            </div>
                            <ul class="sidebar__category-list list-unstyled">
                                <li>
                                    <a href="#">New Technologies<span>(15)</span></a>
                                </li>
                                <li class="active">
                                    <a href="#">Construction Introductions<span>(20)</span></a>
                                </li>
                                <li>
                                    <a href="#">Instralation Accecories<span>(42)</span></a>
                                </li>
                                <li>
                                    <a href="#">Business Advice<span>(89)</span></a>
                                </li>
                                <li>
                                    <a href="#">Corporate Standup<span>(19)</span></a>
                                </li>
                            </ul>
                        </div>

                        <div class="sidebar__single sidebar__post">
                            <div class="sidebar__title-box">
                                <div class="sidebar__title-icon">
                                    <img src="assets/images/icon/sidebar-title-icon.png" alt="">
                                </div>
                                <h3 class="sidebar__title">Recent Post </h3>
                            </div>
                            <ul class="sidebar__post-list list-unstyled">
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="assets/images/blog/sidebar-img1.jpg" alt="">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                            <a href="#">We won best factory award of the ...</a>
                                        </h3>
                                        <p class="sidebar__post-date"><span class="fas fa-calendar-alt"></span>March
                                            27,
                                            2025</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="assets/images/blog/sidebar-img2.jpg" alt="">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                            <a href="#">Modern extension to brick house </a>
                                        </h3>
                                        <p class="sidebar__post-date"><span class="fas fa-calendar-alt"></span>Aug
                                            15,
                                            2025</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="assets/images/blog/sidebar-img3.jpg" alt="">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                            <a href="#">Mauris non dignissim commodo Instralation
                                            </a>
                                        </h3>
                                        <p class="sidebar__post-date"><span class="fas fa-calendar-alt"></span>July
                                            22,
                                            2025</p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        

                        
                    </div>
                </div>
                <!--End Sidebar-->
            </div>
        </div>
    </section>
<!--End Blog Details-->
@endsection