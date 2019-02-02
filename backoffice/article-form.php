<!DOCTYPE html>
<html>
<?php include 'template/header.php'; ?>

<?php
setlocale(LC_ALL, 'en_US.UTF8');
function slugit($str, $replace=array(), $delimiter='-') {
    if ( !empty($replace) ) {
        $str = str_replace((array)$replace, ' ', $str);
	}
	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
	return $clean;
}

if ($_SERVER['REQUEST_METHOD'] === "GET") {

  // Edit Action
  if ($_GET['action'] == 'edit' && !empty($_GET['uid'])) {
    $sql = sprintf('SELECT * FROM article WHERE id = \'%s\'', $_GET['uid']);

    $result = $con->query($sql)->fetch_object();

  }

  // Delete Action
  if ($_GET['action'] == 'delete' && !empty($_GET['uid'])) {
    $sql = sprintf('DELETE FROM article WHERE id = \'%s\'', $_GET['uid']);

    $result = $con->query($sql);

    // Redirect
    header( "location: article.php");
    exit(0);
  }
}


if ($_SERVER['REQUEST_METHOD'] === "POST") {


    // Action Update
  if ($_GET['action'] == "edit" && !empty($_GET['uid']) ) {

    // Attacement Image thumbnail
    if ($_FILES['thumbnail']['error'] != 4) {


      $target_dir = "uploads/article/";

      if (!file_exists($target_dir)) {
          mkdir($target_dir, 0777, true);
      }

      $_POST['thumbnail'] = $target_file = $target_dir . date('YmdHis').basename($_FILES["thumbnail"]["name"]);

      move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);

    } else {
      $sql = sprintf("SELECT thumbnail FROM article WHERE id = '%s'", $_GET['uid']);

      $result = $con->query($sql);

      $row = $result->fetch_row();

      $_POST['thumbnail'] = $row[0];
    }


    $sql = sprintf("UPDATE article SET slug='%s', type='%s', title='%s', desc_shrt='%s', desc_full='%s', thumbnail='%s', publish='%s' WHERE id = '%s'",
    slugit( $_POST['slug']),
    $_POST['type'],
    $_POST['title'],
    $_POST['desc_shrt'],
    $_POST['desc_full'],
    $_POST['thumbnail'],
    $_POST['publish'],
    $_GET['uid']
  );


  // Action Add
  } else {

    // Attacement Image thumbnail
    if ($_FILES['thumbnail']['error'] != 4) {
      $target_dir = "uploads/article/";

      if (!file_exists($target_dir)) {
          mkdir($target_dir, 0777, true);
      }

      $_POST['thumbnail'] = $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);

      move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);

    } else {
      $_POST['thumbnail'] = '';
    }



    $sql = sprintf('INSERT INTO article (slug, type, title,desc_shrt, desc_full, thumbnail, publish, created_at)
    VALUES (\'%s\',\'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\')',
      slugit( $_POST['slug']),
      $_POST['type'],
      $_POST['title'],
      $_POST['desc_shrt'],
      addslashes($_POST['desc_full']),
      $_POST['thumbnail'],
      $_POST['publish'],
      date('Y-m-d H:i:s')
      );


  }


if (!$result = $con->query($sql)) {
    $con->error;
    exit();
}


$get_last_id = mysqli_insert_id($con);


  if ($_POST['btn-submit'] == 'save') {

        header( "location: article.php" );
        exit(0);

  }else {

      if ($_GET['action'] == "edit" && !empty($_GET['uid']) ) {

        header( "location: article-form.php?action=edit&uid=". $_GET['uid'] );
        exit(0);

      } else {
        header( "location: article-form.php?uid=".$get_last_id );
        exit(0);

      }

  }
}


// Get Type rooms
$query = sprintf('SELECT * FROM type_room');

