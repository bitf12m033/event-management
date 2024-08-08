<!DOCTYPE html>
<html lang="en">

<head>

    <title>Nextro Able Bootstrap 4 Admin Template</title>

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

</head>
<body>

    <!-- [ auth-signup ] start -->
    <div class="auth-wrapper auth-v3">
        <div class="auth-content">
            <div class="card">
                <div class="row align-items-stretch text-center">
                    <div class="col-md-6 img-card-side">
                        <img src="{{ asset('assets/images/auth/auth-side1.jpg') }}" alt="" class="img-fluid">
                        <div class="img-card-side-content">
                            <img src="{{ asset('assets/images/logo-dark.svg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="text-left">
                                <h4 class="mb-3 f-w-600">Welcome to <span class="text-primary">ILMI</span></h4>
                                <p class="text-muted mb-4">Welcome back, Please login <br>into a account</p>
                            </div>
                            @if ($errors->any())
                                <div>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('admin.login') }}">
                                @csrf
                               
                                <div class="">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="mail"></i></span>
                                        </div>
                                        <input type="email" id="email" name="email" required class="form-control" placeholder="Email address">
                                    </div>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="lock"></i></span>
                                        </div>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <!-- <div class="form-group text-left my-2">
                                        <div class="float-right">
                                            <a href="#!" class="text-primary"><span>Forgot Password?</span></a>
                                        </div>
                                        <div class="custom-control custom-checkbox d-inline-block">
                                            <input type="checkbox" class="custom-control-input input-primary" id="customCheckdefh2" checked="">
                                            <label class="custom-control-label" for="customCheckdefh2">Remember me</label>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="text-right">
                                    <!-- <button class="btn btn-light-primary mt-2">Cancel</button> -->
                                    <button class="btn btn-primary mt-2" type="submit">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ auth-signup ] end -->

    <!-- Required Js -->
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/feather.min.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
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
    <script>
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
                $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo-dark.svg');
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
                $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo.svg');
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
                // $('.m-header > .b-brand > .logo-lg').attr('src', '{{ asset('assets/images/logo-dark.svg') }}');
            } else {
                $('.pc-sidebar').removeClass('light-sidebar');
                $('.pc-horizontal .topbar').removeClass('light-sidebar');
                // $('.m-header > .b-brand > .logo-lg').attr('src', '{{ asset('assets/images/logo.svg') }}');
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