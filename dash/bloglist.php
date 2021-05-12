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

                <?php 
            include_once 'config/config.php';
            //$eventname =  htmlspecialchars($_GET["eventname"]);
            $registrationlicenceList = mysqli_query($conn,"select id,title,shortdesc,description,filepath from blog where active = 'Y' order by id desc");
       ?>

                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4 rounded-0">
                            <div class="card-header">List</div>
                            <div class="card-body">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SrNo</th>
                                            <th>Title</th>
                                            <th>Short Description</th>
                                            <th>Active</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SrNo</th>
                                            <th>Title</th>
                                            <th>Short Description</th>
                                            <th>Active</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                $i=0;
                $count = 1;
                while($row = mysqli_fetch_array($registrationlicenceList)) {
            ?>
                                        <tr>
                                            <td><?php echo $count ?></td>
                                            <td><?php echo $row["title"]; ?></td>
                                            <td><?php echo $row["shortdesc"]; ?></td>
                                            <td><a class="text-decoration-none"
                                                    href="bloglist.php?update=<?php echo $row["id"]; ?>"><i
                                                        class="fa fa-edit"></i> </a> ||
                                                <a class="text-decoration-none"
                                                    href="bloglist.php?registrationdel=<?php echo $row["id"]; ?>"><i
                                                        class="fa fa-trash"></i></a> ||
                                                <a class="text-decoration-none"
                                                    href="bloglist.php?uploadimage=<?php echo $row["id"]; ?>"><i
                                                        class="fa fa-image"></i></a>

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






                <div class="row d-none displayupdatearea">

        <?php 
            include_once 'config/config.php';
          $update =  htmlspecialchars($_GET["update"]);
         
            $updateregistrationlicenceList = mysqli_query($conn,"select id,title,shortdesc,description,filepath from blog where active = 'Y' and id = '$update' order by id desc");
          
       ?>

                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4 rounded-0">
                            <div class="card-header">

                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class=" mt-2 font-weight-bold text-primary">Registration & Licenses</h6>
                                    </div>
                                    <div><a href="bloglist.php" class="btn btn-success rounded-0">View
                                            List</a></div>
                                </div>


                            </div>
                            <div class="card-body">
                                <?php
                $i=0;
                $count = 1;
                while($row = mysqli_fetch_array($updateregistrationlicenceList)) {
            ?>

                                <form action="querycontrol.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="title">Title</label>
                                            <input type="hidden" class="form-control rounded-0" name="hiddenid"
                                                value="<?php echo $row["id"]; ?>" id="hiddenid" required>
                                            <input type="text" class="form-control rounded-0" name="title"
                                                value="<?php echo $row["title"]; ?>" id="title" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="shortdesc">Short Description</label>
                                            <input type="text" class="form-control  rounded-0"
                                                value="<?php echo $row["shortdesc"]; ?>" name="shortdesc" id="shortdesc"
                                                required>
                                        </div>
                                        <!-- <div class="form-group col-md-4">
                                            <label for="shortdesc">Upload Photo</label>
                                            <input type="file" class="form-control  rounded-0"  name="photo" id="photo"
                                                required>
                                        </div> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea cols="80" id="description" name="description" class="form-control"
                                            rows="10" data-sample-short
                                            required><?php echo $row["description"]; ?></textarea>
                                    </div>
                                    <input type="submit" class="btn btn-primary rounded-0"
                                        name="updateblogdata" value="Submit">

                                </form>

                                <?php
					$i++;
				}
			  ?>
                            </div>
                        </div>
                    </div>
                
				</div>
				
	<div class="row displayphotoupload d-none">
	
	
	         <?php 
            include_once 'config/config.php';
          $uploadimage =  htmlspecialchars($_GET["uploadimage"]);
            $imageregistrationlicenceList = mysqli_query($conn,"select id,title,shortdesc,description,filepath from blog where active = 'Y' and id = '$uploadimage' order by id desc");
       ?>
	
	
	
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4 rounded-0">
    <div class="card-body">
  
                                <?php
                $i=0;
                $count = 1;
                while($row = mysqli_fetch_array($imageregistrationlicenceList)) {
            ?>

                                <form action="querycontrol.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-row">
                                    
                                       <div class="form-group col-md-4">
                                            <label for="shortdesc">Upload Photo (W - 700 x H - 530)</label>
                                            <input type="hidden" class="form-control rounded-0" name="hiddenid"
                                                value="<?php echo $row["id"]; ?>" id="hiddenid" required>
                                            <input type="file" class="form-control  rounded-0"  name="photo" id="photo"
                                                required>
                                        </div> 
                                    </div>
                                  
                                    <input type="submit" class="btn btn-primary rounded-0"
                                        name="uploadblogimage" value="Submit">

                                </form>

                                <?php
					$i++;
				}
			  ?>
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
            $(document).ready(function () {
             
                if ("<?php echo $update ?>") {
                    $(".displayupdatearea").removeClass("d-none")
                }else if("<?php echo $uploadimage ?>"){
					  $(".displayphotoupload").removeClass("d-none")
					
				}

            })
        </script>