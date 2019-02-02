<?php error_reporting(0); ?>
<?php include "config/db.conf.php" ?>
<?php include "connection/connection.php" ?>


<?php
$_SESSION['click_room'] = $_GET['id'];
if (empty($_SESSION['user'])) {
    header( "location: login.php" );
    exit(0);
}


$user = $_SESSION['user'];

$sql = sprintf("SELECT * FROM booking WHERE user_id ='%s'", $user->id);

$result = $con->query($sql);
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
                     <h3>ประวัติการทำรายการ</h3>
   					<table class="table table-bordered">
                        <tr>
                            <td>เลขที่บิล</td>
                            <td>มัดจำ</td>
                            <td>จำนวนเงิน</td>
                            <td>สถานะ</td>
                            <td>จัดการ</td>
                        </tr>
                        <?php if ($result->num_rows ==0 ): ?>
                            <tr>
                                <td colspan="4">ไม่พบรายการ</td>
                            </tr>
                        <?php endif; ?>
                        <?php while($item = $result->fetch_object()) { ?>
                            <tr>
                                <td><?php echo sprintf('%04d', $item->id) ?></td>
                                <td><?php echo number_format($item->deposit,0) ?> บาท</td>
                                <td><?php echo number_format($item->total,0) ?> บาท</td>
                                <td><?php echo $item->status ?></td>
                                <td>
                                        <a href="payment.php?id=<?php echo $item->id ?>">แจ้งชำระเงิน</a>
                                </td>
                            </tr>
                        <?php } ?>
                       </table>

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
