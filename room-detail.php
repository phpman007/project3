<?php error_reporting(0); ?>
<?php include "config/db.conf.php" ?>
<?php include "connection/connection.php" ?>


<?php

$article = sprintf('SELECT * FROM rooms WHERE id = "'. $_GET['id'] .'" LIMIT 1');
$article = $con->query($article)->fetch_object();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Samira</title>
<?php include "template/header.php" ?>
<link rel="stylesheet" type="text/css" href="assets/styles/rooms.css">
<link rel="stylesheet" type="text/css" href="assets/styles/rooms_responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<?php include "template/header-html.php"  ?>

	<!-- Menu -->

		<?php include "template/menu.php"  ?>


    <!-- Home -->

    <div class="home">
      <!-- Image credit: https://unsplash.com/@christoph -->
      <div style="background-image: url(assets/images/rooms.jpg)" class="parallax_background parallax-window" data-parallax="scroll" data-image-src="assets/images/rooms.jpg" data-speed="0.8"></div>
      <div class="home_content">
        <div class="home_subtitle">แนะนำ</div>
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

    <!-- Rooms -->



  	<!-- Intro -->

  	<div class="intro">
  		<div class="container">
  			<div class="row">

  				<div class="col-lg-4 ">
                    <img src="backoffice/<?php echo $article->thumbnail ?>" alt="" style="max-width:100%;object-fit:cover">
                </div>
  				<!-- Intro Content -->
  				<div class="col-lg-8 ">
                    <h3><?php echo $article->room_name ?></h3><small><?php


                    $type = $con->query(sprintf("SELECT * FROM type_room WHERE id = '%s'", $article->type_id))->fetch_object();

                    echo "ประเภทห้อง : ".$type->name;
                     ?></small>
                     <br><hr>
                     <div class="row" style="padding:15px 0">
                         <div class="col-md-3">
                             ราคา/วัน : <?php echo number_format($article->price_day,0) ?>
                         </div>
                         <div class="col-md-3">
                             ราคา/เดือน : <?php echo number_format($article->price_month,0) ?>
                         </div>
                         <div class="col-md-3">
                             ค่าน้ำ/หน่วย : <?php echo number_format($article->meter_water,0) ?>
                         </div>
                         <div class="col-md-3">
                             ค่าไฟฟ้า/หน่วย : <?php echo number_format($article->meter_light,0) ?>
                         </div>
                         <div class="col-md-6">
                             โทรติดต่อ : <?php echo __TEL__ ?>
                         </div>
                         <div class="col-md-6">
                             อีเมล : <?php echo __EMAIL__ ?>
                         </div>
                     </div>
                     <h4>รายละเอียดห้อง</h4>
  					<?php echo $article->remark ?>
                    <a href="booking.php?id=<?php echo $article->id ?>" class="button_container intro_button"><div class="button text-center"><span>จองห้องพัก</span></div></a>
  				</div>


  			</div>


  		</div>
  	</div>
    <div class="gallery">
		<div class="gallery_slider_container">

			<!-- Gallery Slider -->
			<div class="owl-carousel owl-theme gallery_slider magic_up">
				<?php
				$photo_all = $con->query('SELECT * FROM room_photos WHERE room_photos.room_id = "'. $_GET['id'] .'" order by RAND()');
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

  	<!-- Milestones -->
	<!-- Footer -->
<?php include "template/footer.php" ?>
</body>
</html>
