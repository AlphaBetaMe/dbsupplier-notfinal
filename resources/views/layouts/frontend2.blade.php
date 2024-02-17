<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Event Supplier Laguna | @yield('title')</title>
        
        <link rel="website icon" href="{{asset('public/images/logo.png')}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!--style-->
         <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/js/custom.js')}}">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!--Alertify JS-->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!---->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <!-- Bootstrap CSS from CDN -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap JS and dependencies from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SweetAlert -->
    
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <!-- fontawsome -->
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Work+Sans&display=swap" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Prata&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Prata">
        
        <script src="https://kit.fontawesome.com/d9dcb5c630.js" crossorigin="anonymous"></script>
        <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>


    <script>
    function toggleElement() {
    var div = document.getElementById("myDiv");
    if (div.style.display === "none") {
        div.style.display = "block";
    } else {
        div.style.display = "none";
    }
    }
    </script>

    {{-- Contact Design --}}
    <style>
        .faq-section{
            position:relative;
            display:flex; 
            /* left: 0;
            bottom: 0; */
            /* width: 100%; */
            text-decoration: none!important;
            color: white;
        }
    
        .btn-secondary.btn-block{
            background-color: #343a40;
        }
    
        .btn-secondary.btn-block:hover{
            background-color: #ffffff !important; 
            color: #000 !important; 
        }
    
        .text-content {
            padding: 50px;
        }
    
        .social-icons {
            display: flex;
            margin-top: 20px;
        }
    
        .icon-link {
            margin: 0 20px;
            color: #343a40;
            font-size: 30px; 
            transition: color 0.3s ease; 
        }
    
        .icon-link:hover {
            color: #316FF6; 
        }
    
        
        .centered-hr {
            width: 50px;
            margin: auto;
        }
    
        .title {
            font-size: 3rem; 
            margin-top: 30px; 
            font-weight: bold;
        }
    
        
        .navbar.navbar-expand-lg.navbar-dark{
            margin: 0;
            padding: 8px 20px;
        }
        .navbar-nav {
          margin: 0;
        }
    
        .nav-link {
          text-decoration: none !important;
          color: #FFFFFF !important;
          transition: background-color 0.3s ease;
          font-size: 14px;
          padding: 10px;
        }
    
        .nav-link:hover {
          background-color: #555555;
          border-radius: 5px;
        }
    
        .rounded-btn {
          border-radius: 5px;
          display: inline-block;
          text-align: center;
          text-decoration: none;
          cursor: pointer;
          background-color: #ffffff;
          color: #000000 !important;
          transition: background-color 0.3s ease, color 0.3s ease;
        }
    
        .rounded-btn:hover {
          background-color: grey;
          color: #ffffff !important;
        }
        .square-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
        }
    
        .custom {
            margin-left: 6px;
            margin-right: 6px;
        }
    
        .navbar-toggler {
            transition: background-color 0.3s ease;
        }
    
        .navbar-toggler:hover {
            background-color: #555555;
        }
    </style>

    {{-- Contact JS --}}
    <script>
        function showConfirmation() {
            alert("Form submitted successfully!");
        }
    </script>


    <style>
        a{
            text-decoration: none!important;
            color: #000;
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

        body {
            /* background-image: url('images/2.jpg'); */
            /* Add other background properties if needed */
            background-size: cover;
            background-position: center;
            background-color:#FFFFFF !important;
            /* Add more styles as necessary */
            font-family: 'Prata', serif;
        }
        p{
            
        }
        
        .img-circle {
        width: 175px; /* Set your desired width */
        height: 175px; /* Set your desired height */
        border-radius: 50%; /* Make it a circle by setting border-radius to 50% */
        object-fit: cover; /* Maintain the aspect ratio and cover the container */
        }
          df-messenger {
           --df-messenger-bot-message: #878fac;
           --df-messenger-button-titlebar-color:;
           --df-messenger-chat-background-color: #ffffff;
           --df-messenger-font-color: black;
           --df-messenger-send-icon: #878fac;
           --df-messenger-user-message: #479b3d;
          }

        .gold-glow {
        transition: box-shadow 0.3s ease-in-out;
        }

        .gold-glow:hover {
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.8); /* Gold glow effect */
        }
        
        /* .swal-button {
        background-color: black !important;
        color: white !important;
        
        .swal-button:not([disabled]):hover {
            background-color: #ffff; /* Change to your desired hover color */
        } */

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

        @yield('scripts')
        

<!-- <div id="chatbot-container"> -->
<!--<iframe height="430" width="350" class="display-hidden" src="https://console.dialogflow.com/api-client/demo/embedded/e8da9163-167f-4adf-bf84-b95bf386f9e7"></iframe>-->

