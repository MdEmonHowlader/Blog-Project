<head>
    @include('Frontend.includes.head')

</head>

<body>

    @include('Frontend.includes.nav')
    <!-- ***** Preloader End ***** -->
    <!-- Banner Starts Here -->
@yield('banner')


    <!-- Banner Ends Here -->
    <section class="blog-posts">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            @yield('content')
                        </div>
                    </div>
                </div>

                @include('Frontend.includes.sidber')
            </div>
        </div>
    </section>


    @include('Frontend.includes.footer')

    <!-- Bootstrap core JavaScript -->

    @include('Frontend.includes.script')
</body>

</html>
