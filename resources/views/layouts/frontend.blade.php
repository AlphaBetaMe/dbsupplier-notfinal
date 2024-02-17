<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Event Supplier Laguna | @yield('title')</title>
        
        <link rel="website icon" href="{{asset('public/images/logo.png')}}">
        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Prata&display=swap">
        <!--style-->
         <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">

        <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

        <link rel="stylesheet" href="{{asset('frontend/js/custom.js')}}">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!--Alertify JS-->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>




        <link rel="preconnect" href="https://fonts.googleapis.com">
        <!-- fontawsome -->
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       
   
        
        <script src="https://kit.fontawesome.com/d9dcb5c630.js" crossorigin="anonymous"></script>
        <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>


<!-- Add the following JavaScript code inside the head section or before the closing body tag -->
<script>
    function toggleNavbar() {
      var navbar = document.getElementById("navbarNav");
      if (navbar.style.display === "none" || !navbar.style.display) {
        navbar.style.display = "block";
      } else {
        navbar.style.display = "none";
      }
    }
  </script>
  
    <style>
        a{
            text-decoration: none!important;
            color: #000;
        }
        .faq-section{
        position:relative;
        display:flex; 
        left: 0;
        bottom: 0;
        width: 100%;
        text-decoration: none!important;
        
        color: white;
        text-align: center;
        }
        ul li{
            list-style-type:none ;
        text-decoration: none!important;
        justify-content:;
        }
        .body-section {
            display: flex;  
            min-height: 100vh;
            flex-direction: column;
            text-decoration: none!important;
        }
        .footer_logo_wrapper
        {
            text-decoration: none!important;
        }

        #chatbot-container {
        position: fixed;
        bottom: 50px;
        right: 20px;
        z-index: 9999;
        }

        #chatbot-container{
        display: none;
        }
       
        #chatbot-button {
        position: fixed;
        bottom: 5px;
        right: 115px;
        z-index: 9999;
        }
        #chatbot-hide {
        position: fixed;
        bottom: 5px;
        right: 10px;
        z-index: 9999;
        }
        
       /* .swal-button {
        background-color: black !important;
        color: white !important;
       }
        .swal-button:not([disabled]):hover {
            background-color: #ffff; /* Change to your desired hover color */
        } */

        
        body {
            /* background-image: url('images/2.jpg'); */
            /* Add other background properties if needed */
            background-size: cover;
            background-position: center;
            background-color:#FFFFFF !important;
            font-family: 'Prata', serif;
            /* Add more styles as necessary */
        }  

        .icons {
            display: flex;
            color: #ffff;
            font-size: 30px; 
            transition: color 0.3s ease; 
        }
    
    
    
    </style>
    </head>
    <body>
        
        
        
        <section class="body-section">
        @include('layouts.inc.frontnavbar')
        @yield('content')
        {{-- @include('sweetalert::alert') --}}
        </section>

        <script src="{{asset('frontend/js/jquery-3.6.1.min.js')}}"></script>
        <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('frontend/js/custom.js')}}"></script>
        <script src="{{asset('frontend/js/checkout.js')}}"></script>
        
        {{-- @if(session('success'))
        <script>
            swal("{{session('success')}}");
        </script>
        @endif --}}
{{-- 
        @if (session('status')) 
        <script>
          swal({
            text: "{{ session('status') }}",
            icon: "success",
          });
        </script>
       @endif --}}

        @yield('scripts')
         <!-- SweetAlert -->
    
<footer>
<div id="chatbot-container">
</div>

<section class="footer_copyright mt-5 py-4 text-light" style="background-color: #343a40;">
    <div class="container text-center">
        <p class="m-0" style="font-size: 14px;">© Copyright 2023 by Event Supplier Laguna. All rights reserved.</p>
    </div>
</section>

</footer>


</body>

</html>