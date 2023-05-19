@extends('admin.dashboardtemplate')
@section('content')
    <section class="container-fluid position-relative">
        <button id="toggleLeft" class="btn btn-toggle">
            <i class="fa fa-bars" aria-hidden="true">
            </i>
        </button>
        <div class="row">
            @include('admin.leftNavbar')
            <div class="col-md-9 col-xl-10" style="background-color: #f5f5f9;">
                <div class="row">
                    <div class="col-12">
                        @include('admin.topNavbar')
                    </div>
                    <div class="col-8">
                        <div class="user-cards">
                            <h3>
                                Felicidades {{ $usuario->usuario }}
                            </h3>
                            <p>
                                Haz obtenido <b>90</b> visitas hoy, puedes revisar tu perfil para mayor información

                            </p>
                        </div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-2"></div>
                    <div class="col-12 col-lg-6 col-xl-4">
                        <div class="user-cards" style="height: 250px">
                            <p class="titulo-chart">
                                Mayor tipo de convenios
                            </p>
                            <canvas id="cconvenios" height="100%"></canvas>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-4" style="height: 250px">
                        <div class="user-cards">
                            <p class="titulo-chart">
                                Convenio más solicitado
                            </p>
                            <canvas id="donutChart" height="100%"></canvas>

                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-4" style="height: 250px">
                        <div class="user-cards">
                            <p class="titulo-chart">
                                Publicaciones más visitadas
                            </p>
                            <canvas id="lineChart" height="100%"></canvas>

                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3" style="height: 250px">
                        <div class="user-cards">
                            <p class="titulo-chart">

                            </p>
                            <canvas id="horizontalBarChart" height="100%"></canvas>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <script>
        axios.get("http://127.0.0.1:8000/dashboard/chartdata").then(function(response) {
            return response.data
            // do whatever you want if console is [object object] then stringify the response
        }).then(data => {
            var ctx = document.getElementById('cconvenios').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',

                data: {
                    labels: data.dataConvenios.map(value => value.convenio),
                    datasets: [{
                        label: 'Cantidad de convenios',
                        data: data.dataConvenios.map(value => value.cantidad),
                        backgroundColor: [
                            'rgba(165, 42, 42, 0.2)',
                            'rgba(165, 42, 42, 0.6)'
                        ],
                        borderColor: [
                            'black',
                            'black'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true, // Permite que el gráfico sea responsivo
                    maintainAspectRatio: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                min: 0,
                            }
                        }]
                    }
                }
            });
            var ctx2 = document.getElementById('donutChart').getContext('2d');
            var donutChart = new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: ['Red', 'Blue', 'Yellow'],
                    datasets: [{
                        data: [30, 20, 50],
                        backgroundColor: ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)'
                        ]
                    }]
                },
                options: {
                    cutoutPercentage: 70, // Porcentaje de corte interno del anillo (0-100)
                    maintainAspectRatio: true
                }
            });
            var ctx3 = document.getElementById('lineChart').getContext('2d');
            var lineChart = new Chart(ctx3, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                    datasets: [{
                        label: 'Sales',
                        data: [50, 30, 60, 70, 40, 80],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        pointRadius: 3,
                        pointBackgroundColor: 'rgba(54, 162, 235, 1)'
                    }]
                },
                options: {
                    maintainAspectRatio: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            var ctx4 = document.getElementById('horizontalBarChart').getContext('2d');
            var horizontalBarChart = new Chart(ctx4, {
                type: 'horizontalBar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                    datasets: [{
                        label: 'Sales',
                        data: [50, 30, 60, 70, 40, 80],
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    maintainAspectRatio: true,
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
