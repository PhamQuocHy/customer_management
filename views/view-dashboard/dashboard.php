<?php
require_once './dao/customer.php';
require_once './dao/pdo.php';

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
    </div>
</div>


<script>

    // Định nghĩa đối tượng canvas
    const canvas = document.getElementById('myChart');

    // Định nghĩa dữ liệu biểu đồ
    const data = {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6'],
        datasets: [
            {
                label: 'Doanh thu',
                data: [10000, 20000, 15000, 30000, 25000, 40000],
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                tension: 0.4,
            },
        ],
    };

    // Định nghĩa cấu hình biểu đồ
    const config = {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    };

    // Tạo đối tượng biểu đồ
    const chart = new Chart(canvas, config);

</script>