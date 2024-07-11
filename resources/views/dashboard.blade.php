<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between items-center">
            <span>{{ __('DASHBOARD') }}</span>
            <span class="ml-auto">Bienvenido {{ auth()->user()->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('mensaje'))
                <div class="uppercase border border-green bg-green-100 text-green-600 font-bold p-2 my-3 rounded mx-8">
                    {{ session('mensaje') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col">
                            <div id="container"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col">
                    <div id="container2"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Highcharts.chart('container', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'Grafico de Productos que requieren mas capital'
                },
                tooltip: {
                    valueSuffix: '%'
                },
                subtitle: {
                    text: 'Source: <a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>'
                },
                plotOptions: {
                    series: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '{point.percentage:.1f}%',
                            style: {
                                fontSize: '1.2em',
                                textOutline: 'none',
                                opacity: 0.7
                            },
                            filter: {
                                operator: '>',
                                property: 'percentage',
                                value: 10
                            }
                        }
                    }
                },
                series: [{
                    name: 'Precio del producto',
                    colorByPoint: true,
                    data: <?= $data ?>
                }]
            });

            Highcharts.chart('container2', {
                title: {
                    text: 'Grafico de las Categorias mas Vendidas',
                    align: 'left'
                },
                xAxis: {
                    categories: ['Lapiceros', 'Colores', 'Borradores', 'Marcadores', 'Cuadernos']
                },
                yAxis: {
                    title: {
                        text: 'Cantidad de items'
                    }
                },
                tooltip: {
                    valueSuffix: ' cantidad de items'
                },
                plotOptions: {
                    series: {
                        borderRadius: '25%'
                    }
                },
                series: [{
                    type: 'column',
                    name: '2020',
                    data: [59, 83, 65, 228, 184]
                }, {
                    type: 'column',
                    name: '2021',
                    data: [50, 79, 72, 240, 167]
                }, {
                    type: 'column',
                    name: '2022',
                    data: [58, 88, 75, 250, 176]
                }, {
                    type: 'column',
                    name: '2023',
                    data: [63, 76, 80, 260, 176]
                }, {
                    type: 'column',
                    name: '2024',
                    data: [58, 88, 75, 250, 176]
                }, {
                    type: 'line',
                    step: 'center',
                    name: 'Promedio',
                    data: [47, 83.33, 70.66, 239.33, 175.66],
                    marker: {
                        lineWidth: 2,
                        lineColor: Highcharts.getOptions().colors[3],
                        fillColor: 'white'
                    }
                }, {
                    type: 'pie',
                    name: 'Total',
                    data: [{
                        name: '2020',
                        y: 619,
                        color: Highcharts.getOptions().colors[0], // 2020 color
                        dataLabels: {
                            enabled: true,
                            distance: -50,
                            format: '{point.total} M',
                            style: {
                                fontSize: '15px'
                            }
                        }
                    }, {
                        name: '2021',
                        y: 586,
                        color: Highcharts.getOptions().colors[1] // 2021 color
                    }, {
                        name: '2022',
                        y: 647,
                        color: Highcharts.getOptions().colors[2] // 2022 color
                    }],
                    center: [75, 65],
                    size: 100,
                    innerSize: '70%',
                    showInLegend: false,
                    dataLabels: {
                        enabled: false
                    }
                }]
            });
            series: [{
                    name: 'Categoria del producto',
                    colorByPoint: true,
                    data: <?= $data ?>
                }]
        });
    </script>
</x-app-layout>
