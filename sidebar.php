<?php
session_start();

$timeout_duration = 900; // 900 detik = 15 menit
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
  session_unset();
  session_destroy();
  session_start(); // restart session untuk pesan error
  $_SESSION['login_error'] = "Session expired. Please log in again.";
  header("Location: ../authentication-login.php");
  exit();
}
$_SESSION['LAST_ACTIVITY'] = time(); // reset waktu aktivitas jika belum kedaluwarsa

if (!isset($_SESSION['email_address'])) {
  session_unset();
  session_destroy();
  header("Location: ../index.php");
  exit();
}
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
?>

<style>
  .profile-pic:hover .avatar-img {
    transform: scale(1.05);
    transition: transform 0.3s ease;
  }

  .profile-pic:hover .profile-username {
    color: #d63384;
    transition: color 0.3s ease;
  }
</style>

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
  data-sidebar-position="fixed" data-header-position="fixed">
  <aside class="left-sidebar">
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="#" class="text-nowrap logo-img">
          <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'User'): ?>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <!-- Dashboard -->
            <li class="sidebar-item <?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>">
              <a class="sidebar-link" href="dashboard.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Main</span>
            </li>
            <li class="sidebar-item <?= basename($_SERVER['PHP_SELF']) == 'form.php' ? 'active' : '' ?>">
              <a class="sidebar-link" href="form.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Form Request</span>
              </a>
            </li>
          <?php endif; ?>

          <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin'): ?>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <!-- Dashboard -->
            <li class="sidebar-item <?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>">
              <a class="sidebar-link" href="dashboard.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  <div class="body-wrapper">
    <header class="app-header">
      <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item d-block d-xl-none">
            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
              <i class="ti ti-bell-ringing"></i>
              <div class="notification bg-primary rounded-circle"></div>
            </a>
          </li> -->
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
          <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
            <li class="nav-item dropdown">
              <a class="dropdown-toggle profile-pic d-flex align-items-center text-decoration-none"
                data-bs-toggle="dropdown" href="#" role="button">
                <?php
                $name_encoded = urlencode($name);
                $avatar_url = "https://ui-avatars.com/api/?name={$name_encoded}&background=random&color=fff&rounded=true";
                ?>
                <div class="avatar-sm me-2">
                  <img src="<?= $avatar_url ?>" alt="User Avatar"
                    class="avatar-img rounded-circle shadow-sm border border-light"
                    style="width: 40px; height: 40px;" />
                </div>
                <div class="profile-username d-none d-md-block text-start">
                  <div class="small text-muted">Hi,</div>
                  <div class="fw-semibold text-dark"><?= htmlspecialchars($name) ?></div>
                </div>
              </a>

              <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                <div class="message-body">
                  <!-- <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-user fs-6"></i>
                    <p class="mb-0 fs-3">My Profile</p>
                  </a>
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-mail fs-6"></i>
                    <p class="mb-0 fs-3">My Account</p>
                  </a>
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-list-check fs-6"></i>
                    <p class="mb-0 fs-3">My Task</p>
                  </a> -->
                  <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </header>