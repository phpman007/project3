<?php error_reporting(0); ?>
<?php include "config/db.conf.php" ?>
<?php include "connection/connection.php" ?>
<?php
unset($_SESSION['user']);
if ($_GET['action'] == 'login' && $_SERVER['REQUEST_METHOD'] === "POST") {
    $sql = sprintf("SELECT * FROM tbl_users WHERE username = '%s' AND password = '%s'", $_POST['username'], $_POST['password']);

    $result = $con->query($sql);
    if ($result->num_rows == 1) {
        $_SESSION['user'] = $result->fetch_object();

        // Redirect
        header( "location: booking.php?id=".$_SESSION['click_room']);

        unset($_SESSION['click_room']);
        
        exit(0);
    }

}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Samira</title>
<?php include "template/header.php" ?>
<link rel="stylesheet" type="text/css" href="assets/styles/rooms.css">
<link rel="stylesheet" type="text/css" href="assets/styles/rooms_responsive.css">
</head>
<style media="screen">

/* BASIC */

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

input[type=text],input[type=password] {
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

input[type=text]:focus, input[type=password]:focus {
background-color: #fff;
border-bottom: 2px solid #5fbae9;
}

input[type=text]:placeholder, input[type=password]:placeholder {
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
        <div class="home_subtitle">ลงชื่อเข้าสู่ระบบ</div>
        <div class="home_title"><?php echo __NAME__ ?></div>
      </div>
    </div>




  	<!-- Intro -->

  	<div class="intro">
  		<div class="container">
  			<div class="row">

  				<!-- Intro Content -->
  				<div class="col-lg-6 intro_col">
                    <div class="">
                          <div id="formContent">
                            <!-- Tabs Titles -->

                            <!-- Icon -->
                            <div class="fadeIn first">
                            <h2>เข้าสู่ระบบ</h2> <br>
                            เข้าสู่ระบบเพื่อ จัดการข้อมูลห้องพัก จ่ายมัดจำ จ่ายค่าห้อง และได้สิทธิพิเศษมากมาย
                            </div>

                            <!-- Login Form -->
                            <form action="login.php?action=login" method="POST">
                              <input type="text" id="E-mail" class="fadeIn second" name="username" placeholder="login">
                              <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                              <input type="submit" class="fadeIn fourth" value="เข้าสู่ระบบ">

                            </form>



                          </div>
                        </div>
  				</div>

                <!-- Intro Content -->
                <div class="col-lg-6 intro_col">
                    <div class="">
                          <div id="formContent">
                            <!-- Tabs Titles -->

                            <!-- Icon -->
                            <div class="fadeIn first">
                            <h2>ลงทะเบียนผู้ใช้งาน</h2> <br>
                            ลงทะเบียนเพื่อใช้งานเข้าสู่ระบบ จัดการข้อมูลห้องพัก จ่ายมัดจำ จ่ายค่าห้อง และได้สิทธิพิเศษมากมาย
                            </div>
                            <?php

                            if ($_GET['action'] == 'register' && $_SERVER['REQUEST_METHOD'] === "POST") {
                                $sql = sprintf("INSERT INTO tbl_users (username, password, firstname,lastname, type, id_card, bdate, address, zipcode, regist_date)
                                VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
                                $_POST['id_card'],
                                $_POST['password'],
                                $_POST['firstname'],
                                $_POST['lastname'],
                                'member',
                                $_POST['id_card'],
                                $_POST['bdate'],
                                $_POST['address'],
                                $_POST['zipcode'],
                                date('Y-m-d H:i:s')
                            );

                            $con->query($sql);
                            }
                             ?>
                            <!-- Login Form -->
                            <form action="login.php?action=register" method="POST">
                              <input type="text" id="id_card" class="fadeIn third" name="id_card" placeholder="เลขบัตรประจำตัวประชาชน">
                              <br>
                              <small class="fadeIn third" style="padding-left:30px">ใช้เลขบัตรประชาชนในการเข้าสู่ระบบ</small>
                               <input type="password" id="password" class="fadeIn second" name="password" placeholder="รหัสผ่าน">
                              <input type="text" id="firstname" class="fadeIn second" name="firstname" placeholder="ชื่อผู้ใช้">
                              <input type="text" id="lastname" class="fadeIn third" name="lastname" placeholder="นามสกุล">
                            <input type="text" id="bdate" class="fadeIn second" name="bdate" placeholder="วันเดือนปีเกิด">
                            <br>
                            <small class="fadeIn third" style="padding-left:30px">วัน-เดือน-ปี(ค.ศ.)</small>
                            <input type="text" id="address" class="fadeIn third" name="address" placeholder="ที่อยู่ปัจจุบัน">
                            <input type="text" id="zipcode" class="fadeIn third" name="zipcode" placeholder="รหัสไปร์ษณี">
                            <label class="container-box fadeIn second">ยืนยันการลงทะเบียน
                              <input type="checkbox" name="confirm" value="set">
                              <span class="checkmark"></span>
                            </label>

                              <input type="submit" class="fadeIn fourth" value="ลงทะเบียน">

                            </form>



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
