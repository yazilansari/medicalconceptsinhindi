<?php
include'header.php';
?>
    <!-- header END -->
	<!-- Content -->
	<div class="page-content bg-white">
		<!-- Blog Post -->
		<div class="section-full bg-white content-inner">
			<div class="container">
				<div class="section-head text-center">
					<h6 class="title-head text-uppercase"><span>Gallery</span></h6>
				</div>
				<div class="row">
					<!-- <div class="col-lg-12 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
						<div class="dlab-post-media m-b50">
							<a href="post-standart.html"><img src="images/about/pic4.jpg" alt=""></a>
						</div>
					</div> -->
					<!--- ======Gallery===== --->
					<?php $q = "SELECT * FROM `mch_gallery` WHERE `is_active` = 1 ORDER BY `id` DESC";
						$res = mysqli_query($conn, $q);
						if(mysqli_num_rows($res) > 0) {
						while ($row = mysqli_fetch_assoc($res)) { ?>	
							<div class="col-lg-4">
								<div class="gallery1"> 						
									<p><?php echo $row['title']; ?></p>						
									<a href="../uploads/assets/uploaded_data/gallery_img/<?php echo $row['image']; ?>" data-lightbox="example-set"><img src="../uploads/assets/uploaded_data/gallery_img/<?php echo $row['image']; ?>"></a>							
								</div>
							</div>
					<?php } } ?>
				</div>
			</div>
		</div>
		<!-- Blog Post End -->
		<!-- Instagram Post Carousel -->
		<!-- <div class="section-full insta-post-carousel owl-carousel owl-none wow fadeIn lightgallery" data-wow-duration="2s" data-wow-delay="0.6s">
			<div class="item">
				<span data-exthumbimage="images/blog/card/small/pic1.jpg" data-src="images/blog/card/full-img/pic1.jpg" class="check-km dlab-img-effect" title="Title Come Here">		
					<img src="images/blog/card/pic1.jpg" alt="">
				</span>
			</div>
			<div class="item">
				<span data-exthumbimage="images/blog/card/small/pic2.jpg" data-src="images/blog/card/full-img/pic2.jpg" class="check-km dlab-img-effect" title="Title Come Here">		
					<img src="images/blog/card/pic2.jpg" alt="">
				</span>
			</div>
			<div class="item">
				<span data-exthumbimage="images/blog/card/small/pic3.jpg" data-src="images/blog/card/full-img/pic3.jpg" class="check-km dlab-img-effect" title="Title Come Here">		
					<img src="images/blog/card/pic3.jpg" alt="">
				</span>
			</div>
			<div class="item">
				<span data-exthumbimage="images/blog/card/small/pic4.jpg" data-src="images/blog/card/full-img/pic4.jpg" class="check-km dlab-img-effect" title="Title Come Here">		
					<img src="images/blog/card/pic4.jpg" alt="">
				</span>
			</div>
			<div class="item">
				<span data-exthumbimage="images/blog/card/small/pic5.jpg" data-src="images/blog/card/full-img/pic5.jpg" class="check-km dlab-img-effect" title="Title Come Here">		
					<img src="images/blog/card/pic5.jpg" alt="">
				</span>
			</div>
			<div class="item">
				<span data-exthumbimage="images/blog/card/small/pic6.jpg" data-src="images/blog/card/full-img/pic6.jpg" class="check-km dlab-img-effect" title="Title Come Here">		
					<img src="images/blog/card/pic6.jpg" alt="">
				</span>
			</div>
			<div class="item">
				<span data-exthumbimage="images/blog/card/small/pic7.jpg" data-src="images/blog/card/full-img/pic7.jpg" class="check-km dlab-img-effect" title="Title Come Here">		
					<img src="images/blog/card/pic7.jpg" alt="">
				</span>
			</div>
		</div> -->
		<!-- Blog Card Carousel End -->
    </div>
    <!-- Content END-->
	<!-- Footer -->
<?php
include 'footer.php';
?>