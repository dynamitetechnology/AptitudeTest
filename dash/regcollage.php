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
                                    <div><h6 class=" mt-2 font-weight-bold text-primary">Register Collage</h6></div>
                                    <div><a href="bloglist.php" class="btn btn-success rounded-0">View List</a></div>
                                    </div>

                                    
                                </div>
                                <div class="card-body">
                                <form action="querycontrol.php" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="title">Collage Name</label>
      <input type="text" class="form-control rounded-0" name="collagename" id="collagename" required>
    </div>

    <div class="form-group col-md-6">
      <label for="shortdesc">Collage Slug</label>
    <input type="text" class="form-control rounded-0" name="title" id="slugname"  required>
    </div>
  </div>
  
 <div class="form-group">
    <label for="shortdesc">Address</label>
    <textarea cols="50"  id="textarea" name="shortdesc" class="form-control  rounded-0" maxlength="200"  rows="5" data-sample-short  required></textarea>
	<div id="textarea_feedback"></div>
  </div>
  <input type="submit" class="btn btn-primary rounded-0" name="createblog" value="Submit">
</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php include 'partials/footerend.php';?>
    
  <script>
  $(document).ready(function() {

    $('#collagename').keyup(function() {
        var slug = $('#collagename').val();
        
	let slugname = 	slug.replace(/[\W_]/g,'_');
		
        $('#slugname').val(slugname);
    });
});
  </script>