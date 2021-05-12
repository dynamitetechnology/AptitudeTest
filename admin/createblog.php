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
                                    <div><h6 class=" mt-2 font-weight-bold text-primary">Create Blog</h6></div>
                                    <div><a href="bloglist.php" class="btn btn-success rounded-0">View List</a></div>
                                    </div>

                                    
                                </div>
                                <div class="card-body">
                                <form action="querycontrol.php" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="title">Title</label>
      <input type="text" class="form-control rounded-0" name="title" id="title" required>
    </div>

    <div class="form-group col-md-6">
      <label for="shortdesc">Upload Photo (W - 700 x H - 530)</label>
      <input type="file" class="form-control  rounded-0" name="photo" id="photo" required>
    </div>
  </div>
  
 <div class="form-group">
    <label for="shortdesc">Short Description</label>
    <textarea cols="50"  id="textarea" name="shortdesc" class="form-control  rounded-0" maxlength="200"  rows="5" data-sample-short  required></textarea>
	<div id="textarea_feedback"></div>
  </div>
  
  <div class="form-group">
    <label for="description">Description</label>
    <textarea cols="80" id="description" name="description" class="form-control"  rows="10" data-sample-short  required></textarea>
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
    CKEDITOR.replace('description', {
      height: 400,
      baseFloatZIndex: 10005
    });
  </script>
  
  <script>
  $(document).ready(function() {
    var text_max = 200;
    $('#textarea_feedback').html(text_max + ' characters remaining');

    $('#textarea').keyup(function() {
        var text_length = $('#textarea').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' characters remaining');
    });
});
  </script>