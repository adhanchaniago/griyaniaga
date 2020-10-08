<?php
$id = $this->session->userdata('id');
$user = $this->user_model->user_detail($id);
$meta = $this->meta_model->get_meta();
?>



<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/dashboard'); ?>">

        <div class="sidebar-brand-icon">
            <i class="ti-lock"></i> </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>
    <hr class="sidebar-divider my-0">


    <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('myaccount/home'); ?>">
            <i class="ri-home-5-line"></i>
            <span>Dashboard</span></a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('myaccount/property'); ?>">
            <i class="ri-building-2-line fa-fw"></i>
            <span>Property</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('myaccount/package'); ?>">
            <i class="ri-inbox-unarchive-line"></i>
            <span>Paket</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('myaccount/profile'); ?>">
            <i class="ri-user-6-line"></i>
            <span>My Account</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('auth/logout'); ?>">
            <i class="ri-logout-box-r-line"></i>
            <span> Logout</span>
        </a>
    </li>





</ul>
<!-- Sidebar -->

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">