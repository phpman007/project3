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

$sql = sprintf("SELECT * FROM booking_detail WHERE booking_id ='%s'", $_GET['id']);

$result = $con->query($sql);
 ?>

 <?php
 function setDate($date) {
     $d = explode('/', $date);
     return $d[2] . '-' . $d[0] . '-' . $d[1];
 }
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if ($_FILES['image']['error'] != 4) {
      $target_dir = "backoffice/uploads/payment/";

      if (!file_exists($target_dir)) {
          mkdir($target_dir, 0777, true);
      }

      $_POST['image'] = $target_file = $target_dir . basename($_FILES["image"]["name"]);

      move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    } else {
      $_POST['image'] = '';
    }

    $sql = sprintf("INSERT INTO payment (booking_id,room_id, name_pay, price, invoiceDate, invoiceStatus, image) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')",
    $_GET['id'],
    $_POST['booking_id'],
    $_POST['name_pay'],
    $_POST['price'],
    setDate($_POST['invoiceDate']),
    $_POST['invoiceStatus'],
    $_POST['image']
    );
    $con->query($sql);


    $sql = sprintf("UPDATE booking SET status = 'รอการตรวจสอบ' WHERE id= '%s'", $_GET['id']);
    $con->query($sql);
    // Redirect

    header( "location: history.php");
    exit(0);

}
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
 <style>

 html {
 background-color: #56baed;
 }

 body {
 font-family: "Poppins", sans-serif;
 height: 100vh;
 }

 a {
 color: #92badd;
 display:inline-block;
 text-decoration: none;
 font-weight: 400;
 }

 h2 {
 text-align: center;
 font-size: 16px;
 font-weight: 600;
 text-transform: uppercase;
 display:inline-block;
 margin: 40px 8px 10px 8px;
 color: #cccccc;
 }



 /* STRUCTURE */

 .wrapper {
 display: flex;
 align-items: center;
 flex-direction: column;
 justify-content: center;
 width: 100%;
 min-height: 100%;
 padding: 20px;
 }

 #formContent {
 -webkit-border-radius: 10px 10px 10px 10px;
 border-radius: 10px 10px 10px 10px;
 background: #fff;
 padding: 30px;
 width: 90%;
 max-width: 450px;
 position: relative;
 padding: 0px;
 /* text-align: center; */
 }

 #formFooter {
 background-color: #f6f6f6;
 border-top: 1px solid #dce8f1;
 padding: 25px;
 /* text-align: center; */
 -webkit-border-radius: 0 0 10px 10px;
 border-radius: 0 0 10px 10px;
 }



 /* TABS */

 h2.inactive {
 color: #cccccc;
 }

 h2.active {
 color: #0d0d0d;
 border-bottom: 2px solid #5fbae9;
 }



 /* FORM TYPOGRAPHY*/

 input[type=button], input[type=submit], input[type=reset]  {
 background-color: #56baed;
 border: none;
 color: white;
 padding: 15px 80px;
 text-align: center;
 text-decoration: none;
 display: inline-block;
 text-transform: uppercase;
 font-size: 17px;
 -webkit-border-radius: 5px 5px 5px 5px;
 border-radius: 5px 5px 5px 5px;
 margin: 5px 20px 40px 20px;
 -webkit-transition: all 0.3s ease-in-out;
 -moz-transition: all 0.3s ease-in-out;
 -ms-transition: all 0.3s ease-in-out;
 -o-transition: all 0.3s ease-in-out;
 transition: all 0.3s ease-in-out;
 }

 input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
 background-color: #39ace7;
 }

 input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
 -moz-transform: scale(0.95);
 -webkit-transform: scale(0.95);
 -o-transform: scale(0.95);
 -ms-transform: scale(0.95);
 transform: scale(0.95);
 }

 input[type=text],input[type=password], select {
 background-color: #f6f6f6;
 border: none;
 color: #0d0d0d;
 padding: 15px 32px;
 /* text-align: center; */
 text-decoration: none;
 display: inline-block;
 font-size: 16px;
 margin: 5px;
 width: 85%;
 border: 2px solid #f6f6f6;
 -webkit-transition: all 0.5s ease-in-out;
 -moz-transition: all 0.5s ease-in-out;
 -ms-transition: all 0.5s ease-in-out;
 -o-transition: all 0.5s ease-in-out;
 transition: all 0.5s ease-in-out;
 -webkit-border-radius: 5px 5px 5px 5px;
 border-radius: 5px 5px 5px 5px;
 }

 input[type=text]:focus, input[type=password]:focus, select:focus {
 background-color: #fff;
 border-bottom: 2px solid #5fbae9;
 }

 input[type=text]:placeholder, input[type=password]:placeholder, select:placeholder {
 color: #cccccc;
 }



 /* ANIMATIONS */

 /* Simple CSS3 Fade-in-down Animation */
 .fadeInDown {
 -webkit-animation-name: fadeInDown;
 animation-name: fadeInDown;
 -webkit-animation-duration: 1s;
 animation-duration: 1s;
 -webkit-animation-fill-mode: both;
 animation-fill-mode: both;
 }

 @-webkit-keyframes fadeInDown {
 0% {
 opacity: 0;
 -webkit-transform: translate3d(0, -100%, 0);
 transform: translate3d(0, -100%, 0);
 }
 100% {
 opacity: 1;
 -webkit-transform: none;
 transform: none;
 }
 }

 @keyframes fadeInDown {
 0% {
 opacity: 0;
 -webkit-transform: translate3d(0, -100%, 0);
 transform: translate3d(0, -100%, 0);
 }
 100% {
 opacity: 1;
 -webkit-transform: none;
 transform: none;
 }
 }

 /* Simple CSS3 Fade-in Animation */
 @-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
 @-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
 @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

 .fadeIn {
 opacity:0;
 -webkit-animation:fadeIn ease-in 1;
 -moz-animation:fadeIn ease-in 1;
 animation:fadeIn ease-in 1;

 -webkit-animation-fill-mode:forwards;
 -moz-animation-fill-mode:forwards;
 animation-fill-mode:forwards;

 -webkit-animation-duration:1s;
 -moz-animation-duration:1s;
 animation-duration:1s;
 }

 .fadeIn.first {
 -webkit-animation-delay: 0.4s;
 -moz-animation-delay: 0.4s;
 animation-delay: 0.4s;
 }

 .fadeIn.second {
 -webkit-animation-delay: 0.6s;
 -moz-animation-delay: 0.6s;
 animation-delay: 0.6s;
 }

 .fadeIn.third {
 -webkit-animation-delay: 0.8s;
 -moz-animation-delay: 0.8s;
 animation-delay: 0.8s;
 }

 .fadeIn.fourth {
 -webkit-animation-delay: 1s;
 -moz-animation-delay: 1s;
 animation-delay: 1s;
 }

 /* Simple CSS3 Fade-in Animation */
 .underlineHover:after {
 display: block;
 left: 0;
 bottom: -10px;
 width: 0;
 height: 2px;
 background-color: #56baed;
 content: "";
 transition: width 0.2s;
 }

 .underlineHover:hover {
 color: #0d0d0d;
 }

 .underlineHover:hover:after{
 width: 100%;
 }



 /* OTHERS */

 *:focus {
 outline: none;
 }

 #icon {
 width:60%;
 }
 /* Customize the label (the container) */
 .container-box {
   display: block;
   position: relative;
   padding-left: 35px;
   margin-bottom: 12px;
   cursor: pointer;
   font-size: 17px;
   -webkit-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
 }

 /* Hide the browser's default checkbox */
 .container-box input {
   position: absolute;
   opacity: 0;
   cursor: pointer;
   height: 0;
   width: 0;
 }

 /* Create a custom checkbox */
 .checkmark {

   position: absolute;
   top: 2px;
   left: 8px;
   height: 21px;
   width: 21px;
   background-color: #eee;
 }

 /* On mouse-over, add a grey background color */
 .container-box:hover input ~ .checkmark {
   background-color: #ccc;
 }

 /* When the checkbox is checked, add a blue background */
 .container-box input:checked ~ .checkmark {
   background-color: #2196F3;
 }

 /* Create the checkmark/indicator (hidden when not checked) */
 .checkmark:after {
   content: "";
   position: absolute;
   display: none;
 }

 /* Show the checkmark when checked */
 .container-box input:checked ~ .checkmark:after {
   display: block;
 }

 /* Style the checkmark/indicator */
 .container-box .checkmark:after {
   left: 9px;
   top: 5px;
   width: 5px;
   height: 10px;
   border: solid white;
   border-width: 0 3px 3px 0;
   -webkit-transform: rotate(45deg);
   -ms-transform: rotate(45deg);
   transform: rotate(45deg);
 }

 </style>

 <link rel="stylesheet" type="text/css" href="assets/styles/bootstrap-datepicker.min.css">
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
                     <h3>แจ้งชำระเงิน <?php echo sprintf('%04d', $_GET['id']) ?></h3>
                     <div class="col-lg-6 intro_col">
                         <div class="">
                               <div id="formContent">
                                 <!-- Tabs Titles -->

                                 <!-- Icon -->


                                 <!-- Login Form -->
                                 <form method="POST" enctype="multipart/form-data">

                                    <select class="fadeIn second" name="booking_id">
                                        <option value=""> เลือกห้อง</option>
                                        <?php
                                        while($item = $result->fetch_object()) {
                                            $room = $con->query(sprintf("SELECT * FROM rooms WHERE id='%s' LIMIT 1", $item->room_id))->fetch_object();
                                        ?>

                                        <option value="<?php echo $room->id ?>"> <?php echo $room->room_name ?></option>
                                    <?php } ?>
                                    </select>
                                    <select class="fadeIn second" name="invoiceStatus">
                                        <option value="จ่ายรายเดือน"> จ่ายรายเดือน</option>
                                        <option value="จ่ายมัดจำ"> จ่ายมัดจำ</option>
                                    </select>
                                    <input type="text" class="fadeIn second" name="name_pay" placeholder="ชื่อผู้ชำระ">
                                   <input type="text" class="fadeIn second" name="price" placeholder="จำนวนเงิน">
                                   <input type="text" class="fadeIn second datepicker" name="invoiceDate" placeholder="วันที่ชำระ">
                                   <br>
                                   <br>
                                   <div class="fadeIn second">
                                       แนบสลิป
                                       <input type="file" class="" name="image" placeholder="แนบสลิป">
                                   </div>
                                    <br>
                                    <br>
                                   <input type="submit" class="fadeIn fourth" value="แจ้งชำระ">

                                 </form>

                               </div>
                             </div>
       				</div>

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
