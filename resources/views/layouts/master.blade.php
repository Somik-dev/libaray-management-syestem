<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Highdmin - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />


        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('dashboard_asset') }}/images/favicon.ico">

        <!-- App css -->
        <link href="{{ asset('dashboard_asset') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard_asset') }}/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard_asset') }}/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard_asset') }}/css/style.css" rel="stylesheet" type="text/css" />

        <script src="{{ asset('dashboard_asset') }}/js/modernizr.min.js"></script>

        <!-- DataTables -->
        <link href="{{ asset('dashboard_asset') }}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard_asset') }}/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ asset('dashboard_asset') }}/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    {{--  summernote  --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

        <!-- Multi Item Selection examples -->
        <link href="{{ asset('dashboard_asset') }}/plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />+

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">

                <div class="slimscroll-menu" id="remove-scroll">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="index.html" class="logo">
                            <span>
                                <img src="{{ asset('dashboard_asset') }}/images/logo.png" alt="" height="22">
                            </span>
                            <i>
                                <img src="{{ asset('dashboard_asset') }}/images/logo_sm.png" alt="" height="28">
                            </i>
                        </a>
                    </div>

                    <!-- User box -->
                    <div class="user-box">
                        <div class="user-img">
                            @if (Auth::user()->photo == null)
                        <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
                        @else
                        <img style="width:50px;  height: 50px; border-radius: 50%;" src="{{asset('uploads/user')}}/{{ Auth::user()->photo }}" alt=""/>
                        @endif
                        </div>
                        <h5><a href="#">{{ Auth::user()->name }}</a> </h5>
                        <p class="text-muted">Admin Head</p>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <!--<li class="menu-title">Navigation</li>-->

                            <li>
                                <a href="{{ url('home') }}">
                                    <i class="fi-air-play"></i><span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-layers"></i> <span> Students</span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('user') }}">Student List</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-mail"></i><span> Category </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('category.page') }}">Add New Category</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-mail"></i><span> Book </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('add.book') }}">Add Book</a></li>
                                    <li><a href="{{ route('book.list') }}">Book List</a></li>
                                    <li><a href="{{ route('book.trash') }}">Trash List</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('borrow.request') }}">
                                    <i class="fi-command"></i> <span> Borrow Request </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('chatify') }}">
                                    <i class="fi-mail"></i><span> Chat </span>
                                </a>
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

                            {{--  <li class="hide-phone app-search">
                                <form>
                                    <input type="text" placeholder="" class="form-control">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </li>  --}}

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="fi-bell noti-icon"></i>
                                    <span class="badge badge-danger badge-pill noti-icon-badge">{{ App\Models\Borrow::where('status','Applied')->count() }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Notification</h5>
                                    </div>

                                    <div class="slimscroll" style="max-height: 230px;">
                                        <!-- item-->
                                        @foreach (App\Models\Borrow::latest()->take(5)->get() as $Borrow)
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                                            <p class="notify-details">{{ $Borrow->rel_to_user->name }} applied for book <small class="text-muted">1 min ago</small></p>
                                        </a>
                                        @endforeach
                                    </div>

                                    <!-- All-->
                                    <a href="{{ route('borrow.request') }}" class="dropdown-item text-center text-primary notify-item notify-all">
                                        View all <i class="fi-arrow-right"></i>
                                    </a>

                                </div>
                            </li>

                             <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="{{ url('chatify') }}" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="fi-speech-bubble noti-icon"></i>
                                    <span class="badge badge-custom badge-pill noti-icon-badge">{{ auth()->user()->getMessageCount() }}</span>
                                </a>
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                   <img style="width:40px;  height: 40px; border-radius: 50%;" src="{{asset('uploads/user')}}/{{ Auth::user()->photo }}" alt=""/><span class="ml-1">{{ Auth::user()->name }}<i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">

                                    <!-- item-->
                                    <a href="{{ route('profile.update') }}" class="dropdown-item notify-item">
                                        <i class="fi-head"></i> <span>My Account</span>
                                    </a>

                                    <!-- item-->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a onclick="event.preventDefault();
                                                    this.closest('form').submit();" href="{{ route('logout') }}" class="dropdown-item notify-item">
                                                    <i class="fi-power"></i>
                                                    <span>Logout</span>
                                        </a>
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
                                    <h4 class="page-title">Dashboard </h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Welcome to Highdmin admin panel !</li>
                                    </ol>
                                </div>
                            </li>

                        </ul>

                    </nav>

                </div>
                <!-- Top Bar End -->

                <div class="content">
            <div class="container-fluid">
                <main class="py-4">
                    @yield('content')
                    </main>
                       </div>
                   </div>
                <footer class="footer text-right">
                    2018 © Highdmin. - Coderthemes.com
                </footer>

            </div>



            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="{{ asset('dashboard_asset') }}/js/jquery.min.js"></script>
        <script src="{{ asset('dashboard_asset') }}/js/popper.min.js"></script>
        <script src="{{ asset('dashboard_asset') }}/js/bootstrap.min.js"></script>
        <script src="{{ asset('dashboard_asset') }}/js/metisMenu.min.js"></script>
        <script src="{{ asset('dashboard_asset') }}/js/waves.js"></script>
        <script src="{{ asset('dashboard_asset') }}/js/jquery.slimscroll.js"></script>

        <!-- Flot chart -->
        <script src="{{ asset('dashboard_asset') }}/plugins/flot-chart/jquery.flot.min.js"></script>
        <script src="{{ asset('dashboard_asset') }}/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="{{ asset('dashboard_asset') }}/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="{{ asset('dashboard_asset') }}/plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="{{ asset('dashboard_asset') }}/plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="{{ asset('dashboard_asset') }}/plugins/flot-chart/jquery.flot.crosshair.js"></script>
        <script src="{{ asset('dashboard_asset') }}/plugins/flot-chart/curvedLines.js"></script>
        <script src="{{ asset('dashboard_asset') }}/plugins/flot-chart/jquery.flot.axislabels.js"></script>


        <!-- Required datatable js -->
        <script src="{{ asset('dashboard_asset') }}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('dashboard_asset') }}/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Buttons examples -->
        <script src="{{ asset('dashboard_asset') }}/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="{{ asset('dashboard_asset') }}/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="{{ asset('dashboard_asset') }}/plugins/datatables/jszip.min.js"></script>
        <script src="{{ asset('dashboard_asset') }}/plugins/datatables/pdfmake.min.js"></script>
        <script src="{{ asset('dashboard_asset') }}/plugins/datatables/vfs_fonts.js"></script>
        <script src="{{ asset('dashboard_asset') }}/plugins/datatables/buttons.html5.min.js"></script>
        <script src="{{ asset('dashboard_asset') }}/plugins/datatables/buttons.print.min.js"></script>

        <!-- Key Tables -->
        <script src="{{ asset('dashboard_asset') }}/plugins/datatables/dataTables.keyTable.min.js"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('dashboard_asset') }}/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="{{ asset('dashboard_asset') }}/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Selection table -->
        <script src="{{ asset('dashboard_asset') }}/plugins/datatables/dataTables.select.min.js"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="{{ asset('dashboard_asset') }}/plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="{{ asset('dashboard_asset') }}/plugins/jquery-knob/jquery.knob.js"></script>

        <!-- Dashboard Init -->
        <script src="{{ asset('dashboard_asset') }}/pages/jquery.dashboard.init.js"></script>

        <!-- App js -->
        <script src="{{ asset('dashboard_asset') }}/js/jquery.core.js"></script>
        <script src="{{ asset('dashboard_asset') }}/js/jquery.app.js"></script>

        {{--  summernote  --}}
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

        @yield('footer_script')

        <script type="text/javascript">
            $(document).ready(function() {

                // Default Datatable
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>

    </body>
</html>
