<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />

    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">

    <!-- font css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awsome-pro/css/pro.min.css') }}">
       <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/customizer.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
   
        @include('layouts.preloader')
        @include('layouts.navbar')
        @include('layouts.header')
        <div class="pc-container">
            @include('layouts.breadcrumbs')
            @yield('content')
        </div>
       
    <!-- Required Js -->
    <script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
   <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
   <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script> 
   <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
       <script src="{{ asset('assets/js/plugins/clipboard.min.js') }}"></script>
       <script src="{{ asset('assets/js/uikit.min.js') }}"></script>
    <script>
        $('.chk-indeterminate').prop('indeterminate', true);
    </script>
    <!-- sweet alert Js -->
<script src="{{ asset('assets/js/plugins/sweetalert.min.js')}}"></script>
    <script>
        $('#exampleModalVarying').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body #recipient-name').text(recipient)
            modal.find('.modal-body #message-text').text('hello ' + recipient)
            ``

        })
    </script>

    <div class="pct-customizer">
        <div href="#!" class="pct-c-btn">
            <button class="btn btn-light-danger" id="pct-toggler">
                <i data-feather="settings"></i>
            </button>
            <button class="btn btn-light-primary" data-toggle="tooltip" title="Document" data-placement="left">
                <i data-feather="book"></i>
            </button>
            <button class="btn btn-light-success" data-toggle="tooltip" title="Buy Now" data-placement="left">
                <i data-feather="shopping-bag"></i>
            </button>
            <button class="btn btn-light-info" data-toggle="tooltip" title="Support" data-placement="left">
                <i data-feather="headphones"></i>
            </button>
        </div>
        <div class="pct-c-content ">
            <div class="pct-header bg-primary">
                <h5 class="mb-0 text-white f-w-500">Nextro Customizer</h5>
            </div>
            <div class="pct-body">
                <h6 class="mt-2"><i data-feather="credit-card" class="mr-2"></i>Header settings</h6>
                <hr class="my-2">
                <div class="theme-color header-color">
                    <a href="#!" class="" data-value="bg-default"><span></span><span></span></a>
                    <a href="#!" class="" data-value="bg-primary"><span></span><span></span></a>
                    <a href="#!" class="" data-value="bg-danger"><span></span><span></span></a>
                    <a href="#!" class="" data-value="bg-warning"><span></span><span></span></a>
                    <a href="#!" class="" data-value="bg-info"><span></span><span></span></a>
                    <a href="#!" class="" data-value="bg-success"><span></span><span></span></a>
                    <a href="#!" class="" data-value="bg-dark"><span></span><span></span></a>
                </div>
                <h6 class="mt-4"><i data-feather="layout" class="mr-2"></i>Sidebar settings</h6>
                <hr class="my-2">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="cust-sidebar">
                    <label class="custom-control-label f-w-600 pl-1" for="cust-sidebar">Light Sidebar</label>
                </div>
                <div class="custom-control custom-switch mt-2">
                    <input type="checkbox" class="custom-control-input" id="cust-sidebrand">
                    <label class="custom-control-label f-w-600 pl-1" for="cust-sidebrand">Color Brand</label>
                </div>
                <div class="theme-color brand-color d-none">
                    <a href="#!" class="active" data-value="bg-primary"><span></span><span></span></a>
                    <a href="#!" class="" data-value="bg-danger"><span></span><span></span></a>
                    <a href="#!" class="" data-value="bg-warning"><span></span><span></span></a>
                    <a href="#!" class="" data-value="bg-info"><span></span><span></span></a>
                    <a href="#!" class="" data-value="bg-success"><span></span><span></span></a>
                    <a href="#!" class="" data-value="bg-dark"><span></span><span></span></a>
                </div>
            </div>
        </div>
    </div>

     <!-- Required Js -->
     <script src="{{ asset('assets/js/vendor-all.min.js')}}"></script>
     <script src="{{ asset('assets/js/plugins/bootstrap.min.js')}}"></script>


    <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $('#report-table').DataTable();
        // header option
        $('#pct-toggler').on('click', function() {
            $('.pct-customizer').toggleClass('active');

        });
        // header option
        $('#cust-sidebrand').change(function() {
            if ($(this).is(":checked")) {
                $('.theme-color.brand-color').removeClass('d-none');
                $('.m-header').addClass('bg-dark');
            } else {
                $('.m-header').removeClassPrefix('bg-');
                $('.m-header > .b-brand > .logo-lg').attr('src', '/assets/images/logo-dark.svg');
                $('.theme-color.brand-color').addClass('d-none');
            }
        });
        // Header Color
        $('.brand-color > a').on('click', function() {
            var temp = $(this).attr('data-value');
            // $('.header-color > a').removeClass('active');
            // $('.pcoded-header').removeClassPrefix('brand-');
            // $(this).addClass('active');
            if (temp == "bg-default") {
                $('.m-header').removeClassPrefix('bg-');
            } else {
                $('.m-header').removeClassPrefix('bg-');
                $('.m-header > .b-brand > .logo-lg').attr('src', '/assets/images/logo.svg');
                $('.m-header').addClass(temp);
            }
        });
        // Header Color
        $('.header-color > a').on('click', function() {
            var temp = $(this).attr('data-value');
            // $('.header-color > a').removeClass('active');
            // $('.pcoded-header').removeClassPrefix('brand-');
            // $(this).addClass('active');
            if (temp == "bg-default") {
                $('.pc-header').removeClassPrefix('bg-');
            } else {
                $('.pc-header').removeClassPrefix('bg-');
                $('.pc-header').addClass(temp);
            }
        });
        // sidebar option
        $('#cust-sidebar').change(function() {
            if ($(this).is(":checked")) {
                $('.pc-sidebar').addClass('light-sidebar');
                $('.pc-horizontal .topbar').addClass('light-sidebar');
                // $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo-dark.svg');
            } else {
                $('.pc-sidebar').removeClass('light-sidebar');
                $('.pc-horizontal .topbar').removeClass('light-sidebar');
                // $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo.svg');
            }
        });
        $.fn.removeClassPrefix = function(prefix) {
            this.each(function(i, it) {
                var classes = it.className.split(" ").map(function(item) {
                    return item.indexOf(prefix) === 0 ? "" : item;
                });
                it.className = classes.join(" ");
            });
            return this;
        };
    </script>
</body>
</html>