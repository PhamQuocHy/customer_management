<nav class="sidebar sidebar-offcanvas sidebar-custom" id="sidebar">
    <div
        class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top sidebar-custom">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logoAme.png" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/LogoMini.png"
                alt="logo" /></a>
    </div>
    <div class="list-menu">
        <ul class="nav">
            <li class="px-20">
                <span class="bt-1 line"></span>
            </li>
            <li class="nav-item nav-category">
                <span class="nav-link">Navigation</span>
            </li>
            <li id="dashboard" class="nav-item menu-items">
                <a class="nav-link" href="?action=dashboard">
                    <span class="menu-icon">
                        <i class="mdi mdi-chart-bubble"></i>
                    </span>
                    <span class="menu-title">Thống kê</span>
                </a>
            </li>
            <li id="dashboard" class="nav-item menu-items">
                <a class="nav-link" href="?action=dashboard">
                    <span class="menu-icon">
                        <i class="mdi mdi-chart-bubble"></i>
                    </span>
                    <span class="menu-title">Thêm doanh thu</span>
                </a>
            </li>
            <li id="cateUser" class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <span class="menu-icon">
                        <i class="mdi mdi-account-convert"></i>
                    </span>
                    <span class="menu-title">Khách hàng</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse menu-second" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link sub-navLink df-between" href="?action=listUser&cate=user">
                                Danh sách khách
                                hàng
                                <span class="show-icon--submenu">
                                    <!-- <i class="mdi mdi-cube-outline position-icon"> </i> -->
                                    <img src="./assets/images/file-icons/logoIcon/logo.png"
                                        class="position-icon logo-icon" alt="">
                                </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link df-between sub-navLink" href="?action=addUser&cate=user">Thêm khách hàng
                                mới
                                <span class="show-icon--submenu">
                                    <!-- <i class="mdi mdi-cube-outline position-icon"> </i> -->
                                    <img src="./assets/images/file-icons/logoIcon/logo.png"
                                        class="position-icon logo-icon" alt="">
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li id="cateGreat" class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#greatItem" aria-expanded="false"
                    aria-controls="greatItem">
                    <span class="menu-icon">
                        <i class="mdi mdi-gift-outline"></i>
                    </span>
                    <span class="menu-title">Ưu đãi</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse menu-second" id="greatItem">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link sub-navLink df-between" href="?action=listGreat&cate=great">
                                Danh sách ưu đãi
                                <span class="show-icon--submenu">
                                    <!-- <i class="mdi mdi-cube-outline position-icon"> </i> -->
                                    <img src="./assets/images/file-icons/logoIcon/logo.png"
                                        class="position-icon logo-icon" alt="">
                                </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link df-between sub-navLink" href="?action=addGreat&cate=great">Thêm ưu đãi
                                mới
                                <span class="show-icon--submenu">
                                    <!-- <i class="mdi mdi-cube-outline position-icon"> </i> -->
                                    <img src="./assets/images/file-icons/logoIcon/logo.png"
                                        class="position-icon logo-icon" alt="">
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li id="cateService" class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#serviceItem" aria-expanded="false"
                    aria-controls="serviceItem">
                    <span class="menu-icon">
                        <i class="mdi mdi-animation"></i>
                    </span>
                    <span class="menu-title">Dịch vụ</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse menu-second" id="serviceItem">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link sub-navLink df-between" href="?action=listService&cate=service">
                                Danh sách dịch vụ
                                <span class="show-icon--submenu">
                                    <!-- <i class="mdi mdi-cube-outline position-icon"> </i> -->
                                    <img src="./assets/images/file-icons/logoIcon/logo.png"
                                        class="position-icon logo-icon" alt="">
                                </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link df-between sub-navLink" href="?action=addService&cate=service">Thêm dịch
                                vụ
                                mới
                                <span class="show-icon--submenu">
                                    <!-- <i class="mdi mdi-cube-outline position-icon"> </i> -->
                                    <img src="./assets/images/file-icons/logoIcon/logo.png"
                                        class="position-icon logo-icon" alt="">
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li id="cateService" class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#userItem" aria-expanded="false"
                    aria-controls="userItem">
                    <span class="menu-icon">
                        <i class="mdi mdi-animation"></i>
                    </span>
                    <span class="menu-title">Nhân viên</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse menu-second" id="userItem">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link sub-navLink df-between" href="?action=addCommer&cate=commer">
                                Danh sách Nhân viên
                                <span class="show-icon--submenu">
                                    <!-- <i class="mdi mdi-cube-outline position-icon"> </i> -->
                                    <img src="./assets/images/file-icons/logoIcon/logo.png"
                                        class="position-icon logo-icon" alt="">
                                </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link df-between sub-navLink" href="?action=listCommer&cate=commer">Thêm nhân
                                viên
                                <span class="show-icon--submenu">
                                    <!-- <i class="mdi mdi-cube-outline position-icon"> </i> -->
                                    <img src="./assets/images/file-icons/logoIcon/logo.png"
                                        class="position-icon logo-icon" alt="">
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>