<!-- <iframe
    allow="microphone;"
    width="350"
    height="430"
    src="https://console.dialogflow.com/api-client/demo/embedded/f47b626c-2cb7-4ff8-a589-9a489dae3d48">
</iframe>
    -->

<!-- </div> -->
<!-- <button onclick="showChatbot()"id="chatbot-button" class="btn btn-primary" width="300px"><i class="bi bi-robot" >Show Bot</i></button>
<button onclick="hideChatbot()"id="chatbot-hide" class="btn btn-primary" width="300px"><i class="bi bi-robot" >Hide Bot</i></button> -->
{{-- <section class="faq-section bg-dark" id="faq">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="text-content">
                    <h1 class="text-white mt-5"><strong>Contact Details</strong></h1>
                    <h4 class="text-white mb-3">Awesome Laguna Inclusive Event Supplier</h4>
                    <p>We love hearing from our readers! Fill out this contact form to send us an email. We'll try our
                        best to respond to you as soon. If you're a brand interested in collaborating with us, you can click the link for options.</p>
                    <p>Thanks!!</p>
                    <strong class="mb-5">LET US KNOW HOW WE CAN HELP</strong>
                    <p class="mt-3 mb-2">For more info:</p>
                    <div class="social-icons">
                        <!-- Add your social media icons here -->
                        <a href="#" class="icon-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="icon-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="icon-link"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <form action="{{route('contact.store')}}" method="post" class="form-container mr-4">
                    @csrf
                    <div class="container text-dark mt-5 mb-5">
                        <div class="card">
                            <div class="card-body">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control mb-3">
                                <label for="">Email Address</label>
                                <input type="text" name="email" class="form-control mb-3">
                                <label for="">Mobile Number</label>
                                <input type="text" name="number" class="form-control mb-3">
                                <label for="">Message</label>
                                <textarea name="message" cols="30" rows="2" class="form-control mb-3"></textarea>
                                <div class="mt-3 form-btn-container">
                                    <button type="submit" class="btn btn-secondary btn-block" onclick="showConfirmation()">SEND</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> --}}

<script>
    function showConfirmation() {
        alert("Form submitted successfully!");
    }
</script>

{{-- <section class="about-section mt-10" style="background-color:;" height="100vh" id="about">
    <div class="container-fluid tex-center">
        <div class="row">
            <div class="row">
                <div class="col">
                    <div class="mt-3">
                        <h2 class="text-center" style="color: #000000";>Awesome Laguna Event Supplies</h2>
                        <p class="text-center" style="color: #000000";>
                            The Awesome Laguna Inclusive Event Supplies (ALIVE) invloves providing event services and supplies in the province of Laguna, Philippines
                        </p>
                        <p class="text-center" style="color: #000000";>
                            Established in 2023, ALIVE is manage by the admin, our main focus is to provide members marketing resources, and business development and oppurtunities through education and establish shared ethical values to inspire customers and client confidence. Awesome Laguna Inclusive Supplier is registered as a non-profit organization, promoting and educating our members.
                        </p>
                        <p class="text-center" style="color: #000000";>
                            Our mission is to provide industry leading education for our members, produce inspirational networking events and advance the ethical standards of the events industry in Laguna.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col">
                    <img src="{{asset('assets/uploads/photo/1.jpg')}}" width="200px" class="img-fluid img-circle gold-glow" alt="about">
                </div>
                <div class="col">
                    <img src="{{asset('assets/uploads/photo/2.jpg')}}" width="200px" class="img-fluid img-circle gold-glow" alt="about">
                </div>
                <div class="col">
                    <img src="{{asset('assets/uploads/photo/3.jpeg')}}" width="200px" class="img-fluid img-circle gold-glow" alt="about">
                </div>
            </div>
        </div>
        
    </div>
</section> --}}
<section class="footer_copyright mt-5 py-4 text-light" style="background-color: #343a40;">
    <div class="container text-center">
        <p class="m-0" style="font-size: 14px;">© Copyright 2023 by Event Supplier Laguna. All rights reserved.</p>
    </div>
</section>
 <!-- SweetAlert -->



<!-- <script>
    var chatbotContainer = document.getElementById("chatbot-container");

function toggleChatbot() {
  chatbotContainer.classList.toggle("hidden");
}
</script> -->
<!-- <script>
var chatbotContainer = document.getElementById("chatbot-container");

function showChatbot() {
  
  chatbotContainer.style.display = "block";
}
function hideChatbot() {
  chatbotContainer.style.display = "none";
}

</script> -->

</body>

</html>