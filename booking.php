<?php error_reporting(0); ?>
<?php include "config/db.conf.php" ?>
<?php include "connection/connection.php" ?>


<?php
$_SESSION['click_room'] = $_GET['id'];
if (empty($_SESSION['user'])) {
    header( "location: login.php" );
    exit(0);
}
$result = $_SESSION['BOOKED'];

$setID = array();


foreach ($_SESSION['BOOKED'] as $key => $value) {

    $setID[] = $value->id;

}

if(!in_array($_GET['id'], $setID)) {
    $results = $con->query(sprintf("SELECT * FROM rooms WHERE status = 'ว่าง' AND id = '%s'", $_GET['id']));

    if ($results->num_rows == 1) {
        $result[] = $results->fetch_object();
    }
}

if ($_GET['action'] =='remove') {
    foreach ($result as $key => $value) {
        if ($value->id == $_GET['id']) {
            unset($result[$key]);
        }
    }
}
$_SESSION['BOOKED'] = $result;


$user = $_SESSION['user'];

 ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
 <title>Samira</title>
 <?php include "template/header.php" ?>
 <link rel="stylesheet" type="text/css" href="assets/styles/bootstrap-datepicker.min.css">
 <link rel="stylesheet" type="text/css" href="assets/styles/rooms.css">
 <link rel="stylesheet" type="text/css" href="assets/styles/rooms_responsive.css">
 <style media="screen">
 .datepicker .datepicker-days {
font-size: 11px;
}
 </style>
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
         <div class="home_subtitle">จองห้องพัก</div>
         <div class="home_title"><?php echo __NAME__ ?></div>
       </div>
     </div>


   	<div class="intro">
   		<div class="container">
   			<div class="row">


   				<!-- Intro Content -->
   				<div class="col-lg-12 intro_col">
                        <form class="" action="booking-step2.php" method="post">
                     <h3>รายการห้องพักที่เลือกจองทั้งหมด <small><a href="history.php">ประวัติการทำรายการ</a></small>  </h3>
   					<table class="table table-bordered">
                        <tr>
                            <td>ชื่อห้อง</td>
                            <td>checkin</td>
                            <td>เลือกประเภทเช่า</td>
                            <td>จำนวนเงิน</td>
                            <td>จัดการ</td>
                        </tr>
                        <?php if (count($_SESSION['BOOKED']) ==0 ): ?>
                            <tr>
                                <td colspan="5">ไม่พบรายการ</td>
                            </tr>
                        <?php endif; ?>
                        <?php foreach ($_SESSION['BOOKED'] as $key => $value): ?>
                        <tr>
                            <td><?php  echo $value->room_name ?></td>
                            <td> <input name="checkid[<?php echo $value->id ?>]" type="text" class="form-control datepicker" name="" value="" placeholder="วันที่เข้า"> </td>
                            <td>
                                <select id="" class="form-control setprice" name="type[<?php echo $value->id ?>]">
                                    <option data-id="<?php echo $value->id ?>" value="1" data-price="<?php echo number_format($value->price_day,0); ?>" value="">รายวัน</option>
                                    <option data-id="<?php echo $value->id ?>" value="2" data-price="<?php echo number_format($value->price_month,0); ?>" value="">รายเดือน</option>
                                </select>
                            </td>
                            <td>
                                <span id="set-price-<?php echo $value->id ?>"><?php echo number_format($value->price_day,0); ?></span> บาท
                            </td>
                            <td>
                                <a href="booking.php?id=<?php echo $value->id ?>&action=remove">นำออก</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                       </table>
                       <button class="button_container home_button pull-right"><div class="button text-center"><span>ต่อไป</span></div></button>
                    </form>
   				</div>


   			</div>
   		</div>
   	</div>

   	<!-- Milestones -->
 	<!-- Footer -->
 <?php include "template/footer.php" ?>
 <script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="assets/locales/bootstrap-datepicker.th.min.js"></script>
 <script type="text/javascript">
     $(function() {
         $('.datepicker').datepicker({
             language:"th"
         })
         $('.setprice').change(function () {
            var price = $(this).children('option:selected').attr('data-price');
            var id = $(this).children('option:selected').attr('data-id');
            $('#set-price-'+ id).html(price);
         });
     })
 </script>
 </body>
 </html>
