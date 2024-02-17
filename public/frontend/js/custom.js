
$(document).ready(function () {
    //Add to cart --sunny
    $('.addtoCart').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.productData').find('.prod_id').val();
        var product_qty = $(this).closest('.productData').find('.input-qty').val();
        

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
               
            },

            success: function (response) {
                swal("", response.status, "success");
            }
        });
    });
    
    $('.addtoCart2').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.productData2').find('.prod_id').val();
        var product_qty = $(this).closest('.productData2').find('.input-qty').val();
     

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/add-to-cart-2",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
             
            },

            success: function (response) {
                swal(response.status);
            }
        });
    });
    //increment-decrement button --sunny
    $('.increment-button').click(function (e) {
        e.preventDefault();


        var plus_val = $(this).closest('.productData').find('.input-qty').val();
        var value = parseInt(plus_val, 10);

        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest('.productData').find('.input-qty').val(value);
        }
    });
    $('.decrement-button').click(function (e) {
        e.preventDefault();


        var minus_val = $(this).closest('.productData').find('.input-qty').val();
        var value = parseInt(minus_val, 10);

        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.productData').find('.input-qty').val(value);
        }
    });



    // $('.remove-cart').click(function (e) {
    //     e.preventDefault();

    //     $.ajaxSetup({
    //         headers: {
    //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //       });
    //     //   var confirmation = confirm("Are you sure you want to remove this item from your cart?");
    //     var prod_id = $(this).closest('.productData').find('.prod_id').val();
    //     $.ajax({
    //         method: "POST",
    //         url: "/remove-cart-item",
    //         data: {
    //             'prod_id': prod_id,
    //         },

    //         success: function (response) {
    //             window.location.reload();
    //             swal({ title: "", text: response.status, icon: "success" });

    //         }
    //     });
    // });

    $('.remove-cart').click(function(e) {
        e.preventDefault();

        // Setting up CSRF token for the AJAX request
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Getting product ID from the closest productData element
        var prod_id = $(this).closest('.productData').find('.prod_id').val();

        // Confirming deletion with the user
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this item!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                // Making the AJAX request to remove the item
                $.ajax({
                    method: "DELETE",
                    url: "/remove-cart-item",
                    data: {
                        'prod_id': prod_id,
                    },
                    success: function(response) {
                        // Handling the success message
                        swal("Poof! Your item has been removed!", {
                            icon: "success",
                        }).then((value) => {
                            // Reloading the page after the user clicks OK
                            window.location.reload();
                        });
                    },
                    error: function(error) {
                        console.log(error);
                        swal("Oops! Something went wrong.", {
                            icon: "error",
                        });
                    }
                });
            }
        });
    });

    $('.changeQty').click(function (e) {
        e.preventDefault();


        var prod_id = $(this).closest('.productData').find('.prod_id').val();
        var quantity = $(this).closest('.productData').find('.input-qty').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "update-Cart",
            data: {
                'prod_id': prod_id,
                'prod_qty': quantity,
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });
});