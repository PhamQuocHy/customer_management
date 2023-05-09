<?php
require_once './dao/customer.php';
require_once './dao/pdo.php';
$curentDay = date("Y-m-d");
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Doanh số AME Digital</h4>
                    <div class="card-body">
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách khách hàng cần gia hạng gói cước</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr id="day-title-box">
                                        <th class="tbl-icon--box__th">
                                            <div class="tbl-icon--box">
                                                <i class="mdi mdi-arrow-left position-icon icon-tbl"></i>
                                            </div>
                                        </th>
                                        <!-- <div>
                                            <?php for ($i = 0; $i < 7; $i++) {
                                                $nextDay = date("d", strtotime($curentDay . " +$i day"));
                                                $nextYMD = date("Y-m-d", strtotime($curentDay . " +$i day"));
                                                ?>
                                                <th class="day-title <?php if ($i == 0)
                                                    echo 'active' ?>" data-id="<?= $nextYMD ?>">
                                                    <span>
                                                        Ngày
                                                        <?php echo $nextDay ?>
                                                    </span>
                                                </th>
                                                <?php
                                            } ?>
                                        </div> -->
                                        <th class="tbl-icon--box__th">
                                            <div class="tbl-icon--box">
                                                <i class="mdi mdi-arrow-right position-icon icon-tbl"></i>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    for ($i = 0; $i < 30; $i++) {
                                        $nextDay = date("Y-m-d", strtotime($curentDay . " +$i day"));
                                        foreach ($customers as $key => $customer) {
                                            $expiration_date = $customer['date_end'];
                                            $flash = 'false';
                                            if ($expiration_date != null) {
                                                $expiry_date = date_create_from_format('Y-m-d', $expiration_date);

                                                // Ngày hiện tại
                                                $nextDayObj = date_create_from_format('Y-m-d', $nextDay);

                                                // Tính số ngày còn lại cho đến ngày hết hạn
                                                $days_left = $expiry_date->diff($nextDayObj)->days;
                                                if ($days_left == 0) {
                                                    ?>
                                                    <tr class="customer-day" data-Item="<?= $expiration_date ?>">
                                                        <td></td>
                                                        <td colspan="7">
                                                            <?php echo $customer['company_name'] ?>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var ctx = document.getElementById('myChart').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Dòng 1',
                data: [12000, 19000, 3000, 5000, 2000, 3000],
                borderColor: '#3377BC',
                backgroundColor: '#fff',
                // tension: 0.4,
                pointStyle: 'circle',
                pointRadius: 5,
                pointHoverRadius: 10,
                yAxisID: 'y',
            }, {
                label: 'Dòng 2',
                data: [3, 15, 8, 7, 1, 10],
                borderColor: '#00BBEF',
                backgroundColor: '#fff',
                // tension: 0.4,
                pointStyle: 'circle',
                pointRadius: 5,
                pointHoverRadius: 10,
                yAxisID: 'y1',
            }]
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            stacked: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Chart.js Line Chart - Multi Axis'
                }
            },
            scales: {
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                },
                y1: {
                    type: 'linear',
                    display: true,
                    position: 'right',

                    // grid line settings
                    grid: {
                        drawOnChartArea: false, // only want the grid lines for one axis to show up
                    },
                },
            }
        },
    });


</script>