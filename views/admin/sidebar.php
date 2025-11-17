<!-- views/admin/sidebar.php -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= BASE_URL ?>admin">
        <div class="sidebar-brand-text mx-3">TourQL</div>
    </a>
    <hr class="sidebar-divider">
    <li class="nav-item <?= $current_page == 'dashboard' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= BASE_URL ?>admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item <?= $current_page == 'tours' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= BASE_URL ?>admin/tours">
            <i class="fas fa-fw fa-map"></i>
            <span>Quản lý Tour</span>
        </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>