<?php
include 'header.php';
?>
<!-- header END -->

<!-- Content -->
<div class="page-content">
	<!-- Trending Post -->
	<div class="section-full content-inner-1">
		<div class="container">
			<div class="section-head text-center">
				<span>Contributors</span>
			</div>
			<div class="row blog-box-style1">
				<div class="col-md-8 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInUp;">
					<div class="row">
					<?php $q = "SELECT * FROM `mch_contributors` WHERE `is_active` = 1 ORDER BY `id` DESC";
						$res = mysqli_query($conn, $q);
						if(mysqli_num_rows($res) > 0) {
						while ($row = mysqli_fetch_assoc($res)) { ?>
							<div class="col-md-6 col-sm-12">
								<div class="blog-card blog-grid overlay-post left"> 
									<div class="dlab-post-media">
										<img src="../uploads/assets/uploaded_data/contributors_img/<?php echo $row['image']; ?>" alt="">
									</div>
									<div class="blog-card-info">
										<div class="dlab-post-meta">
											<ul>
												<li class="post-tag"><a href="dr-pankaj-kumar-agarwal.php">CONTRIBUTOR</a></li>
											</ul>
										</div>
										<h4 class="title"><a href="dr-pankaj-kumar-agarwal.php"><?php echo $row['name']; ?></a></h4>
									</div>
								</div>
							</div><!----Pankaj-Agarwal-end---->
					<?php } } ?>
						<!-- <div class="col-md-12">
							<nav aria-label="Page navigation example">
								<ul class="pagination">
									<li class="page-item"><a class="page-link prevs" href="#">Previous</a></li>
									<li class="page-item active"><a class="page-link" href="contributors.php">1</a></li>
									<li class="page-item"><a class="page-link" href="contributors2.php">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link nextt" href="#">Next</a></li>
								</ul>
							</nav>
						</div> -->
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-12">
					<?php
					include 'sidebar.php';
					?>
				</div><!------col-4-end--->



			</div>
		</div>
	</div>
	<!-- Trending Post End -->		
	<!-- Blog Post Carousel -->
	
	<!-- Blog Post End -->
	<!-- Post Grid Style -->

</div>    
<!-- Footer End-->
<?php
include 'footer.php';
?>