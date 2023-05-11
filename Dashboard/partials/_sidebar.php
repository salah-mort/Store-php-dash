<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="index.php"><img src="assets/images/logo.svg" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
  </div>
  <ul class="nav">
    <li class="nav-item nav-category">
      <span class="nav-link">Salah&Abdullah</span>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="index.php">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
          <i class="mdi mdi-account-circle"></i>
        </span>
        <span class="menu-title">Admins</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="_showAdmins.php">Show_admins</a></li>
          <li class="nav-item"> <a class="nav-link" href="_addAdmins.php">Add_admins</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <span class="menu-icon">
          <i class="mdi mdi-shopping"></i>
        </span>
        <span class="menu-title">Category</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="_showCategory.php">Show_Category</a></li>
          <li class="nav-item"> <a class="nav-link" href="_addCategory.php">Add_Category</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <span class="menu-icon">
          <i class="mdi mdi-store"></i>
        </span>
        <span class="menu-title">stores</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="_showStore.php">Show_stores</a></li>
          <li class="nav-item"> <a class="nav-link" href="_Store.php">Add_stores</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="rates.php">
        <span class="menu-icon">
          <i class="mdi mdi-store"></i>
        </span>
        <span class="menu-title">Rates</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="logout.php">
        <span class="menu-icon">
          <i class="mdi mdi-store"></i>
        </span>
        <span class="menu-title">logout</span>
      </a>
    </li>
    

    <!-- <li class="nav-item menu-items">
    <li class="nav-item menu-items">
      <a class="nav-link" href="pages/icons/mdi.html">
        <span class="menu-icon">
          <i class="mdi mdi-contacts"></i>
        </span>
        <span class="menu-title">Icons</span>
      </a>
    </li> -->

</nav>