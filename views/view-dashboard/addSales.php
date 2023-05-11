<?php
require_once './dao/sales.php';
require_once './dao/pdo.php';

$stmt = $pdo->prepare('SELECT * FROM customer');
$stmt->execute();
$customers = $stmt->fetchAll();
echo '<script>let allCustomer = ' . json_encode($customers) . '; </script>';

?>

<?php
$stmt = $pdo->prepare('SELECT * FROM allservice');
$stmt->execute();
$allservices = $stmt->fetchAll();
echo '<script>let allservices = ' . json_encode($allservices) . '; </script>';
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thêm doanh thu mới</h4>
                    <div class="form-wrapper">
                        <form method="POST" action="./dao/sales.php">
                            <div class="form-flex--wrapper">
                                <div class="from-mn-warpper mb-20">

                                    <div class="input-group">
                                        <label class="label-input" for="id_customer">Khách hàng:</label>
                                        <select required class="ctrl-input" id="id_customer" name="id_customer">
                                            <option value="">--Chọn Khách hàng--</option>
                                            <?php foreach ($customers as $customer) { ?>
                                                <option value="<?php echo $customer['id'] ?>"><?php echo $customer['company_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <label class="label-input" for="typeService">Loại dịch vụ:</label>
                                        <select required class="ctrl-input" id="typeService" name="typeService">
                                            <option value="">--Chọn loại dịch vụ--</option>
                                            <option value="1">Dịch vụ có gia hạn</option>
                                            <option value="0">Dịch vụ không gia hạn</option>
                                        </select>
                                    </div>

                                    <div id="dateBox">
                                        <!-- <div class="input-group">
                                            <label class="label-input label-top" for="dateStart">Ngày thu:</label>
                                            <input required class="ctrl-input " type="date" id="dateStart"
                                                name="dateStart">
                                        </div> -->
                                    </div>

                                    <div class="input-group">
                                        <label class="label-input" for="id_service">Dịch vụ:</label>
                                        <select required class="ctrl-input" id="id_service" name="id_service">
                                            <option value="">--Chọn dịch vụ--</option>
                                            <?php foreach ($allservices as $allservice) { ?>
                                                <option value="<?php echo $allservice['id_services'] ?>"><?php echo $allservice['services_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <label class="label-input label-top" for="price">Giá tiền:</label>
                                        <input required readonly class="ctrl-input " type="text" id="priceformat"
                                            name="priceformat">
                                        <input required readonly hidden class="ctrl-input " type="text" id="price"
                                            name="price">
                                    </div>

                                    <div class="input-group justify-content-end mt-30">
                                        <button class="btn btn-form" name="submitBtn">Thêm doanh thu</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    // const newListService = JSON
    // Auto Write Date
    const customerElement = document.getElementById('id_customer');
    // const dateInput = document.getElementById('date');
    // customerElement.onchange = function (item) {
    //     let idCustomer = customerElement.value
    //     let customer = allCustomer.filter(function (item) {
    //         return item.id == idCustomer;
    //     })
    //     if (customer[0].date_start) {
    //         // console.log(customer[0].date_start);
    //         dateInput.value = customer[0].date_start;
    //     }
    // }

    // Check Type Service
    const typeServiceEle = document.getElementById('typeService');
    const dateBox = document.getElementById('dateBox');
    typeServiceEle.onchange = function (e) {
        dateBox.innerHTML = ''
        const type = e.target.value
        if (type == 0) {
            const divElement = document.createElement('div');
            divElement.classList.add('input-group');
            const labelElement = document.createElement('label');
            labelElement.classList.add('label-input', 'label-top');
            labelElement.innerHTML = 'Ngày thu';
            const inputElement = document.createElement('input');
            inputElement.classList.add('ctrl-input');
            inputElement.setAttribute('required', '');
            inputElement.setAttribute('type', 'date');
            inputElement.setAttribute('id', 'date_start');
            inputElement.setAttribute('name', 'date_start');

            divElement.appendChild(labelElement);
            divElement.appendChild(inputElement);
            dateBox.appendChild(divElement);
        } else {
            const divElementDS = document.createElement('div');
            divElementDS.classList.add('input-group');
            const labelElementDS = document.createElement('label');
            labelElementDS.classList.add('label-input', 'label-top');
            labelElementDS.innerHTML = 'Ngày thu';
            const inputElementDS = document.createElement('input');
            inputElementDS.classList.add('ctrl-input');
            inputElementDS.setAttribute('required', '');
            inputElementDS.setAttribute('type', 'date');
            inputElementDS.setAttribute('id', 'date_start');
            inputElementDS.setAttribute('name', 'date_start');

            divElementDS.appendChild(labelElementDS);
            divElementDS.appendChild(inputElementDS);
            dateBox.appendChild(divElementDS);

            // 

            const divElementDE = document.createElement('div');
            divElementDE.classList.add('input-group');
            const labelElementDE = document.createElement('label');
            labelElementDE.classList.add('label-input', 'label-top');
            labelElementDE.innerHTML = 'Ngày hết gia hạn';
            const inputElementDE = document.createElement('input');
            inputElementDE.classList.add('ctrl-input');
            inputElementDE.setAttribute('required', '');
            inputElementDE.setAttribute('type', 'date');
            inputElementDE.setAttribute('id', 'date_end');
            inputElementDE.setAttribute('name', 'date_end');

            divElementDE.appendChild(labelElementDE);
            divElementDE.appendChild(inputElementDE);
            dateBox.appendChild(divElementDE);
        }
    }


    // Auto Write Service
    const serviceElement = document.getElementById('id_service');
    const priceElement = document.getElementById('priceformat');
    const priceInput = document.getElementById('price');
    serviceElement.onchange = function (item) {
        let idService = serviceElement.value;
        let service = allservices.filter(function (item) {
            return item.id_services == idService;
        })
        if (service[0].price_services) {
            const price = Number(service[0].price_services);
            const formattedNumber = price.toLocaleString('vi-VN', { style: 'currency', currency: 'VND', maximumFractionDigits: 0 });
            priceElement.value = formattedNumber;
            priceInput.value = service[0].price_services;
        }
    }
</script>