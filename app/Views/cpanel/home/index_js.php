<script>
    var $primary = '#7367F0';
    var $success = '#28C76F';
    var $danger = '#EA5455';
    var $warning = '#FF9F43';
    var $info = '#00cfe8';
    var $primary_light = '#A9A2F6';
    var $danger_light = '#f29292';
    var $success_light = '#55DD92';
    var $warning_light = '#ffc085';
    var $info_light = '#1fcadb';
    var $strok_color = '#b9c3cd';
    var $label_color = '#e7e7e7';
    var $white = '#fff';


    var gainedlineChartoptions = {
        chart: {
            height: 100,
            type: 'area',
            toolbar: {
                show: false,
            },
            sparkline: {
                enabled: true
            },
            grid: {
                show: false,
                padding: {
                    left: 0,
                    right: 0
                }
            },
        },
        colors: [$primary],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 2.5
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 0.9,
                opacityFrom: 0.7,
                opacityTo: 0.5,
                stops: [0, 80, 100]
            }
        },
        series: [{
            name: 'Subscribers',
            data: []
        }],

        xaxis: {
            type: 'datetime',
            categories: []
        },
        yaxis: [{
            y: 0,
            offsetX: 0,
            offsetY: 0,
            padding: {left: 0, right: 0},
        }],
        tooltip: {
            x: {format: 'dd/MM/yy'}
        },
    }

    //   gainedlineChart.render();


    var revenuelineChartoptions = {
        chart: {
            height: 100,
            type: 'area',
            toolbar: {
                show: false,
            },
            sparkline: {
                enabled: true
            },
            grid: {
                show: false,
                padding: {
                    left: 0,
                    right: 0
                }
            },
        },
        colors: [$success],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 2.5
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 0.9,
                opacityFrom: 0.7,
                opacityTo: 0.5,
                stops: [0, 80, 100]
            }
        },
        series: [{
            name: 'Revenue',
            data: []
        }],

        xaxis: {
            type: 'datetime',
            categories: []
        },
        yaxis: [{
            y: 0,
            offsetX: 0,
            offsetY: 0,
            padding: {left: 0, right: 0},
        }],
        tooltip: {
            x: {format: 'dd/MM/yy'}
        },
    }


    var saleslineChartoptions = {
        chart: {
            height: 100,
            type: 'area',
            toolbar: {
                show: false,
            },
            sparkline: {
                enabled: true
            },
            grid: {
                show: false,
                padding: {
                    left: 0,
                    right: 0
                }
            },
        },
        colors: [$danger],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 2.5
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 0.9,
                opacityFrom: 0.7,
                opacityTo: 0.5,
                stops: [0, 80, 100]
            }
        },
        series: [{
            name: 'Orders',
            data: []
        }],

        xaxis: {
            type: 'datetime',
            categories: []
        },
        yaxis: [{
            y: 0,
            offsetX: 0,
            offsetY: 0,
            padding: {left: 0, right: 0},
        }],
        tooltip: {
            x: {format: 'dd/MM/yy'}
        },
    }


    $.ajax({
        url: "/cpanel/home/charthome",
        dataType: "json",
        data: {},
        type: "POST",
        success: function (data) {

            var sub = 0;
            var order = 0;
            var reven = 0;
            $.each(data, function (key, val) {
                // SUB
                gainedlineChartoptions.series[0].data.push(val.totalSub);
                gainedlineChartoptions.xaxis.categories.push(key);
                sub += val.totalSub;
                // ORDER
                revenuelineChartoptions.series[0].data.push(val.revenueOD);
                revenuelineChartoptions.xaxis.categories.push(key);
                order += val.totalOD;

                // REVENUE
                saleslineChartoptions.series[0].data.push(val.totalOD);
                saleslineChartoptions.xaxis.categories.push(key);
                reven += val.revenueOD;

            });
            $('.chart-sub').html(sub);
            $('.chart-od').html(order);
            $('.chart-rene').html(reven +' $');
            var gainedlineChart = new ApexCharts(
                document.querySelector("#line-area-chart-1"),
                gainedlineChartoptions
            );
            gainedlineChart.render();


            var revenuelineChart = new ApexCharts(
                document.querySelector("#line-area-chart-2"),
                revenuelineChartoptions
            );

            revenuelineChart.render();

            var saleslineChart = new ApexCharts(
                document.querySelector("#line-area-chart-3"),
                saleslineChartoptions
            );

            saleslineChart.render();


        },
        error: function () {
        }
    });


</script>