<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/owl.theme.default.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
   
    
    <section>
        <div class="container">
            <div class="row">
                   
                
                    @yield('content')                    
        </div>
    </section>
    
   
    

  
    <script src="{{asset('front/js/jquery.js')}}"></script>
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('front/js/price-range.js')}}"></script>
    <script src="{{asset('front/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('front/js/main.js')}}"></script>
    <script src="{{asset('front/js/owl.carousel.js')}}"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            autoplay:true,
            autoplayTimeout:5000,
            nav:true,
            dotsEach:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })
    </script>
    <script>
        $(document).ready(function() {
 
          var owl = $("#owl-slider1");
         
          owl.owlCarousel();
         
          // Custom Navigation Events
          $(".next").click(function(){
            owl.trigger('owl.next');
          })
          $(".prev").click(function(){
            owl.trigger('owl.prev');
          })
         
        });
    </script>
</body>
</html>