@extends('frontend.master')
@section('unduhan') active @endsection
@section ('title')
<title>Unduhan</title>
@stop
@section ('content')

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-9 blog-post-single">
                    <div class="blog-item">
						<div class="post-content">
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama File</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Download</th>
                            </tr>
                        </thead>
                        @php
                        $i = 1;
                        @endphp
                        @foreach($data as $dt)
                        <tbody>
                            <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <!-- <td>{{ $i++ }}</td> -->
                            <td>{{ $dt->judul }}</td>
                            <td>{{ $dt->created_at->format('Y-m-d') }}</td>
                            <td><a href="{{asset($dt->file)}}" download="" class="btn btn-primary btn-xs"> Download</a></td>
                            </tr>
                            </tr>
                        </tbody>
                        @endforeach
                        </table>		
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