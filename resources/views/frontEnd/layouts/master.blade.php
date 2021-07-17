<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title','Master Page')</title>
    <link rel="icon" href="{{asset('frontEnd/images/home/icon-webpage.png')}}" sizes="16x16" />
    <link href="{{asset('frontEnd/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/owl.theme.default.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{asset('frontEnd/css/main.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="{{asset('frontEnd/js/html5shiv.js')}}"></script>
    <script src="{{asset('frontEnd/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{asset('easyzoom/css/easyzoom.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<!--/head-->

<body>


    @include('frontEnd.layouts.header')
    @section('slider')
    @include('frontEnd.layouts.slider')
    @show
    @yield('content')
    @include('frontEnd.layouts.footer')
    <script src="{{asset('frontEnd/js/jquery.js')}}"></script>
    <script src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/price-range.js')}}"></script>
    <script src="{{asset('frontEnd/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontEnd/js/main.js')}}"></script>
    <script src="{{asset('easyzoom/dist/easyzoom.js')}}"></script>
    <script src="{{ asset('frontEnd/js/bootrap.typehead.js') }}"></script>
    <script src="{{ asset('frontEnd/js/owl.carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if(Session::has('message'))
    <script>
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    </script>
    @endif
    <script>
        var path = "{{ route('suggestedSearch') }}";
        $('#search').typeahead({
            minLength: 3,
            hint: true,
            highlight: true,
            searchOnFocus: true,
            loading: true,
            item: "<li onClick=\"changeIt()\"><a class=\"dropdown-item\" href=\"{{route('search')}}\" ></a></li>",
            source: function(query, process) {
                return $.get(path, {
                    query: query
                }, function(data) {
                    return process(data);
                });
            }
        });

        function changeIt() {
            let selectedQuery = $('a.dropdown-item').text();
            selectedQuery = selectedQuery.slice(0, 20)
            window.location.href = "{{ route('search') }}?query=" + selectedQuery;
        }
    </script>
    <script>
        // Instantiate EasyZoom instances
        var $easyzoom = $('.easyzoom').easyZoom();

        // Setup thumbnails example
        var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

        $('.thumbnails').on('click', 'a', function(e) {
            var $this = $(this);

            e.preventDefault();

            // Use EasyZoom's `swap` method
            api1.swap($this.data('standard'), $this.attr('href'));
        });

        // Setup toggles example
        var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

        $('.toggle').on('click', function() {
            var $this = $(this);

            if ($this.data("active") === true) {
                $this.text("Switch on").data("active", false);
                api2.teardown();
            } else {
                $this.text("Switch off").data("active", true);
                api2._init();
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                rtl: true,
                loop: true,
                margin: 10,
                nav: true,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });
        });
    </script>
</body>

</html>