<?php include "config/db.conf.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Samira</title>
<?php include "template/header.php" ?>
<link rel="stylesheet" type="text/css" href="assets/styles/contact.css">
<link rel="stylesheet" type="text/css" href="assets/styles/contact_responsive.css">
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
			<div class="home_subtitle">ติดต่อเรา</div>
			<div class="home_title"><?php echo __NAME__ ?></div>
		</div>
	</div>
	<!-- Search Bar -->

	<!-- <div class="search_bar">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="search_bar_container">
						<form action="#" id="search_bar_form" class="search_bar_form d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-between clearfix">
							<div>
								<select class="search_form_select">
									<option disabled selected>Select Arrival Date</option>
									<option>07/15/2018</option>
									<option>07/22/2018</option>
									<option>07/29/2018</option>
								</select>
							</div>
							<div>
								<select class="search_form_select">
									<option disabled selected>Select Departure Date</option>
									<option>07/15/2018</option>
									<option>07/22/2018</option>
									<option>07/29/2018</option>
								</select>
							</div>
							<div>
								<select class="search_form_select">
									<option disabled selected>Select Rooms</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
							</div>
							<div><button class="search_bar_button">Request a Quote</button></div>
						</form>
						<div></div>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<!-- Contact -->

	<div class="contact">
		<div class="container">
			<div class="row">

				<!-- Contact Content -->
				<div class="col-lg-4">
					<div class="contact_content">
						<div class="section_title_container">
							<div class="section_subtitle">hotel</div>
							<div class="section_title"><h3>Say Hello</h3></div>
						</div>
						<div class="contact_text">
							<p>Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo ligula.  Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo.</p>
						</div>
						<div class="contact_info">
							<ul>
								<li>1481 Creekside Lane Avila Beach, CA 931</li>
								<li>+53 345 7953 32453</li>
								<li>yourmail@gmail.com</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Contact Form -->
				<div class="col-lg-8">
					<div class="contact_form_container">
						<form action="#" id="contact_form" class="contact_form clearfix">
							<div><input type="text" class="contact_input" placeholder="Your Name" required="required"></div>
							<div><input type="email" class="contact_input" placeholder="Your E-mail" required="required"></div>
							<input type="text" class="contact_input" placeholder="Subject">
							<textarea class="contact_input contact_textarea" placeholder="Message" required="required"></textarea>
							<button class="contact_button"><span>Subscribe</span></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Google Map -->

	<div class="contact_map">
		<!-- Google Map -->
		<div class="map">
			<div id="google_map" class="google_map">
				<div class="map_container">
					<div id="map"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->



	<!-- Footer -->

<?php include "template/footer.php" ?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="assets/js/contact.js"></script>
</body>
</html>
