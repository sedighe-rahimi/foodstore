<!DOCTYPE html>
<html class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Restaurant One Page HTML5 Template</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSS
        ================================================ -->
        <!-- Owl Carousel -->
		<link rel="stylesheet" href="/frontend/css/owl.carousel.css">
        <!-- bootstrap.min css -->
		<link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
        <!-- Font-awesome.min css -->
		<link rel="stylesheet" href="/frontend/css/font-awesome.min.css">
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="/frontend/css/animate.min.css">

		<link rel="stylesheet" href="/frontend/css/main.css">
        <!-- Responsive Stylesheet -->
		<link rel="stylesheet" href="/frontend/css/responsive.css">
		<!-- Js -->
    <script src="/frontend/js/vendor/modernizr-2.6.2.min.js"></script>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
    <script>window.jQuery || document.write('<script src="/frontend/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    <script src="/frontend/js/jquery.nav.js"></script>
    <script src="/frontend/js/jquery.sticky.js"></script>
    <script src="/frontend/js/bootstrap.min.js"></script>
    <script src="/frontend/js/plugins.js"></script>
    <script src="/frontend/js/wow.min.js"></script>
    <script src="/frontend/js/main.js"></script>
	</head>
	<body>
	{{-- <nav id="navigation">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <nav class="navbar navbar-default">
                          <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                                  <a class="navbar-brand" href="#">
                                    <img src="/frontend/images/logo.png" alt="Logo">
                                  </a>

                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                              <ul class="nav navbar-nav navbar-right" id="top-nav">
                                <li><a href="#hero-area">Home</a></li>
                                <li><a href="#about-us">about us</a></li>
                                <li><a href="#blog">Blog</a></li>
                                <li><a href="#price">menu</a></li>
                                <li><a href="#subscribe">news</a></li>
                                <li><a href="#contact-us">contacts</a></li>
                              </ul>
                            </div><!-- /.navbar-collapse -->
                          </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .container close -->
	</nav><!-- header close --> --}}
    <!--
    Slider start
    ============================== -->
    
    <section id="slider">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="padding-top:3rem;">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    <footer id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="block">
                        <p>Copyright &copy; 2014 - All Rights Reserved.Design and Developed By <a href="http://www.themefisher.com">Themefisher</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
	</body>
</html>