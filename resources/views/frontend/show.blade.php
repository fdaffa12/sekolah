@extends('frontend.master')
@section ('title')
<title>{{ $posts->count() }} result(s) for '{{ request()->input('query') }}'</title>
@stop
@section ('content')
	
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="row">
				<div class="col-lg-3 col-12 right-single">
					<p>  {{ $posts->count() }} result(s) for '{{ request()->input('query') }}'</p>
				</div>
			</div>

            <div class="row">
            	@foreach($posts as $post)
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="course-item">
						<div class="image-blog">
							<img src="{{asset($post->image)}}" alt="" class="img-fluid" style="height: 200px;">
						</div>
						<div class="course-br">
							<div class="course-title">
								<h2><a href="{{url('post/'.$post->post_slug)}}" title="">{{$post->post_title}}</a></h2>
							</div>
							<div class="course-desc">
								<p>{!! substr($post->description,0,300) !!}</p>
							</div>
						</div>
						<div class="course-meta-bot">
							<ul>
								<li><i class="fa fa-calendar" aria-hidden="true"></i> {{ $post->created_at }}</li>
								<li><i class="fa fa-eye" aria-hidden="true"></i> {{ $post->views + 1 }}
                                                @if($post->views !=0)
                                                Views 
                                                @else
                                                View
                                                @endif</li>
							</ul>
						</div>
					</div>
                </div><!-- end col -->
                @endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
@endsection