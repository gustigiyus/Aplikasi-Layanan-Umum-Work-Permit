<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <?php
        if ($this->session->userdata('role_id') == 1) : ?>
            <div class="sidebar-brand-text mx-3">Super Admin</div>
        <?php
        else : ?>
            <div class="sidebar-brand-text mx-3">Office Umum</div>
        <?php endif; ?>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- QUERY MENU -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id`, `menu`
    FROM `user_menu` JOIN `user_access_menu` 
      ON `user_menu`.`id` = `user_access_menu`.`menu_id`
   WHERE `user_access_menu`.`role_id` = $role_id
   ORDER BY `user_access_menu`.`menu_id` ASC";

    $menu = $this->db->query($queryMenu)->result_array();
    ?>


    <!-- LOOPING MENU -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <!-- SIAPKAN SUB-MENU SESUAI MENU -->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
        FROM `user_sub_menu` JOIN `user_menu`
        ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        WHERE `user_sub_menu`.`menu_id` = $menuId
        AND `user_sub_menu`.`is_active` = 1";

        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <!-- SIAPKAN SSUB-MENU SESUAI MENU -->
        <?php
        $queryssMenu = "SELECT `user_ss_menu`.*, `user_ss_menu`.`id` AS 'id_ss', `user_menu`.*
                        FROM  `user_ss_menu` JOIN `user_menu`
                        ON    `user_ss_menu`.`menu_id` = `user_menu`.`id`
                        WHERE `user_ss_menu`.`menu_id` = $menuId
                        AND   `user_ss_menu`.`is_active` = 1
                        ";
        $ssmenu = $this->db->query($queryssMenu)->result_array();
        ?>

        <!--begin::SSmenu-->
        <?php foreach ($ssmenu as $ssm) : ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapseTwo-<?= $ssm['id_ss'] ?>" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="<?= $ssm['icon'] ?>"></i>
                    <span><?= $ssm['title'] ?></span>
                </a>
                <div id="collapseTwo-<?= $ssm['id_ss'] ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded" style="margin-bottom: -5px; margin-top: 5px;">
                        <h6 class="collapse-header"><?= $ssm['title'] ?>:</h6>
                        <!-- SIAPKAN TREE-MENU SESUAI SSUB-MENU -->
                        <?php
                        $ssid = $ssm['id_ss'];
                        $queryssMenu = "SELECT *
                        FROM   `user_tree_menu`
                        WHERE `user_tree_menu`.`menu_tree` = $ssid
                        AND `user_tree_menu`.`is_active` = 1
                        ";
                        $treeMenu = $this->db->query($queryssMenu)->result_array();
                        ?>
                        <!--begin::Treemenu-->
                        <?php foreach ($treeMenu as $tm) : ?>
                            <a class="collapse-item" href="<?= base_url('/') . $tm['url'] ?>"><?= $tm['title'] ?></a>
                        <?php endforeach; ?>
                        <!--end::Treemenu-->
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
        <!--end::SSmenu-->

        <!--begin::Submenu-->
        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
                </li>
            <?php endforeach; ?>
            <!--end::Submenu-->
            <hr class="sidebar-divider mt-3">

        <?php endforeach; ?>


        <!-- Nav Item - Logout -->
        <li class="nav-item">
            <div class="sidebar-heading">
                Akun
            </div>
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Keluar</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->