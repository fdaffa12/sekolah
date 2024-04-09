@extends('frontend.master')
@section('potensi') active @endsection
@section ('title')
<title>{{$data->potensi}}</title>
@stop
@section ('content')

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-9 blog-post-single">
                    <div class="blog-item">
						<div class="image-blog">
							<img src="{{asset($data->image)}}" alt="" class="img-fluid" style="height: 500px;">
						</div>
						<div class="post-content">
							<div class="meta-info-blog">
								<span><i class="fa fa-calendar"></i> <a href="#">{{$data->created_at}}</a> </span>
								<span><i class="fa fa-eye"></i> <a href="#">{{ $data->views + 1 }}
                                @if($data->views !=0)
                                Views 
                                @else
                                View
                                @endif</a></span>
							</div>
							<div class="blog-title">
								<h2><a href="#" title="">{{$data->potensi}}</a></h2>
							</div>
							<div class="blog-desc">
								<p>{!! $data->description !!}</p>
							</div>							
						</div>
					</div>
					
                </div><!-- end col -->
                
				<div class="col-lg-3 col-12 right-single">
					<div class="widget-categories">
						<h3 class="widget-title">Publikasi</h3>
						@foreach($publikasi as $cat)
						<ul>
							<li><a href="{{url('publikasi/'.$cat->nama)}}">{{$cat->nama}}</a></li>
						</ul>
						@endforeach
					</div>

                    <div class="widget-categories">
                        <h3 class="widget-title">Berita Terbaru</h3>
                        <div class="blog-list-widget">
                            @foreach($latest->take(7) as $last)
                            <div class="list-group">
                                <a href="{{url('post/'.$last->post_slug)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset($last->image)}}" alt="" class="img-fluid float-left" style="width: 100%; height: 150px">
                                        <h5 class="mb-1">{{$last->post_title}}</h5>
                                        <i class="fa fa-calendar"></i>
                                        <small>{{$last->created_at->diffForHumans()}}  / </small>
                                        <i class="fa fa-eye"></i>
                                        <small>{{ $last->views + 1 }}
                                        @if($last->views !=0)
                                        Views 
                                        @else
                                        View
                                        @endif
                                    </small>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div><!-- end blog-list -->
                    </div>
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

@endsection