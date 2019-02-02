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

if (!empty($_GET['confirm'])) {
    $sql = sprintf("UPDATE payment SET status = 'ยืนยันการโอนเรียบร้อย' WHERE id = '%s'", $_GET['confirm']);


    $con->query($sql);

    $sql = sprintf("UPDATE booking_detail SET status = 'ยืนยันการโอนเรียบร้อย' WHERE id = '%s' AND room_id = '%s'", $_GET['booking_id'], $_GET['room_id']);


    $con->query($sql);

    $sql = sprintf("UPDATE booking SET status = 'ยืนยันการโอนเรียบร้อย' WHERE id = '%s'", $_GET['booking_id']);


    $con->query($sql);

    $sql = sprintf("UPDATE room SET status = 'มีผู้เช่าแล้ว' WHERE id = '%s'", $_GET['room_id']);


    $con->query($sql);
}

if (!empty($_GET['cancel'])) {
    $sql = sprintf("UPDATE payment SET status = 'จ่ายมัดจำ' WHERE id = '%s'", $_GET['cancel']);


    $con->query($sql);

    $sql = sprintf("UPDATE booking_detail SET status = 'รอชำระเงินมัดจำ' WHERE id = '%s' AND room_id = '%s'", $_GET['booking_id'], $_GET['room_id']);


    $con->query($sql);
    $sql = sprintf("UPDATE booking SET status = 'รอการตรวจสอบ' WHERE id = '%s'", $_GET['booking_id']);


    $con->query($sql);

    $sql = sprintf("UPDATE room SET status = 'ว่าง' WHERE id = '%s'", $_GET['room_id']);


    $con->query($sql);
}


$start = ($page - 1) * $perpage;

$sql = "SELECT * FROM payment WHERE invoiceStatus='จ่ายรายเดือน' OR invoiceStatus='ยืนยันการโอนเรียบร้อย' ORDER BY id desc  limit {$start} , {$perpage} ";


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
                                    <h4 class="m-t-0 header-title">รายการโอนค่ามันจำทั้งหมด</h4>
                                    <p class="text-muted font-14 m-b-20">
                                        หน้าแสดงรายการโอนค่ามันจำทั้งหมดของระบบ
                                    </p>

                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <!-- <th>#</th> -->
                                                <th>ห้อง</th>
                                                <th>สลิป</th>
                                                <th>วันที่บันทึก</th>
                                                <th>ชำระโดย</th>
                                                <th>จำนวนเงิน</th>
                                                <th>ยืนยัน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($item = $result->fetch_object()) { ?>
                                            <tr>
                                              <td>
                                                  <?php

                                                  $sql = sprintf("SELECT * FROM rooms WHERE id='%s'", $item->room_id);


                                                  $room = $con->query($sql)->fetch_object();

                                                  echo $room->room_name;

                                                   ?>
                                              </td>
                                              <td><a data-lightbox="image-1" href="<?php echo __ROOT__ ?>/<?php echo $item->image ?>">View</a> </td>
                                              <td><?php echo $item->invoiceDate ?></td>

                                              <td> <?php echo $item->name_pay ?></td>
                                              <td><?php echo number_format($item->price, 0) ?></td>
                                              <td>
                                                  <?php if ($item->status !='ยืนยันการโอนเรียบร้อย'): ?>
                                                      <a href="payment1-report.php?room_id=<?php echo $item->room_id ?>&booking_id=<?php echo $item->booking_id ?>&confirm=<?php echo $item->id ?>">ยืนยันรายการ</a>
                                                <?php else: ?>
                                                    <a href="payment1-report.php?room_id=<?php echo $item->room_id ?>&booking_id=<?php echo $item->booking_id ?>&cancel=<?php echo $item->id ?>">ยกเลิก</a>
                                                  <?php endif; ?>

                                              </td>
                                            </tr>
                                             <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                 $sql2 = "SELECT * from payment  WHERE invoiceStatus='จ่ายรายเดือน'";
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

                    <?php include 'template/js.php'; ?>

    </body>
</html>
