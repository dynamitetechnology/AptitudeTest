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
          //$uploadimage =  htmlspecialchars($_GET["uploadimage"]);
            $questionList = mysqli_query($conn,"select id, optiona, optionb, optionc, optiond, question, answer, quiz_id from questions order by id desc");
       ?>

                <div class="row">
                    <div class="col-xl-12 col-lg-12">

                        <?php
               $i=0;
                $count = 1;
                while($row = mysqli_fetch_array($questionList)) {           
            ?>
                        <div class="card shadow mb-4 rounded-0">
                            <div class="card-header">
                            <div class="d-flex justify-content-between">
                            <div> <h6 class=" mt-2 font-weight-bold text-primary"><?php echo  $row["question"]; ?></h6></div>
                            <div> <a href="editq.php?id=<?php echo  $row["id"]; ?>"><i class="fas fa-fw fa-edit"></i></a></div>
                            </div>
                               
                                    
                            </div>
                            <div class="card-body">
                                <div class="alert alert-primary rounded-0" role="alert">
                                    <?php echo  $row["optiona"]; ?>
                                </div>

                                <div class="alert alert-primary rounded-0" role="alert">
                                    <?php echo  $row["optionb"]; ?>
                                </div>

                                <div class="alert alert-primary rounded-0" role="alert">
                                    <?php echo  $row["optionc"]; ?>
                                </div>

                                <div class="alert alert-primary rounded-0" role="alert">
                                    <?php echo  $row["optiond"]; ?>
                                </div>

                                <div class="alert alert-primary rounded-0" role="alert">
                                    <?php echo  $row["answer"]; ?>
                                </div>
                            </div>
                        </div>

                        <?php
					$i++;
				}
			  ?>
                        <!-- Table -->





                        <?php include 'partials/footerend.php';?>

                        <script>

                        </script>