<?php include 'head.php';?>

<?php include 'header.php';?>



	         <?php 
            include_once 'admin/config/config.php';
          $postid =  htmlspecialchars($_GET["blogid"]);
            $fulldescription = mysqli_query($conn,"select id,title,shortdesc,description,filepath from blog where active = 'Y' and id = '$postid' order by id desc");
			
			
			 $fulldescriptioneditor = mysqli_query($conn,"select id,title,shortdesc,description,filepath from blog where active = 'Y' and id = '$postid' order by id desc");
			
       ?>

			<?php
                $i=0;
                $count = 1;
                while($row = mysqli_fetch_array($fulldescription)) {
            ?>

		<!-- Breadcrumb -->
		<div class="breadcrumbs overlay" style="background-image:url('img/banners/contact-us-banner-30.jpg')">
			<div class="container  py-5">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner py-5">
							<!-- Bread Menu -->
							<div class="bread-menu">
							
								<ul>
									<li><a><?php echo $row["title"]; ?></a></li>
									<!--<li><a href="contact.html">Contact</a></li>-->
								</ul>
							</div>
							<!-- Bread Title -->
							<div class="bread-title"><p><?php echo $row["shortdesc"]; ?></p></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Breadcrumb -->
		<?php
					$i++;
				}
		?>
		
		
		
		<!-- Contact Us -->
		<section class="contact-us section-space">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-7 col-12 mt-4">
					<?php
                $i=0;
                $count = 1;
                while($row = mysqli_fetch_array($fulldescriptioneditor)) {
            ?>

					<?php echo $row["description"]; ?>
					
					<?php
					$i++;
				}
		?>
					</div>
					<div class="col-lg-4 col-md-7 col-12">
						<!-- Contact Form -->
						<div class="contact-form-area m-top-30">
							<h4>Get In Touch</h4>
							<form class="form" method="post" action="mail/mail.php">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<div class="icon"><i class="fa fa-user"></i></div>
											<input type="text" name="first_name" placeholder="First Name">
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<div class="icon"><i class="fa fa-phone"></i></div>
											<input type="text" name="mobileno" placeholder="Your Phone Number">
										</div>
									</div>									
									
									<div class="col-12">
										<div class="form-group textarea">
											<div class="icon"><i class="fa fa-pencil"></i></div>
											<textarea type="textarea" name="message" rows="5"></textarea>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group button">
											<button type="submit" class="bizwheel-btn btn-lg btn-block theme-2">Send Now</button>
										</div>
									</div>
								</div>
							</form>
						</div>
						
					</div>
				</div>
			</div>
		</section>	



<?php include 'client_section.php';?>

<?php include 'footer.php';?>

<?php include 'footerend.php';?>