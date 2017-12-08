<?php
$target_dir = "upload/";
$target_file = $target_dir.basename($_FILES["files"]["name"][0]);
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);

if($FileType != "zip" && $FileType != "rar" && $FileType != "ppt"
&& $FileType != "pptx" ) {
    echo "Sorry, only ZIP, RAR, PPT & PPTX files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

} else {
    if (move_uploaded_file($_FILES["files"]["tmp_name"][0], $target_file)) {
        echo "The file ". basename( $_FILES["files"]["name"][0]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>