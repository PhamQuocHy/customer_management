<?php
require_once './dao/pdo.php';
$id = $_GET['idGreat'];
// echo $id;
$stmt = $pdo->prepare('SELECT * FROM great WHERE id_great  = ?');
$stmt->execute([$id]);
$great = $stmt->fetch();
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Chi tiết gói ưu đãi
                        <?php echo htmlspecialchars($great['great_name']); ?>
                    </h4>
                    <div class="form-wrapper">
                        <div class="form-flex--wrapper">
                            <div class="from-mn-warpper mb-20">
                                <div class="input-group">
                                    <label class="label-input" for="great_code">Mã ưu đãi:</label>
                                    <span class="ctrl-input ctrl-input__span " type="text" id="great_code"
                                        name="great_code">
                                        <?php echo htmlspecialchars($great['great_code']); ?>
                                    </span>
                                </div>
                                <div class="input-group">
                                    <label class="label-input" for="great_name">Tên ưu đãi:</label>
                                    <span class="ctrl-input ctrl-input__span " type="text" id="great_name"
                                        name="great_name">
                                        <?php echo htmlspecialchars($great['great_name']); ?>
                                    </span>
                                </div>
                                <div class="input-group">
                                    <label class="label-input label-top" for="great_content">Nội dung:</label>
                                    <span required class="ctrl-input ctrl-input__span" type="text"
                                        id="great_content"><?php echo htmlspecialchars($great['great_content']) ?></span>
                                </div>

                                <div class="input-group justify-content-end mt-30">
                                    <a href="?action=listGreat&cate=great" class="btn btn-form" name="submitBtn">Quay
                                        lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>