$types = $con->query($query);






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
                <h4 class="page-title">เพิ่ม & แก้ไข บทความ</h4>
                <ol class="breadcrumb float-right">
                  <li class="breadcrumb-item"><a href="index.php">หน้าแรก</a></li>
                  <li class="breadcrumb-item"><a href="article.php">จัดการบทความ</a></li>

                  <li class="breadcrumb-item active">เพิ่ม & แก้ไข จัดการบทความ</li>
                </ol>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-lg-12">
              <div class="card-box">
                <h4 class="m-t-0 header-title">เพิ่ม & แก้ไข จัดการบทความ</h4>

                <div class="row">
                  <div class="col-12">
                    <div class="p-20">
                      <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                          <div class="form-group row">
                            <label class="col-2 col-form-label">เผยแพร่</label>
                            <div class="col-10">
                                <select class="form-control" name="publish">
                                    <option value="1" <?php echo $result->publish == '1' ? 'selected' : '' ?>>เปิด</option>
                                    <option value="2" <?php echo $result->publish == '2' ? 'selected' : '' ?>>ปิด</option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-2 col-form-label">ประเภทบทความ</label>
                            <div class="col-10">
                                <select class="form-control" name="type">
                                    <option value="1" <?php echo $result->type == '1' ? 'selected' : '' ?>>บทความแนะนำ</option>
                                    <option value="2" <?php echo $result->type == '2' ? 'selected' : '' ?>>บทความระบบ</option>
                                </select>
                            </div>
                          </div>

                        <div class="form-group row">
                          <label class="col-2 col-form-label">รูปหน้าปก</label>
                          <div class="col-10">
                            <input type="file" name="thumbnail" class="form-control" placeholder="ชื่อ / เลขห้อง" accept="image/*">
                            <?php
                            if (!empty($result)) {
                              if (!empty($result->thumbnail)) {
                                echo "<a data-lightbox=\"image-1\" target='_blank' href='{$result->thumbnail}'>ดูรูปภาพหน้าปกห้อง</a>";
                              }
                            }
                             ?>
                          </div>
                        </div>

                        <!-- end Lastname -->
                        <div class="form-group row" style="display:none">
                          <label class="col-2 col-form-label">Slug</label>
                          <div class="col-10">
                            <input type="text" name="slug" value="<?php echo isset($result) ? $result->slug : date('Y-m-d-H-i-s') ?>" class="form-control" placeholder="Slug">
                            <small><i>ชื่อที่ใช้อ้างอิงบน URL</i></small>
                          </div>
                        </div>
                        <!-- end Lastname -->

                        <div class="form-group row">
                          <label class="col-2 col-form-label">ชื่อ</label>
                          <div class="col-10">
                            <input type="text" name="title" value="<?php echo isset($result) ? $result->title : $_POST['title'] ?>" class="form-control" placeholder="ชื่อ">
                          </div>
                        </div>
                        <!-- end Lastname -->
                        <div class="form-group row">
                          <label class="col-2 col-form-label">รายละเอียดย่อย</label>
                          <div class="col-10">
                            <input type="text" name="desc_shrt" value="<?php echo isset($result) ? $result->desc_shrt : $_POST['title'] ?>" class="form-control" placeholder="รายละเอียดย่อย">
                          </div>
                        </div>
                        <!-- end Lastname -->

                        <div class="form-group row">
                          <label class="col-2 col-form-label">รายละเอียด</label>
                          <div class="col-10">
                              <textarea id="summernote-2" class="form-control summernote" name="desc_full" rows="8" cols="80"><?php echo isset($result) ? $result->desc_full : $_POST['desc_full'] ?></textarea>
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

    <?php include 'template/js.php'; ?>
    <script type="text/javascript">
        $(function() {
            $('select[name="type_id"]').change(function() {

                var price_light = $(this).children('option:selected').data('light');

                if ( typeof price_light != "undefined" ) {
                    $('input[name="meter_light"]').val(price_light);
                } else {
                    $('input[name="meter_light"]').val('');
                }

                var price_water = $(this).children('option:selected').data('water');
                if ( typeof price_water != "undefined" ) {
                    $('input[name="meter_water"]').val(price_water);
                } else {
                    $('input[name="meter_water"]').val('');
                }
            });
        })
    </script>
</body>
</html>
