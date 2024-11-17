
@include('Admin.includes.head')

<body class="sb-nav-fixed">
 @include('Admin.includes.nav')
 <div id="layoutSidenav">
   @include('Admin.includes.sidebar')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">@yield('page_title')</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">@yield('sub_title')</li>
                </ol>
                @yield('content')
                
            </div>
        </main>
   @include('Admin.includes.footer')
    </div>
</div>
@include('Admin.includes.script')

</body>

