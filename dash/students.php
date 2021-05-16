<?php include 'partials/head.php';?>
<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <?php include 'partials/sidebar.php';?>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
      <!-- Topbar -->
      <?php include 'partials/navbar.php';?>
      <!-- End of Topbar -->
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm rounded-0"><i
              class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
        <div class="row">
          <div class="col-xl-12 col-lg-12">
<!-- Table -->


        <?php 
            include_once 'config/config.php';

            $collegeList = mysqli_query($conn,"select id, username, fullname, email, gender, phoneno,college_id,(select collegename from college where id = students.college_id) as collegename from students where status = 'Y' order by id desc");
       ?>

            <div class="card shadow mb-4 rounded-0">
              <div class="card-header">
              <h6 class=" mt-2 font-weight-bold text-primary">View College</h6>
              </div>
              <div class="card-body">
              <table class="table table-bordered"  id="dataTable">
  <thead>
    <tr>
      <th>Sr No.</th>
      <th>Name</th>
      <th>Username</th>
      <th>Email</th>
      <th>Gender</th>
      <th>Mobile</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i=0;
      $count = 1;
      while($row = mysqli_fetch_array($collegeList)) {
  ?>
    <tr>
      <th><?php echo  $count ++ ?></th>
      <td><?php echo  $row["fullname"]; ?></td>
      <td><?php echo  $row["username"]; ?></td>
      <td><?php echo  $row["email"]; ?></td>
      <td><?php echo  $row["gender"]; ?></td>
      <td><?php echo  $row["phoneno"]; ?></td>
      <td><i class="fas fa-fw fa-trash"></i> 
      

    
    </td>
    </tr>
    <?php
					$i++;
			}
		?>
  </tbody>
</table>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>


    <?php include 'partials/footerend.php';?>

    <script>
      $(document).ready(function () {
       

      });
    </script>