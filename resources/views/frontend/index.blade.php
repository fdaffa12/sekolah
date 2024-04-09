@extends('frontend.master')
@section('dashboard') active @endsection
@section ('title')
<title>Home</title>
@endsection

@section ('content')
	
	<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
		<div class="carousel-inner" role="listbox">
			@foreach($banners as $key => $banner)
			<div class="carousel-item {{$key == 0 ? 'active' : '' }}">
				<img src="{{asset($banner->image)}}" width="100%">
			</div>
			@endforeach
			<!-- Left Control -->
			<a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>

	<hr style="size: 50px; color: yellow">

	<div id="overviews" class="section wb">
        <div class="container">
        	<div class="message-box">
        	<h4>Berita Terbaru</h4>
        	</div>
            <div class="row">
				<div class="col-lg-9 blog-post-single">
					<div class="page-wrapper">
						<div class="blog-list clearfix">
							@foreach($posts->take(5) as $post)
							<div class="blog-box row">
								<div class="col-md-4">
									<div class="post-media">
										<a href="{{url('post/'.$post->post_slug)}}" title="">
											<img src="{{asset($post->image)}}" alt="" class="img-fluid">
											<div class="hovereffect"></div>
										</a>
									</div><!-- end media -->
								</div><!-- end col -->

								<div class="blog-meta big-meta col-md-8">
									<h4><a href="{{url('post/'.$post->post_slug)}}">{{$post->post_title}}</a></h4>
									<p>{!! substr($post->description,0,300) !!}</p>
									<a href="{{url('post/'.$post->post_slug)}}"></a>
									<i class="fa fa-calendar"></i>
									<small>{{ $post->created_at->format('d/m/Y H:i') }}</small>
									<i class="fa fa-eye"></i>
									<small>{{ $post->views + 1 }}
                                        @if($post->views !=0)
                                        Views 
                                        @else
                                        View
                                        @endif
									</small>
								</div><!-- end meta -->
							</div><!-- end blog-box -->
							@endforeach

							<div class="d-flex justify-content-center" style="padding-top:20px">
							{{ $posts->links() }}
							</div>

							<hr class="invis">
						</div>
					</div><!-- end page-wrapper -->
				</div><!-- end col -->
				<div class="col-lg-3 col-12 right-single">
					<div class="widget-categories">
						<h3 class="widget-title">Paten</h3>
						@foreach($paten as $pt)
						<ul>
							<li><i class="fa fa-book" style="color:#eea412; margin-right:5px;"></i><a href="{{url('paten/'.$pt->judul_slug)}}">{{$pt->judul}}</a></li>
						</ul>
						@endforeach
					</div>

					<div class="widget-categories">
						<h3 class="widget-title">Unduhan</h3>
						@foreach($unduhan as $ud)
						<ul>
							<li><i class="fa fa-download" style="color:#eea412; margin-right:5px;"></i><a href="{{asset($ud->file)}}" download="">{{$ud->judul}}</a></li>
						</ul>
						@endforeach
						<div align="center" style="padding-top:20px;">
						<a href="{{url('unduhan')}}" class="btn btn-info">Index</a>
						</div>
					</div>

					<div class="widget-categories">
						<h3 class="widget-title">Agenda</h3>
						@foreach($agenda as $agen)
						<ul>
							<li><i class="fa fa-calendar" style="color:#eea412; margin-right:5px;"></i><a href="{{url('agenda/detail/'.$agen->slug)}}">{{$agen->nama}}</a></li>
						</ul>
						@endforeach
						<div align="center" style="padding-top:20px;">
						<a href="{{url('agenda')}}" class="btn btn-info">Index</a>
						</div>
					</div>
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

	<div id="teachers" class="section wb">
        <div class="container">
			<div class="section-title text-center">
                <h3>Struktur Organisasi</h3>
            </div><!-- end title -->
            <div class="row">
				@foreach($struktur as $st)
				<div class="col-lg-3 col-md-6 col-12">
					<div class="our-team">
						<div class="team-img">
							<img src="{{asset($st->image)}}">
							<div class="social">
								<ul>
									<li><a href="#" class="fa fa-facebook"></a></li>
									<li><a href="#" class="fa fa-twitter"></a></li>
									<li><a href="#" class="fa fa-linkedin"></a></li>
									<li><a href="#" class="fa fa-skype"></a></li>
								</ul>
							</div>
						</div>
						<div class="team-content">
							<h3 class="title">{{$st->nama}}</h3>
							<small class="nip">{{$st->nip}}</small>
							<span class="post">{{$st->jabatan}}</span>
						</div>
					</div>
				</div>
				@endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->	

@endsection