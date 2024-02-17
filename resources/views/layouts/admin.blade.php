<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   @include('layouts.inc.head')
</head>

<body>

    <div class="container-scroller">
        @include('layouts.inc.sidebar')

         <!-- Content Start -->
         <div class="container-fluid page-body-wrapper">
            @include('layouts.inc.navbar')
            @section('content')
            @show
            @include('layouts.inc.footer')
        </div>
        <!-- Content End -->
    </div>  
    @include('layouts.inc.script')
    @stack('custom-scripts')
</body>
</html>