@extends('admin.dashboard.dashboardtemplate')
@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-2 buttons">
                <button id="tipo1" class="btn collapse-button dash-parent-button" type="button" data-toggle="collapse"
                    data-target="#tipos1" aria-expanded="false" aria-controls="collapseExample">
                    Tipo 1
                    <i class="fa fa-angle-right custom-icon" aria-hidden="true"></i> </button>
                <div class="collapse" id="tipos1">
                    <div class="ri-info">
                        <a href="" class="btn dash-btn">
                            Acción 1
                        </a>
                    </div>
                </div>
                <button id="tipo2" class="btn collapse-button dash-parent-button" type="button" data-toggle="collapse"
                    data-target="#tipos2" aria-expanded="false" aria-controls="collapseExample">
                    Tipo 1
                    <i class="fa fa-angle-right custom-icon" aria-hidden="true"></i> </button>
                <div class="collapse" id="tipos2">
                    <div class="ri-info">
                        <a href="" class="btn dash-btn">
                            Acción 1
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-10" style="background-color: #f5f5f9;">
                <div class="div-12">
                    <div class="user-cards">
                        jejejej
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
