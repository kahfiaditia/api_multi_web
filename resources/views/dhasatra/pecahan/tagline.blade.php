
    <section>
				<div class="container">
				
					<!-- Heading Row -->
					<div class="row justify-content-center">
						<div class="col-lg-8 col-md-10 col-sm-12">
							<div class="sec-heading center">
								<h2>Area Praktek</h2>
								<p>Jelajahi area praktik kami yang sesuai dengan kebutuhan Anda. Advokat kami yang berpengalaman di firma hukum telah berhasil membantu puluhan perusahaan dan bisnis besar di Indonesia.</p>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-center g-4">

                        
                        @foreach ($tagline as $item)

                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="edu_cat_2 cat-0">
                                    <div class="edu_cat_icons">
                                        <a class="pic-main" href="#"><img src="{{ asset($item->path_gambar) }}" class="img-fluid" alt="" /></a>
                                    </div>
                                    <div class="edu_cat_data">
                                        <h4 class="title"><a href="#">{{ $item->judul }}</a></h4>
                                        {{-- <ul class="meta">
                                            <li class="video"><i class="ti-video-clapper"></i>23 Classes</li>
                                        </ul> --}}
                                    </div>
                                </div>							
                            </div>
						
                            
                        @endforeach
					</div>
					
				</div>
</section>

