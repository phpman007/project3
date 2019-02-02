<!DOCTYPE html>
<html>
<?php include 'template/header.php'; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] === "GET") {

  // Edit Action
  if ($_GET['action'] == 'edit' && !empty($_GET['uid'])) {
    $sql = sprintf('SELECT * FROM rooms WHERE id = \'%s\'', $_GET['uid']);

    $result = $con->query($sql)->fetch_object();

  }

  // Delete Action
  if ($_GET['action'] == 'delete' && !empty($_GET['uid'])) {
    $sql = sprintf('DELETE FROM rooms WHERE id = \'%s\'', $_GET['uid']);

    $result = $con->query($sql);

    // Redirect
    header( "location: rooms-manager.php");
    exit(0);
  }
}


if ($_SERVER['REQUEST_METHOD'] === "POST") {


    // Action Update
  if ($_GET['action'] == "edit" && !empty($_GET['uid']) ) {

    // Attacement Image thumbnail
    if ($_FILES['thumbnail']['error'] != 4) {


      $target_dir = "uploads/rooms/";

      if (!file_exists($target_dir)) {
          mkdir($target_dir, 0777, true);
      }

      $_POST['thumbnail'] = $target_file = $target_dir . date('YmdHis').basename($_FILES["thumbnail"]["name"]);

      move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);

    } else {
      $sql = sprintf("SELECT thumbnail FROM rooms WHERE id = '%s'", $_GET['uid']);

      $result = $con->query($sql);

      $row = $result->fetch_row();

      $_POST['thumbnail'] = $row[0];
    }

    foreach ($_FILES['album']['tmp_name'] as $key => $value) {

      if ($_FILES['album']['error'][$key] != 4) {

        $target_dir = "uploads/rooms/photo/";

        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $photo = $target_file = $target_dir . date('YmdHis').basename($_FILES['album']['name'][$key]);

        move_uploaded_file($_FILES['album']['tmp_name'][$key], $target_file);
        $sql = sprintf("INSERT INTO room_photos (destination, filename, room_id) VALUES ('%s', '%s', '%s')", $photo , basename($_FILES['album']['name'][$key]), $_GET['uid']);

        $con->query($sql);
      }
  }

    $sql = sprintf("UPDATE rooms SET type_id='%s', remark='%s', price_day='%s', price_month='%s', detail='%s', thumbnail='%s', floor='%s', room_name='%s', meter_water='%s', meter_light='%s' WHERE id = '%s'",
    $_POST['type_id'],
    $_POST['remark'],
    $_POST['price_day'],
    $_POST['price_month'],
    $_POST['detail'],
    $_POST['thumbnail'],
    $_POST['floor'],
    $_POST['room_name'],
    $_POST['meter_water'],
    $_POST['meter_light'],
    $_GET['uid']
  );


  // Action Add
  } else {

    // Attacement Image thumbnail
    if ($_FILES['thumbnail']['error'] != 4) {
      $target_dir = "uploads/rooms/";

      if (!file_exists($target_dir)) {
          mkdir($target_dir, 0777, true);
      }

      $_POST['thumbnail'] = $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);

      move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);

    } else {
      $_POST['thumbnail'] = '';
    }



    $sql = sprintf('INSERT INTO rooms (type_id, remark, price_day,price_month, detail, thumbnail, floor, room_name, meter_water, meter_light)
    VALUES (\'%s\',\'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\')',
      $_POST['type_id'],
      addslashes($_POST['remark']),
      $_POST['price_day'],
      $_POST['price_month'],
      addslashes($_POST['detail']),
      $_POST['thumbnail'],
      $_POST['floor'],
      $_POST['room_name'],
      $_POST['meter_water'],
      $_POST['meter_light']
      );


  }


if (!$result = $con->query($sql)) {
    $con->error;
    exit();
}


$get_last_id = mysqli_insert_id($con);

