<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Dashboard - {{env('APP_NAME')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        {{-- ajax csrf-token use start here --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- ajax csrf-token use end here --}}

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        @php
            $favicon=App\Models\Favicon_update::first();
        @endphp
        <link rel="shortcut icon" href="{{asset('uploads-photos/favicon')}}/{{$favicon->favicon_photo}}">



        <!-- App css -->
        <link href="{{asset('dashboard')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard')}}/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard')}}/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard')}}/css/style.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard')}}/plugins/datatables-js-plugin/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard')}}/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <script src="{{asset('dashboard')}}/js/modernizr.min.js"></script>

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">

                <div class="slimscroll-menu" id="remove-scroll">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="{{route('home')}}" class="logo">
                            @php
                                $logo_photo=App\Models\Logo_favicon::first();
                            @endphp
                            <span>
                                <img src="{{asset('uploads-photos/logo_photo')}}/{{$logo_photo->logo_photo}}" alt="" height="22">
                            </span>
                            {{-- <i>
                                <img src="{{asset('dashboard')}}/images/logo_sm.png" alt="" height="28">
                            </i> --}}
                        </a>
                    </div>

                    <!-- User box -->
                    <div class="user-box">
                        <div class="user-img">
                            <img src="{{asset('uploads-photos/profile-photo')}}/{{auth()->user()->profile_photo}}" alt="not found" title="Mat Helme" class="rounded-circle img-fluid">
                        </div>
                        <h5><a href="{{route('home')}}">{{auth()->user()->name}}</a> </h5>
                        <p class="text-muted">Admin</p>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <!--<li class="menu-title">Navigation</li>-->

                            <li>
                                <a href="{{route('home')}}">
                                    <i class="fi-air-play"></i><span> Dashboard </span>
                                </a>
                            </li>
                            {{-- logo update page bar --}}
                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-shield" aria-hidden="true"></i> <span> Logo & favicon update </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-third-level nav" aria-expanded="false">
                                    <li><a href="{{route('logo.favicon')}}">Index</a></li>
                                </ul>
                            </li>
                            {{-- home page bar --}}
                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-home" aria-hidden="true"></i> <span> Home Page </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level nav" aria-expanded="false">
                                    <li><a href="javascript: void(0);" aria-expanded="false">Banner <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('home_banner.create')}}">Create</a></li>
                                            <li><a href="{{route('home_banner.index')}}">Index</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="javascript: void(0);" aria-expanded="false">Feature <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('home_feature.create')}}">Create</a></li>
                                            <li><a href="{{route('home_feature.index')}}">Index</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            {{-- our products page bar --}}
                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-product-hunt" aria-hidden="true"></i> Our Products Page </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level nav" aria-expanded="false">
                                    <li><a href="javascript: void(0);" aria-expanded="false">Banner <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('our_products.banner_page')}}">Banner Update</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="javascript: void(0);" aria-expanded="false">Category <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('category.create')}}">Create</a></li>
                                            <li><a href="{{route('category.index')}}">Index</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="javascript: void(0);" aria-expanded="false">Subcategory <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('subcategory.create')}}">Create</a></li>
                                            <li><a href="{{route('subcategory.index')}}">Index</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="javascript: void(0);" aria-expanded="false">Products Item <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('producta_item.create')}}">Create</a></li>
                                            <li><a href="{{route('producta_item.index')}}">Index</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript: void(0);" aria-expanded="false">Variation Manager <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('variation.manager')}}">Index</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="javascript: void(0);" aria-expanded="false">Shopping Charge <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('shopping.charge')}}">Index</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="javascript: void(0);" aria-expanded="false">Order<span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('order')}}">Index</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            {{-- about page bar --}}
                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-clipboard" aria-hidden="true"></i> About Page </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level nav" aria-expanded="false">
                                    <li><a href="javascript: void(0);" aria-expanded="false">Banner <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('about_banner_page')}}">Banner Update</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="javascript: void(0);" aria-expanded="false">Feature <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('about_feature.create')}}">Create</a></li>
                                            <li><a href="{{route('about_feature.index')}}">Index</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="javascript: void(0);" aria-expanded="false">Team <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('about_team.create')}}">Create</a></li>
                                            <li><a href="{{route('about_team.index')}}">Index</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="javascript: void(0);" aria-expanded="false">Service <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('about_service.create')}}">Create</a></li>
                                            <li><a href="{{route('about_service.index')}}">Index</a></li>
                                            <li><a href="{{route('service.bg_photo')}}">Backgroun Photo Update</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="javascript: void(0);" aria-expanded="false">Client Item <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('about_client.create')}}">Create</a></li>
                                            <li><a href="{{route('about_client.index')}}">Index</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            {{-- contact page bar --}}
                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-connectdevelop" aria-hidden="true"></i> Contact Page </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level nav" aria-expanded="false">
                                    <li><a href="javascript: void(0);" aria-expanded="false">Contact from data <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('contact.from_data_show')}}">Data list</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript: void(0);" aria-expanded="false">Banner <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('contact.banner_page')}}">Banner Update</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="javascript: void(0);" aria-expanded="false">Office Detail <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('office_detail.update_page')}}">Update page</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="javascript: void(0);" aria-expanded="false">Contact Describe <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('contact_describe.page')}}">Index</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="javascript: void(0);" aria-expanded="false">Client Item <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('contact_client.create')}}">Create</a></li>
                                            <li><a href="{{route('contact_client.index')}}">Index</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript: void(0);" aria-expanded="false">Embed Location <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="{{route('embed_location.link')}}">Index</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                        </ul>

                    </div>
                    <!-- Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                <!-- Top Bar Start -->
                <div class="topbar">

                    <nav class="navbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                            {{-- <li class="hide-phone app-search">
                                <form>
                                    <input type="text" placeholder="Search{{asset('dashboard')}}." class="form-control">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </li> --}}

                            {{-- <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="fi-bell noti-icon"></i>
                                    <span class="badge badge-danger badge-pill noti-icon-badge">4</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Notification</h5>
                                    </div>

                                    <div class="slimscroll" style="max-height: 230px;">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min ago</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info"><i class="mdi mdi-account-plus"></i></div>
                                            <p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-danger"><i class="mdi mdi-heart"></i></div>
                                            <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">3 days ago</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-warning"><i class="mdi mdi-comment-account-outline"></i></div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">4 days ago</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-purple"><i class="mdi mdi-account-plus"></i></div>
                                            <p class="notify-details">New user registered.<small class="text-muted">7 days ago</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-custom"><i class="mdi mdi-heart"></i></div>
                                            <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">13 days ago</small></p>
                                        </a>
                                    </div>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                        View all <i class="fi-arrow-right"></i>
                                    </a>

                                </div>
                            </li> --}}

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="fi-speech-bubble noti-icon"></i>
                                    <span class="badge badge-custom badge-pill noti-icon-badge">{{App\Models\Contact::latest()->get()->count()}}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Message</h5>
                                    </div>
                                    <div class="slimscroll" style="max-height: 230px;">
                                        <!-- item-->
                                        @forelse (App\Models\Contact::latest()->get() as $contact_single_data )
                                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                <div class="notify-icon"><img src="" class="img-fluid rounded-circle" alt="not found" /> </div>
                                                <p class="notify-details">{{$contact_single_data->name}}</p>
                                                <p class="text-muted font-13 mb-0 user-msg">{{$contact_single_data->message}}</p>
                                            </a>
                                        @empty
                                            <div colspan="50" class="text-center">
                                                <span class="text-danger">No any message</span>
                                            </div>
                                        @endforelse

                                    </div>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                        View all <i class="fi-arrow-right"></i>
                                    </a>

                                </div>
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="{{asset('uploads-photos/profile-photo')}}/{{auth()->user()->profile_photo}}" alt="not found" class="rounded-circle"> <span class="ml-1">{{auth()->user()->name}}<i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                    <!-- item-->

                                    <a href="{{route('admin.profile')}}" class="dropdown-item notify-item">
                                        <i class="fi-head"></i> <span>My Account</span>
                                    </a>

                                    <!-- item-->
                                    <a href="{{route('index')}}" class="dropdown-item notify-item">
                                        <i class="fi-help"></i> <span>Visit Website</span>
                                    </a>

                                    <!-- item-->
                                    {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fi-lock"></i> <span>Lock Screen</span>
                                    </a> --}}

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item"  onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fi-power"></i> <span>Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </li>

                        </ul>

                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left disable-btn">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                            <li>
                                <div class="page-title-box">
                                    <h4 class="page-title">
                                       @yield('dashboard_bar')
                                    </h4>
                                    <ol class="breadcrumb">
                                        @yield('dashboard_short_title')
                                    </ol>
                                </div>
                            </li>

                        </ul>

                    </nav>

                </div>
                <!-- Top Bar End -->



                <!-- main Page content start here -->
                <div class="content">
                    @yield('main_content')
                </div> <!-- content -->
                <!-- main Page content end here -->


                <footer class="footer text-right">
                    {{date('Y')}} © {{env('APP_NAME')}}.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="{{asset('dashboard')}}/js/jquery.min.js"></script>
        <script src="{{asset('dashboard')}}/js/popper.min.js"></script>
        <script src="{{asset('dashboard')}}/js/bootstrap.min.js"></script>
        <script src="{{asset('dashboard')}}/js/metisMenu.min.js"></script>
        <script src="{{asset('dashboard')}}/js/waves.js"></script>
        <script src="{{asset('dashboard')}}/js/jquery.slimscroll.js"></script>
        <script src="{{asset('dashboard')}}/js/custom.js"></script>

        <!-- Flot chart -->
        <script src="{{asset('dashboard')}}/plugins/flot-chart/jquery.flot.min.js"></script>
        <script src="{{asset('dashboard')}}/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="{{asset('dashboard')}}/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="{{asset('dashboard')}}/plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="{{asset('dashboard')}}/plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="{{asset('dashboard')}}/plugins/flot-chart/jquery.flot.crosshair.js"></script>
        <script src="{{asset('dashboard')}}/plugins/flot-chart/curvedLines.js"></script>
        <script src="{{asset('dashboard')}}/plugins/flot-chart/jquery.flot.axislabels.js"></script>
        <script src="{{asset('dashboard')}}/plugins/datatables-js-plugin/jquery.dataTables.min.js"></script>
        <script src="{{asset('dashboard')}}/plugins/select2/js/select2.min.js"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="{{asset('dashboard')}}/plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="{{asset('dashboard')}}/plugins/jquery-knob/jquery.knob.js"></script>
        <script src="{{asset('dashboard')}}/plugins/chart.js/chart.min.js"></script>

        <!-- Dashboard Init -->
        <script src="{{asset('dashboard')}}/pages/jquery.dashboard.init.js"></script>

        <!-- App js -->
        <script src="{{asset('dashboard')}}/js/jquery.core.js"></script>
        <script src="{{asset('dashboard')}}/js/jquery.app.js"></script>

        {{-- script code start here --}}
            @yield('js_script_code')
        {{-- script code end here --}}

    </body>
</html>
