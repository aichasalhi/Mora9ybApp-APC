{{-- <x-app-layout> --}}
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('منصة مراقب منصة حركة البناء الوطني لإنتخابات شفافة وذات مصداقية  ')  }}
        </h2>
    </x-slot> --}}

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}
    
{{-- </x-app-layout> --}}




<!doctype html>
<html lang="en">
  <head>
  	<title>Mora9yb</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="/image/png" href="/images/icons/logobina.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i&display=swap" rel="stylesheet">
		
		<link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
		<link rel="stylesheet" href="/css/style.css">

<style>

body {
    margin: 0;
    padding: 0;
    font-family: 'roboto', sans-serif;
    background-color: #F2F2F2
}

h1 {
    text-align: center;
    color: #333333
}

.cardcontainer {
    width: 350px;
    height: 500px;
    background-color: white;
    margin-left: auto;
    margin-right: auto;
    transition: 0.3s
}

.cardcontainer:hover {
    box-shadow: 0 0 45px gray
}

.photo {
    height: 400px;
    width: 100%
}

.photo img {
    height: 100%;
    width: 100%
}

.txt1 {
    
    
	font-size: 29px;
	text-transform: uppercase;
	font-weight: 700;
	color:rgb(5, 5, 5);
	letter-spacing: 0.5px;
	/* border-bottom: 2px solid #fff; */
	display: inline-block;
	padding-bottom: 10px;
	margin-bottom: 20px;
	margin-top: 0px;
	margin-right: 80px;
	direction: rtl; 
    text-align: right;
    unicode-bidi: bidi-override;
}

.content {
    width: 80%;
    height: 100px;
    margin-left: auto;
    margin-right: auto;
    position: relative;
    top: -33px
}

.photos {
    width: 120px;
    height: 50px;
    background-color: #d9e0dc;
    color: rgb(135, 204, 89);
    position: relative;
    top: -30px;
    padding-left: 10px;
    font-size: 20px
}

.txt4 {
    font-size: 27px;
    position: relative;
    top: 33px;
	direction: rtl; 
    text-align: right;
    unicode-bidi: bidi-override;
}

.txt5 {
    position: relative;
    top: 18px;
    color: #E74C3C;
    font-size: 23px
}

.txt2 {
    position: relative;
    top: 10px
}

.cardcontainer:hover>.photo {
    height: 400px;
    animation: move1 0.5s ease both
}

@keyframes move1 {
    0% {
        height: 500px
    }

    100% {
        height: 400px
    }
}

.cardcontainer:hover>.content {
    height: 200px
}

.footer {
    width: 80%;
    height: 100px;
    margin-left: auto;
    margin-right: auto;
    background-color: white;
    position: relative;
    top: -15px
}

.btn {
    position: relative;
    top: 20px
}

#heart {
    cursor: pointer
}

.like {
    float: right;
    font-size: 22px;
    position: relative;
    top: 20px;
    color: #333333
}

.fa-gratipay {
    margin-right: 10px;
    transition: 0.5s
}

.fa-gratipay:hover {
    color: #E74C3C
}

.txt3 {
    color: gray;
    position: relative;
    top: 18px;
    font-size: 14px
}

.comments {
    float: right;
    cursor: pointer
}

.fa-clock,
.fa-comments {
    margin-right: 7px
}


</style>


  </head>
  <body>
      
    <x-app-layout> 
        {{-- <section class="ftco-section">  --}}
			 <div class="container"> 
       
    
        {{-- <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <x-jet-welcome />
                </div>
            </div>
        </div> --}}
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('منصة مراقب منصة حركة البناء الوطني لإنتخابات شفافة وذات مصداقية  ')  }}
            </h2>
        </x-slot>
		<br>
		
		 @if (auth()->user()->role_id == 2)
				<div class="row">
                   
						{{-- <h1 >منصة مراقب منصة حركة البناء الوطني لإنتخابات شفافة وذات مصداقية  </h1> --}}
				
                    {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('منصة مراقب منصة حركة البناء الوطني لإنتخابات شفافة وذات مصداقية  ')  }}
                    </h2> --}}

					<div class="col-md-12">
						<div class="featured-carousel owl-carousel">
				          
							<div class="item">
								<div class="work">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url(/images/beng1.png);">
										<div class="text w-100">
											
											<h3><a href="{{ route('supervisor.supervisor.index') }}">تقرير مكتب المراقبة</a></h3>
										</div>
									</div>
								</div>
							</div>

							
							<div class="item">
								<div class="work">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url(/images/beng2.png);">
										<div class="text w-100">
											
											<h3><a href="{{ route('centresub.index') }}">تقرير مركز المراقبة </a></h3>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="work">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url(/images/beng4.png);">
										<div class="text w-100">
										
											<h3><a href="{{ route('communetask.index') }}">تقرير بلدية المراقبة </a></h3>
										</div>
									</div>
								</div>
							</div>
						
							
							{{-- <div class="item">
								<div class="work">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url(/images/benguerina01.jpg);">
										<div class="text w-100">
										
											<h3><a href="{{ route('adinistrator.admin.index') }}">تقرير نتائج الانتخابات التشريعية </a></h3>
										</div>
									</div>
								</div>
							</div>--}}
							</div> 
					</div>
				</div>
						@endif
							{{-- <div class="item">
								<div class="work">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url(/images/work-4.jpg);">
										<div class="text w-100">
											<span class="cat">Web Design</span>
											<h3><a href="#">Working Spaces for Startups Freelancer</a></h3>
										</div>
									</div>
								</div>
							</div> --}}
							{{-- <div class="item">
								<div class="work">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url(images/work-5.jpg);">
										<div class="text w-100">
											<span class="cat">Web Design</span>
											<h3><a href="#">Working Spaces for Startups Freelancer</a></h3>
										</div>
									</div>
								</div>
							</div> --}}
						
				

	@if (auth()->user()->role_id == 1)
		
	{{-- <div class="row">
						<div class="col-md-12">
							<div class="featured-carousel owl-carousel">
							  <div class="item">
									<div class="work">
										<div class="img d-flex align-items-end justify-content-center" style="background-image: url(/images/beng3.png);">
											<div class="text w-100">
											
												<h3><a href="{{ route('adinistrator.admin.index') }}">تقرير نتائج الانتخابات التشريعية </a></h3>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> --}}


					<div class="container">
					
						<div class="cardcontainer">
							<div class="photo"> <img src="/images/beng3.png">
								<p class="txt4"><a href="{{ route('adinistrator.admin.index') }}">تقرير نتائج الانتخابات التشريعية </a></p>
			
							</div>
							{{-- <div class="content">
								<p class="txt4"><a href="{{ route('adinistrator.admin.index') }}">تقرير نتائج الانتخابات التشريعية </a></p>
			
							</div> --}}
							
					</div>
                    {{-- <div class="cardcontainer">
                        <div class="photo"> <img src="/images/beng3.png">
                            <p class="txt4"><a href="{{ route('adinistrator.admin.create') }}">تسجيل  </a></p>
        
                        </div>
                        {{-- <div class="content">
                            <p class="txt4"><a href="{{ route('adinistrator.admin.index') }}">تقرير نتائج الانتخابات التشريعية </a></p>
        
                        </div> --}}
                        
                {{-- </div>  --}}










		
	@endif

						 
			
		</div>   
		<script>
		$(document).ready(function(){
			document.getElementById("heart").onclick = function(){
			document.querySelector(".fa-gratipay").style.color = "#E74C3C";
			};
			});
			</script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/main3.js"></script>
   </x-app-layout>
  </body>
</html>