<?php include 'partials/head.php';?>
    <!-- Page Wrapper -->
    <div id="wrapper">



		<?php 
            include_once 'config/config.php';
            //$eventname =  htmlspecialchars($_GET["eventname"]);
            $categoryList = mysqli_query($conn,"select id,name from categories where active = 'Y' order by id desc");
       ?>


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
                            <div class="card shadow mb-4 rounded-0">
                                <div  class="card-header">

                                    <div class="d-flex justify-content-between">
                                    <div><h6 class=" mt-2 font-weight-bold text-primary">Registration & Licenses</h6></div>
                                    <div><a href="registrationlicenseslist.php" class="btn btn-success rounded-0">View List</a></div>
                                    </div>

                                    
                                </div>
                                <div class="card-body">
                                <form action="querycontrol.php" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="title">Title</label>
      <input type="text" class="form-control rounded-0" name="title" id="title" required>
    </div>
    <div class="form-group col-md-4">
      <label for="shortdesc">Short Description</label>
      <input type="text" class="form-control  rounded-0" name="shortdesc" id="shortdesc" required>
    </div>
    <div class="form-group col-md-4">
      <label for="shortdesc">Upload Photo (W - 600 x H - 415)</label>
      <input type="file" class="form-control  rounded-0" name="photo" id="photo" required>
    </div>
  </div>
  
  
    <div class="form-group">
    <label for="categoryname">Select Category</label>
    <select class="form-control  rounded-0" name="categoryname">
	<?php
                $i=0;
                $count = 1;
                while($row = mysqli_fetch_array($categoryList)) {
            ?>
	<option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
	
	<?php
					$i++;
				}
			  ?>
	</select>
  </div>
  
  
  <div class="form-group">
    <label for="description">Description</label>
    <textarea cols="80" id="description" name="description" class="form-control"  rows="10" data-sample-short  required></textarea>
  </div>
  <input type="submit" class="btn btn-primary rounded-0" name="addregistrationandlicence" value="Submit">
</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php include 'partials/footerend.php';?>
    <script>
    CKEDITOR.replace('description', {
      height: 400,
      baseFloatZIndex: 10005
    });
  </script>