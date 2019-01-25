<!DOCTYPE html>
<html>
<?php include 'template/header.php'; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] === "GET") {

  // Edit Action
  if ($_GET['action'] == 'edit' && !empty($_GET['uid'])) {
    $sql = sprintf('SELECT * FROM type_room WHERE id = \'%s\'', $_GET['uid']);

    $result = $con->query($sql)->fetch_object();

    // Redirect
    // header( "location: room-type.php");
    // exit(0);
  }

  // Delete Action
  if ($_GET['action'] == 'delete' && !empty($_GET['uid'])) {
    $sql = sprintf('DELETE FROM type_room WHERE id = \'%s\'', $_GET['uid']);

    $result = $con->query($sql);

    // Redirect
    header( "location: room-type.php");
    exit(0);
  }
}


if ($_SERVER['REQUEST_METHOD'] === "POST") {
  if ($_GET['action'] == "edit" && !empty($_GET['uid']) ) {
    echo $sql = sprintf("UPDATE type_room SET name='%s', price_light='%s', price_water='%s' WHERE id = '%s'",
    $_POST['name'],
    $_POST['price_light'],
    $_POST['price_water'],
    $_GET['uid']
  );
  } else {

    $sql = sprintf('INSERT INTO type_room (name, price_light, price_water)
    VALUES (\'%s\', \'%s\', \'%s\')',
        $_POST['name'],
        $_POST['price_light'],
        $_POST['price_water']
      );
  }



$result = $con->query($sql);

  if ($_POST['btn-submit'] == 'save') {
        header( "location: room-type.php" );
        exit(0);
  }else {
      if ($_GET['action'] == "edit" && !empty($_GET['uid']) ) {
        header( "location: room-type-form.php?action=edit&uid=". $_GET['uid'] );
        exit(0);
      } else {
        header( "location: room-type-form.php?uid=".mysqli_insert_id($con) );
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
                <h4 class="page-title">เพิ่ม & แก้ไข ประเภทห้องพัก</h4>
                <ol class="breadcrumb float-right">
                  <li class="breadcrumb-item"><a href="index.php">หน้าแรก</a></li>
                  <li class="breadcrumb-item"><a href="room-type.php">จัดการประเภทห้องพัก</a></li>

                  <li class="breadcrumb-item active">เพิ่ม & แก้ไข จัดการประเภทห้องพัก</li>
                </ol>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-lg-12">
              <div class="card-box">
                <h4 class="m-t-0 header-title">เพิ่ม & แก้ไข จัดการประเภทห้องพัก</h4>

                <div class="row">
                  <div class="col-12">
                    <div class="p-20">
                      <form class="form-horizontal" role="form" method="POST">
                        <div class="form-group row">
                          <label class="col-2 col-form-label">ชื่อ / เลขห้อง</label>
                          <div class="col-10">
                            <input type="text" name="name" value="<?php echo isset($result) ? $result->name : $_POST['name'] ?>" class="form-control" placeholder="ชื่อ / เลขห้อง">
                          </div>
                        </div>

                        <!-- end Lastname -->
                        <div class="form-group row">
                          <label class="col-2 col-form-label">ค่าไฟ/หน่วย</label>
                          <div class="col-10">
                            <input type="text" value="<?php echo isset($result) ? $result->price_light : $_POST['price_light'] ?>" name="price_light" class="form-control" placeholder="ค่าไฟ/หน่วย">
                          </div>
                        </div>
                        <!-- end Lastname -->
                        <div class="form-group row">
                          <label class="col-2 col-form-label">ค่าน้ำ/หน่วย</label>
                          <div class="col-10">
                            <input name="price_water" type="text" value="<?php echo isset($result) ? $result->price_water : $_POST['price_water'] ?>" class="form-control" placeholder="ค่าน้ำ/หน่วย">
                          </div>
                        </div>
                        <!-- end id Card -->

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
