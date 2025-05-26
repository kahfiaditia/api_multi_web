@extends('depan.utama')
@section('contentx')

        <section class="blog-page">
            <div class="container">
                <div class="row">
                    <!--Start Blog Page Content-->
                    <div class="col-xl-8">
                        <div class="blog-page__content">
                            <!--Start Blog Page Single-->
                            @foreach ($kegiatan as $item)
                                <div class="blog-page__single">
                                    <div class="blog-page__single-img">
                                        <img src="{{ asset('assets/images/blog/'. $item->gambar1) }}" alt="">
                                    </div>
                                    <div class="blog-page__single-content">
                                        <ul class="meta-box">
                                            <li>
                                                <p>{{ $item->created_at }}</p>
                                            </li>

                                            <li>
                                                <p><span class="icon-bubble-chat"></span> <a href="#">Comments (05)</a></p>
                                            </li>
                                        </ul>
                                        <h2><a>{{ $item->judul }}</a></h2>
                                        <p>{!! Str::limit($item->isi, 150, '...') !!}</p>
                                        <div class="btn-box">
                                            <a href="{{ route('kegiatan.show',  $item->id) }}" class="thm-btn">Read More <span
                                                    class="icon-next1"></span></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                            <!--End Blog Page Single-->

                            <ul class="styled-pagination clearfix">
                                <li class="arrow prev active"><a href="#"><span class="icon-right-arrow"></span></a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="arrow next"><a href="#"><span class="icon-right-arrow1"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--End Blog Page Content-->

                    <!--Start Sidebar-->
                    <div class="col-xl-4">
                        <div class="sidebar">
                           

                            <div class="sidebar__single sidebar__category">
                                <div class="sidebar__title-box">
                                    <div class="sidebar__title-icon">
                                        <img src="{assets/images/icon/sidebar-title-icon.png}" alt="">
                                    </div>
                                    <h3 class="sidebar__title">Category </h3>
                                </div>
                                <ul class="sidebar__category-list list-unstyled">
                                    <li>
                                        <a href="blog-details.html">New Technologies<span>(15)</span></a>
                                    </li>
                                    <li class="active">
                                        <a href="blog-details.html">Construction Introductions<span>(20)</span></a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html">Instralation Accecories<span>(42)</span></a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html">Business Advice<span>(89)</span></a>
                                    </li>
                                    <li>
                                        <a href="blog-details.html">Corporate Standup<span>(19)</span></a>
                                    </li>
                                </ul>
                            </div>

                            
                        </div>
                    </div>
                    <!--End Sidebar-->
                </div>
            </div>
        </section>
<!--End Blog Page-->

@endsection