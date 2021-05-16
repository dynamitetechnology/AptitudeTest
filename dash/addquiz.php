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
              <div class="card-header">
              <h6 class=" mt-2 font-weight-bold text-primary">Enter Quiz Details</h6>
              </div>
              <div class="card-body">
                <form action="querycontrol.php" method="POST">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="title">Quiz Title</label>
                      <input type="text" class="form-control rounded-0" name="title" id="title" required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="shortdesc">Enter Number Of Questions</label>
                      <input type="text" class="form-control rounded-0" name="no_of_questions" id="no_of_questions"  required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="title">Marks on Right Question</label>
                      <input type="text" class="form-control rounded-0" name="marks" id="marks" required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="shortdesc">Time Limit For Exam</label>
                      <input type="text" class="form-control rounded-0" name="time" id="time" required>
                    </div>
                  </div>

                  <input type="submit" class="btn btn-primary rounded-0" name="addQuiz" value="Submit">
                </form>
              </div>
            </div>


<!-- Table -->


<?php 
            include_once 'config/config.php';
          //$uploadimage =  htmlspecialchars($_GET["uploadimage"]);
            $collegeList = mysqli_query($conn,"select id, title,marks,no_of_question,time,status from quiz order by id desc");
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
      <th>Title</th>
      <th>Marks</th>
      <th>Questions</th>
      <th>Time</th>
      <th>Status</th>
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
      <td><?php echo  $row["title"]; ?></td>
      <td><?php echo  $row["marks"]; ?></td>
      <td><?php echo  $row["no_of_question"]; ?></td>
      <td><?php echo  $row["time"]; ?></td>
      <td><?php echo  $row["status"]; ?></td>
      <td>
         <!-- <i class="fas fa-fw fa-trash"></i>  -->
      
      <a href="addQuestions.php?quizid=<?php echo  $row["id"]; ?>" title="Add Questions" target="_blank"><i class="fas fa-fw fa-plus"></i></a>
      <a href="#" title="Add Questions" target="_blank"><i class="fas fa-fw fa-trash"></i></a>
      <?php if($row["status"] == "ENABLED" ) {?>
      <a href="#" title="Add Questions" ><i class="fas fa-fw fa-eye text-success"></i></a>
      <?php } else {?>
      <a href="#" title="Add Questions" ><i class="fas fa-fw fa-eye-slash text-danger"></i></a>
      <?php } ?>
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



    <!-- Modal -->
<div class="modal fade" id="updateColllegeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="querycontrol.php" method="POST">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="title">College Name</label>
                      <input type="text" class="form-control rounded-0" name="collegename" id="collegenameModal" required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="shortdesc">College Slug</label>
                      <input type="text" class="form-control rounded-0" name="slugname" id="slugnameModal" readonly required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="title">Tpo Name</label>
                      <input type="text" class="form-control rounded-0" name="tponame" id="tponameModal" required>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="shortdesc">Email</label>
                      <input type="text" class="form-control rounded-0" name="email" id="emailModal" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="shortdesc">Address</label>
                    <textarea cols="50" id="addressModal" name="address" class="form-control  rounded-0" maxlength="200"
                      rows="5" data-sample-short required></textarea>
                    <div id="textarea_feedback"></div>
                  </div>
                  <input type="submit" class="btn btn-primary rounded-0" name="createcollege" value="Submit">
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>





    <?php include 'partials/footerend.php';?>

    <script>
      $(document).ready(function () {
        $('#collegename').keyup(function () {
          var slug = $('#collegename').val();
          let slugname = slug.replace(/[\W_]/g, '_');
          $('#slugname').val(slugname.toLowerCase());
        });


$("#dataTable").on('click','.editcollege',function(){
let collegeid = $(this).attr("data-collegeid")
console.log('Hello',collegeid)

$.ajax({
  type: "POST",
  url: "querycontrol.php",
  data: {
    getcollegeid: collegeid
  },
  success: function(resp){
        console.log(resp)
        resp.forEach(function(items){
          console.log(items)
          console.log(items.id)
          $("#collegenameModal").val(items.collegename)
          console.log(items.collegename)
          console.log(items.slugname)
          console.log(items.tponame)
          console.log(items.email)
          console.log(items.address)

$("#updateColllegeModal").modal('show')
        })


  },
  dataType: "json"
});


})


      });
    </script>