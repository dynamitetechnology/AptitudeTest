<?php
	session_start(); 
 if($_SESSION["userrole"] =="ADMIN"){
 ?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-user"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Taxvex.com</div>
</a>
<hr class="sidebar-divider my-0">
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link" href="regcollage.php">
        <i class="fas fa-fw fa-blog"></i>
        <span>Register Collage</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="students.php">
        <i class="fas fa-fw fa-blog"></i>
        <span>Students</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="addquiz.php">
        <i class="fas fa-fw fa-blog"></i>
        <span>Add Quiz</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="enquiries.php">
        <i class="fas fa-fw fa-info"></i>
        <span>Enquiries</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="addcategory.php">
        <i class="fas fa-fw fa-blog"></i>
        <span>Category</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>
 <?php }else{ ?>
 
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-user"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Taxvex.com</div>
</a>
<hr class="sidebar-divider my-0">
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link" href="createblog.php">
        <i class="fas fa-fw fa-blog"></i>
        <span>Test</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="registrationlicenses.php">
        <i class="fas fa-fw fa-blog"></i>
        <span>Result</span></a>
</li>

<hr class="sidebar-divider d-none d-md-block">
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>
 <?php } ?>