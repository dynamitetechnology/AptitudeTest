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
            $quizid =  htmlspecialchars($_GET["quizid"]);
          //  $quizList = mysqli_query($conn,"select id,title,marks,no_of_question,time from quiz where id = '$quizid' ");
          $stmt = $conn->prepare("select no_of_question from quiz where id = ? ");
          $stmt->bind_param('s', $quizid);
          $stmt->execute();
          $result = $stmt->get_result();
          $value = $result->fetch_object();
          $queCount = $value->no_of_question;
       ?>


                <div class="row">
                    <div class="col-xl-12 col-lg-12">

                        <form action="querycontrol.php" method="POST">
            <?php
               $i=1;
                $count = 1;
                while($i <= $queCount) {           
            ?>
                            <div class="card shadow mb-4 rounded-0">
                                <div class="card-header">
                                    <h6 class=" mt-2 font-weight-bold text-primary">Question Number <?php echo $count ++ ?></h6>
                                </div>
                                <div class="card-body">

                                <div class="form-group">
                                        <label >Type Question :</label>
                                        <textarea class="form-control rounded-0"  name="question[]"></textarea>
                                        <input type="hidden" name="quizid" value="<?php echo $quizid ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Enter Option A</label>
                                        <input type="text" class="form-control rounded-0"  name="optiona[]">
                                    </div>
                                    <div class="form-group">
                                        <label>Enter Option B</label>
                                        <input type="text" class="form-control rounded-0"  name="optionb[]">
                                    </div>
                                    <div class="form-group">
                                        <label>Enter Option C</label>
                                        <input type="text" class="form-control rounded-0"   name="optionc[]">
                                    </div>
                                    <div class="form-group">
                                        <label >Enter Option D</label>
                                        <input type="text" class="form-control rounded-0"   name="optiond[]">
                                    </div>

                                    <div class="form-group">
                                        <label >Correct Answer</label>
                                        <select class="form-control rounded-0" name="correctans[]" >
                                        <option value="a">Option A</option>
                                        <option value="b">Option B</option>
                                        <option value="c">Option C</option>
                                        <option value="d">Option D</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <?php
					$i++;
				}
			  ?>

                            <input type="submit" class="btn btn-primary rounded-0" name="addQuestions" value="Submit">
                        </form>

                    </div>
                </div>
            </div>
        </div>






        <?php include 'partials/footerend.php';?>

        <script>
            $(document).ready(function () {

            });
        </script>