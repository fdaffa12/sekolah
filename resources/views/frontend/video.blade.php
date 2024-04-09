@extends('frontend.master')
@section('publikasi') active @endsection
@section ('title')
<title>Video</title>
@stop
@section ('content')
   
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="message-box">
            <h4>Video</h4>
            </div>

            <div class="row">
                    @foreach($video as $post)
                    <div class="col-lg-4 col-md-6 col-12">
                    <img src="{{asset($post->image)}}" alt="" class="img-fluid" style="height: 200px;">
                        <div class="blog-item">
                            <div class="meta-info-blog">
                                <span><i class="fa fa-calendar"></i> <a href="#">{{ $post->created_at->diffForHumans() }}</a> </span>
                                <span><i class="fa fa-eye"></i> <a href="#">{{ $post->views + 1 }}
                                                @if($post->views !=0)
                                                Views 
                                                @else
                                                View
                                                @endif</a>
                                </span>
                            </div>
                            <div class="blog-title">
                                <h2><a href="{{url('video/detail/'.$post->post_slug)}}" title="">{{$post->title}}</a></h2>
                            </div>
                            <div class="blog-button">
                                <a class="hover-btn-new orange" href="{{url('video/detail/'.$post->slug)}}"><span>Read More<span></a>
                            </div>
                        </div>
                    </div><!-- end col -->
                    @endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
@endsection