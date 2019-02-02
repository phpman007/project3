<?php error_reporting(0); ?>
<?php include "config/db.conf.php" ?>
<?php include "connection/connection.php" ?>

<?php
unset($_SESSION['BOOKED']);

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
        <div class="home_subtitle">ทำรายการเรียบร้อย</div>
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

  				<!-- Intro Content -->
  				<div class="col-lg-12 intro_col">
                    <h3>ลูกค้าได้บันทึกรายการเรียบร้อยแล้ว</h3> <hr>
                    <h3>ขอบพระคุณที่ใช้บริการ <small>    หมายเลขบิลที่ : <?php echo sprintf('%05d', $_GET['id']) ?></small> </h3><br>
                    <a href="history.php">ไปที่รายการที่เคยจอง</a>
  				</div>


  			</div>
  		</div>
  	</div>

  	<!-- Milestones -->
	<!-- Footer -->
<?php include "template/footer.php" ?>
</body>
</html>
