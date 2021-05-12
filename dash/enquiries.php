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
            $registrationlicenceList = mysqli_query($conn,"select id,first_name,last_name,email,phone,message from usercontacts  order by id desc");
       ?>

                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4 rounded-0">
                            <div class="card-header">Enquiries received</div>
                            <div class="card-body">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SrNo</th>
                                            <th>First Name</th>
											 <th>Last Name</th>
                                            <th>Email</th>
											<th>Phone</th>
											<th>Message</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                             <th>SrNo</th>
                                            <th>First Name</th>
											 <th>Last Name</th>
                                            <th>Email</th>
											<th>Phone</th>
											<th>Message</th>
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
                                            <td><?php echo $row["first_name"]; ?></td>
											<td><?php echo $row["last_name"]; ?></td>
											<td><?php echo $row["email"]; ?></td>
											<td><?php echo $row["phone"]; ?></td>
											<td><?php echo $row["message"]; ?></td>
                                           
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