<?php error_reporting(0); ?>
<?php include "config/db.conf.php" ?>
<?php include "connection/connection.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Samira</title>
<?php include "template/header.php" ?>
<link rel="stylesheet" type="text/css" href="assets/styles/rooms.css">
<link rel="stylesheet" type="text/css" href="assets/styles/rooms_responsive.css">
</head>
<body>
	<?php
		$rooms = sprintf('SELECT * FROM rooms ORDER BY RAND() LIMIT 5');
		$rooms = $con->query($rooms);
	 ?>
<div class="super_container">

	<!-- Header -->

	<?php include "template/header-html.php"  ?>

	<!-- Menu -->

		<?php include "template/menu.php"  ?>


	<!-- Home -->

	<div class="home">
		<!-- Image credit: https://unsplash.com/@christoph -->
		<div style="background-image: url(assets/images/news.jpg)" class="parallax_background parallax-window" data-parallax="scroll" data-image-src="assets/images/rooms.jpg" data-speed="0.8"></div>
		<div class="home_content">
			<div class="home_subtitle">ห้องเช่า</div>
			<div class="home_title"><?php echo __NAME__ ?></div>
		</div>
	</div>

	<!-- Search Bar -->

	<div class="search_bar">
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
	</div>

	<!-- Rooms -->

	<div class="rooms">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle">รายการห้องทั้งหมด</div>
						<div class="section_title"><h2>เลือกห้องที่ต้องการ</h2></div>
					</div>
				</div>
			</div>
			<div class="row room_row">
				<?php while ($room = $rooms->fetch_object()) {?>
				<!-- Room -->
				<div class="col-lg-4 room_col magic_up">
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


	<!-- Footer -->
	<?php include "template/footer.php" ?>
	</body>
	</html>
