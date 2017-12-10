<?php
$target_dir = "../upload/";
$target_file = $target_dir.basename($_FILES["files"]["name"][0]);
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);


 
$upload_page = "<head><meta charset=\"UTF-8\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"><meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">";
$upload_page .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/bootstrap/bootstrap.css\"> <link rel=\"stylesheet\" type=\"text/css\" href=\"../css/style.css\"> ";
$upload_page .= "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>";
$upload_page .="<script src=\"../js/js-team.js\"></script>";
$upload_page .= "<link rel=\"shortcut icon\" href=\"../src/images/Xshare.png\" type=\"image/x-icon\">";
$upload_page .="<title>Login - XSHARE</title> </head>";
$upload_page .= "<body><div class=\"loginPage\" style=\"height: 100%;\">";
$upload_page .= "<div class=\"row align-centerjustify-content-center\"style=\"color: white; margin: auto\"><a class=\"\" href=\"./index.html\"><img src=\"../src/images/Logo_white.png\" alt=\"Logo\" style=\"height:75px; margin:auto;\"></a>";

if($FileType != "zip" && $FileType != "rar" && $FileType != "ppt"
&& $FileType != "pptx" ) {
    echo $upload_page ."<h2>Sorry, only ZIP, RAR, PPT & PPTX files are allowed." . "</h2></div></div></body>";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

} else {
    if (move_uploaded_file($_FILES["files"]["tmp_name"][0], $target_file)) {
        // echo ;
        echo $upload_page . "<h2 style=\"color: white\">The file ". basename( $_FILES["files"]["name"][0]). " has been uploaded." . "</h2></div></div></body>";
    } else {
        echo $upload_page ."<h2 style=\"color: white\">Sorry, there was an error uploading your file." . "</h2></div></div></body>";
    }
}
  
    
?>