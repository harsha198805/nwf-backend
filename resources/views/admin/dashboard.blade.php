@extends('layouts.admin.admin_layout')


@section('content')


<!-- Row start -->
<div class="row gutters">
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="info-stats4">
            <div class="info-icon">
                <i class="icon-grid"></i>
            </div>
            <div class="sale-num">
                <h3> {{ $categoryCount }}</h3>
                <p>Categories</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="info-stats4">
            <div class="info-icon">
                <i class="icon-box"></i>
            </div>
            <div class="sale-num">
                <h3>{{ $productCount }}</h3>
                <p>Products</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="info-stats4">
            <div class="info-icon">
                <i class="icon-question_answer"></i>
            </div>
            <div class="sale-num">
                <h3>7500</h3>
                <p>Blogs</p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="info-stats4">
            <div class="info-icon">
                <i class="icon-user1"></i>
            </div>
            <div class="sale-num">
                <h3>3500</h3>
                <p>Users</p>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->

@endsection