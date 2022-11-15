@extends('admin.layout')
@section('title')
Halaman Home
@endsection
@section('content')
<div class="row">
    <div class="col-sm-6">
        <h3 class="mb-0 font-weight-bold">Kenneth Osborne</h3>
        <p>Your last login: 21h ago from newzealand.</p>
    </div>
    <div class="col-sm-6">
        <div class="d-flex align-items-center justify-content-md-end">
            <div class="mb-3 mb-xl-0 pr-1">
                <div class="dropdown">
                    <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button"
                        id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="typcn typcn-calendar-outline mr-2"></i>Last 7 days
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3" data-x-placement="top-start">
                        <h6 class="dropdown-header">Last 14 days</h6>
                        <a class="dropdown-item" href="#">Last 21 days</a>
                        <a class="dropdown-item" href="#">Last 28 days</a>
                    </div>
                </div>
            </div>
            <div class="pr-1 mb-3 mr-2 mb-xl-0">
                <button type="button" class="btn btn-sm bg-white btn-icon-text border"><i
                        class="typcn typcn-arrow-forward-outline mr-2"></i>Export</button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-sm bg-white btn-icon-text border"><i
                        class="typcn typcn-info-large-outline mr-2"></i>info</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 d-flex grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between">
                    <h4 class="card-title mb-3">Sale Analysis Trend</h4>
                </div>
                <div class="mt-2">
                    <div class="d-flex justify-content-between">
                        <small>Order Value</small>
                        <small>155.5%</small>
                    </div>
                    <div class="progress progress-md  mt-2">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 80%" aria-valuenow="90"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="d-flex justify-content-between">
                        <small>Total Products</small>
                        <small>238.2%</small>
                    </div>
                    <div class="progress progress-md  mt-2">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="90"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="mt-4 mb-5">
                    <div class="d-flex justify-content-between">
                        <small>Quantity</small>
                        <small>23.30%</small>
                    </div>
                    <div class="progress progress-md mt-2">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="90"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <canvas id="salesTopChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-8 d-flex grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between">
                    <h4 class="card-title mb-3">Project status</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <img class="img-sm rounded-circle mb-md-0 mr-2"
                                            src="{{ asset('assets_admin/images/faces/face30.png') }}"
                                            alt="profile image">
                                        <div>
                                            <div> Company</div>
                                            <div class="font-weight-bold mt-1">volkswagen</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    Budget
                                    <div class="font-weight-bold  mt-1">$2322 </div>
                                </td>
                                <td>
                                    Status
                                    <div class="font-weight-bold text-success  mt-1">88% </div>
                                </td>
                                <td>
                                    Deadline
                                    <div class="font-weight-bold  mt-1">07 Nov 2019</div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-secondary">edit actions</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <img class="img-sm rounded-circle mb-md-0 mr-2"
                                            src="{{ asset('assets_admin/images/faces/face31.png') }}"
                                            alt="profile image">
                                        <div>
                                            <div> Company</div>
                                            <div class="font-weight-bold  mt-1">Land Rover</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    Budget
                                    <div class="font-weight-bold  mt-1">$12022 </div>
                                </td>
                                <td>
                                    Status
                                    <div class="font-weight-bold text-success  mt-1">70% </div>
                                </td>
                                <td>
                                    Deadline
                                    <div class="font-weight-bold  mt-1">08 Nov 2019</div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-secondary">edit actions</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <img class="img-sm rounded-circle mb-md-0 mr-2"
                                            src="{{ asset('assets_admin/images/faces/face32.png') }}"
                                            alt="profile image">
                                        <div>
                                            <div> Company</div>
                                            <div class="font-weight-bold  mt-1">Bentley </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    Budget
                                    <div class="font-weight-bold  mt-1">$8,725</div>
                                </td>
                                <td>
                                    Status
                                    <div class="font-weight-bold text-success  mt-1">87% </div>
                                </td>
                                <td>
                                    Deadline
                                    <div class="font-weight-bold  mt-1">11 Jun 2019</div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-secondary">edit actions</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <img class="img-sm rounded-circle mb-md-0 mr-2"
                                            src="{{ asset('assets_admin/images/faces/face33.png') }}"
                                            alt="profile image">
                                        <div>
                                            <div> Company</div>
                                            <div class="font-weight-bold  mt-1">Morgan </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    Budget
                                    <div class="font-weight-bold  mt-1">$5,220 </div>
                                </td>
                                <td>
                                    Status
                                    <div class="font-weight-bold text-success  mt-1">65% </div>
                                </td>
                                <td>
                                    Deadline
                                    <div class="font-weight-bold  mt-1">26 Oct 2019</div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-secondary">edit actions</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <img class="img-sm rounded-circle mb-md-0 mr-2"
                                            src="{{ asset('assets_admin/images/faces/face34.png') }}"
                                            alt="profile image">
                                        <div>
                                            <div> Company</div>
                                            <div class="font-weight-bold  mt-1">volkswagen</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    Budget
                                    <div class="font-weight-bold  mt-1">$2322 </div>
                                </td>
                                <td>
                                    Status
                                    <div class="font-weight-bold text-success mt-1">88% </div>
                                </td>
                                <td>
                                    Deadline
                                    <div class="font-weight-bold  mt-1">07 Nov 2019</div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-secondary">edit actions</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
