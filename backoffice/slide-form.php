<!DOCTYPE html>
<html>
<?php include 'template/header.php'; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] === "GET") {

  // Edit Action
  if ($_GET['action'] == 'edit' && !empty($_GET['uid'])) {
    $sql = sprintf('SELECT * FROM slide WHERE id = \'%s\'', $_GET['uid']);

    $result = $con->query($sql)->fetch_object();

    // Redirect
    // header( "location: slide.php");
    // exit(0);
  }

  // Delete Action
  if ($_GET['action'] == 'delete' && !empty($_GET['uid'])) {
    $sql = sprintf('DELETE FROM slide WHERE id = \'%s\'', $_GET['uid']);

    $result = $con->query($sql);

    // Redirect
    header( "location: slide.php");
    exit(0);
  }
}


if ($_SERVER['REQUEST_METHOD'] === "POST") {

  if ($_GET['action'] == "edit" && !empty($_GET['uid']) ) {
      // Attacement Image thumbnail
      if ($_FILES['thumbnail']['error'] != 4) {


        $target_dir = "uploads/slide/";

        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $_POST['thumbnail'] = $target_file = $target_dir . date('YmdHis').basename($_FILES["thumbnail"]["name"]);

        move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);

      } else {
        $sql = sprintf("SELECT image FROM slide WHERE id = '%s'", $_GET['uid']);

        $result = $con->query($sql);

        $row = $result->fetch_row();

        $_POST['thumbnail'] = $row[0];
      }

    $sql = sprintf("UPDATE slide SET name='%s', text_field='%s', title_field='%s', image='%s', url='%s' WHERE id = '%s'",
    $_POST['name'],
    $_POST['text_field'],
    $_POST['title_field'],
    $_POST['thumbnail'],
    $_POST['url'],
    $_GET['uid']
  );
  } else {
      // Attacement Image thumbnail
      if ($_FILES['thumbnail']['error'] != 4) {
        $target_dir = "uploads/slide/";

        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $_POST['thumbnail'] = $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);

        move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);

      } else {
        $_POST['thumbnail'] = '';
      }
    $sql = sprintf('INSERT INTO slide (name, text_field, title_field, image, url)
    VALUES (\'%s\', \'%s\', \'%s\', \'%s\', \'%s\')',
        $_POST['name'],
        $_POST['text_field'],
        $_POST['title_field'],
        $_POST['thumbnail'],
        $_POST['url']
      );
  }



$result = $con->query($sql);

  if ($_POST['btn-submit'] == 'save') {
        header( "location: slide.php" );
        exit(0);
  }else {
      if ($_GET['action'] == "edit" && !empty($_GET['uid']) ) {
        header( "location: slide-form.php?action=edit&uid=". $_GET['uid'] );
        exit(0);
      } else {
        header( "location: slide-form.php?uid=".mysqli_insert_id($con) );
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
                <h4 class="page-title">เพิ่ม & แก้ไข สไลด์หน้าเว็บ</h4>
                <ol class="breadcrumb float-right">
                  <li class="breadcrumb-item"><a href="index.php">หน้าแรก</a></li>
                  <li class="breadcrumb-item"><a href="room-type.php">จัดการสไลด์หน้าเว็บ</a></li>

                  <li class="breadcrumb-item active">เพิ่ม & แก้ไข จัดการสไลด์หน้าเว็บ</li>
                </ol>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-lg-12">
              <div class="card-box">
                <h4 class="m-t-0 header-title">เพิ่ม & แก้ไข จัดการสไลด์หน้าเว็บ</h4>

                <div class="row">
                  <div class="col-12">
                    <div class="p-20">
                      <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                          <div class="form-group row">
                            <label class="col-2 col-form-label">ภาพสไลด์</label>
                            <div class="col-10">
                                <input type="file" name="thumbnail" class="form-control">
                                <?php
                                if (!empty($result)) {
                                  if (!empty($result->image)) {
                                    echo "<a data-lightbox=\"image-1\" target='_blank' href='{$result->image}'>ดูรูปภาพหน้าปกห้อง</a>";
                                  }
                                }
                                 ?>
                            </div>
                          </div>
                        <div class="form-group row">
                          <label class="col-2 col-form-label">แคมเปน</label>
                          <div class="col-10">
                            <input type="text" name="name" value="<?php echo isset($result) ? $result->name : $_POST['name'] ?>" class="form-control" placeholder="แคมเปน">
                          </div>
                        </div>

                        <!-- end Lastname -->
                        <div class="form-group row">
                          <label class="col-2 col-form-label">หัวข้อ</label>
                          <div class="col-10">
                            <input type="text" value="<?php echo isset($result) ? $result->title_field : $_POST['title_field'] ?>" name="title_field" class="form-control" placeholder="หัวข้อ">
                          </div>
                        </div>
                        <!-- end Lastname -->
                        <div class="form-group row">
                          <label class="col-2 col-form-label">รายละเอียด</label>
                          <div class="col-10">
                            <input name="text_field" type="text" value="<?php echo isset($result) ? $result->text_field : $_POST['text_field'] ?>" class="form-control" placeholder="รายละเอียด">
                          </div>
                        </div>
                        <!-- end id Card -->
                        <div class="form-group row">
                          <label class="col-2 col-form-label">URL</label>
                          <div class="col-10">
                            <input name="url" type="text" value="<?php echo isset($result) ? $result->url : $_POST['url'] ?>" class="form-control" placeholder="URL">
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

      <?php include 'template/js.php'; ?>

</body>
</html>
