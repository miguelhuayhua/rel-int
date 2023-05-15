@extends('admin.dashboardtemplate')
@section('content')
<section class="container-fluid position-relative">
    <button id="toggleLeft" class="btn btn-toggle">
        <i class="fa fa-bars" aria-hidden="true">
        </i>
    </button>
    <div class="row">
        @include('admin.leftNavbar')
        <div class="col-md-9 col-lg-10" style="background-color: #f5f5f9;">
            <div class="row">
                <div class="col-12">
                    @include('admin.topNavbar')
                </div>
                <div class="col-8">

                </div>

            </div>
        </div>
    </div>
    </div>
</section>
@endsection