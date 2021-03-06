<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Mora9yb</title>
<!-- 
Moonlight Template 
http://www.templatemo.com/tm-512-moonlight
-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link rel="icon" type="/image/png" href="/images/icons/logobina.ico"/>
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/css/fontAwesome.css">
        <link rel="stylesheet" href="/css/light-box.css">
        <link rel="stylesheet" href="/css/templatemo-main.css">



         <!-- Icons font CSS-->
    <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="/https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/css/main.css" rel="stylesheet" media="all">
        <script src="/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        @livewireStyles
    </head>

<body>
    
    <div class="sequence">
  
      <div class="seq-preloader">
        <svg width="39" height="16" viewBox="0 0 39 16" xmlns="/http://www.w3.org/2000/svg" class="seq-preload-indicator"><g fill="#F96D38"><path class="seq-preload-circle seq-preload-circle-1" d="M3.999 12.012c2.209 0 3.999-1.791 3.999-3.999s-1.79-3.999-3.999-3.999-3.999 1.791-3.999 3.999 1.79 3.999 3.999 3.999z"/><path class="seq-preload-circle seq-preload-circle-2" d="M15.996 13.468c3.018 0 5.465-2.447 5.465-5.466 0-3.018-2.447-5.465-5.465-5.465-3.019 0-5.466 2.447-5.466 5.465 0 3.019 2.447 5.466 5.466 5.466z"/><path class="seq-preload-circle seq-preload-circle-3" d="M31.322 15.334c4.049 0 7.332-3.282 7.332-7.332 0-4.049-3.282-7.332-7.332-7.332s-7.332 3.283-7.332 7.332c0 4.05 3.283 7.332 7.332 7.332z"/></g></svg>
      </div>
      
    </div>
    
  
        <nav>
          {{-- <div class="logo">
              <img src="/img/logo.png" alt="">
          </div> --}}
          <div class="mini-logo">
              <img src="img/mini_logo.png" alt="">
          </div>
          <ul>
            <li><a href="#1"><i class="fa fa-home"></i> <em>????????????????</em></a></li>
            <li><a href="#2"><i class="fa fa-user"></i> <em>???????? ????????????????</em></a></li>
            {{-- <li><a href="#3"><i class="fa fa-pencil"></i> <em>?????????? ??????????????</em></a></li>
            <li><a href="#4"><i class="fa fa-envelope"></i><em> -1-?????????? ?????????????? ?????? ??????????</em> </a></li>
            <li><a href="#5"><i class="fa fa-envelope"></i><em> -2-?????????? ?????????????? ?????? ??????????</em> </a></li> --}}
           
            
           
            
          </ul>
        </nav>
        
        <div class="slides ">
          <div class="slide" id="1">
            <div class="content first-content">
              <div class="container-fluid">
                  <div class="col-sm-3">
                      <div class="author-image"><img src="/img/logo-binaa.png" alt=""></div>
                  </div>
                  <div class="col-sm-9">
                    <h2>?????????? ???? ???? ???????? ???????? ???????????? ???????????? </h2>
                    <h1>???????????? ?????????? ???????????????????? ?????????????? </h1>
                    <br>
                    <div class="main-btn"><a href="#2">??????</a></div>
                      {{-- <div class="main-btn"><a href="//https://elbinaa.com/" target="_blank">???????? ???????????? </a></div> --}}
                  </div>
              </div>
            </div>
          </div>
          
        <div class="slide" id="2">
            <div class="content third-content">
                <div class="container-fluid">
                   <div class="col-sm-9">
                        <div class="left-content ">
                            <h2 class="title" >???????? ???????? ??????????????  </h2>
                           <br>

                            @yield('contentcommuneDrctDropdown')
                    
                         </div>
                         
                         <div class="btn btn--pill btn--green"><a href="#3">????????????</a></div>
                   
                
                  </div>
               </div>
            </div>
        </div>
        
     <div class="slide" id="3">
            <div class="content fifth-content">
                <div class="container-fluid">
                    <div class="col-12">
                        <div class="left-content">
                                    <div class="card card-3">
                                       
                                        <div class="card-body">
                                            @yield('content2')
                                            
                                        </div>
                                       
                                 </div>
                        </div>
                    </div>    
             </div>
           </div>
    </div>     
    
    <div class="slide" id="4">
        <div class="content fourth-content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="left-content">
                                <div class="card card-3">
                                  
                                    <div class="card-body">
                                        @yield('content3')
                                        
                                    
                    </div>
                </div>    
         </div>
       
        </div>
</div> 
        </div>
    </div>
    <div class="slide" id="5">
        <div class="content fourth-content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="left-content">
                                <div class="card card-3">
                                    
                                    <div class="card-body">
                                        @yield('content4')
                                        
                                    
                    </div>
                </div>    
         </div>
       
        </div>
</div> 
        </div>
    </div>
    <div class="slide" id="6">
        <div class="content fourth-content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="left-content">
                                <div class="card card-3">
                                 
                                    <div class="card-body">
                                        @yield('content5')
                                        
                                    
                    </div>
                </div>    
         </div>
       
        </div>
</div> 
        </div>
    </div>
    <div class="slide" id="7">
        <div class="content fourth-content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="left-content">
                                <div class="card card-3">
                                    
                                    <div class="card-body">
                                        @yield('content6')
                                        
                                    
                    </div>
                </div>    
         </div>
       
        </div>
</div> 
        </div>
    </div>
    
        </div>     
    
    
    
    
          
      

       

    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="/js/vendor/bootstrap.min.js"></script>
    
    <script src="/js/datepicker.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/main.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {

        

        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>
     <script src="/vendor/jquery/jquery.min.js"></script>
     <!-- Vendor JS-->
     <script src="/vendor/select2/select2.min.js"></script>
     <script src="/vendor/datepicker/moment.min.js"></script>
     <script src="/vendor/datepicker/daterangepicker.js"></script>
 
     <!-- Main JS-->
     <script src="/js/global.js"></script>
     @yield('scripts')
     @livewireScripts
</body>
</html>