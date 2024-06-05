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
        <link rel="shortcut icon" href="{{ asset('frontend') }}/images/favicon.ico">

        <!-- App css -->
        <link href="{{ asset('frontend') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend') }}/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{ asset('dashboard_asset') }}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard_asset') }}/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ asset('dashboard_asset') }}/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <script src="{{ asset('frontend') }}/js/modernizr.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>

    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <!-- <a href="index.html" class="logo">
                            <span class="logo-small"><i class="mdi mdi-radar"></i></span>
                            <span class="logo-large"><i class="mdi mdi-radar"></i> Highdmin</span>
                        </a> -->
                        <!-- Image Logo -->
                        <a href="index.html" class="logo">
                            <img src="{{ asset('frontend') }}/images/logo_sm.png" alt="" height="26" class="logo-small">
                            <img src="{{ asset('frontend') }}/images/logo.png" alt="" height="22" class="logo-large">
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                            <li class="menu-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>
                            <li class="dropdown notification-list hide-phone">
                                <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="mdi mdi-earth"></i> English  <i class="mdi mdi-chevron-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        Spanish
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        Italian
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        French
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        Russian
                                    </a>

                                </div>
                            </li>

                            {{--  <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="fi-bell noti-icon"></i>
                                    <span class="badge badge-danger badge-pill noti-icon-badge">{{ App\Models\Borrow::where('status','Approved')->count() }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h6 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Notification</h6>
                                    </div>

                                    <div class="slimscroll" style="max-height: 230px;">

                                        @foreach (App\Models\Borrow::where('usertype','admin')->get() as $Borrow)
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                                            <p class="notify-details">{{ $Borrow->rel_to_user->name }}  commented on Admin<small class="text-muted">1 min ago</small></p>
                                        </a>
                                        @endforeach
                                    </div>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                        View all <i class="fi-arrow-right"></i>
                                    </a>

                                </div>
                            </li>  --}}

                              <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="{{ url('chatify') }}" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="fi-speech-bubble noti-icon"></i>
                                    <span class="badge badge-dark badge-pill noti-icon-badge">{{ auth()->user()->getMessageCount() }}</span>
                                </a>
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                   @if (Auth::user()->photo == null)
                                    <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
                                    @else
                                    <img src="{{asset('uploads/user')}}/{{ Auth::user()->photo }}" width="20" alt=""/>
                                    @endif
                                    <span class="ml-1 pro-user-name">{{ Auth::user()->name }}<i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="{{ route('student.update') }}" class="dropdown-item notify-item">
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
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="{{ url('home') }}"><i class="icon-speedometer"></i>Home</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="icon-layers"></i>Books</a>
                                <ul class="submenu">
                                    <li><a href="{{ route('student.book') }}">Book List</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="icon-briefcase"></i>My History</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="{{ route('book.history') }}">History list</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="{{ route('explore') }}"><i class="icon-fire"></i>Explore</a>
                            </li>
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container-fluid">
                <main class="py-4">
                    @yield('content')
                    </main>
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        2018 © Highdmin. - Coderthemes.com
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->


        <!-- jQuery  -->
        <script src="{{ asset('frontend') }}/js/jquery.min.js"></script>
        <script src="{{ asset('frontend') }}/js/popper.min.js"></script>
        <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
        <script src="{{ asset('frontend') }}/js/waves.js"></script>
        <script src="{{ asset('frontend') }}/js/jquery.slimscroll.js"></script>

        <!-- Flot chart -->
        <script src="{{ asset('frontend') }}/plugins/flot-chart/jquery.flot.min.js"></script>
        <script src="{{ asset('frontend') }}/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="{{ asset('frontend') }}/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="{{ asset('frontend') }}/plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="{{ asset('frontend') }}/plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="{{ asset('frontend') }}/plugins/flot-chart/jquery.flot.crosshair.js"></script>
        <script src="{{ asset('frontend') }}/plugins/flot-chart/curvedLines.js"></script>
        <script src="{{ asset('frontend') }}/plugins/flot-chart/jquery.flot.axislabels.js"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="{{ asset('frontend') }}/plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="{{ asset('frontend') }}/plugins/jquery-knob/jquery.knob.js"></script>

        <!-- Dashboard Init -->
        <script src="{{ asset('frontend') }}/pages/jquery.dashboard.init.js"></script>

        <!-- App js -->
        <script src="{{ asset('frontend') }}/js/jquery.core.js"></script>
        <script src="{{ asset('frontend') }}/js/jquery.app.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script>

          // Enable pusher logging - don't include this in production
          Pusher.logToConsole = true;

          var pusher = new Pusher('9c485d85ee669bf07bbc', {
            cluster: 'ap2'
          });

          var channel = pusher.subscribe('my-channel');
          channel.bind('my-event', function(data) {
            $.ajax([

            ])
          });
        </script>
    </body>
</html>
