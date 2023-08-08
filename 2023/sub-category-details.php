<?php
include 'header.php';
if(!isset($_GET['id']) || empty($_GET['id'])) {
	header('Location: index.php');exit();
}
$id = base64_decode($_GET['id']);
// echo $id;
$q = "SELECT `mch_sub_categories`.*, `mch_categories`.`name` AS `category_name`, `mch_categories`.`id` AS `category_id` FROM `mch_sub_categories` LEFT JOIN `mch_categories` ON `mch_categories`.`id` = `mch_sub_categories`.`category_id` WHERE `mch_sub_categories`.`is_active` = 1 AND `mch_sub_categories`.`id` = $id";
$res = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($res);

$q3 = "SELECT * FROM `mch_sub_category_images` WHERE `sub_category_id` = '".$row['id']."'";
$res3 = mysqli_query($conn, $q3);
$row3 = mysqli_fetch_assoc($res3);
// print_r($row3);
?>
    <!-- header END -->
    <!-- Content -->
    <div class="page-content bg-white">
		<!-- Post Standart -->
		<div class="section-full content-inner bg-white">
			<div class="container">
				<div class="row">					
					<div class="col-lg-8 col-md-8 col-sm-12 col-12">
						<div class="blog-post blog-single sidebar">
							<div class="dlab-post-info">
								<!-- <div class="dlab-post-meta">
									<ul>
										<li class="post-author"><span>by</span> <a href="#">Dr Ms Asmita Chhabra</a></li>
										<li class="post-category">in <a href="javascript:void(0);">Diabetes,</a>--  <a href="javascript:void(0);">fashion</a> --</li>
										<li class="post-date">at <span>2nd Sep, 2020</span></li>
									</ul>
								</div> -->
								<h2 class="title"><?php echo $row['name']; ?></h2>
								<?php if(strtolower($row['category_name']) != 'video') { ?>
								<div class="dlab-post-media">
									<img src="../uploads/assets/uploaded_data/subcategory_img/<?php echo $row3['image']; ?>">
									<!-- <a href="javascript:;"><img src="images/blog/large/pic1.jpg" alt=""></a> -->
								</div>
								<?php } else { ?>
								<?php if(!empty($row['video_url'])) { ?>
								<div class="dlab-post-media maigrain">
									<iframe width="100%" height="315" src="<?php echo $row['video_url']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
									<!-- <img src="images/blog/blog-lg/maigrain.jpg"> -->
									<!-- <a href="javascript:;"><img src="images/blog/large/pic1.jpg" alt=""></a> -->
								</div>
								<?php } else { $q5 = "SELECT `video` FROM `mch_sub_category_images` WHERE `sub_category_id` = '".$row['id']."' AND `video` IS NOT NULL";
									$res5 = mysqli_query($conn, $q5);
									$row5 = mysqli_fetch_assoc($res5); ?>
									<video width="100%" controls="">
								        <source src="../uploads/assets/uploaded_data/subcategory_img/<?php echo $row5['video']; ?>" type="video/mp4">
								    </video>
								<?php } } ?>
								<div class="dlab-post-text text">
									<div class="readmre1"> 
										<?php echo $row['description']; ?>
									</div>
									<!-- <div class="wp-block-image">
										<figure class="alignright">
											<img src="images/gallery/pic1.jpg" width="400" alt="">
										</figure>
									</div>
									<p>Nullam hendreri rhoncus turpis, sit amet feugiat arcu efficitur ut. Phasellus blandit, diam sed tinci dunt dignissim, enim metus vulputate libero.</p>
									<p>Eget dignissim dolor nunc in metus. Duis suscipit lacus quis facilisis venenatis, assa dapibus quam.</p>
									<p>Nid dignissim neque mi id enim. Maecenas gravi odio et suscipit euismod, aortor urna scele risque ante, facilisis purus purus sodales arcu. </p>
									<p>Aenean vitae massa sit amet mi scipit scelerisque risus. Aliquam pretium sit amet nunc ut ligula.</p>
									<p>Cras ac erat sapien. Etiam porta, arcu sed scelerisque dapibus, orci felis tincidunt tellus, at bibendum ex velit ac dolor. Aenean auctor, lectus laoreet efficitur dapibus, orci nulla ultrices risus, sed olutpat nisl nulla at felis. Integer ligula risus, ultricies eu velit non, rutrum consectetur neque. Sed ullamcorper hendrerit. </p>
									<p>Nulla ultrices diam at odio malesuada lacinia. Fusce eget posuere purus. Donec accumsan vehicula mi, id imperdiet nulla ornare eu. Orci varius natoque penatibus et magnis dis parturient scetur ridiculus mus. </p>
									<p>Praesent vehicula neque et augue consectetur placerat. Ut pellente euismod sapien eget venenatis. Proin massa lacus, dapibus a scelerisque a, molestie sit amet mauris. Cras maximus lectus quis orci feu giat, at tristique velit bibendum. Etiam augue arcu, cursus id egestas ut, viverra ipsum sit amet aliquet tempus. </p> -->
								</div>
								<div class="post-footer">
									<div class="dlab-post-meta">
										<!-- <span class="title">TAGS : </span>
										<ul class="tag-list">
											<li class="post-tag"><a href="#">#video</a></li>
											<li class="post-tag"><a href="#">#Blog</a></li>
											<li class="post-tag"><a href="#">#Instagram</a></li>
											<li class="post-tag"><a href="#">#Image</a></li>
										</ul> -->
									</div>
									<div class="share-post">
										<ul class="list-inline m-b0">
											<li><a href="https://www.facebook.com/profile.php?id=100063935207754" class="btn sharp radius-xl facebook"><i class="fa fa-facebook"></i></a></li>
											<li><a href="https://twitter.com/mch_drpankaj?lang=en" class="btn sharp radius-xl twitter"><i class="fa fa-twitter"></i></a></li>
											<!-- <li><a href="javascript:void(0);" class="btn sharp radius-xl instagram"><i class="fa fa-instagram"></i></a></li>
											<li><a href="javascript:void(0);" class="btn sharp radius-xl linkedin"><i class="fa fa-linkedin"></i></a></li> -->
										</ul>
									</div>
								</div>
								<!-- <div class="share-post">
									<ul class="slide-social">
										<li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-pinterest"></i></a></li>
									</ul>
								</div> -->
							</div>
						</div>
					</div><!------col-8-end--->

					<div class="col-lg-4 col-md-4 col-sm-12 col-12">
						<?php
						include 'sidebar.php';
						?>
					</div><!------col-4-end--->
				</div>
			</div>
		</div>
		<!-- Post Standart End -->
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