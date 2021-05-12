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
                            <div class="card shadow mb-4 rounded-0">
                                <div  class="card-header">
                                    <div class="d-flex justify-content-between">
                                    <div><h6 class=" mt-2 font-weight-bold text-primary">Categories</h6></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                <form action="querycontrol.php" method="POST" enctype="multipart/form-data">
								  <div class="form-row">
									<div class="form-group col-md-4">
									  <label for="title">Title</label>
									  <input type="text" class="form-control rounded-0" name="title" id="title" required>
									</div>

								  </div>
								  <input type="submit" class="btn btn-primary rounded-0" name="addcategories" value="Submit">
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