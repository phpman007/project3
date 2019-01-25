<!DOCTYPE html>
<html>
<?php include 'template/header.php'; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] === "GET") {

  // Edit Action
  if ($_GET['action'] == 'edit' && !empty($_GET['uid'])) {
    $sql = sprintf('SELECT * FROM tbl_users WHERE id = \'%s\'', $_GET['uid']);

    $result = $con->query($sql)->fetch_object();

    // Redirect
    // header( "location: users.php");
    // exit(0);
  }

  // Delete Action
  if ($_GET['action'] == 'delete' && !empty($_GET['uid'])) {
    $sql = sprintf('DELETE FROM tbl_users WHERE id = \'%s\'', $_GET['uid']);

    $result = $con->query($sql);

    // Redirect
    header( "location: users.php");
    exit(0);
  }
}


if ($_SERVER['REQUEST_METHOD'] === "POST") {
  if ($_GET['action'] == "edit" && !empty($_GET['uid']) ) {
    echo $sql = sprintf("UPDATE tbl_users SET firstname='%s', lastname='%s', id_card='%s', bdate='%s', address='%s' WHERE id = '%s'",
    $_POST['firstname'],
    $_POST['lastname'],
    $_POST['id_card'],
    $_POST['bdate'],
    $_POST['address'],
    $_GET['uid']
  );
  } else {

    $sql = sprintf('INSERT INTO tbl_users (firstname, lastname, type, id_card, bdate, address, regist_date, username, password)
    VALUES (\'%s\', \'%s\', \'member\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\')',
        $_POST['firstname'],
        $_POST['lastname'],
        $_POST['id_card'],
        $_POST['bdate'],
        $_POST['address'],
        date('Y-m-d H:i:s'),
        $_POST['username'],
        $_POST['password']
      );
  }



$result = $con->query($sql);

  if ($_POST['btn-submit'] == 'save') {
        header( "location: users.php" );
        exit(0);
  }else {
      if ($_GET['action'] == "edit" && !empty($_GET['uid']) ) {
        header( "location: user-form.php?action=edit&uid=". $_GET['uid'] );
        exit(0);
      } else {
        header( "location: user-form.php?uid=".mysqli_insert_id($con) );
        exit(0);
      }
  }
}






?>

<body class="fixed-left">

  <!-- Begin page -->
  <div id="wrapper">
    <!-- Top Bar Start -->
    <?php include 'template/top-menu.php'; ?>
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->
    <?php include 'template/menu.php'; ?>
    <!-- Left Sidebar End -->




    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
      <!-- Start content -->
      <div class="content">
        <div class="container-fluid">

          <!-- Page-Title -->
          <div class="row">
            <div class="col-sm-12">
              <div class="page-title-box">
                <h4 class="page-title">เพิ่ม & แก้ไข ผู้เช่า</h4>
                <ol class="breadcrumb float-right">
                  <li class="breadcrumb-item"><a href="index.php">หน้าแรก</a></li>
                  <li class="breadcrumb-item"><a href="users.php">จัดการผู้เช่า</a></li>

                  <li class="breadcrumb-item active">เพิ่ม & แก้ไข ผู้เช่า</li>
                </ol>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-lg-12">
              <div class="card-box">
                <h4 class="m-t-0 header-title">เพิ่ม & แก้ไข ผู้เช่า</h4>

                <div class="row">
                  <div class="col-12">
                    <div class="p-20">
                      <form class="form-horizontal" role="form" method="POST">
                        <div class="form-group row">
                          <label class="col-2 col-form-label">Username</label>
                          <div class="col-10">
                            <input type="text" name="username" value="<?php echo isset($result) ? $result->usernmae : $_POST['username'] ?>" class="form-control" placeholder="Username">
                          </div>
                        </div>

                        <!-- end Lastname -->
                        <div class="form-group row">
                          <label class="col-2 col-form-label">Password</label>
                          <div class="col-10">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                          </div>
                        </div>
                        <!-- end Lastname -->
                        <div class="form-group row">
                          <label class="col-2 col-form-label">รหัสบัตรประชาชน</label>
                          <div class="col-10">
                            <input name="id_card" type="text" value="<?php echo isset($result) ? $result->id_card : $_POST['id_card'] ?>" class="form-control" placeholder="รหัสบัตรประชาชน">
                          </div>
                        </div>
                        <!-- end id Card -->

                        <div class="form-group row">
                          <label class="col-2 col-form-label">ชื่อ</label>
                          <div class="col-10">
                            <input type="text" value="<?php echo isset($result) ? $result->firstname : $_POST['firstname'] ?>" name="firstname" class="form-control" placeholder="ชื่อ">
                          </div>
                        </div>
                        <!-- end firstname -->

                        <div class="form-group row">
                          <label class="col-2 col-form-label">นามสกุล</label>
                          <div class="col-10">
                            <input type="text" value="<?php echo isset($result) ? $result->lastname : $_POST['lastname'] ?>" name="lastname" class="form-control" placeholder="นามสกุล">
                          </div>
                        </div>
                        <!-- end Lastname -->

                        <div class="form-group row">
                          <label class="col-2 col-form-label">วันเกิด(ค.ศ.)</label>
                          <div class="col-10">
                            <input type="text" value="<?php echo isset($result) ? $result->bdate : $_POST['bdate'] ?>" name="bdate" class="form-control" placeholder="วว/ดด/ปปปป ">
                          </div>
                        </div>
                        <!-- end Lastname -->

                        <div class="form-group row">
                          <label class="col-2 col-form-label">ที่อยู่</label>
                          <div class="col-10">
                            <textarea name="address" class="form-control" rows="5" cols="80" placeholder="ที่อยู่"><?php echo isset($result) ? $result->address : $_POST['address'] ?></textarea>
                          </div>
                        </div>
                        <!-- end Lastname -->
                        <div class="form-group mb-0 justify-content-end row">
                          <div class="col-9">
                            <button type="submit" name="btn-submit" value="apply" class="btn btn-info waves-effect waves-light">Apply</button>
                            <button type="submit" name="btn-submit" value="save" class="btn btn-info waves-effect waves-light">Save</button>
                            <button type="reset" name="" class="btn btn-default waves-effect waves-light">Cancel</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                </div>
                <!-- end row -->

              </div>
            </div>
          </div>

        </div>
        <!-- end container -->
      </div>
      <!-- end content -->

      <?php include 'template/footer.php'; ?>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


    <!-- Right Sidebar -->

    <?php include 'template/side-bar.php'; ?>
    <!-- /Right-bar -->

  </div>
  <!-- END wrapper -->



  <script>
  var resizefunc = [];
  </script>

  <!-- Plugins  -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/detect.js"></script>
  <script src="assets/js/fastclick.js"></script>
  <script src="assets/js/jquery.slimscroll.js"></script>
  <script src="assets/js/jquery.blockUI.js"></script>
  <script src="assets/js/waves.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/jquery.nicescroll.js"></script>
  <script src="assets/js/jquery.scrollTo.min.js"></script>
  <script src="../plugins/switchery/switchery.min.js"></script>

  <!-- Custom main Js -->
  <script src="assets/js/jquery.core.js"></script>
  <script src="assets/js/jquery.app.js"></script>

</body>
</html>
