<?php

/* Getting file name */
$filename = $_FILES['file']['name'];

/* Location */
$location = "upload/".$filename;

$return_arr = '<div><pre>';

/* Upload file */
if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){

    $file = file_get_contents($location);
    $return_arr .= $file . '</div></pre>';

}

echo json_encode($return_arr);