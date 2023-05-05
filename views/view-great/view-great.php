<?php
require_once './dao/pdo.php';
$id = $_GET['idGreat'];
echo $id;
// $stmt = $pdo->prepare('SELECT * FROM great WHERE id = ?');
// $stmt->execute([$id]);
// $great = $stmt->fetch();
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Cập nhật gói ưu đãi</h4>
                    <div class="form-wrapper">
                        <div class="form-flex--wrapper">
                            <div class="from-mn-warpper mb-20">
                                <div class="input-group">
                                    <label class="label-input" for="great_code">Mã ưu đãi:</label>
                                    <span class="ctrl-input " type="text" id="great_code" name="great_code">
                                        <?php echo htmlspecialchars($greats['great_code']); ?>
                                    </span>
                                </div>
                                <div class="input-group">
                                    <label class="label-input" for="great_name">Tên ưu đãi:</label>
                                    <span class="ctrl-input " type="text" id="great_name" name="great_name">
                                        <?php echo htmlspecialchars($greats['great_name']); ?>
                                    </span>
                                </div>
                                <div class="input-group">
                                    <label class="label-input label-top" for="great_content">Nội dung:</label>
                                    <textarea required class="ctrl-input" type="text" id="great_content"
                                        name="great_content" cols="10"
                                        rows="10"><?php echo htmlspecialchars($greats['great_content']); ?></textarea>
                                </div>

                                <div class="input-group justify-content-end mt-30">
                                    <button class="btn btn-form" name="submitBtn">Cập nhật gói ưu đãi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>