foreach ($_FILES['album']['tmp_name'] as $key => $value) {

  if ($_FILES['album']['error'][$key] != 4) {

    $target_dir = "uploads/rooms/photo/";

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $photo = $target_file = $target_dir . date('YmdHis').basename($_FILES['album']['name'][$key]);

    move_uploaded_file($_FILES['album']['tmp_name'][$key], $target_file);
    $sql = sprintf("INSERT INTO room_photos (destination, filename, room_id) VALUES ('%s', '%s', '%s')", $photo , basename($_FILES['album']['name'][$key]), $get_last_id);

    $con->query($sql);
  }
}
  if ($_POST['btn-submit'] == 'save') {

        header( "location: rooms-manager.php" );
        exit(0);

  }else {

      if ($_GET['action'] == "edit" && !empty($_GET['uid']) ) {

        header( "location: room-form.php?action=edit&uid=". $_GET['uid'] );
        exit(0);

      } else {
        header( "location: room-form.php?uid=".$get_last_id );
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
                <h4 class="page-title">เพิ่ม & แก้ไข ห้องพัก</h4>
                <ol class="breadcrumb float-right">
                  <li class="breadcrumb-item"><a href="index.php">หน้าแรก</a></li>
                  <li class="breadcrumb-item"><a href="rooms-manager.php">จัดการห้องพัก</a></li>

                  <li class="breadcrumb-item active">เพิ่ม & แก้ไข จัดการห้องพัก</li>
                </ol>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-lg-12">
              <div class="card-box">
                <h4 class="m-t-0 header-title">เพิ่ม & แก้ไข จัดการห้องพัก</h4>

                <div class="row">
                  <div class="col-12">
                    <div class="p-20">
                      <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">

                          <div class="form-group row">
                            <label class="col-2 col-form-label">ประเภทห้องพัก</label>
                            <div class="col-10">
                                <select class="form-control" name="type_id">
                                    <option value="">-- เลือกปรเภทห้องพัก --</option>
                                    <?php while( $type = $types->fetch_object()) { ?>
                                    <option <?php echo $result->type_id == $type->id ? 'selected=""' : '' ?> data-light="<?php echo $type->price_light ?>" data-water="<?php echo $type->price_water ?>" value="<?php echo $type->id ?>"><?php echo $type->name ?></option>
                                    <?php } ?>
                                </select>


                            </div>
                          </div>

                        <div class="form-group row">
                          <label class="col-2 col-form-label">รูปหน้าปกห้อง</label>
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

                        <div class="form-group row">
                          <label class="col-2 col-form-label">รวมรูปห้อง</label>
                          <div class="col-10">
                            <input type="file" multiple name="album[]" class="form-control" placeholder="ชื่อ / เลขห้อง" accept="image/*">
                            <?php
                            if (!empty($result)) {
                              $sql = sprintf("SELECT * FROM room_photos WHERE room_id = '%s'", $_GET['uid']);
                              $photo = $con->query($sql);
                              while ($obj = $photo->fetch_object()) {
                                 echo "<a data-title=\"{$obj->filename}\" data-lightbox=\"image-2\" target='_blank' href='{$obj->destination}'>ดูรูปภาพหน้าปกห้อง | {$obj->filename}</a> | <a onclick=\"if(!confirm('ยืนยันการทำรายการ ลบข้อมูลหรือไม่')) return false\" href='delete-photo.php?uid={$obj->id}'>นำออก<a><br>";
                              }

                            }
                             ?>

                          </div>
                        </div>
                        <!-- end Lastname -->

                        <div class="form-group row">
                          <label class="col-2 col-form-label">ชื่อ / เลขห้อง</label>
                          <div class="col-10">
                            <input type="text" name="room_name" value="<?php echo isset($result) ? $result->room_name : $_POST['room_name'] ?>" class="form-control" placeholder="ชื่อ / เลขห้อง">
                          </div>
                        </div>
                        <!-- end Lastname -->

                        <div class="form-group row">
                          <label class="col-2 col-form-label">ชั้น</label>
                          <div class="col-10">
                            <input type="number" name="floor" value="<?php echo isset($result) ? $result->floor : $_POST['floor'] ?>" class="form-control" placeholder="ชื่อ / เลขห้อง">
                          </div>
                        </div>
                        <!-- end Lastname -->

                        <div class="form-group row">
                          <label class="col-2 col-form-label">รายละเอียด</label>
                          <div class="col-10">
                            <textarea class="form-control summernote" name="detail" rows="8" cols="80"><?php echo isset($result) ? $result->detail : $_POST['detail'] ?></textarea>
                          </div>
                        </div>
                        <!-- end Lastname -->

                        <div class="form-group row">
                          <label class="col-2 col-form-label">หมายเหตุ</label>
                          <div class="col-10">
                              <textarea id="summernote-2" class="form-control summernote" name="remark" rows="8" cols="80"><?php echo isset($result) ? $result->remark : $_POST['remark'] ?></textarea>
                            </div>
                        </div>
                        <!-- end Lastname -->

                        <div class="form-group row">
                          <label class="col-2 col-form-label">ราคา/เดือน</label>
                          <div class="col-10">
                            <input type="number" value="<?php echo isset($result) ? $result->price_month : $_POST['price_month'] ?>" name="price_month" class="form-control" placeholder="ราคา/เดือน">
                          </div>
                        </div>
                        <!-- end Lastname -->

                        <div class="form-group row">
                          <label class="col-2 col-form-label">ราคา/วัน</label>
                          <div class="col-10">
                            <input type="number" value="<?php echo isset($result) ? $result->price_day : $_POST['price_day'] ?>" name="price_day" class="form-control" placeholder="ราคา/วัน">
                          </div>
                        </div>
                        <!-- end Lastname -->

                        <div class="form-group row">
                          <label class="col-2 col-form-label">จำนวนไฟ/หน่วย</label>
                          <div class="col-10">
                            <input type="number" value="<?php echo isset($result) ? $result->meter_light : $_POST['meter_light'] ?>" name="meter_light" class="form-control" placeholder="ค่าไฟ/หน่วย">
                          </div>
                        </div>
                        <!-- end Lastname -->

                        <div class="form-group row">
                          <label class="col-2 col-form-label">จำนวนน้ำ/หน่วย</label>
                          <div class="col-10">
                            <input name="meter_water" type="number" value="<?php echo isset($result) ? $result->meter_water : $_POST['meter_water'] ?>" class="form-control" placeholder="ค่าน้ำ/หน่วย">
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
