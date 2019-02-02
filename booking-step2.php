<?php error_reporting(0); ?>
<?php include "config/db.conf.php" ?>
<?php include "connection/connection.php" ?>


<?php
$_SESSION['click_room'] = $_GET['id'];
if (empty($_SESSION['user'])) {
    header( "location: login.php" );
    exit(0);
}

if( $_SERVER['REQUEST_METHOD'] === "GET" ) {
    header( "location: booking.php");


    exit(0);
}
$total = 0;
$rever = 0;

$user = $_SESSION['user'];

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
         <div class="home_subtitle">จองห้องพัก</div>
         <div class="home_title"><?php echo __NAME__ ?></div>
       </div>
     </div>


   	<div class="intro">
   		<div class="container">
   			<div class="row">


   				<!-- Intro Content -->
   				<div class="col-lg-12 intro_col">
                        <form class="" action="booking-step3.php" method="post">
                     <h3>สรุปรายการห้องพักที่เลือกจองทั้งหมด</h3>
   					<table class="table table-bordered">
                        <tr>
                            <td>ชื่อห้อง</td>
                            <td>checkin</td>
                            <td>เลือกประเภทเช่า</td>
                            <td>ค่ามัดจำ</td>
                            <td>จำนวนเงิน</td>
                        </tr>
                        <?php if (count($_SESSION['BOOKED']) ==0 ): ?>
                            <tr>
                                <td colspan="4">ไม่พบรายการ</td>
                            </tr>
                        <?php endif; ?>
                        <?php foreach ($_SESSION['BOOKED'] as $key => $value): ?>
                        <tr>
                            <td><?php  echo $value->room_name ?></td>
                            <td><?php  echo $_POST['checkid'][$value->id]?></td>
                            <td>
                                <input type="hidden" name="checkid[<?php echo $value->id ?>]" value="<?php echo $_POST['checkid'][$value->id] ?>">

                                <?php if ($_POST['type'][$value->id] == 1): ?>
                                    รายวัน
                                <?php else: ?>
                                    รายเดือน
                                <?php endif; ?>

                            </td>
                            <td style="text-align:right">
                                <!-- รายวัน -->
                                <?php if ($_POST['type'][$value->id] == 1): ?>
                                    <input type="hidden" name="booking_type[<?php echo $value->id ?>]" value="รายวัน">
                                    <?php if (($value->price_day * 0.1) < 100): ?>
                                        <span id="set-price-<?php echo $value->id ?>"><?php echo number_format(100,0); ?></span>
                                        <input type="hidden" name="rever" value="100">
                                        <?php $rever +=  100; ?> บาท
                                    <?php else: ?>
                                        <span id="set-price-<?php echo $value->id ?>"><?php echo number_format($value->price_day * 0.1,0); ?></span>

                                        <input type="hidden" name="rever[<?php echo $value->id ?>]" value="<?php echo ($value->price_day * 0.1) ?>">
                                        <?php $rever +=  $value->price_day * 0.1; ?> บาท
                                    <?php endif; ?>
                                    <!-- รายเดือน  -->
                                <?php else: ?>
                                    <input type="hidden" name="booking_type[<?php echo $value->id ?>]" value="รายเดือน">
                                    <span id="set-price-<?php echo $value->id ?>"><?php echo number_format($value->price_month * 3,0); ?></span>
                                    <input type="hidden" name="rever[<?php echo $value->id ?>]" value="<?php echo ($value->price_month * 3) ?>">
                                    <?php $rever +=  $value->price_month * 3; ?> บาท
                                <?php endif; ?>

                            </td>
                            <td style="text-align:right">
                                <?php if ($_POST['type'][$value->id] == 1): ?>
                                    <span id="set-price-<?php echo $value->id ?>"><?php echo number_format($value->price_day,0); ?></span>
                                    <input type="hidden" name="price[<?php echo $value->id ?>]" value="<?php echo $value->price_day ?>">
                                <?php $total +=  $value->price_day; ?>
                                <?php else: ?>
                                    <span id="set-price-<?php echo $value->id ?>"><?php echo number_format($value->price_month,0); ?></span>
                                    <input type="hidden" name="price[<?php echo $value->id ?>]" value="<?php echo $value->price_month ?>">
                                <?php $total +=  $value->price_month; ?>
                                <?php endif; ?>
                                 บาท
                            </td>

                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2"></td>
                            <td style="text-align:right"><b>รวม</b></td>
                            <td style="text-align:right">
                                <input type="hidden" name="set-rever" value="<?php echo $rever ?>">
                                <?php echo number_format($rever, 0) ?> บาท</td>

                            <td style="text-align:right">
                                <input type="hidden" name="set-total" value="<?php echo $total ?>">
                                <?php echo number_format($total, 0) ?> บาท</td>
                        </tr>
                       </table>
                       การทำรายการนี้จะเข้าสู่ระบบ หลังจากกดยืนยัน ลูกค้าสามารถแจ้งการชำระเงินได้ที่ระบบแจ้งชำระค่าเช้า ค่ามัดจำ <br><hr>
                       <b>อัตราการคำนวนค่ามัดจำ</b>
                       <ul>
                           <li>ถ้าค่ามัดจำห้องมีค่าน้อยกว่า 100 บาท จะปัดเป็นค่ามัดจำ 100 บาท</li>
                           <li>เช่ารายวันจะต้องมีค่ามัดจำก่อน 10% ของค่าห้อง</li>
                           <li>เช่าห้องพักรายเดือนจะต้องมีค่ามัดจำล้วงหน้า 3 เดือน เมื่ออยู่ครบ 3 เดือนจะได้ค่ามัดจำคืน</li>
                       </ul>
                       <button class="button_container home_button pull-right"><div class="button text-center"><span>ยืนยัน</span></div></button>
                    </form>
   				</div>


   			</div>
   		</div>
   	</div>

   	<!-- Milestones -->
 	<!-- Footer -->
 <?php include "template/footer.php" ?>
 <script type="text/javascript">
     $(function() {
         $('.setprice').change(function () {
            var price = $(this).children('option:selected').attr('data-price');
            var id = $(this).children('option:selected').attr('data-id');
            $('#set-price-'+ id).html(price);
         });
     })
 </script>
 </body>
 </html>
