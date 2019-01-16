<!DOCTYPE html>
<html>
    <?php include 'template/header.php'; ?>

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
                                    <h4 class="m-t-0 header-title">รายการค่าน้ำ ค่าไฟฟ้าทั้งหมด</h4>
                                    <p class="text-muted font-14 m-b-20">
                                        หน้าแสดงรายการค่าน้ำ ค่าไฟฟ้าทั้งหมดของระบบ
                                    </p>

                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <!-- <th>#</th> -->
                                                <th>เลขที่ห้อง</th>
                                                <th>วันที่บันทึก</th>
                                                <th>ค่าน้ำ/หน่วย</th>
                                                <th>ค่าน้ำ/บาท</th>
                                                <th>รวมค่าน้ำ</th>
                                                <th>ค่าไฟฟ้า/หน่วย</th>
                                                <th>ค่าไฟฟ้า/บาท</th>
                                                <th>รวมค่าไฟฟ้า</th>
                                                <th>รวม</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($result = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                              <td>เลขที่ห้อง</td>
                                              <td>วันที่บันทึก</td>
                                              <td>ค่าน้ำ/หน่วย</td>
                                              <td>ค่าน้ำ/บาท</td>
                                              <td>รวมค่าน้ำ</td>
                                              <td>ค่าไฟฟ้า/หน่วย</td>
                                              <td>ค่าไฟฟ้า/บาท</td>
                                              <td>รวมค่าไฟฟ้า</td>
                                              <td>รวม</td>
                                            </tr>
                                             <?php } ?>
                                        </tbody>
                                    </table>
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
