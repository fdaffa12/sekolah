@extends('frontend.master')
@section('contact') active @endsection
@section ('title')
<title>Contact</title>
@stop
@section ('content')

<div id="contact" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Ada Pertanyaan? Tentu kami akan membantu menjawabnya!</h3>
                <p class="lead">Silahkan mengisi fasilitas komunikasi Kontak Kami. Mohon masukan dan pertanyaan disampaikan secara bijak dengan kata-kata yang baik. Seluruh komentar yang masuk akan kami moderasi terlebih dahulu sebelum ditampilkan. Komentar yang mengandung unsur sara, hoax, pornografi, spam, ujaran kebencian, atau link tidak bermanfaat akan kami hapus.</p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                    <div class="comments-form" style="padding-top:20px;">
                        <h4>Leave a comment</h4>
                        <div class="comment-form-main">
                            <form action="{{ url('/contact-post') }}" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    @csrf
                                    <input type="hidden" name="parent_id" id="parent_id" class="form-control">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nama" placeholder="Nama">
                                            @error('nama')
                                            <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan">
                                            @error('pekerjaan')
                                            <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="phone" placeholder="No Handpohone">
                                            @error('phone')
                                            <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Email">
                                            @error('email')
                                            <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="form-control" type="file" name="image">
                                            @error('image')
                                            <strong class="text-danger">{{$message}}</strong>
                                            @enderror
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
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="blog-comments">
						<h4>Comments</h4>
                        @foreach ($data as $row)
						<div id="comment-blog">
							<ul class="comment-list">
								<li class="comment">
                                    <div class="avatar"><img alt="" src="{{asset($row->image)}}" class="avatar"></div>
									<div class="contact-container">
										<h5 class="comment-author"><a href="#">{{ $row->nama }}</a></h5>
										<div class="comment-meta">
											<a href="#" class="comment-date link-style1">{{$row->created_at->diffForHumans()}}</a>
										</div>
										<div class="comment-body">
											<p>{{ $row->comment }}</p>
										</div>
									</div>
                                    @foreach ($row->child as $val) 
									<ul class="children">
										<li class="comment">
                                        <div class="avatar"><img alt="" src="{{asset('uploads')}}/img_avatar3.png" class="avatar"></div>
											<div class="comment-container">
												<h5 class="comment-author"><a href="#">(Admin) {{ $val->nama }}</a></h5>
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
				<div class="col-xl-6 col-md-12 col-sm-12">
					<div class="map-box">
						<div id="custom-places" class="small-map"></div>
					</div>
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
@endsection