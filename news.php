<?php include "config/db.conf.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Samira</title>
<?php include "template/header.php" ?>
<link rel="stylesheet" type="text/css" href="assets/styles/news.css">
<link rel="stylesheet" type="text/css" href="assets/styles/news_responsive.css">
</head>
<body>
<style media="screen">
	.blog_post{
		display:inline-block;
	}
</style>
<div class="super_container">

	<!-- Header -->

	<?php include "template/header-html.php"  ?>

	<!-- Menu -->

		<?php include "template/menu.php"  ?>


	<!-- Home -->

	<div class="home">
		<!-- Image credit: https://unsplash.com/@christoph -->
		<div  style="background-image: url(assets/images/news.jpg)" class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/news.jpg" data-speed="0.8"></div>
		<div class="home_content">
			<div class="home_subtitle">แนะนำ</div>
			<div class="home_title"><?php echo __NAME__ ?></div>
		</div>
	</div>

	<!-- Search Bar -->


	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">

					<div class="blog_post_container">

						<!-- Blog Post - Image Top -->
						<div class="blog_post blog_image_top magic_up">
							<div class="blog_image"><img src="assets/images/blog_1.jpg" alt=""></div>
							<div class="blog_post_content">
								<div class="blog_post_category">hotel</div>
								<div class="blog_post_title"><a href="#">A new Swimming Pool</a></div>
								<div class="blog_post_text">
									<p>Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo ligula.</p>
								</div>
								<a href="#" class="button_container blog_button ml-auto"><div class="button text-center"><span>Read More</span></div></a>
							</div>
						</div>
						<div class="blog_post blog_image_top magic_up">
							<div class="blog_image"><img src="assets/images/blog_1.jpg" alt=""></div>
							<div class="blog_post_content">
								<div class="blog_post_category">hotel</div>
								<div class="blog_post_title"><a href="#">A new Swimming Pool</a></div>
								<div class="blog_post_text">
									<p>Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo ligula.</p>
								</div>
								<a href="#" class="button_container blog_button ml-auto"><div class="button text-center"><span>Read More</span></div></a>
							</div>
						</div>
						<div class="blog_post blog_image_top magic_up">
							<div class="blog_image"><img src="assets/images/blog_1.jpg" alt=""></div>
							<div class="blog_post_content">
								<div class="blog_post_category">hotel</div>
								<div class="blog_post_title"><a href="#">A new Swimming Pool</a></div>
								<div class="blog_post_text">
									<p>Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo ligula.</p>
								</div>
								<a href="#" class="button_container blog_button ml-auto"><div class="button text-center"><span>Read More</span></div></a>
							</div>
						</div>
						<div class="blog_post blog_image_top magic_up">
							<div class="blog_image"><img src="assets/images/blog_1.jpg" alt=""></div>
							<div class="blog_post_content">
								<div class="blog_post_category">hotel</div>
								<div class="blog_post_title"><a href="#">A new Swimming Pool</a></div>
								<div class="blog_post_text">
									<p>Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo ligula.</p>
								</div>
								<a href="#" class="button_container blog_button ml-auto"><div class="button text-center"><span>Read More</span></div></a>
							</div>
						</div>
						<div class="blog_post blog_image_top magic_up">
							<div class="blog_image"><img src="assets/images/blog_1.jpg" alt=""></div>
							<div class="blog_post_content">
								<div class="blog_post_category">hotel</div>
								<div class="blog_post_title"><a href="#">A new Swimming Pool</a></div>
								<div class="blog_post_text">
									<p>Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo ligula.</p>
								</div>
								<a href="#" class="button_container blog_button ml-auto"><div class="button text-center"><span>Read More</span></div></a>
							</div>
						</div>


					</div>

				</div>
			</div>

		</div>
	</div>

	<!-- Newsletter -->

	<!-- <div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="newsletter_content">
						<div class="section_title_container">
							<div class="section_subtitle">luxury resort</div>
							<div class="section_title"><h2>Our Newsletter</h2></div>
						</div>
						<div class="newsletter_text">
							<p>Praesent fermentum ligula in dui imperdiet, vel tempus nulla ultricies. Phasellus at commodo ligula. Nullam molestie volutp at sapien.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="newsletter_form_container">
						<form action="#" id="newsletter_form" class="newsletter_form">
							<input type="email" class="newsletter_input" placeholder="Your e-mail" required="required">
							<button class="newsletter_button"><span>Subscribe</span></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="newsletter_border_container"><div class="container"><div class="row border_row"><div class="col"><div class="newsetter_border"></div></div></div></div></div>
	</div> -->

	<!-- Footer -->
	<?php include "template/footer.php" ?>
	</body>
	</html>
