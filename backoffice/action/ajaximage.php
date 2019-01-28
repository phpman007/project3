<?php
include '../../config/db.conf.php';

if ($_FILES['file']['name']) {
            if (!$_FILES['file']['error']) {
                $name = md5(rand(100, 200));
                $ext = explode('.', $_FILES['file']['name']);
                $filename = $name . '.' . $ext[1];
                $destination = '../uploads/images/' . $filename; //change this directory

                if (!file_exists('../uploads/images')) {
                    mkdir('../uploads/images', 0777, true);
                }

                $location = $_FILES["file"]["tmp_name"];
                move_uploaded_file($location, $destination);
                echo  __ROOT__ . 'backoffice/uploads/images/' . $filename;//change this URL
            }
            else
            {
              echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
            }
        }
 ?>
