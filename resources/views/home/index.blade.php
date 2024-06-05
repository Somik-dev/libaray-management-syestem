@extends('layouts.frontend')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <!-- meta -->
        <div class="profile-user-box card-box bg-custom">
            <div class="row">
                <div class="col-sm-6">
                    <span class="pull-left mr-3">
                        @if (Auth::user()->photo == null)
                        <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
                        @else
                        <img style="width:100px;  height: 100px; border-radius: 50%;" src="{{asset('uploads/user')}}/{{ Auth::user()->photo }}" alt=""/>
                        @endif
                    </span>
                    <div class="media-body text-white">
                        <h4 class="mt-1 mb-1 font-18">{{ Auth::user()->name }}</h4>
                        <p class="font-13 text-light">{{ Auth::user()->exprience }}</p>
                        <p class="text-light mb-0">{{ Auth::user()->address }}</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="text-right">
                            <a href="{{ route('student.update') }}" class="mdi mdi-account-settings-variant mr-1 btn btn-light waves-effect">&nbsp;Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
        <!--/ meta -->
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-md-4">
        <!-- Personal-Information -->
        <div class="card-box">
            <h4 class="header-title mt-0 m-b-20">Personal Information</h4>
            <div class="panel-body">
                <p class="text-muted font-13">
                    {{ Auth::user()->desp }}
                </p>

                <hr/>

                <div class="text-left">
                    <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15">{{ Auth::user()->name }}</span></p>

                    <p class="text-muted font-13"><strong>Mobile :</strong><span class="m-l-15">{{ Auth::user()->phone }}</span></p>

                    <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15">{{ Auth::user()->email }}</span></p>

                    <p class="text-muted font-13"><strong>Location :</strong> <span class="m-l-15">{{ Auth::user()->address }}</span></p>

                    <p class="text-muted font-13"><strong>Languages :</strong>
                        <span class="m-l-5">
                            <span class="flag-icon flag-icon-us m-r-5 m-t-0" title="us"></span>
                            <span>{{ Auth::user()->language }}</span>
                        </span>
                    </p>

                </div>

                <ul class="social-links list-inline m-t-20 m-b-0">
                    <li class="list-inline-item">
                        <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Personal-Information -->

        <div class="card-box ribbon-box">
            <div class="ribbon ribbon-primary">Messages</div>
            <div class="clearfix"></div>
            <div class="inbox-widget">
                <a href="#">
                    <div class="inbox-item">
                        <div class="inbox-item-img">
                            @if (Auth::user()->photo == null)
                        <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
                        @else
                        <img style="width:40px;  height: 40px; border-radius: 50%;" src="{{asset('uploads/user')}}/{{ Auth::user()->photo }}" alt=""/>
                        @endif

                        </div>
                        <p>Exclusive Live Chating available</p>
                        <p class="inbox-item-date m-t-10">
                        <a class="btn btn-primary" href="{{ url('chatify') }}">Chat</a>
                    </div>
                </a>
            </div>
        </div>

    </div>


     <div class="col-md-8">
        <div class="row">

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-box tilebox-one">
                        <i class="icon-layers float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase mt-0">Total Book</h6>
                        <h2 class="m-b-20" data-plugin="counterup">{{ $books }}</h2>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-sm-4">
                <div class="card">
                <div class="card-box tilebox-one">
                    <i class="icon-paypal float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Total Apporoved Book
                    </h6>
                    <h2 class="m-b-20"><span data-plugin="counterup">{{ $borrow }}</span></h2>
                </div>
            </div>
            </div><!-- end col -->

            <div class="col-sm-4">
                <div class="card">
                <div class="card-box tilebox-one">
                    <i class="icon-rocket float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Total Reject Book</h6>
                    <h2 class="m-b-20" data-plugin="counterup">{{ $reject }}</h2>
                </div>
            </div>
            </div><!-- end col -->

        </div>
        <!-- end row -->


        <div class="card-box">
            <h4 class="header-title mt-0 mb-2">Experience</h4>
            <div class="">
                <div class="">
                    <h5 class="text-custom m-b-5">{{ Auth::user()->exprience }}</h5>
                    <p class="m-b-0">websitename.com</p>
                    <p><b>{{ Auth::user()->session }}</b></p>

                    <p class="text-muted font-13 m-b-0">
                        {{ Auth::user()->desp }}
                    </p>
                </div>
                <hr>
            </div>
        </div>
        <div class="card-box">
            <h4 class="header-title mb-2">My Projects</h4>

            <div class="table-responsive">
                <table class="table m-b-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Project Name</th>
                        <th>Start Date</th>
                        <th>Status</th>
                        <th>Assign</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Adminox Admin</td>
                        <td>01/01/2015</td>
                        <td><span class="label label-info">Work in Progress</span></td>
                        <td>Coderthemes</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->

</div>
<!-- end row -->

@endsection
