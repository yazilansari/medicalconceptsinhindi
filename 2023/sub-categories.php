<?php 
include 'header.php';
if(!isset($_GET['id']) || empty($_GET['id'])) {
	header('Location: index.php');exit();
}
$id = base64_decode($_GET['id']);
// echo $id;
$q = "SELECT * FROM `mch_categories` WHERE `is_active` = 1 AND `id` = $id";
$res = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($res);
// echo strtolower($row['name']);die();
?>
    <!-- header END -->

	<!-- Content -->
	<div class="page-content">
		<!-- Trending Post -->
		<div class="section-full content-inner-1">
			<div class="container">
				<div class="section-head text-center">
					<span><?php echo strtolower($row['name']); ?></span>
				</div>
				<div class="row blog-box-style1">
					<div class="col-md-8 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInUp;">
						<div class="row">
							<?php $q2 = "SELECT * FROM `mch_sub_categories` WHERE `is_active` = 1 AND `category_id` = $id ORDER BY `mch_sub_categories`.`id` DESC";
								$res2 = mysqli_query($conn, $q2);
								if(mysqli_num_rows($res2) > 0) {
								while ($row2 = mysqli_fetch_assoc($res2)) { 
									$q3 = "SELECT * FROM `mch_sub_category_images` WHERE `sub_category_id` = '".$row2['id']."'";
									$res3 = mysqli_query($conn, $q3); ?>
									<div class="col-md-6 col-sm-12">
										<div class="blog-card blog-grid overlay-post left"> 
										<?php if(mysqli_num_rows($res3) > 0) { 
											$row3 = mysqli_fetch_assoc($res3); ?>
											<div class="dlab-post-media">
												<?php if(strtolower($row['name']) != 'e journal' && strtolower($row['name']) != 'e book') { ?>
													<img src="../uploads/assets/uploaded_data/subcategory_img/<?php echo $row3['image']; ?>" alt="">
												<?php } else { ?>
													<img src="../uploads/assets/uploaded_data/subcategory_img/<?php echo $row2['thumbnail_image']; ?>" alt="">
												<?php } ?>
											</div>
										 <?php } ?>
											<div class="blog-card-info">
												<div class="dlab-post-meta">
													<ul>
														<?php if(strtolower($row['name']) != 'e journal' && strtolower($row['name']) != 'e book') { ?>
															<li class="post-tag"><a href="sub-category-details.php?id=<?php echo base64_encode($row2['id']); ?>"><?php echo strtoupper($row['name']); ?></a></li>
														<?php } else { ?>
															<li class="post-tag"><a href="ebook-ejournal-details.php?id=<?php echo base64_encode($row2['id']); ?>&type=<?php echo base64_encode(strtolower(str_replace(' ', '', $row['name']))); ?>"><?php echo strtoupper($row['name']); ?></a></li>
														<?php } ?>
													</ul>
												</div>
												<?php if(strtolower($row['name']) != 'e journal' && strtolower($row['name']) != 'e book') { ?>
													<h4 class="title"><a href="sub-category-details.php?id=<?php echo base64_encode($row2['id']); ?>"><?php echo $row2['name']; ?></a></h4>
												<?php } else { ?>
													<h4 class="title"><a href="ebook-ejournal-details.php?id=<?php echo base64_encode($row2['id']); ?>&type=<?php echo base64_encode(strtolower(str_replace(' ', '', $row['name']))); ?>"><?php echo $row2['name']; ?></a></h4>
												<?php } ?>

											</div>
										</div>
									</div>
							<?php } } ?>
							<!-- <div class="col-md-6 col-sm-12">
								<div class="blog-card blog-grid overlay-post left">
									<div class="dlab-post-media">
										<img src="images/category/idli.jpg" alt="">
									</div>
									<div class="blog-card-info">
										<div class="dlab-post-meta">
											<ul>
												<li class="post-tag"><a href="idli.php">TEXT</a></li>
											</ul>
										</div>
										<h4 class="title"><a href="idli.php">इडली</a></h4>
									</div>
								</div>
							</div> --><!---1End-->

							<!-- <div class="col-md-6 col-sm-12">
								<div class="blog-card blog-grid overlay-post left"> 
									<div class="dlab-post-media">
										<img src="images/category/veg.jpg" alt="">
									</div>
									<div class="blog-card-info">
										<div class="dlab-post-meta">
											<ul>
												<li class="post-tag"><a href="veg.php">TEXT</a></li>
											</ul>
										</div>
										<h4 class="title"><a href="veg.php">विनम्र निवेदन</a></h4>
									</div>
								</div>
							</div> -->
							<!----2End---->


							

							<!-- <div class="col-md-6 col-sm-12">
								<div class="blog-card blog-grid overlay-post left"> 
									<div class="dlab-post-media">
										<img src="images/video-post/adrenal-glands.jpg" alt="">
									</div>
									<div class="blog-card-info">
										<div class="dlab-post-meta">
											<ul>
												<li class="post-tag"><a href="#">VIDEO</a></li>
											</ul>
										</div>
										<h4 class="title"><a href="#">Adrenal Glands Effects Of GC On Resisting Stress, Inflammation Allergy And Blood Cells</a></h4>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="blog-card blog-grid overlay-post left">
									<div class="dlab-post-media">
										<img src="images/video-post/effects.jpg" alt="">
									</div>
									<div class="blog-card-info">
										<div class="dlab-post-meta">
											<ul>
												<li class="post-tag"><a href="#">VIDEO</a></li>
											</ul>
										</div>
										<h4 class="title"><a href="#">Adrenal Glands Physiological Effects Of GC On Intermediary Metabolism</a></h4>
									</div>
								</div>
							</div> -->
							<!----5End---->



							<!-- <div class="col-md-12">
								<nav aria-label="Page navigation example">
									<ul class="pagination">
										<li class="page-item"><a class="page-link prevs" href="#">Previous</a></li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
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
    <!-- Content END-->
	<!-- Footer -->
<?php 
include 'footer.php'
?>