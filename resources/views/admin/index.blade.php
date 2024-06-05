@extends('layouts.master')
@section('content')
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Library Overview</h4>

                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6 col-xl-3">
                                            <div class="card-box mb-0 widget-chart-two">
                                                <div class="float-right">
                                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                                           data-fgColor="#0acf97" value="{{ $user }}" data-skin="tron" data-angleOffset="180"
                                                           data-readOnly=true data-thickness=".1"/>
                                                </div>
                                                <div class="widget-chart-two-content">
                                                    <p class="text-muted mb-0 mt-2">TOTAL STUDENTS</p>
                                                    <a href="{{ route('user') }}" class="btn btn-success mb-3 btn-sm">VIEW LIST</a>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-lg-6 col-xl-3">
                                            <div class="card-box mb-0 widget-chart-two">
                                                <div class="float-right">
                                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                                           data-fgColor="#f9bc0b" value="{{ $books }}" data-skin="tron" data-angleOffset="180"
                                                           data-readOnly=true data-thickness=".1"/>
                                                </div>
                                                <div class="widget-chart-two-content">
                                                    <p class="text-muted mb-0 mt-2">TOTAL BOOKS</p>
                                                    <a href="{{ route('book.list') }}" class="btn btn-warning mb-3 btn-sm">VIEW LIST</a>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-lg-6 col-xl-3">
                                            <div class="card-box mb-0 widget-chart-two">
                                                <div class="float-right">
                                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                                           data-fgColor="#f1556c" value="{{ $borrow }}" data-skin="tron" data-angleOffset="180"
                                                           data-readOnly=true data-thickness=".1"/>
                                                </div>
                                                <div class="widget-chart-two-content">
                                                    <p class="text-muted mb-0 mt-2">BORROWED BOOKS</p>
                                                    <a href="{{ route('borrow.request') }}" class="btn btn-danger mb-3 btn-sm">VIEW LIST</a>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-lg-6 col-xl-3">
                                            <div class="card-box mb-0 widget-chart-two">
                                                <div class="float-right">
                                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                                           data-fgColor="#2d7bf4" value="{{ $return }}" data-skin="tron" data-angleOffset="180"
                                                           data-readOnly=true data-thickness=".1"/>
                                                </div>
                                                <div class="widget-chart-two-content">
                                                    <p class="text-muted mb-0 mt-2">RETURNED BOOKS</p>
                                                    <a href="{{ route('borrow.request') }}" class="btn btn-primary mb-3 btn-sm">VIEW LIST</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                        </div>
@endsection

