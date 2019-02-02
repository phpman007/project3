<!DOCTYPE html>
<html>
    <!-- https://www.facebook.com/atallproject/ -->
    <!-- AllProject - รับทำเว็บไซต์ เขียนโปรแกรม ออกแบบเว็บไซต์ ทำการตลาดออนไลน์ -->
    <?php include 'template/header.php'; ?>
    <?php
    $perpage = 15;

    if (isset($_GET['page'])) {
      $page = $_GET['page'];

    } else {
      $page = 1;

    }

    $start = ($page - 1) * $perpage;

    $sql = "SELECT * FROM booking_detail WHERE status='รอชำระเงินมัดจำ' ORDER BY id desc  limit {$start} , {$perpage} ";


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
                                    <h4 class="page-title">หน้าแรก</h4>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="#">หน้าแรก</a></li>

                                        <li class="breadcrumb-item active">ยินดีต้อนรับ</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">รายการเช่าทั้งหมด</h4>
                                    <p class="text-muted font-14 m-b-20">
                                        หน้าแสดงรายการของเช่าห้องทั้งหมดของระบบ
                                    </p>

                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <!-- <th>#</th> -->
                                                <th>ห้อง</th>
                                                <th>จำนวนเงินมัดจำ</th>
                                                <th>จำนวนเงินเช่า</th>
                                                <th>วันที่เข้า</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($item = $result->fetch_object()) { ?>
                                            <tr>
                                                <!-- <th scope="row">1</th> -->
                                                <td>
                                                    <?php

                                                    $sql = sprintf("SELECT * FROM rooms WHERE id='%s'", $item->room_id);


                                                    $room = $con->query($sql)->fetch_object();

                                                    echo $room->room_name;

                                                     ?>
                                                </td>
                                                <td><?php echo number_format($item->deposit,0) ?></td>
                                                <td><?php echo number_format($item->total,0) ?></td>
                                                <td><?php echo $item->checkin_date ?></td>
                                            </tr>
                                             <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                 $sql2 = "SELECT * FROM booking_detail WHERE status='รอชำระเงินมัดจำ'";
                                 $query2 = mysqli_query($con, $sql2);
                                 $total_record = mysqli_num_rows($query2);
                                 $total_page = ceil($total_record / $perpage);
                                 ?>

                                <ul class="pagination">

                                  <!-- Pagination -->
                                  <?php for($i=1;$i<=$total_page;$i++){ ?>
                                  <li class="paginate_button page-item">
                                    <a href="payment1-report.php?page=<?php echo $i; ?>" aria-controls="datatable" data-dt-idx="0" tabindex="0" class="page-link"><?php echo $i; ?></a>
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
