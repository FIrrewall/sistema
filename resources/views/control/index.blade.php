@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('title','Descargos')

@section('content')
@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{Session::get('mensaje')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<section class="content">

    <style>
        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 950px;
            margin: 1em auto;
        }

        #container {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 1000px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
    </style>

    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    
                    <div class="icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <a href="informes" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    
                    <div class="icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <a href="inventarios" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    
                    <div class="icon">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                    <a href="inventarios" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    
                    <div class="icon">
                        <i class="fas fa-eject"></i>
                    </div>
                    <a href="descargos" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- solid sales graph -->
        <div class="card bg-gradient-info">
            <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                    <i class="fas fa-th mr-1"></i>
                    GRAFICO DE INFORMES
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <figure class="highcharts-figure">
                    <div id="container"></div>

                </figure>
            </div>
        </div>

        <div class="card bg-gradient-success">
            <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                    <i class="fas fa-th mr-1"></i>
                    GRAFICO DE ENTRADAS
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-success btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <figure class="highcharts-figure">
                    <div id="container1"></div>

                </figure>
            </div>
        </div>


        <div class="card bg-gradient-danger">
            <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                    <i class="fas fa-th mr-1"></i>
                    GRAFICO DE SALIDAS
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn bg-danger btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <figure class="highcharts-figure">
                    <div id="container2"></div>

                </figure>
            </div>
        </div>

        <div class="card bg-gradient-warning">
            <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                    <i class="fas fa-th mr-1"></i>
                    GRAFICO DE DESCARGOS
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn bg-warning btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-warning btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <figure class="highcharts-figure">
                    <div id="container3"></div>

                </figure>
            </div>
        </div>
    </div>
</section>
<!--, {
            name: 'Inventarios',
            data: [21,22,23,24,25,26,27,28,29,30,31,32]
            '{point.y:.1f}%'
        }, {
            name: 'Descargos',
            data: [11,12,13,14,15,16,17,18,19,21,22]

        }-->
@endsection


@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="application/javascript">
    // Create the chart


    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'GRAFICO DE INFORMES'
        },
        subtitle: {
            text: 'Resumen detallados por mes'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Cantidad de registros'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.0f} reg.'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f} reg.</b> del total<br/>'
        },

        series: [{
            name: "Browsers",
            colorByPoint: true,
            
        }],

    });
</script>

<script type="application/javascript">
    // Create the chart
    Highcharts.chart('container1', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'GRAFICO DE ENTRADAS'
        },
        subtitle: {
            text: 'Resumen detallados por mes'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Cantidad de registros'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.0f} reg.'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f} reg.</b> del total<br/>'
        },

        series: [{
            name: "Browsers",
            colorByPoint: true,
            
        }],

    });
</script>

<script type="application/javascript">
    // Create the chart
    Highcharts.chart('container2', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'GRAFICO DE SALIDAS'
        },
        subtitle: {
            text: 'Resumen detallados por mes'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Cantidad de registros'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.0f} reg.'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f} reg.</b> del total<br/>'
        },

        series: [{
            name: "Browsers",
            colorByPoint: true,
           
        }],

    });
</script>

<script type="application/javascript">
    // Create the chart
    Highcharts.chart('container3', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'GRAFICO DE DESCARGOS'
        },
        subtitle: {
            text: 'Resumen detallados por mes'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Cantidad de registros'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.0f} reg.'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f} reg.</b> del total<br/>'
        },

        series: [{
            name: "Browsers",
            colorByPoint: true,
           
        }],

    });
</script>
@endsection