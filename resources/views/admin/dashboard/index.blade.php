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
                    <div class="col-12 mt-4">
                        @include('admin.topNavbar')
                    </div>
                    
                    <div class="col-12 col-lg-6 col-xl-5 mt-5 mb-lg-5 mb-2">
                        <div class="user-cards" style="height: 250px">
                            <p class="titulo-chart">
                                Mayor tipo de convenios
                            </p>
                            <canvas id="cconvenios" height="100%"></canvas>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-7 mt-5 mt-lg-4 mb-lg-4" style="height: 250px">
                        <div class="user-cards">
                            <p class="titulo-chart">
                                Visitas de los últimos 7 días
                            </p>
                            <canvas id="lineChart" height="100%"></canvas>

                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-6 mt-5" style="height: 250px">
                        <div class="user-cards">
                            <p class="titulo-chart">
                                Publicación más visitada
                            </p>
                            <canvas id="donutChart" height="100%"></canvas>

                        </div>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-6 mt-lg-5" style="height: 250px">
                        <div class="user-cards">
                            <p class="titulo-chart">
                                Usuarios más Activo
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
                    labels: data.dataPublicaciones.map(value => value.correlativo),
                    datasets: [{
                        data: data.dataPublicaciones.map(value => value.cantidad),
                        backgroundColor: ['rgba(165, 42, 42, 1)',
                            'rgba(165, 42, 42, 0.1)',
                            'rgba(165, 42, 42, 0.5)',
                            'rgba(135, 90, 90, 0.6)'
                        ],
                        borderColor: 'black',
                        borderWidth: 1,

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
                    labels: data.dataDias.map(value => value.nombre_dia).reverse(),
                    datasets: [{
                        label: 'Visitantes',
                        data: data.dataDias.map(value => value.cantidad).reverse(),
                        backgroundColor: 'rgba(165, 42, 42, 0.6)',
                        borderColor: 'black',
                        borderWidth: 1,
                        pointRadius: 3,
                        pointBackgroundColor: 'rgb(165, 42, 42)'
                    }]
                },
                options: {
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
            var ctx4 = document.getElementById('horizontalBarChart').getContext('2d');
            var horizontalBarChart = new Chart(ctx4, {
                type: 'horizontalBar',
                data: {
                    labels: data.dataUsuarios.map(value => value.usuario),
                    datasets: [{
                        label: 'Acciones por Usuario',
                        data: data.dataUsuarios.map(value => value.acciones),
                        backgroundColor: ['rgba(165, 42, 42, 1)',
                            'rgba(165, 42, 42, 0.1)',
                            'rgba(165, 42, 42, 0.5)',
                            'rgba(135, 90, 90, 0.6)'
                        ],
                        borderColor: 'black',
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
