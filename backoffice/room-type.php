<!DOCTYPE html>
<html>
<?php include 'template/header.php'; ?>

<?php
$perpage = 15;

if (isset($_GET['page'])) {
  $page = $_GET['page'];

} else {
  $page = 1;

}


$start = ($page - 1) * $perpage;
$sql = "SELECT * FROM type_room limit {$start} , {$perpage} ";


$result = $con->query($sql);



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
                <h4 class="page-title">จัดการประเภทห้องพัก</h4>
                <ol class="breadcrumb float-right">
                  <li class="breadcrumb-item"><a href="#">หน้าแรก</a></li>

                  <li class="breadcrumb-item active">จัดการประเภทห้องพัก</li>
                </ol>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-lg-12">
              <div class="card-box">
                <h4 class="m-t-0 header-title">จัดการประเภทห้องพัก <small><a href="room-type-form.php">เพิ่ม +</a></small> </h4>
                <p class="text-muted font-14 m-b-20">
                  หน้าแสดงรายการของประเภทห้องพักทั้งหมดของระบบ
                </p>

                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th>#</th>
                      <th>ประเภท</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (mysqli_num_rows ($result) == 0) { ?>
                      <tr>
                        <td colspan="5">ไม่พบข้อมูล</td>
                      </tr>
                    <?php } ?>
                    <?php while ($re = mysqli_fetch_assoc($result)) {?>
                      <tr>
                        <th scope="row"><?php echo $re['id'] ?></th>
                        <td><?php echo $re['name'] ?></td>
                        <td>
                          <a href="room-type-form.php?action=edit&uid=<?php echo $re['id'] ?>" class="btn btn-sm btn-info">แก้ไข</a>
                          <a onclick="if(!confirm('ยืนยันการทำรายการ ลบข้อมูลหรือไม่')) return false" href="room-type-form.php?action=delete&uid=<?php echo $re['id'] ?>" class="btn btn-sm btn-danger">ลบ</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <?php
               $sql2 = "select * from type_room ";
               $query2 = mysqli_query($con, $sql2);
               $total_record = mysqli_num_rows($query2);
               $total_page = ceil($total_record / $perpage);
               ?>

              <ul class="pagination">

                <!-- Pagination -->
                <?php for($i=1;$i<=$total_page;$i++){ ?>
                <li class="paginate_button page-item">
                  <a href="users.php?page=<?php echo $i; ?>" aria-controls="datatable" data-dt-idx="0" tabindex="0" class="page-link"><?php echo $i; ?></a>
                </li>
                <?php } ?>
                <!-- End Paginate -->

              </ul>

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
