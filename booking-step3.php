<?php error_reporting(0); ?>
<?php include "config/db.conf.php" ?>
<?php include "connection/connection.php" ?>

<?php
function setDate($date) {
    $d = explode('/', $date);
    return $d[2] . '-' . $d[0] . '-' . $d[1];
}
$sql = sprintf("INSERT INTO booking(user_id, created_at, status, total, deposit) VALUE ('%s','%s','%s','%s','%s')",
    $_SESSION['user']->id,
    date('Y-m-d H:i:s'),
    'รอชำระเงินมัดจำ',
    $_POST['set-total'],
    $_POST['set-rever']
    );

$con->query($sql);

$get_last_id = mysqli_insert_id($con);

foreach($_POST['checkid'] as $key => $value) {
    $sql = sprintf("INSERT INTO booking_detail(room_id, booking_id, status, total, deposit, checkin_date,type_booking) VALUE ('%s','%s','%s','%s','%s','%s','%s')",
        $key,
        $get_last_id,
        'รอชำระเงินมัดจำ',
        $_POST['price'][$key],
        $_POST['rever'][$key],
        setDate($_POST['checkid'][$key]),
        $_POST['booking_type'][$key]
        );

        if(!$con->query($sql)) {
            echo $con->error;
        }

        $sql = sprintf("UPDATE rooms SET status = 'จอง' WHERE id='%s'", $key);
        if(!$con->query($sql)) {
            echo $con->error;
        }


}

header( "location: booking-complate.php?id=".$get_last_id);


exit(0);
 ?>
