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
                                    <h4 class="m-t-0 header-title">รายการเช่าทั้งหมด</h4>
                                    <p class="text-muted font-14 m-b-20">
                                        หน้าแสดงรายการของเช่าห้องทั้งหมดของระบบ
                                    </p>

                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <!-- <th>#</th> -->
                                                <th>ชื่อ</th>
                                                <th>สกุล</th>
                                                <th>เลขห้อง</th>
                                                <th>แก้ไข</th>
                                                <th>ลบ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($result = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <!-- <th scope="row">1</th> -->
                                                <td><?php echo $result['firstname'] ?></td>
                                                <td><?php echo $result['lastname'] ?></td>
                                                <td><?php echo $result['card_number'] ?></td>
                                                <td>แก้ไข</td>
                                                <td>ลบ</td>
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
