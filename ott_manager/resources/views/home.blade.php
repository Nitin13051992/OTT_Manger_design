@extends('layouts.main')
@push('style')
@endpush
@section('content')
@can('view-home')
<div class="col-md-12">
    <p class="font-16 text-blue font-w-500 mb-0">Hi {{ Auth::user()->name }}
        <a target="_blank"
            href="http://stg-web.planetcast.in:81/?ottid=615&siteid=5&authtoken=b09a78ea260fa81be46ee0b605b8a626">Analytics</a>
    </p>
    <div class="d-flex align-items-center">
        <h1 class="font-30 font-w-700 text-blue mt-0 mb-0">Welcome to OTT Play</h1>
    </div>
    <div class="d-flex align-items-center dashboard_boxes mt-4">
        <div class="card flex-row"
            style="background:url(assets/images/dashboard_icon2.png) no-repeat top 20px right 10px #fff;">
            <span class="icon rounded-circle d-flex align-items-center justify-content-center gred">
                <img src="assets/images/registration.png" width="22"></span>
            </span>
            <div class="info ml-3">
                <h5 class="font-13 font-w-600 mb-0 mt-0">Registration</h5>
                <span class="font-24 font-w-700 mb-0 mt-0">{{ $userData }}</span>
            </div>
        </div>
        <div class="card flex-row"
            style="background:url(assets/images/dashboard_icon2.png) no-repeat top 20px right 10px #fff;">
            <span class="icon rounded-circle d-flex align-items-center justify-content-center gred">
                <img src="assets/images/total.png" width="22"></span>
            </span>
            <div class="info ml-3">
                <h5 class="font-13 font-w-600 mb-0 mt-0">Total Content</h5>
                <span class="font-24 font-w-700 mb-0 mt-0">{{ $totalContent }}</span>
            </div>
        </div>
        <div class="card flex-row gred">
            <div class="info w-100 pl-3">
                <h5 class="font-13 font-w-600 mb-0 mt-0 text-white" style="color:#fff !important;">Active /
                    Inactive Content
                </h5>
                <div class="d-flex align-items-center">
                    <span class="font-24 font-w-700 mb-0 mt-0">
                        {{ $activeContent }} </span>
                    <span class="font-24 font-w-700 mb-0 mt-0 ml-5">
                        {{ $desableContent }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex mt-4">
        <div class="card  dashboard_tabs w-100">
            <div class="d-flex algn-items-center">
                <ul class="nav nav-tabs">
                    <li class="active"><a class="nav-link active" data_tab="1" data-toggle="tab"
                            href="#transformation">Records</a></li>
                    <li><a class="nav-link" data-toggle="tab" data_tab="2" href="#images_video ">Images & Video
                        </a>
                    </li>
                    <!-- <li> <a class="nav-link" data-toggle="tab" data_tab="3" href="#storage">storage</a></li> -->
                    <li> <a class="nav-link" data-toggle="tab" data_tab="3" href="#bandwidth">Bandwidth</a></li>
                    <li> <a class="nav-link" data-toggle="tab" data_tab="3" href="#bucket_usage">Bucket Usage</a>
                    </li>
                </ul>

            </div>
            <div class="tab-content">
                <div id="transformation" class="tab-pane active">
                    <div class="d-flex align-items-center fileupload-buttonbar mt-3">
                        <ul class="list list-inline mb-0">
                            <li class="list-inline-item">
                                <button type="button" value="day" class="btn btn-success fileinput-button"
                                    onclick="makeRequest('today')">
                                    <span>Day</span>
                                </button>
                            </li>

                            <li class="list-inline-item">
                                <button type="button" value="week" class="btn btn-primary start"
                                    onclick="makeRequest('week')">
                                    <span>Week</span>
                                </button>
                            </li>

                            <li class="list-inline-item">
                                <button type="button" value="month" class="btn btn-warning cancel"
                                    onclick="makeRequest('month')">
                                    <span class="text-white">Month</span>
                                </button>
                            </li>

                            <li class="list-inline-item">
                                <button type="button" value="year" class="btn btn-danger delete"
                                    onclick="makeRequest('year')">
                                    <span>Year</span>
                                </button>
                            </li>
                        </ul>

                        <div class="info ml-auto d-flex align-items-center text-right flex-column justify-content-end">
                            <span id="days_msg" class="font-14 w-100"></span>
                            <h3 class="font-16 mt-0 mb-0 w-100" id="box_title"></h3>
                        </div>

                    </div>


                </div>
                <div class="box-body chart-responsive" id="container"></div>
                <div id="images_video" class="tab-pane fade">
                    Amrita
                    <ul class="nav nav-tabs">
                    </ul>
                    <div class="tab-content">
                    </div>
                    <div id="cdn_title"></div>
                    <div class="box-body chart-responsive" id="cdn_usage_container"></div>
                </div>
                <div id="images_video" class="tab-pane fade">
                    <div class="tab-content">

                        <div id="cdnTab_6" class="tab-pane active">
                            <ul class="list list-inline mb-0">
                                <li class="list-inline-item">
                                </li>
                                <li class="list-inline-item">
                                    <button type="button" value="week" class="btn btn-primary start"
                                        onclick="makeGraph('week','E1FA47W9KUG9LI')">
                                        <span>Week</span>
                                    </button>
                                </li>
                                <li class="list-inline-item">
                                    <button type="button" value="month" class="btn btn-warning cancel"
                                        onclick="makeGraph('month','E1FA47W9KUG9LI')">
                                        <span>Month</span>
                                    </button>
                                </li>
                                <li class="list-inline-item">
                                    <button type="button" value="year" class="btn btn-danger delete"
                                        onclick="makeGraph('year','E1FA47W9KUG9LI')">
                                        <span>Year</span>
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div id="cdnTab_7" class="tab-pane ">
                            <ul class="list list-inline mb-0">
                                <li class="list-inline-item">
                                </li>
                                <li class="list-inline-item">
                                    <button type="button" value="week" class="btn btn-primary start"
                                        onclick="makeGraph('week','E3JZKPRTJ4ERDY')">
                                        <span>Week</span>
                                    </button>
                                </li>
                                <li class="list-inline-item">
                                    <button type="button" value="month" class="btn btn-warning cancel"
                                        onclick="makeGraph('month','E3JZKPRTJ4ERDY')">
                                        <span>Month</span>
                                    </button>
                                </li>
                                <li class="list-inline-item">
                                    <button type="button" value="year" class="btn btn-danger delete"
                                        onclick="makeGraph('year','E3JZKPRTJ4ERDY')">
                                        <span>Year</span>
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div id="cdnTab_8" class="tab-pane ">
                            <ul class="list list-inline mb-0">
                                <li class="list-inline-item">
                                </li>
                                <li class="list-inline-item">
                                    <button type="button" value="week" class="btn btn-primary start"
                                        onclick="makeGraph('week','E12PAAU2L5Q6AL')">
                                        <span>Week</span>
                                    </button>
                                </li>
                                <li class="list-inline-item">
                                    <button type="button" value="month" class="btn btn-warning cancel"
                                        onclick="makeGraph('month','E12PAAU2L5Q6AL')">
                                        <span>Month</span>
                                    </button>
                                </li>
                                <li class="list-inline-item">
                                    <button type="button" value="year" class="btn btn-danger delete"
                                        onclick="makeGraph('year','E12PAAU2L5Q6AL')">
                                        <span>Year</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="cdn_title"></div>
                    <div class="box-body chart-responsive" id="cdn_usage_container"></div>
                </div>
                <div id="storage" class="tab-pane fade">
                    <h1>Storage </h1>
                </div>
                <div id="bandwidth" class="tab-pane fade">
                    <h3 class="font-20 font-w-600 mb-3">Bandwidth </h3>

                    <div class="form2 row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <span class="title">From Date</span>
                                <input type='date' class="form-control input" placeholder="From" size='16'
                                    id="fromDate2" name="current_date" autocomplete="off" />
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <span class="title">To Date</span>
                                <input type='date' class="form-control input" placeholder="From" size='16'
                                    id="fromDate1" name="prev_date" autocomplete="off" value=" " />
                            </div>
                        </div>
                    </div>
                    <div class="form2 row">
                        <div class="col-md-5">
                            <select id="cdnFetch" class="cdnFetch select2" data-minimum-results-for-search="Infinity">
                                <option value="6">Thumbnail</option>
                                <option value="7">VOD</option>
                                <option value="8">CMS</option>
                            </select>
                        </div>
                        <div class="col-md-5 pl-0">
                            <span id="usage_cdn_data" class="loader mt-3">
                            </span>
                            <b></b>
                        </div>
                    </div>
                </div>
                <div id="bucket_usage" class="tab-pane fade">
                    <h3>Bucket Usage</h3>
                    <h1>
                        &nbsp;<b></b>
                    </h1>
                </div>
            </div>
        </div>

    </div>
    <div class="d-flex  flex_col">
        <div class="card col pl-0 pr-0 pb-0 position-relative">
            <div class="d-flex pr-3">
                <span class="ml-auto d-flex align-items-cennter justify-content-center"
                    style="background-color: #f4f7fe; width: 40px; height: 40px; border-radius: 10px;">
                    <img src="assets/images/bucket_usage.png" class="m-auto">
                </span>
            </div>
            <div class="text-center">
                <span class="txt-light font-13 font-w-500 d-block mt-1 text-center">Bucket usage</span>
                <h3 class="font-26 font-w-700 text-blue mt-2 text-center">
                    &nbsp;<b></b>
                </h3>
            </div>
            <!-- <img src="assets/images/data_usage.jpg" class="w-100" style="position:absolute; bottom:0px; left:0px;"> -->
        </div>
        <div class="card col pb-0">
            <h4 class="font-20 mt-0 font-w-700 mb-4">Your Plan transactions</h4>
            <div class="d-flex align-items-center mb-3">
                <span class="rounded-circle bg-light d-flex align-items-cennter justify-content-center"
                    style="width: 45px; height:45px;">
                    <img src="assets/images/silver_plan.png" class="m-auto">
                </span>
                <div class="info ml-3 d-flex align-items-center" style="width:80%;">
                    <div class="" style="width:72%;">
                        <h4 class="font-16 mb-0 mt-0 font-w-700">Silver Plan</h4>
                        <a href="mailto:rajivkumar@gmail.com" class="txt-light font-13">rajivkumar@gmail.com</a>
                    </div>
                    <span class="d-block font-18 font-w-700 d-block" style="width:28%;">399 Rs</span>
                </div>
            </div>
            <div class="d-flex align-items-center mb-3">
                <span class="rounded-circle bg-light d-flex align-items-cennter justify-content-center"
                    style="width: 45px; height:45px;">
                    <img src="assets/images/gold_plan.png" class="m-auto">
                </span>
                <div class="info ml-3 d-flex align-items-center" style="width:80%;">
                    <div class="" style="width:72%;">
                        <h4 class="font-16 mb-0 mt-0 font-w-700">Gold Plan</h4>
                        <a href="mailto:rajivkumar@gmail.com" class="txt-light font-13">rajivkumar@gmail.com</a>
                    </div>
                    <span class="d-block font-18 font-w-700 d-block" style="width:28%;">399 Rs</span>
                </div>
            </div>
            <div class="d-flex align-items-center mb-3">
                <span class="rounded-circle bg-light d-flex align-items-cennter justify-content-center"
                    style="width: 45px; height:45px;">
                    <img src="assets/images/silver_plan.png" class="m-auto">
                </span>
                <div class="info ml-3 d-flex align-items-center" style="width:80%;">
                    <div class="" style="width:72%;">
                        <h4 class="font-16 mb-0 mt-0 font-w-700">Silver Plan</h4>
                        <a href="mailto:rajivkumar@gmail.com" class="txt-light font-13">rajivkumar@gmail.com</a>
                    </div>
                    <span class="d-block font-18 font-w-700 d-block" style="width:28%;">399 Rs</span>
                </div>
            </div>
            <div class="d-flex mt-3">
                <a class="view_more ml-auto" href="#">View all <i class="ti ti-arrow-right"></i></a>
            </div>
            <br>
        </div>
    </div>
</div>
@endcan
@endsection
