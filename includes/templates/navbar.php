<!-- start sidebar menu -->
<div class="sidebar-menu sidebar-menu-right close">
  <!-- start sidebar menu brand -->
  <div class="sidebar-menu-brand">
    <img src="<?php echo $assets . "air-defence-logo-2.png" ?>" class="sidebar-menu-logo-img" alt="<?php echo isset($_SESSION['company_name']) ? $_SESSION['company_name'] : lang('NOT ASSIGNED') ?>" id="company-img-brand">
    <!-- <img  src="<?php echo $assets ?>jsl.jpeg" > -->
    <span class="sidebar-menu-logo-name text-uppercase ">csoc 830</span>
    <!-- close icon displayed in small screens -->
    <span class="close-btn"><i class="bi bi-x"></i></span>
  </div>
  <!-- end sidebar menu brand -->
  <!-- start sidebar menu content -->
  <ul class="nav-links">
    <!-- start dashboard page link -->
    <li>
      <a href="<?php echo $nav_up_level ?>dashboard/index.php">
        <i class="bi bi-grid"></i>
        <span class="link-name"><?php echo lang('DASHBOARD') ?></span>
      </a>
      <!-- start blank sub menu -->
      <ul class="sub-menu blank">
        <li>
          <a href="<?php echo $nav_up_level ?>dashboard/index.php">
            <span class="link-name"><?php echo lang('DASHBOARD') ?></span>
          </a>
        </li>
      </ul>
      <!-- end blank sub menu -->
    </li>
    <!-- end dashboard page link -->
    <!-- start units page link -->
    <li>
      <div class="icon-link">
        <section>
          <i class="bi bi-grid"></i>
          <span class="link-name"><?php echo lang('UNITS') ?></span>
        </section>
        <i class="bi bi-arrow-down-short"></i>
      </div>
      <!-- start blank sub menu -->
      <ul class="sub-menu">
        <li>
          <a href="<?php echo $nav_up_level ?>units/index.php">
            <span class="link-name"><?php echo lang('DASHBOARD') ?></span>
          </a>
        </li>
        <li>
          <a href="<?php echo $nav_up_level ?>units/index.php?do=add-new-unit">
            <span class="link-name"><?php echo lang('ADD UNIT') ?></span>
          </a>
        </li>
      </ul>
      <!-- end blank sub menu -->
    </li>
    <!-- end units page link -->
    <!-- start specializations page link -->
    <li>
      <div class="icon-link">
        <section>
          <i class="bi bi-grid"></i>
          <span class="link-name"><?php echo lang('SPECIALIZATIONS') ?></span>
        </section>
        <i class="bi bi-arrow-down-short"></i>
      </div>
      <!-- start blank sub menu -->
      <ul class="sub-menu">
        <li>
          <a href="<?php echo $nav_up_level ?>specializations/index.php">
            <span class="link-name"><?php echo lang('DASHBOARD') ?></span>
          </a>
        </li>
        <li>
          <a href="<?php echo $nav_up_level ?>specializations/index.php?do=add-new-specialization">
            <span class="link-name"><?php echo lang('ADD SPECIALIZATION') ?></span>
          </a>
        </li>
      </ul>
      <!-- end blank sub menu -->
    </li>
    <!-- end specializations page link -->
    <!-- start soldiers page link -->
    <li>
      <div class="icon-link">
        <section>
          <i class="bi bi-people"></i>
          <span class="link-name"><?php echo lang('SOLDIERS') ?></span>
        </section>
        <i class="bi bi-arrow-down-short"></i>
      </div>
      <!-- start blank sub menu -->
      <ul class="sub-menu">
        <li>
          <a href="<?php echo $nav_up_level ?>soldiers/index.php">
            <span class="link-name"><?php echo lang('DASHBOARD') ?></span>
          </a>
        </li>
        <li>
          <a href="<?php echo $nav_up_level ?>soldiers/index.php?do=add-new-soldier">
            <span class="link-name"><?php echo lang('ADD SOLDIER') ?></span>
          </a>
        </li>
      </ul>
      <!-- end blank sub menu -->
    </li>
    <!-- end soldiers page link -->
  </ul>
  <!-- end sidebar menu content -->
</div>
<!-- end sidebar menu -->

<div class="top-navbar top-navbar-right">
  <div class="top-navbar-content">
    <i class="bi bi-list sidebar-menubtn"></i>
    <a href="" class="btn btn-outline-light py-1 fs-12 mx-3">
      <span><?php echo lang('REFRESH SESSION') ?></span>
    </a>

    <ul class="nav-links me-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $_SESSION['username'] ?>
        </a>
        <ul class="dropdown-menu-end dropdown-menu text-end">
          <li>
            <a class="dropdown-item" href="<?php echo $src ?>logout.php">
              <i class="bi bi-box-arrow-right"></i>
              <span><?php echo lang('LOGOUT', 'login') ?></span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>

<div class="main-content">