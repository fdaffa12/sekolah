@extends('frontend.master')
@section('publikasi') active @endsection
@section ('title')
<title>{{$data->nama}}</title>
@stop
@section ('content')

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-9 blog-post-single">
                    <div class="blog-item">
						<div class="post-content">
                            <h1>{{$data->nama}}</h1>
                        <table class="table">
                        <tbody>
                            <tr>
                                <td width="20%">Tanggal</td>
                                <td width="1%">:</td>
                                <td width="74%%">{{ $data->tanggal }}</td>
                            </tr>
                            <tr>
                                <td width="20%">Jam</td>
                                <td width="1%">:</td>
                                <td width="74%%">{{ $data->time }}</td>
                            </tr>
                            <tr>
                                <td width="20%">Agenda</td>
                                <td width="1%">:</td>
                                <td width="74%%">{{ $data->agenda }}</td>
                            </tr>
                            <tr>
                                <td width="20%">Lokasi</td>
                                <td width="1%">:</td>
                                <td width="74%%">{{ $data->lokasi }}</td>
                            </tr>
                        </tbody>
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