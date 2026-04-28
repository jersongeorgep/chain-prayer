<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <?php $title =  explode(" ", config_item('app_name')); ?>
  <a href="index3.html" class="brand-link">
    <span class="brand-text font-weight-light"><?= $title[0] ?><strong><b><?= strtoupper($title[1]); ?></b></strong></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block"><?= ucfirst($this->session->userdata('username')); ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item <?= ($page_menu == 'Dashboard') ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= ($page_menu == 'Dashboard') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= site_url('dashboard') ?>" class="nav-link <?= ($page_title == "Dashboard") ? "active" : "" ?>"> <i class="far fa-circle nav-icon"></i>
                <p>Dashboard</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item <?= ($page_menu == 'Chain Prayer') ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= ($page_menu == 'Chain Prayer') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-link"></i>
            <p> Prayer Chain <i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= site_url('prayerchain/members'); ?>" class="nav-link <?= (($page_title == "Members Register" || $page_title == "New Member" || $page_title == "Edit Member") ? "active" : ""); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Members</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('prayerchain/excel-import'); ?>" class="nav-link <?= (($page_title == "Excel Import") ? "active" : ""); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Excel Import</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('prayerchain/printdata/faith-home-wise'); ?>" class="nav-link <?= (($page_title == "Faith Home wise") ? "active" : ""); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Faith Home wise</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('prayerchain/printdata'); ?>" class="nav-link <?= (($page_title == "Group wise") ? "active" : ""); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Groups wise</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('prayerchain/printdata/members_wise'); ?>" class="nav-link <?= (($page_title == "Member wise") ? "active" : ""); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Members wise</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item <?= ($page_menu == 'Chain Point') ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= ($page_menu == 'Chain Point') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-pen-nib"></i>
            <p> Prayer Points <i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= site_url('prayerpoints/makeSerialNumber'); ?>" class="nav-link <?= (($page_title == "Serial No List" || $page_title == "New Serial No" || $page_title == "Edit Serial No") ? "active" : ""); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Make Serial Number</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('prayerpoints'); ?>" class="nav-link <?= (($page_title == "Prayer Point List" || $page_title == "New Prayer Point" || $page_title == "Edit Prayer Point") ? "active" : ""); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Payer Points</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('prayerpoints/printdata'); ?>" class="nav-link <?= (($page_title == "Serial wise") ? "active" : ""); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Serial Wise</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">MASTERS</li>
        <li class="nav-item <?= ($page_menu == 'Masters') ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= ($page_menu == 'Masters') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-church"></i>
            <p> Masters <i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= site_url('masters/times') ?>" class="nav-link <?= (($page_title == "All Times" || $page_title == "New Time" || $page_title == "Edit Time") ? "active" : ""); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Times</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('masters/center-fhs'); ?>" class="nav-link <?= (($page_title == "All Center FaithHomes" || $page_title == "New Center FaithHome" || $page_title == "Edit Center FaithHome") ? "active" : ""); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Center FHs</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('masters/local-fhs'); ?>" class="nav-link <?= (($page_title == "All Local FaithHomes" || $page_title == "New Local FaithHome" || $page_title == "Edit Local FaithHome") ? "active" : ""); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Local FHs </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('masters/languages'); ?>" class="nav-link <?= (($page_title == "All Languages" || $page_title == "New Language" || $page_title == "Edit Language") ? "active" : ""); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Languages</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('masters/terms'); ?>" class="nav-link <?= (($page_title == "All Terms" || $page_title == "New Term" || $page_title == "Edit Term") ? "active" : ""); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Terms</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('masters/headers-data'); ?>" class="nav-link <?= (($page_title == "All Headers" || $page_title == "New Header" || $page_title == "Edit Header") ? "active" : ""); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Headers</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item <?= ($page_menu == 'Settings') ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= ($page_menu == 'Settings') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-cogs"></i>
            <p> Settings <i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= site_url('settings') ?>" class="nav-link <?= (($page_title == "Separate Center") ? "active" : ""); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Separate Centers</p>
              </a>
              <a href="<?= site_url('settings/members-limit-settings') ?>" class="nav-link <?= (($page_title == "Members Limit Settings") ? "active" : ""); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Members Limit</p>
              </a>
              <a href="<?= site_url('settings/refresh-groups') ?>" class="nav-link <?= (($page_title == "Refresh Groups") ? "active" : ""); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Refresh Group</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="<?= site_url('login/login/logout') ?>" class="nav-link">
            <i class="nav-icon fas fa-power-off"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>