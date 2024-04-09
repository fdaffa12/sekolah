@extends('frontend.master')
@section('publikasi') active @endsection
@section ('title')
<title>Gallery</title>
@endsection

@section ('content')

	<div id="teachers" class="section wb">
        <div class="container">
            <div class="row">
            	@foreach($categoryitems as $category)
				<div class="col-lg-3 col-md-6 col-12">
					<div class="our-team">
						<div class="team-img">
							<img src="{{asset($category->cover_image)}}">
						</div>
					</div>
				</div>
				@endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->	

    

    @endsection