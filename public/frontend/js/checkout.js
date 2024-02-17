$(document).ready(function () {
    $('.razorpay_btn').click(function (e) {
        e.preventDefault();
        var fname = $('.fname').val();
        var lname = $('.lname').val();
        var email = $('.email').val();
        var pnumber = $('.pnumber').val();
        var add1 = $('.add1').val();
        var add2 = $('.add2').val();
        var city = $('.city').val();
        var state = $('.state').val();
        var code = $('.code').val();

        if (!fname) {
            firstname_error = "First Name is required";
            $('#firstname_error').html('');
            $('#firstname_error').html(firstname_error);
        }
        else {
            firstname_error = "";
            $('#firstname_error').html('');
        }

        if (!lname) {
            lastname_error = "Last Name is required";
            $('#lastname_error').html('');
            $('#lastname_error').html(lastname_error);
        }
        else {
            lastname_error = "";
            $('#lastname_error').html('');
        }

        if (!email) {
            email_error = "Email is required";
            $('#email_error').html('');
            $('#email_error').html(email_error);
        }
        else {
            email_error = "";
            $('#email_error').html('');
        }

        if (!pnumber) {
            phone_error = "Phone Number is required";
            $('#phone_error').html('');
            $('#phone_error').html(phone_error);
        }
        else {
            phone_error = "";
            $('#phone_error').html('');
        }

        if (!add1) {
            add1_error = "Address is required";
            $('#add1_error').html('');
            $('#add1_error').html(add1_error);
        }
        else {
            add1_error = "";
            $('#add1_error').html('');
        }

        if (!add2) {
            add2_error = "Address is required";
            $('#add2_error').html('');
            $('#add2_error').html(add2_error);
        }
        else {
            add2_error = "";
            $('#add2_error').html('');
        }

        if (!city) {
            city_error = "City is required";
            $('#city_error').html('');
            $('#city_error').html(city_error);
        }
        else {
            city_error = "";
            $('#city_error').html('');
        }

        if (!state) {
            state_error = "state is required";
            $('#state_error').html('');
            $('#state_error').html(state_error);
        }
        else {
            state_error = "";
            $('#state_error').html('');
        }


        if (!code) {
            pcode_error = "Code is required";
            $('#pcode_error').html('');
            $('#pcode_error').html(pcode_error);
        }
        else {
            pcode_error = "";
            $('#pcode_error').html('');
        }

        if (firstname_error != '' || lastname_error != '' || email_error != '' || phone_error != '' || add1_error != '' || add2_error != '' || city_error != '' || state_error != '' || pcode_error != '') {

            return false;
        }
        else {
            var data = {
                'fname': fname,
                'lname': lname,
                'email': email,
                'pnumber': pnumber,
                'add1': add1,
                'add2': add2,
                'city': city,
                'state': state,
                'code': code,
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: "/proceed-payment",
                data: data,

                success: function (response) {
                    // alert(response.total_price);
                    var options = {
                        "key": "rzp_test_XgoI4tFVUEdYQM", // Enter the Key ID generated from the Dashboard
                        "amount": response.total_price * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "PHP",
                        "name": response.fname + ' ' + response.lname,
                        "description": "Thank you for choosing us",
                        "image": "{{asset('asset/logo5.2 copy.png')}}",

                        "handler": function (responsea) {
                            alert(responsea.razorpay_payment_id);
                            $.ajax({
                                method: "POST",
                                url: "placeOrder-details",
                                data: {
                                    'fname': response.fname,
                                    'lname': response.lname,
                                    'email': response.email,
                                    'phone': response.pnumber,
                                    'address1': response.add1,
                                    'address2': response.add2,
                                    'city': response.city,
                                    'state': response.state,
                                    'pincode': response.code,
                                    'total_price': response.total_price,
                                    'status': "Ordered Placed",
                                    'payment_method': "Paid by Razorpay",
                                },

                                success: function (responseb) {
                                    alert(responseb.status);
                                }
                            });
                        },
                        "prefill": {
                            "name": response.fname + ' ' + response.lname,
                            "email": response.email,
                            "contact": response.phone
                        },
                        "notes": {
                            "address": "Razorpay Corporate Office"
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();

                }

            });
        }
    });
});