<?php

if($tgl != NULL){
    foreach ($chart as $p) {
        $jumlah[] = (int) $p->jumlah;
    }
}else{
    $jumlah = 0;
}

$lab_nam = [$lab1['nama_lab'], $lab2['nama_lab'], $lab3['nama_lab'], $lab4['nama_lab']];

$j_lab = [$lab1['jumlah'], $lab2['jumlah'], $lab3['jumlah'], $lab4['jumlah']];

$tanggal = '';
if($tgl != NULL){
    foreach ($tgl as $p) {
        $br = $p->tgl;
        $tanggal .= "'$br'" . ", ";
    }
}else{
    $tanggal = '';
}

date_default_timezone_set("Asia/Jakarta");
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="col-md-12">
                <marquee behavior="slide" direction="down" loop="1" scrollamount="10">
                    <h2 class="text-center">SELAMAT DATANG<br></h2>
                </marquee>
            </div>
            <div class="col-md-12">
                <marquee behavior="slide" direction="up" loop="1" scrollamount="10">
                    <h2 class="text-center font-italic text-primary"><strong>ASISTEN LABORATORIUM</strong></h2>
                </marquee>
            </div>
            <div class="col-md-12">
                <img class="rounded mx-auto d-block" src="<?= base_url('assets/img/logo.png') ?>" alt="" style="width:200px;height:auto;margin: 8px;">
            </div>
            <marquee behavior="slide" direction="down" loop="1" scrollamount="60">
                <!-- Area Chart -->
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card shadow">
                                <div class="card-header d-flex flex-row justify-content-between">
                                    <h6 class="mx-auto font-weight-bold text-primary">Total Kehadiran</h6> <small>Updated <?= date('d-m-Y') . ' Pukul ' . date('H:i:s') ?></small>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myChart" width="100%" height="265"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card shadow">
                                <div class="card-header d-flex flex-row justify-content-between">
                                    <h6 class="mx-auto font-weight-bold text-primary">Kehadiran Hari Ini BY LAB</h6> <small>Updated <?= date('d/m/Y') . ' Pukul ' . date('H:i:s') ?></small>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myPie" width="100%" height="45"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </marquee>
            <marquee behavior="slide" direction="up" loop="1" scrollamount="60">
                <div class="col-md-12 mt-4">
                    <div class="row">
                        <div class="col-md-2 col-md-3">
                            <div class="card bg-danger text-white mb-4 shadow">
                                <div class="card-body mx-auto">
                                    <h3><?= $jwb; ?></h3>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="container text-center">
                                        <div class="margin">
                                            <i class="far fa-paper-plane fa-2x"></i>
                                            <div class="small mx-auto">
                                                <strong>FILE JAWABAN</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-3">
                            <div class="card bg-primary text-white mb-4 shadow">
                                <div class="card-body mx-auto">
                                    <h3><?= $sbt; ?></h3>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="container text-center">
                                        <div class="margin">
                                            <i class="fas fa-external-link-alt fa-2x"></i>
                                            <div class="small mx-auto">
                                                <strong>SUBMIT</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-3">
                            <div class="card bg-success text-white mb-4 shadow">
                                <div class="card-body mx-auto">
                                    <h3><?= $mtk; ?></h3>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="container text-center">
                                        <div class="margin">
                                            <i class="fas fa-sticky-note fa-2x"></i>
                                            <div class="small mx-auto">
                                                <strong>MATA KULIAH</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-3">
                            <div class="card bg-secondary text-white mb-4 shadow">
                                <div class="card-body mx-auto">
                                    <h3><?= $fd; ?></h3>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="container text-center">
                                        <div class="margin">
                                            <i class="far fa-folder fa-2x"></i>
                                            <div class="small mx-auto">
                                                <strong>FOLDER JAWABAN</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2 col-md-2">
                            <div class="card border-danger mb-4 shadow">
                                <div class="card-body mx-auto">
                                    <h3><?= $lab; ?></h3>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="container text-center">
                                        <div class="margin text-danger">
                                            <i class="fas fa-chalkboard-teacher fa-2x"></i>
                                            <div class="small mx-auto">
                                                Laboratorium
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-2">
                            <div class="card border-danger mb-4">
                                <div class="card-body mx-auto">
                                    <h3><?= $ss; ?></h3>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="container text-center">
                                        <div class="margin text-danger">
                                            <i class="fas fa-file-pdf fa-2x"></i>
                                            <div class="small mx-auto">
                                                Soal
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-2">
                            <div class="card border-primary mb-4 shadow">
                                <div class="card-body mx-auto">
                                    <h3><?= $mhs; ?></h3>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="container text-center">
                                        <div class="margin text-primary">
                                            <i class="fas fa-users fa-2x"></i>
                                            <div class="small mx-auto">
                                                Mahasiswa
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-2">
                            <div class="card border-primary mb-4 shadow">
                                <div class="card-body mx-auto">
                                    <h3><?= $smt; ?></h3>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="container text-center">
                                        <div class="margin text-primary">
                                            <i class="fas fa-layer-group fa-2x"></i>
                                            <div class="small ml-auto">
                                                Semester
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-2">
                            <div class="card border-success mb-4 shadow">
                                <div class="card-body mx-auto">
                                    <h3><?= $kls; ?></h3>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="container text-center">
                                        <div class="margin text-success">
                                            <i class="fas fa-bookmark fa-2x"></i>
                                            <div class="small ml-auto">
                                                Kelas
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-2">
                            <div class="card border-success mb-4 shadow">
                                <div class="card-body mx-auto">
                                    <h3><?= $sesi; ?></h3>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="container text-center">
                                        <div class="margin text-success">
                                            <i class="fas fa-clock fa-2x"></i>
                                            <div class="small ml-auto">
                                                Sesi
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </marquee>
        </div>
    </main>

    <script type="text/javascript" src="<?= base_url() . 'assets/vendor/chart.js/chart.js' ?>"></script>

    <script>
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        var ctx = document.getElementById("myChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [<?= $tanggal; ?>],
                datasets: [{
                    label: "Total Hadir",
                    lineTension: 0.1,
                    backgroundColor: "rgba(0, 165, 255, 0.4)",
                    borderColor: "blue",
                    pointRadius: 3,
                    pointBackgroundColor: "blue",
                    pointBorderColor: "blue",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "red",
                    pointHoverBorderColor: "red",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: <?= json_encode($jumlah); ?>,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return +number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ' : ' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });
    </script>

    <script>
        var btx = document.getElementById("myPie");
        var data = {
            labels: [<?php foreach ($lab_nam as $l) {
                            echo  '"' . $l . '",';
                        } ?>],
            datasets: [{
                label: "Laboratorium",
                data: [<?php foreach ($j_lab as $l) {
                            echo  $l . ',';
                        } ?>],
                backgroundColor: [
                    "rgba(59, 100, 222, 1)",
                    "rgba(203, 222, 225, 0.9)",
                    "rgba(102, 50, 179, 1)",
                    "rgba(201, 29, 29, 1)",
                    "rgba(81, 230, 153, 1)",
                    "rgba(246, 34, 19, 1)"
                ]
            }]
        };

        var myBarChart = new Chart(btx, {
            type: 'pie',
            data: data,
            options: {
                responsive: true
            }
        });
    </script>

    <style>
        .margin {
            margin-top: 20px;
        }
    </style>