@extends('frontend.master')
@section('publikasi') active @endsection
@section ('title')
<title>{{$data->nama}}</title>
@stop
@section ('content')
   
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="message-box">
            <h4>{{$data->nama}}</h4>
            </div>

            <div class="row">
                @if(count($posts) > 0)
                <div class="col-lg-12 blog-post-single">
                    @foreach($posts as $key=> $post)
                    @if($key == 0)
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="blog-item">
                                <div class="image-blog">
                                    <img src="{{asset($post->image)}}" alt="" class="img-fluid" style="height: 300px;">
                                </div>
                            </div>
                        </div><!-- end col -->
                        
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="message-box">
                                <h2>{{$post->post_title}}</h2>
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
                                <p>{!! substr($post->description,0,300) !!}</p>
                                <a href="{{url('post/'.$post->post_slug)}}" class="hover-btn-new orange"><span>Read More</span></a>
                            </div><!-- end messagebox -->
                        </div><!-- end col -->
                        
                    </div><!-- end row -->
                    @endif
                    @endforeach
                </div>
                    @foreach($posts as $key=>$post)
                    @if($key > 0 && $key < 7)
                    <div class="col-lg-4 col-md-6 col-12" style="padding-top:20px;">
                        <div class="blog-item">
                            <div class="image-blog">
                                <img src="{{asset($post->image)}}" alt="" class="img-fluid" style="height: 200px;">
                            </div>
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
                                <h2><a href="{{url('post/'.$post->post_slug)}}" title="">{{$post->post_title}}</a></h2>
                            </div>
                            <div class="blog-desc">
                                <p>{!! substr($post->description,0,300) !!}</p>
                            </div>
                            <div class="blog-button">
                                <a class="hover-btn-new orange" href="{{url('category/news/'.$post->news_slug)}}"><span>Read More<span></a>
                            </div>
                        </div>
                    </div><!-- end col -->
                    @endif
                    @endforeach
                @endif
            </div><!-- end row -->
            <div class="d-flex justify-content-center" style="padding-top:20px">
            {{ $posts->links() }}
            </div>
        </div><!-- end container -->
    </div><!-- end section -->
@endsection