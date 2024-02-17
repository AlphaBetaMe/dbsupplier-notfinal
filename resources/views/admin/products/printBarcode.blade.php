<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
            body{
        margin: 0;
        padding: 0;
        height: 100vh;
        }

        .container{
        margin: 25px;
        }

        .row{
        width: 100%;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        }

        .card-01{
        background: white;
        position: relative;
        flex: 1;
        max-width: 300px;
        height: 150px;
        margin: 10px;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        .card-01 barcode{
            object-fit:contain;
            padding: px 16px;
        }
    </style>
  </head>
  <body>
    <!--card layout start-->
    <div class="container">
      <div class="row">
        <div class="card-01">
            <div class="barcode text-center">
                <p class="text-center">{{$products->name}}, {{$products->small_description}}</p>
                <p class="">Price: {{$products->selling_price}}</p>
                <img src="data:image/png;base64, {!! DNS1D::getBarcodePNG($products->prod_code, 'C128') !!}" alt="">
                {{$products->prod_code}}
            </div>
        </div>
      </div>
    </div>
    <!--card layout end-->
  </body>
</html>
      

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode</title>

    <style>
        .card{

        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                
            </div>
        </div>
    </div>
   
</body>
</html>