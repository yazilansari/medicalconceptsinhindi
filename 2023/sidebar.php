

<div class="side-bar sticky-top">
<div class="widget widget-author wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
<h6 class="widget-title">About Me</h6>
<div class="author-profile-info">
<!-- <div class="author-profile-pic">	
<a href="javascript:void(0);">
<img src="images/author.jpg" alt="Profile Pic" width="130" height="130">
</a>
</div> -->
<div class="author-profile-content">
<h6 class="title">विनम्र निवेदन</h6>
<p>MCH PRAKASHAN का उद्दश्य पाठकों को स्वास्थ्य एवं चिकित्सा संबंधी जानकारियों को हिंदी में अवगत कराना है।..</p>
<a href="about-me.php" class="readme">Read More</a>
<ul class="social-icon m-b0 text-center">
<li><a href="https://www.facebook.com/profile.php?id=100063935207754" class="btn radius-xl"><i class="fa fa-facebook"></i></a></li>
<li><a href="https://twitter.com/mch_drpankaj?lang=en" class="btn radius-xl"><i class="fa fa-twitter"></i></a></li>
<!-- <li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-linkedin"></i></a></li>
<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-pinterest-p"></i></a></li>
<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-youtube-play"></i></a></li> -->
</ul>
</div>
</div>
</div><!-----About-Me--->
<div class="widget widget-author wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
<h6 class="widget-title">Vision & Mission</h6>
<div class="author-profile-info">
<!-- <div class="author-profile-pic">	
<a href="javascript:void(0);">
<img src="images/author.jpg" alt="Profile Pic" width="130" height="130">
</a>
</div> -->
<div class="author-profile-content">
<h6 class="title">Vision</h6>
<p>Realizing the Full Potential of the Digital Space, Universal Access to Research and Education related to Medical Concepts, Full Participation in spreading Awareness in our Mother language. To Drive a New Era of Knowledge, Self-Awareness, and Good Health !</p><br>

<h6 class="title">Mission</h6>
<p>Endorsement of the Most Complex Medical Concepts in the Easiest Way.</p>
<!-- <a href="#" class="readme">Read More</a> -->
<!-- <ul class="social-icon m-b0">
<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-instagram"></i></a></li>
<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-twitter"></i></a></li>
<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-facebook"></i></a></li>
<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-pinterest-p"></i></a></li>
<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-youtube-play"></i></a></li>
</ul> -->
</div>
</div>
</div><!----Vision--&--Mission-end--->

