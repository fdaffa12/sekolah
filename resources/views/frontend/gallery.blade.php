@extends('frontend.master')
@section('publikasi') active @endsection
@section ('title')
<title>Gallery</title>
@endsection

@section ('content')

	<div id="teachers" class="section wb">
        <div class="container">
            <div class="row">
            	@foreach($data as $category)
				<div class="col-lg-3 col-md-6 col-12">
					<div class="our-team">
						<div class="team-img">
							<img src="{{asset($category->image)}}">
							<div class="social">
								<ul>
									<li><a href="{{url('gallery/item/'.$category->id)}}" class="fa fa-link"></a></li>
								</ul>
							</div>
						</div>
						<div class="team-content">
							<h3 class="title">{{$category->title}}</h3>
						</div>
					</div>
				</div>
				@endforeach
            </div><!-- end row -->
            <div class="d-flex justify-content-center">
                {!! $data->links() !!}
            </div>
        </div><!-- end container -->
    </div><!-- end section -->	

    

    @endsection