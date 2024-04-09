<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
     @yield('title')
    <title>Prototype Kecamatan</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset($setting->image)}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('frontend')}}/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="{{asset('frontend')}}/js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="host_version"> 

	<!-- Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body customer-box">
				<div class="tab-content">
					<div class="tab-pane active" id="Login">
					<form class="example" action="{{url('search')}}" method="GET" id='search-form'>
					<input type="text" placeholder="Search.." name="search" id="query" name="query" value="{{ request()->input('query') }}">
					<button type="submit"><i class="fa fa-search"></i></button>
					</form>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>
	
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="{{url('/')}}">
					<img src="{{asset($setting->image)}}" alt="" style="max-height: 50px;"/>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item @yield('dashboard')"><a class="nav-link" href="{{url('/')}}">Home</a></li>
						<li class="nav-item dropdown @yield('tentang')">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Tentang </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
                            @foreach($pages as $page)
                            <a class="dropdown-item" href="{{url('page/'.$page->title_slug)}}">{{$page->judul}}</a>
                            @endforeach
							</div>
						</li>
						<li class="nav-item dropdown @yield('publikasi')">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Publikasi </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="{{url('agenda')}}">Agenda</a>
                            @foreach($publikasi as $pub)
                            <a class="dropdown-item" href="{{url('publikasi/'.$pub->nama)}}">{{$pub->nama}}</a>
                            @endforeach
                            <a class="dropdown-item" href="{{url('gallery')}}">Gallery</a>
                            <a class="dropdown-item" href="{{url('video')}}">Video</a>
							</div>
						</li>
						<li class="nav-item dropdown @yield('desa')">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Desa </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
                            @foreach($desa as $ds)
                            <a class="dropdown-item" href="{{url('desa/'.$ds->nama_slug)}}">{{$ds->nama_desa}}</a>
                            @endforeach
							</div>
						</li>
						<li class="nav-item dropdown @yield('potensi')">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Potensi </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
                            @foreach($potensi as $ps)
                            <a class="dropdown-item" href="{{url('potensi/'.$ps->potensi_slug)}}">{{$ps->potensi}}</a>
                            @endforeach
							</div>
						</li>
						<li class="nav-item dropdown @yield('paten')">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Paten </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
                            @foreach($paten as $pt)
                            <a class="dropdown-item" href="{{url('paten/'.$pt->judul_slug)}}">{{$pt->judul}}</a>
                            @endforeach
							</div>
						</li>
                        <li class="nav-item dropdown @yield('stat')">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Statistik </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="{{url('pekerjaan')}}">Pekerjaan</a>
                            <a class="dropdown-item" href="{{url('pendidikan')}}">Pendidikan</a>
                            <a class="dropdown-item" href="{{url('perkawinan')}}">Perkawinan</a>
                            <a class="dropdown-item" href="{{url('goldarah')}}">Golongan Darah</a>
                            <a class="dropdown-item" href="{{url('agama')}}">Agama</a>
							</div>
						</li>
						<li class="nav-item @yield('unduhan')"><a class="nav-link" href="{{url('unduhan')}}">Unduhan</a></li>
                        <li class="nav-item @yield('contact')"><a class="nav-link" href="{{url('contact')}}">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-baru log orange" href="#" data-toggle="modal" data-target="#login"><span class="fa fa-search"></span></a></li>
                    </ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

@yield('content')

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>About US</h3>
                        </div>
                        <p>{{$setting->about}}</p>   
						<div class="footer-right">
							<ul class="footer-links-soi">
                                @foreach($setting->social as $key=>$social)
								<li><a href="{{$social}}"><i class="fa fa-{{$icons[$key]}}"></i></a></li>
                                @endforeach
							</ul><!-- end links -->
						</div>						
                    </div><!-- end clearfix -->
                </div><!-- end col -->

				<div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Information Link</h3>
                        </div>
                        <ul class="footer-links">
                            @foreach($publikasi as $pub)
                            <li><a href="{{url('publikasi/'.$pub->nama)}}">{{$pub->nama}}</a></li>
                            @endforeach
                            <li><a href="{{url('gallery')}}">Gallery</a></li>
                            <li><a href="{{url('video')}}">Video</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Contact Details</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="mailto:#">{{$setting->email}}</a></li>
                            <li>{{$setting->address}}</li>
                            <li>{{$setting->phone}}</li>
                            <li>{{$setting->fax}}</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center">                   
                    <p class="footer-company-name">All Rights Reserved. &copy; 2021 <a href="#">Prototype Kecamatan</a> Design By : <a href="https://html.design/">html design</a></p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="{{asset('frontend')}}/js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('frontend')}}/js/custom.js"></script>
	<script src="{{asset('frontend')}}/js/timeline.min.js"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
</body>
</html>