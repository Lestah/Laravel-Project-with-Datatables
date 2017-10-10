<!DOCTYPE html>
<html lang="en">

<head>

@include('partials._head')

@yield('datatable_css')

@include('partials._javascripts')

@yield('datatable_js')

</head>

<body>

@include('partials._navigation')

@include('partials._page_header')

@yield('article_start')
    <!-- Main Content -->
    <div class="content">

                
                @yield('content')


    </div>

@yield('article_end')
    
    <hr>

@yield('myTable_js')

@include('partials._footer')


    <!-- jQuery -->


</body>

</html>