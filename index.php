<?php
ob_start();
require_once 'dao/pdo.php';

try {
    $conn = pdo_get_connection();
    $conn = null;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<?php require_once './views/view-main/header.php'; ?>

<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <?php require_once './views/view-main/sidebar.php'; ?>
    <!-- partial -->
    <div class="page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <?php require_once './views/view-main/navbar.php'; ?>
        <!-- partial -->
        <div class="main-panel">
            <?php
            if (isset($_GET['action']) && $_GET['action'] != '') {
                $acction = $_GET['action'];
                switch ($acction) {
                    case 'listUser':
                        require_once './views/view-child/list_customer.php';
                        break;
                    case 'addUser':
                        require_once './views/view-child/customer.php';
                        break;
                    case 'editUser':
                        require_once './views/view-child/edit-customer.php';
                        break;
                    case 'viewUser':
                        require_once './views/view-child/view-customer.php';
                        break;
                    case 'listGreat':
                        require_once './views/view-great/list-great.php';
                        break;
                    case 'editGreat':
                        require_once './views/view-great/edit-great.php';
                        break;
                    case 'addGreat':
                        require_once './views/view-great/great.php';
                        break;
                    case 'viewGreat':
                        require_once './views/view-great/great.php';
                        break;

                    default:
                        require_once './views/view-child/list_customer.php';
                        break;

                }
            } else {
                require_once './views/view-child/delete_customer.php';
            }
            ?>

            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center text-center">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                        AME Digital 2023
                    </span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<?php require_once './views/view-main/footer.php'; ?>