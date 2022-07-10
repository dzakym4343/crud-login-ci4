<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Home</li>

                <li>
                    <a href="<?= ($_SERVER['REQUEST_URI'] == '/pages/home') ? base_url('/pages/home') : base_url('/'); ?>" class="waves-effect">
                        <i class="fal fa-home"></i>
                        <span key="t-dashboard">Dashboard</span>
                    </a>

                </li>

                <li class="menu-title" key="t-apps">Menu</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa-light fa-users"></i>
                        <span key="t-users">Detail User</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="true">
                        <li>
                            <a href="<?= base_url('/pages/user/add') ?>" class="waves-effect" key="t-add-user">Tambah User</a>
                        </li>
                        <li>
                            <a href="<?= base_url('/pages/user/list') ?>" class="waves-effect" key="t-read-user">Lihat User</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->