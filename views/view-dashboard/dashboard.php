<?php
require_once './dao/customer.php';
require_once './dao/service.php';
require_once './dao/sales.php';
require_once './dao/pdo.php';
$curentDay = date("Y-m-d");
echo '<script>let listSales = ' . json_encode($sales) . '; </script>';
echo '<script>let listService = ' . json_encode($service) . '; </script>';
echo '<script>let listCustomers = ' . json_encode($customers) . '; </script>';
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thống kê tổng thể</h4>
                    <div class="card-body">
                        <div class="toltal-wrapper row">
                            <div class="col-3">
                                <div class="toltal-item">
                                    <div class="toltal-item--header">
                                        <h4>Tổng doanh thu</h4>
                                    </div>
                                    <div class="toltal-item--content">
                                        <span id="toltalBox"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="toltal-item2">
                                    <div class="toltal-item--header">
                                        <h4>Doanh thu trong tháng</h4>
                                    </div>
                                    <div class="toltal-item--content">
                                        <span id="toltalMonthBox"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="toltal-item">
                                    <div class="toltal-item--header">
                                        <h4>Tổng số khách hàng</h4>
                                    </div>
                                    <div class="toltal-item--content">
                                        <span id="customerBox"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="toltal-item2">
                                    <div class="toltal-item--header">
                                        <h4>Khách hàng cần gia hạn</h4>
                                    </div>
                                    <div class="toltal-item--content">
                                        <span id="customerDateBox"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    const listColorDialog = ['ff0000', 'ffc72b', '3377BC'];
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
            let monthFormatted = ("0" + month).slice(-2);
            let monthYearFormatted = monthFormatted + "/" + year;
            listMonth.push(monthYearFormatted);
        }
        return listMonth;
    })()



    const handleCreateDataSheet = (() => {
        let tempArr = [];
        topSales.forEach(function (sale, index) {
            // for (const sale of topSales) {
            const newListMonth = [...listMonth];
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
                newListMonth.forEach((date, index) => {
                    resultArr.forEach(item => {
                        if (sale.id == item.idService) {
                            if (item.date === date) {
                                newListMonth[index] = item.coin;
                            } else {
                                if (typeof newListMonth[index] == 'string') {
                                    newListMonth[index] = 0;
                                }
                            }
                        }
                    });
                });
                const nameService = listService.filter(function (item) {
                    return item.id_services == sale.id;
                })
                listDataSheet.push({
                    label: nameService[0].services_name,
                    data: newListMonth,
                    borderColor: `#${listColorDialog[index]}`,
                    backgroundColor: '#fff',
                    tension: 0,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointHoverRadius: 10,
                })
            }
        })
    })()
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: listMonth,
            datasets: listDataSheet
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
                    text: 'DOANH THU 3 DỊCH VỤ HOT NHẤT Ở AME DIGITAL'
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
                        drawOnChartArea: true,
                    },
                },
            }
        },
    });

    myChart.canvas.parentNode.style.height = '400px';
</script>

<script>
    const toltalBox = document.getElementById('toltalBox');
    const toltalMonthBox = document.getElementById('toltalMonthBox');
    const customerBox = document.getElementById('customerBox');
    const customerDateBox = document.getElementById('customerDateBox');

    const listCustomersEx = document.querySelectorAll('[data-Item]');


    const currentDate = new Date().toLocaleString("en-US", { timeZone: "Asia/Ho_Chi_Minh" });
    const currentMonthYear = new Intl.DateTimeFormat("en-US", { year: "numeric", month: "2-digit" }).format(new Date(currentDate));
    let toltalSale = 0;
    let toltalSaleAsMonth = 0;
    let customerNumDate = 0;
    listService.forEach(function (item, index) {
        let tempArr = [];
        for (const sale of listSales) {
            if (sale.id_service == item.id_services) {

                toltalSale += Number(sale.price);
                const dateArr = sale.date_start.split('-');
                const newDateArr = `${dateArr[1]}/${dateArr[0]}`;
                if (newDateArr == currentMonthYear) {
                    toltalSaleAsMonth += Number(sale.price);
                }
            }
        }
    })
    const fortmatMoney = (coin) => {
        const formatter = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' });
        const result = formatter.format(coin);
        return result
    }
    toltalBox.innerHTML = fortmatMoney(toltalSale);
    toltalMonthBox.innerHTML = fortmatMoney(toltalSaleAsMonth);
    customerBox.innerHTML = listCustomers.length;
    for (let i = 0; i < listCustomersEx.length; i++) {
        const customerDate = listCustomersEx[i].getAttribute('data-Item');
        const dateArr = customerDate.split('-');
        const newDateArr = `${dateArr[1]}/${dateArr[0]}`;
        if (newDateArr == currentMonthYear) {

            ++customerNumDate;
        }
    }
    customerDateBox.innerHTML = customerNumDate;
</script>