@extends('layouts.frontend')
@section('title')
Checkout
@endsection
@section('content')
<style>
        .btn.btn-outline-secondary:hover {
            background-color: #343a40;
        }
        .btn.btn-outline-secondary {
            color: #000 !important;
            
        }

    
    .navbar {
      margin: 0;
      padding: 8px 20px;
    
    }
    
    /* .navbar-brand img {
      height: 75px;
      width: 150px;
      object-fit: contain;
    } */
    
    /* Add the following CSS for full width in active state */
    .rounded-btn.full-width {
    width: 100%;
    display: block;
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
<div class="container mt-5">
     @if(count($errors) > 0)
        @foreach($errors->all() as $error)
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endforeach
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
   
    <form action="{{url('placeOrder-details')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mt-3">
        <div class="col-md-7">    
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold">Client Information</h5>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6 form-floating">
                            <input type="text" value="{{Auth::user()->name}}" name ="fname" required class="ps-3 form-control fname" id="floatingInput" placeholder="Enter First Name">
                            <label for="floatingInput" class="ms-2">First Name</label>
                            <span id="firstname_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 form-floating">
                            <input type="text" value="{{Auth::user()->lname}}" name ="lname" required class="ps-3 form-control lname" id="floatingInput" placeholder="Enter Last Name">
                            <label for="floatingInput" class="ms-2">Last Name</label>
                            <span id="lastname_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 form-floating mt-3">
                            <input type="text" value="{{Auth::user()->email}}" name ="email" required class="ps-3 form-control email" id="floatingInput" placeholder="Enter Email">
                            <label for="floatingInput" class="ms-2">Email</label>
                            <span id="email_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 form-floating mt-3">
                            <input type="number" value="{{Auth::user()->phone}}" name ="phone" required class="ps-3 form-control pnumber" id="floatingInput"placeholder="Enter Phone Number" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
                            
                            <label for="floatingInput" class="ms-2">Phone Number</label>
                            <span id="phone_error" class="text-danger"></span>

                        </div>
                        {{-- <hr class="mt-3 mx-auto" style="width: 94%;">
                        <label>Address:</label> --}}
                        <div class="col-md-6 form-floating mt-3">
                            <input type="text" value="{{Auth::user()->address1}}" name ="address1" required class="ps-3 form-control add1" id="floatingInput"placeholder="Enter Address">
                            <label for="floatingInput" class="ms-2">Street/Building Name/Unit Floor</label>
                            <span id="add1_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 form-floating mt-3">
                            <input type="text" value="{{Auth::user()->address2}}" name="address2" required class="ps-3 form-control add2" id="floatingInput"placeholder="Enter Address">
                            <label for="floatingInput" class="ms-2">Barangay/District</label>
                            <span id="add2_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 form-floating mt-3">
                            <!--<input type="text" value="{{Auth::user()->city}}" name="city" required class="form-control city" id="floatingInput"placeholder="Enter City">-->
                           
                            <select class="ps-3 form-select" name="city">
                                <option value="{{Auth::user()->city}}">{{Auth::user()->city}}</option>
                                <option value="Alaminos">Alaminos</option>
                                <option value="Bay">Bay</option>
                                <option value="Binan City">Binan City</option>
                                <option value="Cabuyao">Cabuyao</option>
                                <option value="Calamba City">Calamba City</option>
                                <option value="Calauan">Calauan</option>
                                <option value="Cavinti">Cavinti</option>
                                <option value="Famy">Famy</option>
                                <option value="Kalayaan">Kalayaan</option>
                                <option value="Liliw">Liliw</option>
                                <option value="Los Banos">Los Banos</option>
                                <option value="Luisiana">Luisiana</option>
                                <option value="Lumban">Lumban</option>
                                <option value="Mabitac">Mabitac</option>
                                <option value="Magdalena">Magdalena</option>
                                <option value="Majayjay">Majayjay</option>
                                <option value="Paete">Paete</option>
                                <option value="Pagsanjan">Pagsanjan</option>
                                <option value="Pakil">Pakil</option>
                                <option value="Pangil">Pangil</option>
                                <option value="Pila">Pila</option>
                                <option value="Rizal">Rizal</option>
                                <option value="San Pablo City">San Pablo City</option>
                                <option value="San Pedro">San Pedro</option>
                                <option value="Santa Cruz">Santa Cruz</option>
                                <option value="Santa Maria">Santa Maria</option>
                                <option value="Santa Rosa City">Santa Rosa City</option>
                                <option value="Siniloan">Siniloan</option>
                                <option value="Victoria">Victoria</option>
                            </select>
                             <label for="floatingInput" class="ms-2">City</label>
                            <span id="city_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 form-floating mt-3">
                            <input type="text" value="{{Auth::user()->state}}" name="state" required class="ps-3 form-control state" id="floatingInput"placeholder="Enter State">
                            <label for="floatingInput" class="ms-2">Province</label>
                            <span id="state_error" class="text-danger"></span>
                        </div>
                       
                        <div class="col-md-12 form-floating mt-3">
                            <input type="text" value="{{Auth::user()->pincode}}" name="pincode" required class="form-control code" id="floatingInput"placeholder="Enter Code" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
                            <label for="floatingInput" class="ms-2">Code</label>
                            <span id="pcode_error" class="text-danger"></span>
                        </div>

                        <input type="hidden" name="status" value="Book Placed">
                    </div>
                    {{-- <hr> --}}
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-body">
                    @php $total = 0; @endphp
                    @if($carts->count() > 0)
                        <h5 class="fw-bold">Booking Details</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>Supplier</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($carts as $cart)
                                        <tr>
                                            <td>{{$cart->products->users->supplierName}}</td>
                                            <td>{{$cart->products->slug}}</td>
                                            <td>{{$cart->prod_qty}}</td>
                                            <td>{{number_format($cart->products->selling_price,2)}}</td>
                                        </tr>
                                        @php $total += $cart->products->selling_price * $cart->prod_qty ; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-1">
                            <label class="mb-1">Total Amount:</label>
                            <input type="text" value="{{$total}}" class="form-control bg-white text-dark mb-3" name="total_price" readonly>
                        </div>
        
                        <div class="row mt-3">
                            <div class="col">
                                <label>Date of Event</label>
                                <input type="date" class="form-control" name="dateofevent" min="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="col">
                                <label>Time of Event</label>
                                <input type="time" class="form-control" name="timeofevent" required>
                            </div>
                        </div>
        
                        <div class="row mt-3">
                            <div class="col">
                                <label>Type Of Event</label>
                                <select name="typeofevent" class="form-select">
                                    <option value="Wedding">Wedding</option>
                                    <option value="Anniversaries">Anniversaries</option>
                                    <option value="Proposal">Proposal</option>
                                    <option value="Photoshoot">Photoshoot</option>
                                    <option value="Birthday">Birthday</option>
                                    <option value="Debut">Debut</option>
                                    <option value="Christening">Christening</option>
                                    <option value="Memorial">Memorial</option>
                                    <option value="Corporate Events">Corporate Events</option>
                                    <option value="Product Launchings">Product Launchings</option>
                                    <option value="Political Campaigns">Political Campaigns</option>
                                    <option value="City Municipal Festival">City Municipal Festival</option>
                                    <option value="Barangay Events Pageants">Barangay Events Pageants</option>
                                    <option value="Mall Shows">Mall Shows</option>
                                    <option value="Conferences">Conferences</option>
                                    <option value="Wedding">Wedding</option>
                                    <option value="Graduation">Graduation</option>
                                    <option value="Religious Gatherings">Religious Gatherings</option>
                                    <option value="Reunions">Reunions</option>
                                </select>
                            </div>
                        </div>
        
                        <div class="row mt-3">
                            <div class="col">
                                <label>Upload your screenshot of your payment here</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
        
                        <div class="row mt-3">
                            <div class="col">
                                <label>Choose your Payment Method</label>
                                <select name="payment_method" class="form-select">
                                    {{-- <option value=""></option> --}}
                                    @foreach($qrs as $qr)
                                    <option value="{{$qr->payment_type}}">{{$qr->payment_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
        
                        <div class="row mt-3">
                            <div class="col">
                                <label>Apply Voucher/Coupon</label>
                                <input type="text" name="code" class="form-control">
                            </div>
                        </div>
        
                        <div class="row mt-4">
                            <div class="col">
                                <button type="submit" class="btn btn-primary w-100">Book Now</button>
                            </div>
                        </div>
        
                        <div class="row mt-3">
                            <form action="{{ route('cancel.order') }}" method="post">
                                @csrf
                                <div class="col">
                                    <button type="submit" class="btn btn-danger w-100">Cancel</button>
                                </div>
                            </form>
                        </div>
        
                    @else
                        <h4 class="text-center">No Products in cart</h4>
                    @endif
                </div>
            </div>
        </div>
        
 
        <div class="row mt-5 mb-2">
            <div class="col">
                <div class="card shadow-sm" style="width: 102%;">
                    <div class="card-header">
                        Pay with the following payment option:
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($qrs as $qr)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <strong>{{$qr->payment_type}}</strong>
                                            <br>
                                            <img src="{{asset('assets/uploads/payments/'.$qr->image)}}" class="img-fluid mt-3" alt="Payment Option" style="max-height: 100px;">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Terms and Condition</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

    <strong>
    <h3>TERMS AND CONDITIONS</h3>
    </strong><br>
        <h5>1. Introduction</h5> <br>
        <p style="text-align: justify;">
        Welcome to wheyfactoryph!
        These Terms of Service (“Terms”, “Terms of Service”) govern your use of our website located at wheyfactoryph.shop (together or individually “Service”).
        Our Privacy Policy also governs your use of our Service and explains how we collect, safeguard and disclose information that results from your use of our web pages.
        Your agreement with us includes these Terms and our Privacy Policy (“Agreements”). You acknowledge that you have read and understood Agreements, and agree to be bound of them.
        If you do not agree with (or cannot comply with) Agreements, then you may not use the Service, but please let us know by emailing at wheyfactoryph@gmail.com so we can try to find a solution. These Terms apply to all visitors, users and others who wish to access or use Service.
        </p>
        <h5>2. Communications</h5><br>
        <p style="text-align: justify;">
        By using our Service, you agree to subscribe to newsletters, marketing or promotional materials and other information we may send. However, you may opt out of receiving any, or all, of these communications from us by following the unsubscribe link or by emailing at wheyfactoryph@gmail.com.
        </p>
        <h5>3. Purchases</h5><br>
        <p style="text-align: justify;">
        If you wish to purchase any product or service made available through Service (“Purchase”), you may be asked to supply certain information relevant to your Purchase including but not limited to, your credit or debit card number, the expiration date of your card, your billing address, and your shipping information.
        You represent and warrant that: (i) you have the legal right to use any card(s) or other payment method(s) in connection with any Purchase; and that (ii) the information you supply to us is true, correct and complete.
        We may employ the use of third party services for the purpose of facilitating payment and the completion of Purchases. By submitting your information, you grant us the right to provide the information to these third parties subject to our Privacy Policy.
        We reserve the right to refuse or cancel your order at any time for reasons including but not limited to: product or service availability, errors in the description or price of the product or service, error in your order or other reasons.
        We reserve the right to refuse or cancel your order if fraud or an unauthorized or illegal transaction is suspected.
        </p>

        <h5>4. Contests, Sweepstakes and Promotions</h5><br>
        <p style="text-align: justify;">
        Any contests, sweepstakes or other promotions (collectively, “Promotions”) made available through Service may be governed by rules that are separate from these Terms of Service. If you participate in any Promotions, please review the applicable rules as well as our Privacy Policy. If the rules for a Promotion conflict with these Terms of Service, Promotion rules will apply.
        </p>
        <h5>5. Refunds</h5><br>
        <p style="text-align: justify;">
        We issue refunds for Contracts within 3 days of the original purchase of the Contract.
        </p>

        <h5 >6. Content</h5><br>
        <p style="text-align: justify;">
        Content found on or through this Service are the property of Baste Softdrinks Dealership or used with permission. You may not distribute, modify, transmit, reuse, download, repost, copy, or use said Content, whether in whole or in part, for commercial purposes or for personal gain, without express advance written permission from us.
        </p>
        <h5>7. Prohibited Uses</h5><br>
        <p style="text-align: justify;">
        You may use Service only for lawful purposes and in accordance with Terms. You agree not to use Service:
            <ul>
                <li>0.1. In any way that violates any applicable national or international law or regulation.</li>
                <li>0.2. For the purpose of exploiting, harming, or attempting to exploit or harm minors in any way by exposing them to inappropriate content or otherwise.</li>
                <li>0.3. To transmit, or procure the sending of, any advertising or promotional material, including any “junk mail”, “chain letter,” “spam,” or any other similar solicitation.</li>
                <li>0.4. To impersonate or attempt to impersonate Company, a Company employee, another user, or any other person or entity.</li>
                <li>0.5. In any way that infringes upon the rights of others, or in any way is illegal, threatening, fraudulent, or harmful, or in connection with any unlawful, illegal, fraudulent, or harmful purpose or activity.</li>
                <li>0.6. To engage in any other conduct that restricts or inhibits anyone’s use or enjoyment of Service, or which, as determined by us, may harm or offend Company or users of Service or expose them to liability.</li>
            </ul>
        </p>
        <h6>Additionally, you agree not to:</h6>
        <p style="text-align: justify;">
            <ul>
                <li>0.1. Use Service in any manner that could disable, overburden, damage, or impair Service or interfere with any other party’s use of Service, including their ability to engage in real time activities through Service.</li>
                <li>0.2. Use any robot, spider, or other automatic device, process, or means to access Service for any purpose, including monitoring or copying any of the material on Service.</li>
                <li>0.3. Use any manual process to monitor or copy any of the material on Service or for any other unauthorized purpose without our prior written consent.</li>
                <li>0.4. Use any device, software, or routine that interferes with the proper working of Service.</li>
                <li>0.5. Introduce any viruses, trojan horses, worms, logic bombs, or other material which is malicious or technologically harmful.</li>
                <li>0.6. Attempt to gain unauthorized access to, interfere with, damage, or disrupt any parts of Service, the server on which Service is stored, or any server, computer, or database connected to Service.</li>
                <li>0.7. Attack Service via a denial-of-service attack or a distributed denial-of-service attack.</li>
                <li>0.8. Take any action that may damage or falsify Company rating.</li>
                <li>0.9. Otherwise attempt to interfere with the proper working of Service.</li>
            </ul>
        </p>

        <h5>8. Analytics</h5><br>
        <p style="text-align: justify;">
            We may use third-party Service Providers to monitor and analyze the use of our Service.
        </p>
        <h5>9. No Use By Minors</h5><br>
        <p style="text-align: justify;">
        Service is intended only for access and use by individuals at least eighteen (18) years old. By accessing or using Service, you warrant and represent that you are at least eighteen (18) years of age and with the full authority, right, and capacity to enter into this agreement and abide by all of the terms and conditions of Terms. If you are not at least eighteen (18) years old, you are prohibited from both the access and usage of Service.
        </p>
        <h5>10. Accounts</h5><br>
        <p style="text-align: justify;">
        When you create an account with us, you guarantee that you are above the age of 18, and that the information you provide us is accurate, complete, and current at all times. Inaccurate, incomplete, or obsolete information may result in the immediate termination of your account on Service.
        You are responsible for maintaining the confidentiality of your account and password, including but not limited to the restriction of access to your computer and/or account. You agree to accept responsibility for any and all activities or actions that occur under your account and/or password, whether your password is with our Service or a third-party service. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.
        You may not use as a username the name of another person or entity or that is not lawfully available for use, a name or trademark that is subject to any rights of another person or entity other than you, without appropriate authorization. You may not use as a username any name that is offensive, vulgar or obscene.
        We reserve the right to refuse service, terminate accounts, remove or edit content, or cancel orders in our sole discretion.
        </p>

        <h5>11. Intellectual Property</h5><br>
        <p>
        Service and its original content (excluding Content provided by users), features and functionality are and will remain the exclusive property of Baste Softdrinks Dealership and its licensors. Service is protected by copyright, trademark, and other laws of and foreign countries. Our trademarks may not be used in connection with any product or service without the prior written consent of Baste Softdrinks Dealership.
        </p>

        <h5>12. Copyright Policy</h5><br>
        <p style="text-align: justify;">
        We respect the intellectual property rights of others. It is our policy to respond to any claim that Content posted on Service infringes on the copyright or other intellectual property rights (“Infringement”) of any person or entity.
        If you are a copyright owner, or authorized on behalf of one, and you believe that the copyrighted work has been copied in a way that constitutes copyright infringement, please submit your claim via email to BSoftdrinksDealership@gmail.com, with the subject line: “Copyright Infringement” and include in your claim a detailed description of the alleged Infringement as detailed below, under “DMCA Notice and Procedure for Copyright Infringement Claims”
        You may be held accountable for damages (including costs and attorneys’ fees) for misrepresentation or bad-faith claims on the infringement of any Content found on and/or through Service on your copyright.
        </p>

        <h5>13. DMCA Notice and Procedure for Copyright Infringement Claims</h5><br>
        <p style="text-align: justify;">
        You may submit a notification pursuant to the Digital Millennium Copyright Act (DMCA) by providing our Copyright Agent with the following information in writing (see 17 U.S.C 512(c)(3) for further detail):
            <ul>
            0.1. an electronic or physical signature of the person authorized to act on behalf of the owner of the copyright’s interest;
            0.2. a description of the copyrighted work that you claim has been infringed, including the URL (i.e., web page address) of the location where the copyrighted work exists or a copy of the copyrighted work;
            0.3. identification of the URL or other specific location on Service where the material that you claim is infringing is located;
            0.4. your address, telephone number, and email address;
            0.5. a statement by you that you have a good faith belief that the disputed use is not authorized by the copyright owner, its agent, or the law;
            0.6. a statement by you, made under penalty of perjury, that the above information in your notice is accurate and that you are the copyright owner or authorized to act on the copyright owner’s behalf.
            You can contact our Copyright Agent via email at BSoftdrinksDealership@gmail.com.
            </ul>
        </p>

        <h5>14. Error Reporting and Feedback</h5><br>
        <p style="text-align: justify;">
        You may provide us either directly at BSoftdrinksDealership@gmail.com or via third party sites and tools with information and feedback concerning errors, suggestions for improvements, ideas, problems, complaints, and other matters related to our Service (“Feedback”). You acknowledge and agree that: (i) you shall not retain, acquire or assert any intellectual property right or other right, title or interest in or to the Feedback; (ii) Company may have development ideas similar to the Feedback; (iii) Feedback does not contain confidential information or proprietary information from you or any third party; and (iv) Company is not under any obligation of confidentiality with respect to the Feedback. In the event the transfer of the ownership to the Feedback is not possible due to applicable mandatory laws, you grant Company and its affiliates an exclusive, transferable, irrevocable, free-of-charge, sub-licensable, unlimited and perpetual right to use (including copy, modify, create derivative works, publish, distribute and commercialize) Feedback in any manner and for any purpose.
        </p>

        <h5>15. Links To Other Web Sites</h5><br>
        <p style="text-align: justify;">
        Our Service may contain links to third party web sites or services that are not owned or controlled by Baste Softdrinks Dealership.
        Baste Softdrinks Dealership has no control over, and assumes no responsibility for the content, privacy policies, or practices of any third party web sites or services. We do not warrant the offerings of any of these entities/individuals or their websites.
        For example, the outlined Terms of Use have been created using PolicyMaker.io, a free web application for generating high-quality legal documents. PolicyMaker’s Terms and Conditions generator is an easy-to-use free tool for creating an excellent standard Terms of Service template for a website, blog, e-commerce store or app.
        YOU ACKNOWLEDGE AND AGREE THAT COMPANY SHALL NOT BE RESPONSIBLE OR LIABLE, DIRECTLY OR INDIRECTLY, FOR ANY DAMAGE OR LOSS CAUSED OR ALLEGED TO BE CAUSED BY OR IN CONNECTION WITH USE OF OR RELIANCE ON ANY SUCH CONTENT, GOODS OR SERVICES AVAILABLE ON OR THROUGH ANY SUCH THIRD PARTY WEB SITES OR SERVICES.
        WE STRONGLY ADVISE YOU TO READ THE TERMS OF SERVICE AND PRIVACY POLICIES OF ANY THIRD PARTY WEB SITES OR SERVICES THAT YOU VISIT.
        </p>
        
        <h5>16. Disclaimer Of Warranty</h5><br>
        <p style="text-align: justify;">
        THESE SERVICES ARE PROVIDED BY COMPANY ON AN “AS IS” AND “AS AVAILABLE” BASIS. COMPANY MAKES NO REPRESENTATIONS OR WARRANTIES OF ANY KIND, EXPRESS OR IMPLIED, AS TO THE OPERATION OF THEIR SERVICES, OR THE INFORMATION, CONTENT OR MATERIALS INCLUDED THEREIN. YOU EXPRESSLY AGREE THAT YOUR USE OF THESE SERVICES, THEIR CONTENT, AND ANY SERVICES OR ITEMS OBTAINED FROM US IS AT YOUR SOLE RISK.
        NEITHER COMPANY NOR ANY PERSON ASSOCIATED WITH COMPANY MAKES ANY WARRANTY OR REPRESENTATION WITH RESPECT TO THE COMPLETENESS, SECURITY, RELIABILITY, QUALITY, ACCURACY, OR AVAILABILITY OF THE SERVICES. WITHOUT LIMITING THE FOREGOING, NEITHER COMPANY NOR ANYONE ASSOCIATED WITH COMPANY REPRESENTS OR WARRANTS THAT THE SERVICES, THEIR CONTENT, OR ANY SERVICES OR ITEMS OBTAINED THROUGH THE SERVICES WILL BE ACCURATE, RELIABLE, ERROR-FREE, OR UNINTERRUPTED, THAT DEFECTS WILL BE CORRECTED, THAT THE SERVICES OR THE SERVER THAT MAKES IT AVAILABLE ARE FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS OR THAT THE SERVICES OR ANY SERVICES OR ITEMS OBTAINED THROUGH THE SERVICES WILL OTHERWISE MEET YOUR NEEDS OR EXPECTATIONS.
        COMPANY HEREBY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, STATUTORY, OR OTHERWISE, INCLUDING BUT NOT LIMITED TO ANY WARRANTIES OF MERCHANTABILITY, NON-INFRINGEMENT, AND FITNESS FOR PARTICULAR PURPOSE.
        THE FOREGOING DOES NOT AFFECT ANY WARRANTIES WHICH CANNOT BE EXCLUDED OR LIMITED UNDER APPLICABLE LAW.
        </p>
        <h5>17. Limitation Of Liability</h5><br>
        <p style="text-align: justify;">
        EXCEPT AS PROHIBITED BY LAW, YOU WILL HOLD US AND OUR OFFICERS, DIRECTORS, EMPLOYEES, AND AGENTS HARMLESS FOR ANY INDIRECT, PUNITIVE, SPECIAL, INCIDENTAL, OR CONSEQUENTIAL DAMAGE, HOWEVER IT ARISES (INCLUDING ATTORNEYS’ FEES AND ALL RELATED COSTS AND EXPENSES OF LITIGATION AND ARBITRATION, OR AT TRIAL OR ON APPEAL, IF ANY, WHETHER OR NOT LITIGATION OR ARBITRATION IS INSTITUTED), WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE, OR OTHER TORTIOUS ACTION, OR ARISING OUT OF OR IN CONNECTION WITH THIS AGREEMENT, INCLUDING WITHOUT LIMITATION ANY CLAIM FOR PERSONAL INJURY OR PROPERTY DAMAGE, ARISING FROM THIS AGREEMENT AND ANY VIOLATION BY YOU OF ANY FEDERAL, STATE, OR LOCAL LAWS, STATUTES, RULES, OR REGULATIONS, EVEN IF COMPANY HAS BEEN PREVIOUSLY ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. EXCEPT AS PROHIBITED BY LAW, IF THERE IS LIABILITY FOUND ON THE PART OF COMPANY, IT WILL BE LIMITED TO THE AMOUNT PAID FOR THE PRODUCTS AND/OR SERVICES, AND UNDER NO CIRCUMSTANCES WILL THERE BE CONSEQUENTIAL OR PUNITIVE DAMAGES. SOME STATES DO NOT ALLOW THE EXCLUSION OR LIMITATION OF PUNITIVE, INCIDENTAL OR CONSEQUENTIAL DAMAGES, SO THE PRIOR LIMITATION OR EXCLUSION MAY NOT APPLY TO YOU.
        </p>
        <h5>18. Termination</h5><br>
        <p style="text-align: justify;">
        We may terminate or suspend your account and bar access to Service immediately, without prior notice or liability, under our sole discretion, for any reason whatsoever and without limitation, including but not limited to a breach of Terms.
        If you wish to terminate your account, you may simply discontinue using Service.
        All provisions of Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.
        </p>
        <h5>19. Governing Law</h5><br>
        <p style="text-align: justify;">
        These Terms shall be governed and construed in accordance with the laws of Philippines, which governing law applies to agreement without regard to its conflict of law provisions.
        Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service and supersede and replace any prior agreements we might have had between us regarding Service.
        </p>
        <h5>20. Changes To Service</h5><br>
        <p style="text-align: justify;">
        We reserve the right to withdraw or amend our Service, and any service or material we provide via Service, in our sole discretion without notice. We will not be liable if for any reason all or any part of Service is unavailable at any time or for any period. From time to time, we may restrict access to some parts of Service, or the entire Service, to users, including registered users.
        </p>
        <h5>21. Amendments To Terms</h5><br>
        <p style="text-align: justify;">
        We may amend Terms at any time by posting the amended terms on this site. It is your responsibility to review these Terms periodically.
        Your continued use of the Platform following the posting of revised Terms means that you accept and agree to the changes. You are expected to check this page frequently so you are aware of any changes, as they are binding on you.
        By continuing to access or use our Service after any revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, you are no longer authorized to use Service.
        </p>
        <h5>22. Waiver And Severability</h5><br>
        <p style="text-align: justify;">
        No waiver by Company of any term or condition set forth in Terms shall be deemed a further or continuing waiver of such term or condition or a waiver of any other term or condition, and any failure of Company to assert a right or provision under Terms shall not constitute a waiver of such right or provision.
        If any provision of Terms is held by a court or other tribunal of competent jurisdiction to be invalid, illegal or unenforceable for any reason, such provision shall be eliminated or limited to the minimum extent such that the remaining provisions of Terms will continue in full force and effect.

        </p>
        <h5>23. Acknowledgement</h5><br>
        <p style="text-align: justify;">
        BY USING SERVICE OR OTHER SERVICES PROVIDED BY US, YOU ACKNOWLEDGE THAT YOU HAVE READ THESE TERMS OF SERVICE AND AGREE TO BE BOUND BY THEM.
        </p>
        <h5>24. Contact Us</h5><br>
        <p style="text-align: justify;">
        Please send your feedback, comments, requests for technical support by email: wheyfactoryph@gmail.com.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Modal BPI-->
<div class="modal fade" id="exampleModal_BPI" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-centered modal-lg">
        <div class="modal-content">
            <form action="{{url('placeOrder-details-bpi')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">BPI</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <div class="modal-body">
                    <div class="row checkout-form">
                        <div class="col-md-6 form-floating">
                            <input type="text" value="{{Auth::user()->name}}" name ="fname" required class="form-control fname" id="floatingInput" placeholder="Enter First Name">
                            <label for="floatingInput">First Name</label>
                            <span id="firstname_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 form-floating">
                            <input type="text" value="{{Auth::user()->lname}}" name ="lname" required class="form-control lname" id="floatingInput" placeholder="Enter Last Name">
                            <label for="floatingInput">Last Name</label>
                            <span id="lastname_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 form-floating mt-3">
                            <input type="text" value="{{Auth::user()->email}}" name ="email" required class="form-control email" id="floatingInput" placeholder="Enter Email">
                            <label for="floatingInput">Email</label>
                            <span id="email_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 form-floating mt-3">
                            <input type="text" value="{{Auth::user()->phone}}" name ="phone" required class="form-control pnumber" id="floatingInput"placeholder="Enter Phone Number">
                            <label for="floatingInput">Phone Number</label>
                            <span id="phone_error" class="text-danger"></span>

                        </div>
                        <div class="col-md-6 form-floating mt-3">
                            <input type="text" value="{{Auth::user()->address1}}" name ="address1" required class="form-control add1" id="floatingInput"placeholder="Enter Address">
                            <label for="floatingInput">Address 1(Street/Building Name/Unit Floor)</label>
                            <span id="add1_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 form-floating mt-3">
                            <input type="text" value="{{Auth::user()->address2}}" name="address2" required class="form-control add2" id="floatingInput"placeholder="Enter Address">
                            <label for="floatingInput">Address 2(Barangay/District)</label>
                            <span id="add2_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 form-floating mt-3">
                            <input type="text" value="{{Auth::user()->city}}" name="city" required class="form-control city" id="floatingInput"placeholder="Enter City">
                            <label for="floatingInput">City</label>
                            <span id="city_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 form-floating mt-3">
                            <input type="text" value="{{Auth::user()->state}}" name="state" required class="form-control state" id="floatingInput"placeholder="Enter State">
                            <label for="floatingInput">Province</label>
                            <span id="state_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 form-floating mt-3">
                            <input type="text" value="{{Auth::user()->country}}" name="country" required class="form-control country" id="floatingInput"placeholder="Enter Country">
                            <label for="floatingInput">Country</label>
                            <span id="country_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 form-floating mt-3">
                            <input type="text" value="{{Auth::user()->pincode}}" name="pincode" required class="form-control code" id="floatingInput"placeholder="Enter Code">
                            <label for="floatingInput">Code</label>
                            <span id="pcode_error" class="text-danger"></span>
                        </div>

                        <input type="hidden" name="status" value="Ordered Placed">
                        <input type="hidden" name="payment_method" value="BPI">
                        
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Upload your screenshot of your payment here</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <hr>
                <div class="row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end"></label>
                    <div class="col-md-6">
                    <input type ="checkbox"class="terms" name="terms" required id="terms">
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Terms and Condition
                        </button>
                    </div>
                </div>
                <div class="col mt-2">
                <div class="card">
                    <div class="card-body">
                        @php $total = 0; @endphp
                        @if($carts->count() > 0)
                        <h6>Order Details</h6>
                        <hr>
                            <div class="table table-reponsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($carts as $cart)
                                        <tr>
                                            <td>{{$cart->products->slug}}</td>
                                            <td>{{$cart->prod_qty}}</td>
                                            <td>{{number_format($cart->products->selling_price,2)}}</td>
                                        </tr>
                                        @php $total += $cart->products->selling_price * $cart->prod_qty ; @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                                Total Amount: <input type="text" value="{{$total}}" class="form-control" name="total_price">
                            </div>
                        @else
                            <h4 class="text-center">No Products in cart</h4>
                        @endif
                    </div>
                </div>
            </div>  
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Place Order</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal_GCASH" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-centered modal-lg">
        <div class="modal-content">
        <form action="{{url('placeOrder-details-gcash')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="modal-header bg-primary">
            <h5 class="modal-title" id="exampleModalLabel">GCASH</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <div class="row checkout-form">
                    <div class="col-md-6 form-floating">
                        <input type="text" value="{{Auth::user()->name}}" name ="fname" required class="form-control fname" id="floatingInput" placeholder="Enter First Name">
                        <label for="floatingInput">First Name</label>
                        <span id="firstname_error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" value="{{Auth::user()->lname}}" name ="lname" required class="form-control lname" id="floatingInput" placeholder="Enter Last Name">
                        <label for="floatingInput">Last Name</label>
                        <span id="lastname_error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6 form-floating mt-3">
                        <input type="text" value="{{Auth::user()->email}}" name ="email" required class="form-control email" id="floatingInput" placeholder="Enter Email">
                        <label for="floatingInput">Email</label>
                        <span id="email_error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6 form-floating mt-3">
                        <input type="text" value="{{Auth::user()->phone}}" name ="phone" required class="form-control pnumber" id="floatingInput"placeholder="Enter Phone Number">
                        <label for="floatingInput">Phone Number</label>
                        <span id="phone_error" class="text-danger"></span>

                    </div>
                    <div class="col-md-6 form-floating mt-3">
                        <input type="text" value="{{Auth::user()->address1}}" name ="address1" required class="form-control add1" id="floatingInput"placeholder="Enter Address">
                        <label for="floatingInput">Address 1(Street/Building Name/Unit Floor)</label>
                        <span id="add1_error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6 form-floating mt-3">
                        <input type="text" value="{{Auth::user()->address2}}" name="address2" required class="form-control add2" id="floatingInput"placeholder="Enter Address">
                        <label for="floatingInput">Address 2(Barangay/District)</label>
                        <span id="add2_error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6 form-floating mt-3">
                        <input type="text" value="{{Auth::user()->city}}" name="city" required class="form-control city" id="floatingInput"placeholder="Enter City">
                        <label for="floatingInput">City</label>
                        <span id="city_error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6 form-floating mt-3">
                        <input type="text" value="{{Auth::user()->state}}" name="state" required class="form-control state" id="floatingInput"placeholder="Enter State">
                        <label for="floatingInput">Province</label>
                        <span id="state_error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6 form-floating mt-3">
                        <input type="text" value="{{Auth::user()->country}}" name="country" required class="form-control country" id="floatingInput"placeholder="Enter Country">
                        <label for="floatingInput">Country</label>
                        <span id="country_error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6 form-floating mt-3">
                        <input type="text" value="{{Auth::user()->pincode}}" name="pincode" required class="form-control code" id="floatingInput"placeholder="Enter Code">
                        <label for="floatingInput">Code</label>
                        <span id="pcode_error" class="text-danger"></span>
                    </div>

                    <input type="hidden" name="status" value="Ordered Placed">
                    <input type="hidden" name="payment_method" value="GCHASH">
                    
                </div>
                <div class="row">
                    <div class="col">
                        <label>Upload your screenshot of your payment here</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
                <hr>
            <div class="row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-end"></label>
                <div class="col-md-6">
                <input type ="checkbox"class="terms" name="terms" required id="terms">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Terms and Condition
                    </button>
                </div>
            </div>
            <div class="col mt-2">
            <div class="card">
                <div class="card-body">
                    @php $total = 0; @endphp
                    @if($carts->count() > 0)
                    <h6>Order Details</h6>
                    <hr>
                        <div class="table table-reponsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($carts as $cart)
                                    <tr>
                                        <td>{{$cart->products->slug}}</td>
                                        <td>{{$cart->prod_qty}}</td>
                                        <td>{{number_format($cart->products->selling_price,2)}}</td>
                                    </tr>
                                    @php $total += $cart->products->selling_price * $cart->prod_qty ; @endphp
                                @endforeach
                                </tbody>
                            </table>
                            Total Amount: <input type="text" value="{{$total}}" class="form-control" name="total_price">
                        </div>
                    @else
                        <h4 class="text-center">No Products in cart</h4>
                    @endif
                </div>
            </div>
        </div>  
        </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Place Order</button>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://www.paypal.com/sdk/js?client-id=AYKoWXsLmh0tN2RgOi9Y9VWUJyQYsSH56vXPsF8nWR1_p0_dxGWGbb7KbdLxUIWPTH5qe3NYz5fkeRiH&currency=PHP"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    paypal.Buttons
    ({
        // onInit is called when the button first renders
        onInit: function(data, actions) 
            {

            // Disable the buttons
            actions.disable();
            // Listen for changes to the checkbox
                document.querySelector('#terms')
                .addEventListener('change', function(event) {

                    // Enable or disable the button when it is checked or unchecked
                    if (event.target.checked) {
                    actions.enable();
                    } else {
                    actions.disable();
                    
                    }
                });
            
            },
            // onClick is called when the button is clicked
            onClick: function() 
            {

            // Show a validation error if the checkbox is not checked
            if (!document.querySelector('#terms').checked) {
                swal({text:"Please read and check the Terms and Condition", icon:"error"});
            }
            },
            
            createOrder: function(data, actions)
            {
                return actions.order.create({
                    
                    purchase_units:[{
                        amount:{
                            value:'{{$total}}',
                        }
                        
                    }]
                });
            },
            onApprove(data, actions) {
            return actions.order.capture().then(function(details)
            {
                // alert('Transaction completed by' + details.payer.name.name)
                var fname = $('.fname').val();
                var lname = $('.lname').val();
                var email = $('.email').val();
                var pnumber = $('.pnumber').val();
                var add1 = $('.add1').val();
                var add2 = $('.add2').val();
                var city = $('.city').val();
                var state = $('.state').val();
                var country = $('.country').val();
                var code = $('.code').val();
                var terms = $('.terms').val();
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $.ajax({
                        method: "post",
                        url: "placeOrder-details",
                        data: {
                            'fname':fname,
                            'lname':lname,
                            'email':email,
                            'phone':pnumber,
                            'address1':add1,
                            'address2':add2,
                            'city':city,
                            'state':state,
                            'country':country,
                            'pincode':code,
                            'total_price':'{{$total}}',
                            'terms':terms,
                            'status': "Ordered Placed",
                            'payment_method': "Paid by Paypal",
                        },

                        success: function (response) {
                            
                            swal(response.status);
                            window.location.href = "myOrders";
                        }
                    });
            })
        }          
    }).render('#paypal-button-container');
    </script>
@endsection