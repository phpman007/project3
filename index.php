<?php error_reporting(0); ?>
<?php include "config/db.conf.php" ?>
<?php include "connection/connection.php" ?>

<?php
	$rooms = sprintf('SELECT * FROM rooms ORDER BY RAND() LIMIT 5');
	$rooms = $con->query($rooms);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Samira</title>
<?php include "template/header.php" ?>

</head>
<body>

<div class="super_container">

	<!-- Header -->

	<?php include "template/header-html.php"  ?>

	<!-- Menu -->

		<?php include "template/menu.php"  ?>


	<!-- Home -->

	<div class="home">

		<!-- Home Slider -->
		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">

				<?php

				$slides = $con->query('SELECT * FROM slide ORDER BY id desc LIMIT 5 ');
				$num_slides = $slides;
				 ?>
				<!-- Slide -->
				<?php while($slide = $slides->fetch_object()) { ?>
				<div class="owl-item">
					<!-- Image credit: https://unsplash.com/@santtd -->
					<div class="background_image" style="background-image:url(backoffice/<?php echo $slide->image ?>)"></div>
					<div class="home_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content text-center">
										<div class="home_subtitle"><?php echo $slide->title_field ?></div>
										<div class="home_title"><?php echo $slide->text_field ?></div>
										<a href="<?php echo $slide->url ?>" class="button_container home_button"><div class="button text-center"><span>ดูเพิ่มเติม</span></div></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>



			</div>

			<!-- Home Slider Dots -->

			<div class="home_slider_dots">
				<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
					<?php
					$i = 0;
					$slides = $con->query('SELECT * FROM slide ORDER BY id desc LIMIT 5 ');
					while($num_slide = $slides->fetch_object()) { ?>
					<li class="home_slider_custom_dot <?php echo $i == 0 ? 'active' : '' ?>">0<?php echo ++$i ?></li>
					<?php } ?>
				</ul>
			</div>

		</div>
	</div>

	<!-- Search Bar -->

	<!-- <?php include "template/search-bar.php" ?> -->

	<!-- Intro -->

	<div class="intro">
		<div class="container">
			<div class="row row-lg-eq-height">

				<!-- Intro Content -->
				<div class="col-lg-5 intro_col">
					<div class="intro_container d-flex flex-column align-items-start justify-content-center magic_up">
						<div class="intro_content">
							<div class="section_title_container">
								<div class="section_subtitle">
									<?php

									// get Room 1
									$room = $rooms->fetch_object();

									$type = $con->query(sprintf("SELECT * FROM type_room WHERE id = '%s'", $room->type_id))->fetch_object();

									echo $type->name;
									 ?>
								</div>
								<div class="section_title"><h2><?php echo $room->room_name ?></h2></div>
							</div>
							<div class="intro_text">
								<p><?php echo $room->detail ?></p>
							</div>
							<div class="intro_link"><a href="room-detail.php?id=<?php echo $room->id ?>">ดูห้อง</a></div>
						</div>
					</div>
				</div>

				<!-- Intro Image -->
				<div class="col-lg-7 intro_col">
					<div class="intro_images magic_up">
						<?php

						$photos = $con->query(sprintf("SELECT * FROM room_photos WHERE room_id = '%s' ORDER BY RAND() LIMIT 3", $room->id));
						$i = 0 ;
						 ?>
						 <?php while($photo = $photos->fetch_object()) { ?>
						<div class="intro_<?php echo ++$i; ?> intro_img"><img src="backoffice\<?php echo $photo->destination ?>" alt=""></div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Big Room -->

	<div class="big_room">
		<div class="container-fluid">
			<div class="row row-xl-eq-height">
				<div class="col-xl-6 order-xl-1 order-2">
					<div class="big_room_slider_container">

						<!-- Big Room SLider -->
						<div class="owl-carousel owl-theme big_room_slider">
							<?php

							// get Room 1
							$room = $rooms->fetch_object();

							$photos = $con->query(sprintf("SELECT * FROM room_photos WHERE room_id = '%s'", $room->id));
							 ?>
							 <?php while($photo = $photos->fetch_object()) { ?>

							<div class="owl-item">
								<div class="background_image" style="background-image:url(backoffice/<?php echo $photo->destination ?>)"></div>
							</div>
							<!-- Slide -->
							<?php } ?>




						</div>

						<div class="big_room_slider_nav_container d-flex flex-row align-items-start justify-content-start">
							<div class="big_room_slider_prev big_room_slider_nav"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
							<div class="big_room_slider_next big_room_slider_nav"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 order-xl-2 order-1">
					<div class="big_room_content">
						<div class="big_room_content_inner magic_up">
							<div class="section_title_container">
								<div class="section_subtitle">
									<?php


									$type = $con->query(sprintf("SELECT * FROM type_room WHERE id = '%s'", $room->type_id))->fetch_object();

									echo $type->name;
									 ?>
								</div>
								<div class="section_title"><h2><?php echo $room->room_name ?></h2></div>
							</div>
							<div class="big_room_text">
								<p><?php echo $room->detail ?></p>
								<div class="intro_link"><a style="color:#fff" href="room-detail.php?id=<?php echo $room->id ?>">ดูห้อง</a></div>
							</div>
							<div class="testimonial">



							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Room -->

	<div class="rooms">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center magic_up">
						<div class="section_subtitle">รายการที่อาจสนใจ</div>
						<div class="section_title"><h2>เลือกห้อง</h2></div>
					</div>
				</div>
			</div>
			<div class="row room_row magic_up">
				<?php while($room = $rooms->fetch_object()) { ?>
				<!-- Room -->
				<div class="col-lg-4 room_col">
					<div class="room">
						<div class="room_image"><img src="backoffice/<?php echo $room->thumbnail ?>" ></div>
						<div class="room_content text-center">
							<div class="room_price"><?php echo number_format($room->price_day , 0) ?> / <span>วัน</span></div>
							<div class="room_type">
								<?php
								$type = $con->query(sprintf("SELECT * FROM type_room WHERE id = '%s'", $room->type_id))->fetch_object();

								echo $type->name;
								 ?>
							</div>
							<div class="room_title"><a href="rooms.html"><?php echo $room->room_name ?></a></div>
							<div class="room_text">
								<p><?php echo $room->detail ?></p>
							</div>
							<a href="room-detail.php?id=<?php echo $room->id ?>" class="button_container room_button"><div class="button text-center"><span>จองเลย</span></div></a>
						</div>
					</div>
				</div>
			<?php } ?>

			</div>
		</div>
	</div>

	<!-- Gallery -->

	<div class="gallery">
		<div class="gallery_slider_container">

			<!-- Gallery Slider -->
			<div class="owl-carousel owl-theme gallery_slider magic_up">
				<?php
				$photo_all = $con->query('SELECT room_photos.* FROM room_photos, rooms WHERE room_photos.room_id = rooms.id order by RAND() LIMIT 10');

				 ?>
				 <?php while($photo1 = $photo_all->fetch_object()) { ?>
				<div class="owl-item gallery_item">
					<div class="gallery_select d-flex flex-column align-items-center justify-content-center"><div>+</div></div>
					<a class="colorbox" href="backoffice/<?php echo $photo1->destination ?>"><img src="backoffice/<?php echo $photo1->destination ?>" alt=""></a>
				</div>
				<?php } ?>


			</div>

		</div>

		<!-- Nav -->
		<div class="gallery_slider_nav_container">
			<div class="container">
				<div class="row">
					<div class="col clearfix">
						<div class="gallery_slider_nav_content d-flex flex-row align-items-start justify-content-start">
							<div class="gallery_slider_prev gallery_slider_nav"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
							<div class="gallery_slider_next gallery_slider_nav"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Newsletter -->


	<!-- Footer -->
<?php include "template/footer.php" ?>
</body>
</html>
