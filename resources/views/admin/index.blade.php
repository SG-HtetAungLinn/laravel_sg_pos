@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Products Sold</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">4565</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Net Profit</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">$ 8541</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">New Customers</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">4565</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-4">
                <div class="card-body">
                    <h3 class="card-title text-white">Customer Satisfaction</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">99%</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body pb-0 d-flex justify-content-between">
                            <div>
                                <h4 class="mb-1">Product Sales</h4>
                                <p>Total Earnings of the Month</p>
                                <h3 class="m-0">$ 12,555</h3>
                            </div>
                            <div>
                                <ul>
                                    <li class="d-inline-block mr-3"><a class="text-dark" href="#">Day</a></li>
                                    <li class="d-inline-block mr-3"><a class="text-dark" href="#">Week</a>
                                    </li>
                                    <li class="d-inline-block"><a class="text-dark" href="#">Month</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="chart-wrapper">
                            <canvas id="chart_widget_2"></canvas>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="w-100 mr-2">
                                    <h6>Pixel 2</h6>
                                    <div class="progress" style="height: 6px">
                                        <div class="progress-bar bg-danger" style="width: 40%"></div>
                                    </div>
                                </div>
                                <div class="ml-2 w-100">
                                    <h6>iPhone X</h6>
                                    <div class="progress" style="height: 6px">
                                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Summary</h4>
                    <div id="morris-bar-chart"></div>
                </div>
            </div>

        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card card-widget">
                <div class="card-body">
                    <h5 class="text-muted">Order Overview </h5>
                    <h2 class="mt-4">5680</h2>
                    <span>Total Revenue</span>
                    <div class="mt-4">
                        <h4>30</h4>
                        <h6>Online Order <span class="pull-right">30%</span></h6>
                        <div class="progress mb-3" style="height: 7px">
                            <div class="progress-bar bg-primary" style="width: 30%;" role="progressbar">
                                <span class="sr-only">30% Order</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4>50</h4>
                        <h6 class="m-t-10 text-muted">Offline Order <span class="pull-right">50%</span>
                        </h6>
                        <div class="progress mb-3" style="height: 7px">
                            <div class="progress-bar bg-success" style="width: 50%;" role="progressbar">
                                <span class="sr-only">50% Order</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4>20</h4>
                        <h6 class="m-t-10 text-muted">Cash On Develery <span class="pull-right">20%</span>
                        </h6>
                        <div class="progress mb-3" style="height: 7px">
                            <div class="progress-bar bg-warning" style="width: 20%;" role="progressbar">
                                <span class="sr-only">20% Order</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-0">
                    <h4 class="card-title px-4 mb-3">Todo</h4>
                    <div class="todo-list">
                        <div class="tdl-holder">
                            <div class="tdl-content">
                                <ul id="todo_list">
                                    <li><label><input type="checkbox"><i></i><span>Get up</span><a href='#'
                                                class="ti-trash"></a></label></li>
                                    <li><label><input type="checkbox" checked><i></i><span>Stand
                                                up</span><a href='#' class="ti-trash"></a></label>
                                    </li>
                                    <li><label><input type="checkbox"><i></i><span>Don't give up the
                                                fight.</span><a href='#' class="ti-trash"></a></label>
                                    </li>
                                    <li><label><input type="checkbox" checked><i></i><span>Do something
                                                else</span><a href='#' class="ti-trash"></a></label>
                                    </li>
                                </ul>
                            </div>
                            <div class="px-4">
                                <input type="text" class="tdl-new form-control"
                                    placeholder="Write new item and hit 'Enter'...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="./images/users/8.jpg" class="rounded-circle" alt="">
                        <h5 class="mt-3 mb-1">Ana Liem</h5>
                        <p class="m-0">Senior Manager</p>
                        <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="./images/users/5.jpg" class="rounded-circle" alt="">
                        <h5 class="mt-3 mb-1">John Abraham</h5>
                        <p class="m-0">Store Manager</p>
                        <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="./images/users/7.jpg" class="rounded-circle" alt="">
                        <h5 class="mt-3 mb-1">John Doe</h5>
                        <p class="m-0">Sales Man</p>
                        <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="./images/users/1.jpg" class="rounded-circle" alt="">
                        <h5 class="mt-3 mb-1">Mehedi Titas</h5>
                        <p class="m-0">Online Marketer</p>
                        <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="active-member">
                        <div class="table-responsive">
                            <table class="table table-xs mb-0">
                                <thead>
                                    <tr>
                                        <th>Customers</th>
                                        <th>Product</th>
                                        <th>Country</th>
                                        <th>Status</th>
                                        <th>Payment Method</th>
                                        <th>Activity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="./images/avatar/1.jpg" class=" rounded-circle mr-3"
                                                alt="">Sarah Smith</td>
                                        <td>iPhone X</td>
                                        <td>
                                            <span>United States</span>
                                        </td>
                                        <td>
                                            <div>
                                                <div class="progress" style="height: 6px">
                                                    <div class="progress-bar bg-success" style="width: 50%">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                        <td>
                                            <span>Last Login</span>
                                            <span class="m-0 pl-3">10 sec ago</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="./images/avatar/2.jpg" class=" rounded-circle mr-3"
                                                alt="">Walter R.</td>
                                        <td>Pixel 2</td>
                                        <td><span>Canada</span></td>
                                        <td>
                                            <div>
                                                <div class="progress" style="height: 6px">
                                                    <div class="progress-bar bg-success" style="width: 50%">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                        <td>
                                            <span>Last Login</span>
                                            <span class="m-0 pl-3">50 sec ago</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="./images/avatar/3.jpg" class=" rounded-circle mr-3"
                                                alt="">Andrew D.</td>
                                        <td>OnePlus</td>
                                        <td><span>Germany</span></td>
                                        <td>
                                            <div>
                                                <div class="progress" style="height: 6px">
                                                    <div class="progress-bar bg-warning" style="width: 50%">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><i class="fa fa-circle-o text-warning  mr-2"></i> Pending</td>
                                        <td>
                                            <span>Last Login</span>
                                            <span class="m-0 pl-3">10 sec ago</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="./images/avatar/6.jpg" class=" rounded-circle mr-3" alt="">
                                            Megan S.</td>
                                        <td>Galaxy</td>
                                        <td><span>Japan</span></td>
                                        <td>
                                            <div>
                                                <div class="progress" style="height: 6px">
                                                    <div class="progress-bar bg-success" style="width: 50%">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                        <td>
                                            <span>Last Login</span>
                                            <span class="m-0 pl-3">10 sec ago</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="./images/avatar/4.jpg" class=" rounded-circle mr-3" alt="">
                                            Doris R.</td>
                                        <td>Moto Z2</td>
                                        <td><span>England</span></td>
                                        <td>
                                            <div>
                                                <div class="progress" style="height: 6px">
                                                    <div class="progress-bar bg-success" style="width: 50%">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                        <td>
                                            <span>Last Login</span>
                                            <span class="m-0 pl-3">10 sec ago</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="./images/avatar/5.jpg" class=" rounded-circle mr-3"
                                                alt="">Elizabeth W.</td>
                                        <td>Notebook Asus</td>
                                        <td><span>China</span></td>
                                        <td>
                                            <div>
                                                <div class="progress" style="height: 6px">
                                                    <div class="progress-bar bg-warning" style="width: 50%">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><i class="fa fa-circle-o text-warning  mr-2"></i> Pending</td>
                                        <td>
                                            <span>Last Login</span>
                                            <span class="m-0 pl-3">10 sec ago</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6">

            <div class="card">
                <div class="chart-wrapper mb-4">
                    <div class="px-4 pt-4 d-flex justify-content-between">
                        <div>
                            <h4>Sales Activities</h4>
                            <p>Last 6 Month</p>
                        </div>
                        <div>
                            <span><i class="fa fa-caret-up text-success"></i></span>
                            <h4 class="d-inline-block text-success">720</h4>
                            <p class=" text-danger">+120.5(5.0%)</p>
                        </div>
                    </div>
                    <div>
                        <canvas id="chart_widget_3"></canvas>
                    </div>
                </div>
                <div class="card-body border-top pt-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul>
                                <li>5% Negative Feedback</li>
                                <li>95% Positive Feedback</li>
                            </ul>
                            <div>
                                <h5>Customer Feedback</h5>
                                <h3>385749</h3>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div id="chart_widget_3_1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Activity</h4>
                    <div id="activity">
                        <div class="media border-bottom-1 pt-3 pb-3">
                            <img width="35" src="./images/avatar/1.jpg" class="mr-3 rounded-circle">
                            <div class="media-body">
                                <h5>Received New Order</h5>
                                <p class="mb-0">I shared this on my fb wall a few months back,</p>
                            </div><span class="text-muted ">April 24, 2018</span>
                        </div>
                        <div class="media border-bottom-1 pt-3 pb-3">
                            <img width="35" src="./images/avatar/2.jpg" class="mr-3 rounded-circle">
                            <div class="media-body">
                                <h5>iPhone develered</h5>
                                <p class="mb-0">I shared this on my fb wall a few months back,</p>
                            </div><span class="text-muted ">April 24, 2018</span>
                        </div>
                        <div class="media border-bottom-1 pt-3 pb-3">
                            <img width="35" src="./images/avatar/2.jpg" class="mr-3 rounded-circle">
                            <div class="media-body">
                                <h5>3 Order Pending</h5>
                                <p class="mb-0">I shared this on my fb wall a few months back,</p>
                            </div><span class="text-muted ">April 24, 2018</span>
                        </div>
                        <div class="media border-bottom-1 pt-3 pb-3">
                            <img width="35" src="./images/avatar/2.jpg" class="mr-3 rounded-circle">
                            <div class="media-body">
                                <h5>Join new Manager</h5>
                                <p class="mb-0">I shared this on my fb wall a few months back,</p>
                            </div><span class="text-muted ">April 24, 2018</span>
                        </div>
                        <div class="media border-bottom-1 pt-3 pb-3">
                            <img width="35" src="./images/avatar/2.jpg" class="mr-3 rounded-circle">
                            <div class="media-body">
                                <h5>Branch open 5 min Late</h5>
                                <p class="mb-0">I shared this on my fb wall a few months back,</p>
                            </div><span class="text-muted ">April 24, 2018</span>
                        </div>
                        <div class="media border-bottom-1 pt-3 pb-3">
                            <img width="35" src="./images/avatar/2.jpg" class="mr-3 rounded-circle">
                            <div class="media-body">
                                <h5>New support ticket received</h5>
                                <p class="mb-0">I shared this on my fb wall a few months back,</p>
                            </div><span class="text-muted ">April 24, 2018</span>
                        </div>
                        <div class="media pt-3 pb-3">
                            <img width="35" src="./images/avatar/3.jpg" class="mr-3 rounded-circle">
                            <div class="media-body">
                                <h5>Facebook Post 30 Comments</h5>
                                <p class="mb-0">I shared this on my fb wall a few months back,</p>
                            </div><span class="text-muted ">April 24, 2018</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12 col-sm-12 col-xxl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-0">Store Location</h4>
                    <div id="world-map" style="height: 470px;"></div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="social-graph-wrapper widget-facebook">
                    <span class="s-icon"><i class="fa fa-facebook"></i></span>
                </div>
                <div class="row">
                    <div class="col-6 border-right">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">89k</h4>
                            <p class="m-0">Friends</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">119k</h4>
                            <p class="m-0">Followers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="social-graph-wrapper widget-linkedin">
                    <span class="s-icon"><i class="fa fa-linkedin"></i></span>
                </div>
                <div class="row">
                    <div class="col-6 border-right">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">89k</h4>
                            <p class="m-0">Friends</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">119k</h4>
                            <p class="m-0">Followers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="social-graph-wrapper widget-googleplus">
                    <span class="s-icon"><i class="fa fa-google-plus"></i></span>
                </div>
                <div class="row">
                    <div class="col-6 border-right">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">89k</h4>
                            <p class="m-0">Friends</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">119k</h4>
                            <p class="m-0">Followers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="social-graph-wrapper widget-twitter">
                    <span class="s-icon"><i class="fa fa-twitter"></i></span>
                </div>
                <div class="row">
                    <div class="col-6 border-right">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">89k</h4>
                            <p class="m-0">Friends</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                            <h4 class="m-1">119k</h4>
                            <p class="m-0">Followers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
