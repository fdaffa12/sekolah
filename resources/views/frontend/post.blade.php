@extends('frontend.master')
@section('publikasi') active @endsection
@section ('title')
<title>{{$data->post_title}}</title>
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
								<h2><a href="#" title="">{{$data->post_title}}</a></h2>
							</div>
							<div class="blog-desc">
								<p>{!! $data->description !!}</p>
							</div>							
						</div>
					</div>

                    <div class="comments-form" style="padding-top:20px;">
                        <h4>Leave a comment</h4>
                        <div class="comment-form-main">
                            <form action="{{ url('/comment') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}" class="form-control">
                                <input type="hidden" name="parent_id" id="parent_id" class="form-control">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" placeholder="Username">
                                        <p class="text-danger">{{ $errors->first('username') }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" style="display: none" id="formReplyComment">
                                        <label for="">Balas Komentar</label>
                                        <input type="text" id="replyComment" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="comment" placeholder="Message" id="commenter-message" cols="30" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 post-btn">
                                    <button class="hover-btn-new orange"><span>Post Comment</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="blog-comments">
						<h4>Comments</h4>
                        @foreach ($data->comments as $row)
						<div id="comment-blog">
							<ul class="comment-list">
								<li class="comment">
									<div class="comment-container">
										<h5 class="comment-author"><a href="#">{{ $row->username }}</a></h5>
										<div class="comment-meta">
											<a href="#" class="comment-date link-style1">{{$row->created_at->diffForHumans()}}</a>
											<a class="comment-reply-link link-style3" href="javascript:void(0)" onclick="balasKomentar({{ $row->id }}, '{{ $row->comment }}')">Reply »</a>
										</div>
										<div class="comment-body">
											<p>{{ $row->comment }}</p>
										</div>
									</div>
                                    @foreach ($row->child as $val) 
									<ul class="children">
										<li class="comment">
											<div class="comment-container">
												<h5 class="comment-author"><a href="#">{{ $val->username }}</a></h5>
												<div class="comment-meta"><a href="#" class="comment-date link-style1">{{$val->created_at->diffForHumans()}}</a></div>
												<div class="comment-body">
													<p>{{ $val->comment }}</p>
												</div>
											</div>
										</li>
									</ul>
                                    @endforeach
								</li>
							</ul>
						</div>
                        @endforeach
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
                                        <img src="{{asset($last->image)}}" alt="" class="img-fluid float-left" style="width: 100%;">
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

<style>
        blockquote {
            background: #f9f9f9;
            border-left: 10px solid #ccc;
            margin: 1.5em 10px;
            padding: 0.5em 10px;
            quotes: "\201C""\201D""\2018""\2019";
        }
        blockquote:before {
            color: #ccc;
            content: open-quote;
            font-size: 4em;
            line-height: 0.1em;
            margin-right: 0.25em;
            vertical-align: -0.4em;
        }
        blockquote p {
            display: inline;
            font-style: italic;
        }
        blockquote h6 {
            font-weight: 700;
            padding: 0;
            margin: 0 0 .25rem;
        }
        .child-comment {
            padding-left: 50px;
        }
    </style>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    function balasKomentar(id, title) {
        $('#formReplyComment').show();
        $('#parent_id').val(id)
        $('#replyComment').val(title)
    }
</script>