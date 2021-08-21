<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?= base_url('assets/adminbsb/') ?>images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $user['username'] ?></div>
                <div class="email"><?= $user['level'] ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="<?= base_url('logout') ?>"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="<?= base_url(); ?>">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <?php if ($user['level'] == "admin" || $user['level'] == "operator") { ?>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Produk</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="<?= base_url("produk/create"); ?>">Buat Produk</a>
                        </li>
                        <li>
                            <a href="<?= base_url("produk"); ?>">List Produk</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if ($user['level'] == "admin") { ?>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Merek</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="<?= base_url("merek/create"); ?>">Buat Merek</a>
                        </li>
                        <li>
                            <a href="<?= base_url("merek"); ?>">List Merek</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Kategori</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="<?= base_url("kategori/create"); ?>">Buat Kategori</a>
                        </li>
                        <li>
                            <a href="<?= base_url("kategori"); ?>">List Kategori</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2021 <a href="javascript:void(0);">Item Management</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>