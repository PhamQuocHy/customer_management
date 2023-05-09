<?php
require_once './dao/service.php';
require_once './dao/pdo.php';

?>

<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Thêm dịch vụ mới</h4>
          <div class="form-wrapper">

            <form method="POST" action="./dao/service.php">
              <div class="form-flex--wrapper">
                <div class="from-mn-warpper mb-20">
                  <div class="input-group">
                    <label class="label-input" for="services_code">Mã dịch vụ:</label>
                    <input required class="ctrl-input " type="text" id="services_code" name="services_code">
                  </div>
                  <div class="input-group">
                    <label class="label-input" for="services_name">Tên dịch vụ:</label>
                    <input required class="ctrl-input " type="text" id="services_name" name="services_name">
                  </div>
                  <div class=" input-group">
                    <label class="label-input label-top" for="price_services">Giá dịch vụ:</label>
                    <input required class="ctrl-input" type="number" id="price_services" name="price_services"></input>
                  </div>

                  <div class="input-group justify-content-end mt-30">
                    <button class="btn btn-form" name="submitBtn">Thêm dịch vụ mới</button>
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