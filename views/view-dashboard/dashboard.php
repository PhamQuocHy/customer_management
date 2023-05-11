<?php
require_once './dao/customer.php';
require_once './dao/service.php';
require_once './dao/sales.php';
require_once './dao/pdo.php';
$curentDay = date("Y-m-d");
echo '<script>let listSales = ' . json_encode($sales) . '; </script>';
echo '<script>let listService = ' . json_encode($service) . '; </script>';
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
                                        <th id="min-day--btn" class="tbl-icon--box__th">
                                            <div class="tbl-icon--box">
                                                <i class="mdi mdi-arrow-left position-icon icon-tbl"></i>
                                            </div>
                                        </th>
                                        <th class="tbl-icon--box__th">
                                            <div id="max-day--btn" class="tbl-icon--box">
                                                <i class="mdi mdi-arrow-right position-icon icon-tbl"></i>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    foreach ($customers as $key => $customer) {
                                        $expiration_date = $customer['date_end'];
                                        if ($expiration_date != null) {
                                            ?>
                                            <tr class="customer-day" data-Item="<?= $expiration_date ?>">
                                                <td></td>
                                                <td colspan="7">
                                                    <a href="?action=viewUser&id=<?php echo $customer['id'] ?>"
                                                        class="link_tbl">
                                                        <?php echo $customer['company_name'] ?>
                                                    </a>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <?php
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
    let ctx = document.getElementById('myChart').getContext('2d');
    let topSales = [];
    let listMonth = [];
    let listDataSheet = [];
    const handleListSales = (() => {
        let totalServiceArr = [];
        for (const service of listService) {
            let totalService = 0;
            let date = '';
            for (const sale of listSales) {
                if (sale.id_service === service.id_services) {
                    const price = Number(sale.price);
                    totalService += price;
                    date = sale.date_start;
                }
            }
            totalServiceArr.push({ id: service.id_services, total: totalService, date, });
        }

        if (totalServiceArr.length > 0) {
            topSales = totalServiceArr.sort((a, b) => b.total - a.total).slice(0, 3);
            return topSales;
        }

    })()
    const handleMonth = (() => {
        let today = new Date(); // Lấy ra ngày hiện tại
        let year = today.getFullYear(); // Lấy ra năm hiện tại

        for (let month = 1; month <= 12; month++) {
            let monthFormatted = ("0" + month).slice(-2); // Chuyển đổi số tháng thành chuỗi có độ dài 2, ví dụ 1 -> "01"
            let monthYearFormatted = monthFormatted + "/" + year; // Kết hợp tháng và năm thành chuỗi định dạng mm/YYYY
            listMonth.push(monthYearFormatted);
        }
        return listMonth;
    })()
    // console.log(topSales); // In ra chuỗi đã định dạng
    console.log(listSales); // In ra chuỗi đã định dạng
    // console.log(listMonth); // In ra chuỗi đã định dạng
    // arr = [
    //     { date: '05/2022', coin: '6000000', idService: '5' },
    //     { date: '04/2023', coin: '6000000', idService: '5' },
    //     { date: '05/2023', coin: '7000000', idService: '5' },
    //     { date: '05/2023', coin: '10000000', idService: '4' },
    //     { date: '04/2023', coin: '6000000', idService: '3' }]



    const handleCreateDataSheet = (() => {
        let tempArr = [];
        for (const sale of topSales) {
            for (const saleItem of listSales) {
                if (sale.id == saleItem.id_service) {
                    const dateArr = saleItem.date_start.split('-');
                    const newDateArr = `${dateArr[1]}/${dateArr[0]}`;
                    tempArr.push({ date: newDateArr, coin: saleItem.price, idService: saleItem.id_service });
                }
            }
            if (tempArr) {
                const resultObj = tempArr.reduce((acc, cur) => {
                    const date = cur.date;
                    const idService = cur.idService;
                    const coin = parseInt(cur.coin);

                    if (acc[date] && acc[date][idService]) {
                        acc[date][idService] += coin;
                    } else if (acc[date]) {
                        acc[date][idService] = coin;
                    } else {
                        acc[date] = { [idService]: coin };
                    }

                    return acc;
                }, {});

                const resultArr = [];

                for (let date in resultObj) {
                    for (let idService in resultObj[date]) {
                        resultArr.push({ date: date, coin: resultObj[date][idService], idService: idService });
                    }
                }
                // const arr = ['01/2023', '02/2023', '03/2023', '04/2023', '05/2023', '06/2023', '07/2023', '08/2023', '09/2023', '10/2023', '11/2023', '12/2023'];
                // const list = [{ date: '05/2023', coin: '10000000', idService: '4' }, { date: '04/2023', coin: '6000000', idService: '5' }];
                listMonth.forEach((date, index) => {
                    resultArr.forEach(item => {
                        if (item.date === date) {
                            listMonth[index] = item.coin;
                        }
                    });
                });
                console.log('resultArr', resultArr);
                console.log('listMonth', listMonth);
            }
            // listDataSheet.push({
            //     label: 'Dòng ',
            //     data: [12000, 19000, 3000, 5000, 2000, 3000],
            //     borderColor: '#3377BC',
            //     backgroundColor: '#fff',
            //     // tension: 0.4,
            //     pointStyle: 'circle',
            //     pointRadius: 5,
            //     pointHoverRadius: 10,
            // })
        }
    })()


    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: listMonth,
            datasets: [{
                label: 'Dòng 1',
                data: [12000, 19000, 3000, 5000, 2000, 3000],
                borderColor: '#3377BC',
                backgroundColor: '#fff',
                // tension: 0.4,
                pointStyle: 'circle',
                pointRadius: 5,
                pointHoverRadius: 10,
                // yAxisID: 'y',
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
            }, {
                label: 'Dòng 3',
                data: [2, 6, 20, 11, 2, 10],
                borderColor: '#000',
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
                    display: false,
                    position: 'right',

                    // grid line settings
                    grid: {
                        drawOnChartArea: true, // only want the grid lines for one axis to show up
                    },
                },
            }
        },
    });


</script>