<?php include 'template/header.php'; ?>

<?php
$sql = sprintf("DELETE FROM room_photos WHERE id = '%s'", $_GET['uid']);

$con->query($sql);

header('Location: ' . $_SERVER['HTTP_REFERER']);

exit();

 ?>