<div class="widget recent-posts-entry wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">
	<h6 class="widget-title"><span>Recent Posts</span></h6>
	<div class="widget-post-bx">
		<?php $q4 = "SELECT * FROM `mch_posts` WHERE `is_active` = 1 AND `category_id` = $id ORDER BY `id` DESC";
				$res4 = mysqli_query($conn, $q4);
				if(mysqli_num_rows($res4) > 0) {
					while ($row4 = mysqli_fetch_assoc($res4)) { ?>
		<div class="widget-post clearfix">
			<div class="dlab-post-media">
				<img src="../uploads/assets/uploaded_data/posts_thumbnail/<?php echo $row4['sub_category_id'].'/'.$row4['thumbnail_image']; ?>" alt="">
			</div>
			<div class="dlab-post-info">
				<div class="dlab-post-meta">
					<ul>
						<li class="post-category"><a href="javascript:void(0);"><?php echo strtoupper($row['name']); ?></a></li>
						<li class="post-date"> <span><?php echo date('d M, Y', strtotime($row4['date'])); ?></span></li>
					</ul>
				</div>
				<h6 class="post-title">
					<a href="post-details.php?id=<?php echo base64_encode($row4['id']); ?>"><?php echo $row4['title']; ?></a>
				</h6>
			</div>
		</div>
		<?php } } else { $q6 = "SELECT `mch_posts`.*, `mch_categories`.`name` AS `category_name` FROM `mch_posts` LEFT JOIN `mch_categories` ON `mch_categories`.`id` = `mch_posts`.`category_id` WHERE `mch_posts`.`is_active` = 1 AND `mch_posts`.`category_id` = '".$row['category_id']."' AND `mch_posts`.`sub_category_id` = $id ORDER BY `mch_posts`.`id` DESC"; //echo $q6;
				$res6 = mysqli_query($conn, $q6);
				if(mysqli_num_rows($res6) > 0) {
					while ($row6 = mysqli_fetch_assoc($res6)) { ?>
				<div class="widget-post clearfix">
					<div class="dlab-post-media">
						<img src="../uploads/assets/uploaded_data/posts_thumbnail/<?php echo $row6['sub_category_id'].'/'.$row6['thumbnail_image']; ?>" alt="">
					</div>
					<div class="dlab-post-info">
						<div class="dlab-post-meta">
							<ul>
								<li class="post-category"><a href="javascript:void(0);"><?php echo strtoupper($row['category_name']); ?></a></li>
								<li class="post-date"> <span><?php echo date('d M, Y', strtotime($row6['date'])); ?></span></li>
							</ul>
						</div>
						<h6 class="post-title">
							<a href="post-details.php?id=<?php echo base64_encode($row6['id']); ?>"><?php echo $row6['title']; ?></a>
						</h6>
					</div>
				</div>
		<?php } } else { ?>
			<h6 style="text-align: center;">No Post Found.</h6>
		<?php } } ?>
	<!-- <div class="widget-post clearfix">
	<div class="dlab-post-media">
	<img src="images/blog/recent-blog/pic2.jpg" alt="">
	</div>
	<div class="dlab-post-info">
	<div class="dlab-post-meta">
	<ul>
	<li class="post-category"><a href="javascript:void(0);">Video</a></li>
	<li class="post-date">at <span>18 Oct, 2021</span></li>
	</ul>
	</div>
	<h6 class="post-title"><a href="antiplatelet4.php">Antiplatelet Therapy 4</a></h6>
	</div>
	</div> -->
	<!-- <div class="widget-post clearfix">
	<div class="dlab-post-media">
	<img src="images/blog/recent-blog/lungexercise1.jpg" alt="">
	</div>
	<div class="dlab-post-info">
	<div class="dlab-post-meta">
	<ul>
	<li class="post-category"><a href="javascript:void(0);">Text</a></li>
	<li class="post-date">at <span>13 May, 2022</span></li>
	</ul>
	</div>
	<h6 class="post-title"><a href="lung-exercise.php">Lung Function Tests</a></h6>
	</div>
	</div> -->
	</div>
</div>
<!-- <div class="widget widget_categories wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
<h6 class="widget-title"><span>Categories</span></h6>
<ul>
<li><a href="category.html">Culture </a> <span class="badge">11</span> </li>
<li><a href="category.html">Lifestyle </a> <span class="badge">08</span></li>
<li><a href="category.html">Fashion </a> <span class="badge">14</span></li>
<li><a href="category.html">Food & Health </a> <span class="badge">05</span></li>
<li><a href="category.html">Travel </a> <span class="badge">10</span></li>
</ul>
</div> -->
<!----
<div class="widget widget_categories wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
<h6 class="widget-title"><span>EDUCATION</span></h6>
<ul>
<li><a href="#"> Health Education  </a> <span class="badge"><i class="fa fa-globe fa-lg" aria-hidden="true"></i></span> </li>
<li><a href="#"> Medical Education  </a> <span class="badge"><i class="fa fa-globe fa-lg" aria-hidden="true"></i></span></li>
</ul>
</div>-------->

<!-- <div class="widget widget-vlog wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
<h6 class="widget-title"><span>Latest Vlog</span></h6>
<div class="widget-carousel owl-carousel owl-dots-style1 owl-none owl-theme">
<div class="item">
<div class="post-box">
<img src="images/video-post/pic1.jpg" alt="">
<a href="https://www.youtube.com/watch?v=Dj6CKxQue7U" class="popup-youtube video"><i class="fa fa-youtube-play"></i></a>
</div>
</div>
<div class="item">
<div class="post-box">
<img src="images/video-post/pic2.jpg" alt="">
<a href="https://www.youtube.com/watch?v=Dj6CKxQue7U" class="popup-youtube video"><i class="fa fa-youtube-play"></i></a>
</div>
</div>
<div class="item">
<div class="post-box">
<img src="images/video-post/pic3.jpg" alt="">
<a href="https://www.youtube.com/watch?v=Dj6CKxQue7U" class="popup-youtube video"><i class="fa fa-youtube-play"></i></a>
</div>
</div>
</div>
</div> -->
</div>

