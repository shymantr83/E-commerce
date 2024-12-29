<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Eflyer</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('template/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('template/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('template/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('template/images/fevicon.png" type="image/gif')}}" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('template/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.min.css')}}">
      <link rel="stylesoeet" href="{{ asset('template/css/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
               
      <!-- banner bg main start -->
      <div class="banner_bg_main">
         <!-- header top section start -->
         <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <!--<ul>-->
                        <!--   <li><a href="#">Best Sellers</a></li>-->
                        <!--   <li><a href="#">Gift Ideas</a></li>-->
                        <!--   <li><a href="#">New Releases</a></li>-->
                        <!--   <li><a href="#">Today's Deals</a></li>-->
                        <!--   <li><a href="#">Customer Service</a></li>-->
                        <!--</ul>-->
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"><a href="index.html"><img src="{{ asset('template/images/logo.png')}}"></a></div>
                  </div>
               </div>
            </div>
         </div>
         
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="{{route('home')}}">Home</a>
                     <a href="{{route('dashboard')}}">Dashboard</a>
 @if (Route::has('login'))
       @auth
                     <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                    @endif
                    @endauth
                  </div>
                 
                  <span class="toggle_icon" onclick="openNav()"><img src="{{ asset('template/images/toggle-icon.png')}}"></span>
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach ($categories as $category)

                       <li><a class="dropdown-item" href="{{route('ProductsWithCategory',$category->id)}}">{{$category->name}}</a></li>

                       @endforeach
                    </div>
                 </div>
                  <div class="main">
                     <!-- Another variation with a button -->
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search this blog">
                        <div class="input-group-append">
                           <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <div class="header_box">
                     <!--<div class="lang_box ">-->
                     <!--   <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">-->
                     <!--   <img src="{{ asset('template/images/flag-uk.png')}}" alt="flag" class="mr-2 " title="United Kingdom"> English <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>-->
                     <!--   </a>-->
                     <!--   <div class="dropdown-menu ">-->
                     <!--      <a href="#" class="dropdown-item">-->
                     <!--      <img src="{{ asset('template/images/Egy_flag.png')}}" class="mr-2" alt="flag" width="16px">-->
                     <!--      العربية-->
                     <!--      </a>-->
                     <!--   </div>-->
                     <!--</div>-->

                     <div class="login_menu">
                        <ul>
                           @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <li><a href="{{route('ShowMycard')}}">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a>
                           </li>
                           <li><div class="hidden sm:flex sm:items-center sm:ms-6">
                                        <div>{{ Auth::user()->name }}</div>
                        </div>
                           </li>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif

                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
           @if (session('Success'))
         <div class="alert alert-success">
            {{session('Success')}}</div>
            <script>setTimeout(function()  {
                document.querySelector('.alert').style.display='none';
            }, 3000);
                </script>
                @endif
         <!-- header section end -->
         <!-- banner section start -->

         <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="#">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="#">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="#">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->
      <!-- fashion section start -->
      <div class="fashion_section">
          <div id="main_slider" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                  @foreach($products_chunc as $products)
                  {{-- @dd($products[0]) --}}
                  <div class="carousel-item active">
                      <div class="container">
                          <h1 class="fashion_taital">{{$products[0]->category->name}}</h1>
                          <div class="fashion_section_2">
                              <div class="row">
                                  @foreach($products as $product)
                         <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">{{$product->name}}</h4>
                                 <p class="price_text">Price  <span style="color: #262626;">{{$product->price}}</span></p>
                                 <div class="tshirt_img"><img src="{{ asset("images/ProductImage/$product->image")}}"></div>
                                 <div class="btn_main">
                                     <div class="buy_bt"><a href="{{route('seeDetails',$product->id)}}">see Details</a></div>
                                     <div class="buy_bt"><a href="{{route('AddToCart',$product->id)}}">Buy Now</a></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a> --}}
    </div>
</div>

      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href="index.html"><img src="{{ asset('template/images/footer-logo.png')}}"></a></div>
            <div class="input_bt">
               <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
               <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
            <div class="footer_menu">
               <ul>
                  <li><a href="#">Best Sellers</a></li>
                  <li><a href="#">Gift Ideas</a></li>
                  <li><a href="#">New Releases</a></li>
                  <li><a href="#">Today's Deals</a></li>
                  <li><a href="#">Customer Service</a></li>
               </ul>
            </div>
            <div class="location_main">Help Line  Number : <a href="#">+1 1800 1200 1200</a></div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© 2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="{{asset('template/js/jquery.min.js')}}"></script>
      <script src="{{ asset('template/js/popper.min.js')}}"></script>
      <script src="{{ asset('template/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{ asset('template/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{ asset('template/js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{ asset('template/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{ asset('template/js/custom.js')}}"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }

         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script>
   </body>
</html>
